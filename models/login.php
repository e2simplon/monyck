<?php

function checkLogin($bdd, $email, $password)
{
    $result = $bdd->query("SELECT email,password 
    FROM users 
    WHERE email='$email'");
    $line = $result->fetch_assoc();
    $savedPass =$line['password'];
    if (password_verify("$password", $savedPass)) {
        return true;
    } else {
        return false;
    }
}

function getRoles($bdd, $email)
{
    $result = $bdd->query("SELECT ut.type
    FROM users u, user_types ut, user_types_users utu
    WHERE u.email = '$email'
    AND u.id = utu.id_user
    AND utu.id_user_type = ut.id");
    $array = array();
    foreach ($result as $rs) {
        array_push($array, $rs['type']);
    }
    return $array;
}

//Get ID
function getUserId($bdd, $email)
{
    $result = $bdd->query("SELECT id FROM users WHERE email='$email'");
    $line = $result->fetch_assoc();
    return $line['id'];
}

//Get Login
function getUserLogin($bdd, $email)
{
    $result = $bdd->query("SELECT login FROM users WHERE email='$email'");
    $line = $result->fetch_assoc();
    return $line['login'];
}