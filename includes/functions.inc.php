<?php
include '_dbconnect.php';

function emptyContactName($fullname)
{
    if (empty($fullname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function emptyContactEmail($email)
{
    if (empty($email)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyContactMessage($message)
{
    if (empty($message)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}





function emptyInputSignup($username, $userid, $useremail, $password, $confirmpassword)
{


    if (empty($username) || empty($userid) || empty($useremail) || empty($password) || empty($confirmpassword)) {

        $myresult = true;
    } else {
        $myresult = false;
    }
    return $myresult;
}






function invalidUserid($username)
{

    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        $myresult = true;
    } else {
        $myresult = false;
    }

    return $myresult;
}



function invalidEmail($useremail)
{

    if (!filter_var($useremail,FILTER_DEFAULT)) {
        $myresult = true;
    } else {
        $myresult = false;
    }

    return $myresult;
}



function passwordMatch($password, $confirmpassword)
{

    if ($password !== $confirmpassword) {
        $myresult = true;
    } else {
        $myresult = false;
    }

    return $myresult;
}



function useridExists($con, $userid, $useremail)
{

    $sql = "SELECT * FROM users WHERE userid = ? OR useremail = ?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    } 
        mysqli_stmt_bind_param($stmt, "ss", $userid, $useremail);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    
}





function createUser($con, $username, $useremail, $userid, $userpassword)
{

    $sql = "INSERT INTO users (username,userid,useremail,userpassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }
    $create_hashed_password = password_hash($userpassword, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $userid, $useremail, $create_hashed_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // header("Location: ../signup.php?error=none");
    // exit();
}






function emptyInputLogin($userid, $password)
{
    if (empty($userid) || empty($password) ) {

        $myresult = true;
    } else {
        $myresult = false;
    }
    return $myresult;
}

function loginUser($con,$userid,$password){

    $useridExists=useridExists($con, $userid, $userid);
    if($useridExists === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }


    $hashed_password= $useridExists["userpassword"];
    $check_password=password_verify($password,$hashed_password);
    if($check_password === false){
        header("Location: ../login.php?error=incorrectlogininformation");
        exit();
        

    }
    else if($check_password === true){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION["username"]=$useridExists["username"];
        $_SESSION["userid"]=$useridExists["userid"];
        $_SESSION["userno"]=$useridExists["userno"];
        header("Location: ../");
        exit();
        
    }


}