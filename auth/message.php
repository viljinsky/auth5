<?php

session_start();
$captcha = filter_input(INPUT_POST,'captcha');
$secret = $_SESSION['secret'];

if ($captcha<>$secret){
    $_SESSION['error']='Число введено неверно';
} else{
    $_SESSION['message']='Сообщение успешно оправлено';
}

header('Location: ../');
