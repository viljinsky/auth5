<?php

session_start();

include_once './authdb.php';

$emailorlogin = filter_input(INPUT_POST, 'emailorlogin');

$query="select user_id,pwd,email from users where login='$emailorlogin' or email='$emailorlogin'";
$result=  mysql_query($query);
if (!result){
    $_SESSION['error']='Ошибка чтения';
}
if (mysql_num_rows($result)==1){
    
    $data = mysql_fetch_array($result);
    $user_id=$data['user_id'];
    $email=$data['email'];
    $pwd=$data['pwd'];
    
    $_SESSION['message']="На Ваш адрес $email отправлено письмо $user_id $pwd";
} else {
    $_SESSION['error']='Не найден пользователь или email';
}
header('Location: ../');
