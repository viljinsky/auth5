   <nav class="auth_menu">
        <?php 
        if (empty($_SESSION['user_id'])) { ?>
        <a href="#" onclick="showDialog('login');">Вход</a>
        <a href="#" onclick="showDialog('register');">Регистрация</a>
        <?php } else  {  echo 'Здвавствуйте '.$_SESSION['user_name'] ?>
        <a href="auth/logout.php">Выход</a>
        <?php } ?>
        <a href="#" onclick="showDialog('message');">Сообщение</a>
    </nav>
