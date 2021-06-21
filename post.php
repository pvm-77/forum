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

    <title>posts</title>
</head>

<body>
    <?php
    include 'includes/_dbconnect.php';
    include 'includes/_header.php';
    
    $get_post_id = $_GET['post_id'];
    $select_id_query = "SELECT * FROM `posts` where post_id=$get_post_id";
    $result = mysqli_query($con, $select_id_query);
    while ($fetched_rows = mysqli_fetch_assoc($result)) {
        $title = $fetched_rows['post_title'];
        $description = $fetched_rows['post_description']; ?>
        <div class="container my-4">
            <div class="jumbotron  shadow p-3 mb-5  rounded" style="background-color: grey;">
                <h1 class="display-4 text-center"><?php echo $fetched_rows['post_title'] ?> </h1>
                <p class="lead"><?php echo $fetched_rows['post_description'] ?> </p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p><b>Posted by <em><?php echo $_SESSION['username']?></em></b></p>
            </div>
        </div>

        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
            <div class="container shadow rounded" style="background-color: lightgreen;">
                <h1 class="py-2">post a comment </h1>
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="form-group py-2">
                        <textarea class="form-control" rows="10" id="comment" name="comment" placeholder=" type comment here"></textarea>
                        <input type="hidden" name="userno" value="<?php echo $_SESSION['userno'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">post comment</button>
                </form>
            </div>
        <?php
        } else { ?>
            <div class="container">
                <h1 class="py-2">post a comment </h1>
                <p class="lead">you are not logged in</p>
            </div>
        <?php
        }

        ?>


        <?php
        $showalert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "POST") {
            $post_comment = $_POST['comment'];
            $sno = $_POST['userno'];
            

            //insert comment into database 
            $sql_query_insert_comment = "INSERT INTO `comments` ( `comment_content`, `post_id`, `comment_time`, `comment_by`) VALUES ('$post_comment', '$get_post_id', current_timestamp(), '$sno')";
            $result_insert_comment = mysqli_query($con, $sql_query_insert_comment);
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




        <div class="container">
            <h1 class="py-2">Discussion</h1>
            <?php
            $get_category_id = $_GET['post_id'];

            $select_id_query = "SELECT * FROM `comments` where post_id=$get_category_id";
            $got_ant_post = true;
            $result = mysqli_query($con, $select_id_query);
            while ($fetched_rows = mysqli_fetch_assoc($result)) {
                $comment_time = $fetched_rows['comment_time'];
                $post_user_id = $fetched_rows['comment_by'];
                $query_for_username = "SELECT userid,useremail FROM `users` WHERE userno='$post_user_id'";
                $result_for_username = mysqli_query($con, $query_for_username);
                $row_for_username = mysqli_fetch_assoc($result_for_username);

                $got_ant_post = false; ?>
                <div class="media">
                    <img src="img/defaultuser.png" style="width:40px" class="mr-3" alt="...">
                    <div class="media-body">
                        <p class="font-weight-bold my-0"><?php echo $row_for_username['userid'] ?> at <?php echo $comment_time ?></p>
                        <?php echo $fetched_rows['comment_content'] ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    <?php } ?>



    <?php include 'includes/_footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>