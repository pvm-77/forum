<?php
require_once '_dbconnect.php';
require_once 'functions.inc.php';

if (isset($_POST['submit'])) {

    //fetch data from login form
    $userid = $_POST['userid'];
    $password = $_POST['loginpassword'];
    // echo $userid;
    // echo $password;
    if (emptyInputLogin($userid, $password) !== false) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($con, $userid, $password);
} else {
    header("Location: ../login.php");
    exit();
}
