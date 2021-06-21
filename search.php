

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/8ba1bf8786.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>myforum</title>
</head>

<body  >
    <?php include 'includes/_dbconnect.php';?>
    <?php include 'includes/_header.php'; ?>
    <div class="container-fluid  shadow p-3 mb-2 rounded">
    
        <h2>Search results for <em>"<?php echo $_REQUEST["search"]?>"</em></h2>
        <?php

        $query=$_GET["search"];
        $select_id_query = "SELECT * FROM posts WHERE MATCH(post_title,post_description) against('$query')";
        $result = mysqli_query($con, $select_id_query);
        $no_such_query=true;
        while ($fetched_rows = mysqli_fetch_assoc($result)) {
            $no_such_query=false?>
            <div class="result">

            <h3><a href="post.php?post_id=<?php echo $fetched_rows['post_id'] ?>" ><?php echo $fetched_rows['post_title']?></a></h3>
            <p><?php echo $fetched_rows['post_description']?></p>
            <hr>
           </div>


        <?php }
        if($no_such_query){?>
            <div class="container-fluid my-4">
            <div class="jumbotron  shadow p-3 mb-5  rounded">
                <h1 class="display-4 text-center">Your search - <?php echo $_GET['search']?> - did not match any documents.</h1>
                <p class="lead">Suggestions:
                <ul>
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
                </ul>
                </p>
                
                
                
            </div>
        </div>
            <?php
        }
        ?>
        
         

        

    





    <?php include 'includes/_footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>