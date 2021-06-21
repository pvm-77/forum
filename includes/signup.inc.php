<?php

if (isset($_POST['signup'])) {
    //extract form data
    $username = $_POST['username'];
    $userid = $_POST['userid'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    require_once '_dbconnect.php';
    require_once 'functions.inc.php';

    //validation for the sign up form 
    if (emptyInputSignup($username, $userid, $useremail, $userpassword, $confirmpassword) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if (invalidUserid($userid) !== false) {
        header("Location: ../signup.php?error=invaliduserid");
        exit();
    }
    

    if (useridExists($con, $userid, $useremail) !== false) {
        header("Location: ../signup.php?error=useridalreadytaken");
        exit();
    } 
    if (invalidEmail($useremail) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($userpassword, $confirmpassword) !== false) {
        header("Location: ../signup.php?error=passwordsdonotmatch");
        exit();
    }
    if (createUser($con, $username, $useremail, $userid, $userpassword) !== false) {
        header("Location: ../signup.php?error=none");
        exit();
    }

} 


else {
    header("Location: ../signup.php");
}
?>