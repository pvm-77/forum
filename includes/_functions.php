<?php


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


function email_validation($email)
{
    return (!preg_match(
        "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",
        $email
    ))
        ? FALSE : TRUE;
}
