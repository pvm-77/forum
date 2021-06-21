<?php

include '_functions.php';
if (isset($_POST['contact'])) {
    //echo 'it works';


    //extract here contact form data

    $fullname = $_POST['fullname'];
    $email= $_POST['email'];
    $message = $_POST['message'];

    //try to check form input values here 
    // echo"</br>";
    // echo$fullname;
    // echo"</br>";
    // echo$email;
    // echo "</br>";
    // echo$message;


    //validation on contact us form
    if (emptyContactName($fullname)) {
        header("Location: ../contact.php?error=emptyname");
        exit();
    } else if (emptyContactEmail($email)) {
        header("Location: ../contact.php?error=emptyEmail");
        exit();
    } else if (emptyContactMessage($message)) {
        header("Location: ../contact.php?error=emptyMessage");
        exit();
    } else if (!email_validation($email)) {
        header("Location: ../contact.php?error=invalidEmail");
        exit();
    } else {
        $to="sarfaraz.hussain771997@gmail.com";
        // $additional_headers = array('from' => $email);
        $additional_headers="From:".$email;
       if(mail($to, $message,$additional_headers) ){
        header("Location: ../contact.php?mysuccess=mailsendingpass");
        exit();

       }
       else{
           header("Location: ../contact.php?mysuccess=mailsendingfail");
           exit();

       }
        
    }



    //now write a script to handle contact form and send off data to compnay by email
    // $additional_headers=array('from'=>$email);
    // $to="sarfaraz.hussain771997@gmail.com";
    // mail($to,$message,$additional_headers);


} else {
    header("Location: ../contact.php?error=somethingwentwrong");
    exit();
}
