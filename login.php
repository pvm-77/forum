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

    <title>loginmodule</title>
</head>

<body>
<?php include 'includes/_header.php'; ?>
    <div class="container shadow p-3 mb-5  rounded" style="width: 400px;">
        <h1>login here</h1>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo '<div class="alert alert-danger" role="alert">
                 dont left any field blank!
               </div>';
            }

            if ($_GET["error"] == "incorrectlogininformation") {
                echo '<div class="alert alert-danger" role="alert">
                 incorrect login information!
               </div>';
            }
           
        }

        ?>



        <form action="includes/login.inc.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="userid" placeholder="email/userid">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="loginpassword" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">login</button>

            <hr />
            <a class="btn btn-success" href="reset-password.php" style="text-decoration: none;">forget password?</a>
        </form>
    </div>
    <?php include 'includes/_footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>