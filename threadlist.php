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
    <link rel="stylesheet" href="css/sweetalert2.min.css">



    <title>posts</title>
</head>

<body>
    <?php
    include 'includes/_dbconnect.php';
    include 'includes/_header.php';
    
    $get_category_id = $_GET['category_id'];


    $select_id_query = "SELECT * FROM `categories` where category_id=$get_category_id";
    $result = mysqli_query($con, $select_id_query);
    while ($fetched_rows = mysqli_fetch_assoc($result)) { ?>
        <div class="container my-4">
            <div class="jumbotron  shadow p-3 mb-5  rounded" style="background-color: grey;">
                <h1 class="display-4 text-center">welcome to <?php echo $fetched_rows['category_name'] ?> </h1>
                <p class="lead"><?php echo $fetched_rows['category_description'] ?></p>
                <hr class="my-4">
                <p>yaha bhi k6 likhna pdega</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>

        <?php
        // post database me dalne k liye
        $showalert=false;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "POST") {
            $post_title = $_POST['title'];
            $post_description = $_POST['post_description'];

            $post_userno = $_POST['userno'];
            
            //insert blog into database 
            $sql_query_insert_blog = "INSERT INTO `posts` ( `post_title`, `post_description`, `post_category_id`, `post_user_id`, `post_created_time`) VALUES ( '$post_title', '$post_description', '$get_category_id', '$post_userno', current_timestamp())";
            $result_insert_blog = mysqli_query($con, $sql_query_insert_blog);
            $showalert = true;
            if ($showalert) {
                echo '
            <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>comment added successfully</strong> mze kro
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
            </div>
        ';
            }

        }
        ?>


        <!-- script to submit a blog post from a form -->
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
            <div class="container shadow rounded" style="background-color: lightgreen;">
                <h1 class="py-2">start a discussion </h1>

                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="form-group py-2">
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group py-2">
                        <textarea class="form-control" rows="10" id="post_description" name="post_description" placeholder="start to write post"></textarea>
                        <input type="hidden" name="userno" value="<?php echo $_SESSION['userno'] ?>">
                    </div>

                    <button  type="submit" class="btn btn-primary" id="btn">Submit</button>
                </form>
            </div>
        <?php




        } else { ?>

            <div class="container">
                <p class="lead">you are not logged in</p>
            </div>





        <?php
        }

        ?>




        <div class="container">
            <h1 class="py-2"> Browse POSTs</h1>
            <?php
            $get_category_id = $_GET['category_id'];

            $select_id_query = "SELECT * FROM `posts` where post_category_id=$get_category_id";
            $got_ant_post = true;
            $result = mysqli_query($con, $select_id_query);
            while ($fetched_rows = mysqli_fetch_assoc($result)) {
                $post_user_id = $fetched_rows['post_user_id'];
                $query_for_username = "SELECT userid,useremail FROM `users` WHERE userno='$post_user_id'";
                $result_for_username = mysqli_query($con, $query_for_username);
                $row_for_username = mysqli_fetch_assoc($result_for_username);





                $got_ant_post = false; ?>
                <div class="media">
                    <img src="img/defaultuser.png" style="width:40px" class="mr-3" alt="...">
                    <div class="media-body">
                        <p class="font-weight-bold my-0"><?php echo $row_for_username['userid']?> at <?php echo $fetched_rows['post_created_time'] ?></p>
                        <h5 class="mt-0"><a href="post.php?post_id=<?php echo $fetched_rows['post_id'] ?>" style="text-decoration: none;"><?php echo $fetched_rows['post_title'] ?></a></h5>
                        <p><?php echo $fetched_rows['post_description'] ?></p>
                    </div>
                </div>

            <?php } ?>
        </div>
    <?php } //echo var_dump($got_ant_post);
    if ($got_ant_post) {
        echo '<div class="container"><div class="jumbotron  shadow p-3 mb-5  rounded" style="background-color: grey;">
        <div class="container">
          <h1 class="display-4">no post found</h1>
          <p class="lead">be first person to post</p>
        </div>
      </div>
      </div>';
    } ?>




    <?php include 'includes/_footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    

    




</body>

</html>