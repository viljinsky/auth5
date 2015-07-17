<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>auth5</title>
        <script type="text/javascript" src="auth/main.js"></script>
    </head>
    <body>
        <?php
            include './auth/menu.php';
        ?>
        
        <h1>Тест аутентификации пользователя (версия 5)</h1>
        
        <a href="./?user_id=189282&pwd=111">Изменить пароль</a>   
        
        <?php  include './auth/handler.php';?>
    </body>
</html>
