<?php
session_start();
include_once './authdb.php';

$result = changePassword();
if ($result==true){
    $_SESSION['message']='Пароль успешно изменён';
}
header('Location: ../');
