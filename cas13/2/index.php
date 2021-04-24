<?php

    require 'users.php'; //include

    isset($_REQUEST['email']) ? $email = $_REQUEST['email'] : $email = "";
    isset($_REQUEST['password']) ? $password = $_REQUEST['password'] : $password = "";

    $logged_in = false;
    foreach($users as $user){
        if($user['username'] == $email && $user['password'] == $password){
            $logged_in = true;
            break;
        }
    }

    if($logged_in){
        header("location: home.html?msg=welcome");
        // echo "Dobrodosli";
    }else{
        header("location: index.html?msg=error");
        // echo "Nije pronadjena kombinacija username/password....";
    }

?>