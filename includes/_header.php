<?php

include('includes/_dbconnect.php');
session_start();
?>


<nav class="navbar navbar-expand-lg navbar-dark  mynav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/myforum"> <img src="img/bloglogo.jpg" alt="logo" class="rounded-circle" style="width:40px;">CSblogger</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="/myforum/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">How to</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <!-- category pulled from database -->
                        <?php
                        $select_id_query = "SELECT category_id,category_name FROM `categories`";
                        $result = mysqli_query($con, $select_id_query);
                        while ($fetched_rows = mysqli_fetch_assoc($result)) { ?>

                            <li><a class="dropdown-item" href="threadlist.php?category_id=<?php echo $fetched_rows['category_id'] ?>"><?php echo $fetched_rows['category_name'] ?></a></li>

                        <?php
                        }
                        ?>



                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team.php">our team</a>
                </li>
            </ul>

            <?php
            // session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            ?>
                <form class="d-flex" method="GET" action="search.php">
                    <input class="form-control me-2 mx-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success mx-2" type="submit">Search</button>
                    <h2 class="text-light my-0 mx-3">Hi,<?php echo $_SESSION['userid'] ?></h2>
                    
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    
                        <a href="includes/_profile.php" class="btn btn-success mx-2"><i class="fa fa-user"></i> profile</a>
                        <a href="includes/_logout.php" class="btn btn-success mx-2"><i class="fa fa-user-plus"></i> leave</a>
                    </li>
                </ul>



            <?php
            } else {
            ?>
                <form action="search.php" class="d-flex" method="GET">
                    <input class="form-control me-2 mx-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success mx-2" type="submit">Search</button>
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn btn-success mx-2 " href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                        <a class="btn btn-warning " href="signup.php"><i class="fa fa-user-plus"></i> Signup</a>
                    </li>
                </ul>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
<div class="container-fluid">