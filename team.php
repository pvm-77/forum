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

    <title>teamZMQ</title>
</head>

<body>
    <?php include 'includes/_header.php';
    include 'includes/_dbconnect.php'; ?>
    <div class="container-fluid  py-3 team">
        <h2 class="text-center"><i class="fas fa-users"></i> Our Team</h2>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <?php
            //here we wd fetch data from database 
            $select_query = "SELECT * FROM team";
            $result = mysqli_query($con, $select_query);
            while ($fetched_rows = mysqli_fetch_assoc($result)) { ?>

                <div class="col md-4  my-2">
                    <div class="card " style="width:18rem;">

                        <img src="<?php echo $fetched_rows['image']; ?>" ; class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $fetched_rows['fullname'] ?></h5>
                            <h4><?php echo $fetched_rows['designation'] ?></h4>
                            <p class="card-text"><?php echo $fetched_rows['description'] ?></p>
                            <div class="card-footer bottom">
                                <a class="btn btn-primary btn-twitter btn-sm" href="<?php echo $record['twitter']; ?>">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" rel="publisher" href="<?php echo $record['gplus']; ?>">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" rel="publisher" href="<?php echo $record['facebook']; ?>">
                                    <i class="fa fa-facebook "></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <?php include 'includes/_footer.php';?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>