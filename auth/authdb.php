<?php

    $db_host = 'localhost';
    $db_user ='root';
    $db_password='root';
    $database = 'test';
    $topsecret = 'Vh1MTV100';
    

    $db = mysql_connect($db_host,$db_user,$db_password);
    if (!$db){
        echo 'Ошибка подключения';
        exit();
    }
    $link=  mysql_select_db($database);
    if(!$link){
        echo 'Ошибка базы данных';
        exit();
    }
    
    
    function userExists($login,$email){
        $query="select user_id from users where login='$login' or email='$email'";
        $result=  mysql_query($query);
        return mysql_num_rows($result)>0;
    }

    
    function getUserName($login,$password){
        global $topsecret;
        $pwd = md5($password.$topsecret);
        $query = "select user_id,first_name,last_name from users where login='$login' and pwd='$pwd'";
        $result=  mysql_query($query);
        if (!$result or mysql_num_rows($result)<>1){
            return 'Пользователь не найден или неверный пароль';
        }
        $data = mysql_fetch_array($result);
        $first_name=$data['first_name'];
        $last_name=$data['last_name'];
        $user_id=$data['user_id'];
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_name']=$first_name.' '.$last_name;
    }

    function createUser($login,$password,$email,$first_name,$last_name){
        global $topsecret;
        $pwd = md5($password.$topsecret);
        $query="insert into users (last_name,first_name,login,pwd,email)
                values('$last_name','$first_name','$login','$pwd','$email')";
        $result = mysql_query($query);
        if (!$result){
            return false;
        }

        if ( mysql_affected_rows()==1){        
            $_SESSION['user_id'] =  mysql_insert_id();
            $_SESSION['user_name'] = $last_name.' '.$first_name;
            return true;
        }
    }
    
    function changePassword(){
        return true;
    }
    
    

