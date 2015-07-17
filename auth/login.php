<?php

    include_once './authdb.php';
    session_start();
    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');
    $err = getUserName($login, $password);
    if (!empty($err)){
        $_SESSION['message']=$err;
    }
    header('Location: ../');        
