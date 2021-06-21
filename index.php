

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
    <div class="container-fluid jumbo shadow mb-5 rounded" style="width: 100%; height:380px;">
        <div class="left" style="width: 50%; height: 50px; float: left;"> 
        <div class="jumbotron">
            <h1 class="display-8">A Systematic approach To Learn Computer Science</h1>
            <p class="lead">Any material which constitutes harassment, or abuse is strictly prohibited. Material that is obscene, racist is not permitted</p>
            <hr class="my-1">
            <p>Contribute Learn And Share the knowlege of Information Technology in any corner of the world</p>
            
        </div>
        </div>

        <div class="right"  style="margin-left: 50%; height:350px;">
        <img src="img/bloglogo.jpg" class="card-img-middle rounded-circle px-5" alt="..." style="height:350px; text-align:center;">

        </div>
        
    

    </div>

    <div class="container-fluid  shadow p-3 mb-5 rounded">
        <h2>welcome to techblogs-search categories</h2>
        <div class="row">

        <!-- fetch categories from data base -->
        <?php 
        
        $obtain_categories="SELECT * FROM `categories`";
        $resultset=mysqli_query($con,$obtain_categories);
        while($getrecord=mysqli_fetch_assoc($resultset)){
            // $category_name=$getrecord['category_name'];
                //$category_id=$getrecord['category_id'];
            ?>
             <div class="col-md-4 my-2  shadow p-3 mb-5  rounded">
                <div class="card mycardcolor" style="width: 18rem;">
                    <img src="https://source.unsplash.com/800x450/?'.$category_name.',programming" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title"><a style="text-decoration: none;" href="threadlist.php?category_id=<?php echo $getrecord['category_id']?>" ><?php echo $getrecord['category_name'] ?></a></h5>
                        <p class="card-text"><?php  echo $getrecord['category_description']?></p>
                        <a href="threadlist.php?category_id=<?php echo $getrecord['category_id']?>" class="btn btn-primary">view more</a>
                    </div>
                </div>
            </div> 


        <?php }
        
        
        ?>

           
            
            

        </div>
    </div>





    <?php include 'includes/_footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>