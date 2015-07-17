<?php

session_start();

include_once './authdb.php';

$login =  filter_input(INPUT_POST,'login');
$password1 =  filter_input(INPUT_POST,'password1');
$password2 =  filter_input(INPUT_POST,'password2');
$email =  filter_input(INPUT_POST,'email');
$first_name =  filter_input(INPUT_POST,'first_name');
$last_name  =  filter_input(INPUT_POST,'last_name');

$captcha = filter_input(INPUT_POST, 'captcha');
$secret = $_SESSION['secret'];

unset($_SESSION['message']);

if ($secret<>$captcha){
    $_SESSION['error']='Неверно указано число';    
}

if ($password1<>$password2){
    $_SESSION['error']='Пароль не совпадает';
}

if (userExists($login, $email)){
    $_SESSION['error']='Пользователь с таким логином или паролем уже существует';
}

if ((empty($_SESSION['error'])) &&
    (createUser($login, $password1, $email, $first_name, $last_name))){
    $_SESSION['message']='Пользователь успешно создан ';
}


header('Location: ../');
