var root = 'auth'; // корень аутентификации

function validate_form(form){
    var el;
    var elName;
    var valid = false;
    for (var i = 0; i < form.elements.length; i++){
        el=form.elements[i];
        elName = el.nodeName.toLowerCase();
        if (elName==='input' && el.value===''){
            alert('Надо заполнить поле '+elName+' '+el.name);
            return valid;
        } 
    }
    valid=true;
    return valid;
}

function loginDialog(){
    var dialog = document.createElement('div');
    dialog.innerHTML=
        "<b>Вход</b><br>\n\
        <form method='post' action='"+root+"/login.php' onsubmit='return validate_form(this);'>\n\
        <input type='text' name='login' palceholader='логин'>\n\
        <input type='password' name='password' palceholader='пароль'>\n\
        <input type='submit' value='Войти'><br>\n\
        <a href='#' onclick='f2();'>Напомнить пароль</a><br>\n\
        <a href='#' onclick='f1();'>Регистрация</a>\n\
        </form>";
    return dialog;
}

function changePassword(){
    var dialog = document.createElement('div');
    dialog.innerHTML=
         "<b>Изменение пароля</b><br>Введите новый пароль<br>\n\
         <form method='post' action='"+root+"/change_psw.php' onsubmit='return validate_form(this);'>\n\
         <input type='password' name='password1' placeholder='новый пароль'>\n\
         <input type='password' name='password2' placeholder='новый пароль ещё раз'><br>\n\
         <input type='submit' value='сменить пароль'></form>";
    return dialog;
}

function registerDialog(){
    var dialog = document.createElement('div');
    dialog.innerHTML=
        "<b>Регистрация</b><br>\n\
        <form name='refisterForm' method='post' action='"+root+"/register.php' \n\
                               onsubmit='return validate_form(this);'><table>\n\
        <tr><td>Логин</td><td><input type='text' name='login' placeholder='логин'></td></tr>\n\
        <tr><td>Пароль</td><td><input type='password' name='password1' placeholder='пароль'></td></tr>\n\
        <tr><td>Пароль(ещё раз)</td><td><input type='password' name='password2' placeholder='пароль'></td></tr>\n\
        <tr><td>Имя</td><td><input type='text' name='first_name'></td></tr>\n\
        <tr><td>Фамилия</td><td><input type='text' name='last_name'></td></tr>\n\
        <tr><td>e-mail</td><td><input type='email' name='email'></td></tr>\n\
        <tr><td colspan=2><img src='auth/captcha.php' alt='captcha'></td></tr>\n\
        <tr><td>Число</td><td><input type='text' name='captcha'></td></tr>\n\
        </table><input type='submit' value='регистрация'></form>";
    return dialog;
}


function messageDialog(){
    var dialog = document.createElement('div');
    dialog.innerHTML=
        "<b>Сообщение</b><br>\n\
        <form method='post' action='"+root+"/message.php' onsubmit='return validate_form(this);'>\n\
        <table>\n\
        <tr><td>Тема</td><td><input type='text' name='message'></td></tr>\n\
        <tr><td colspan='2'><textarea rows='10' cols='50'></textarea></td></tr>\n\
        <tr><td>&nbsp;</td><td><img src='auth/captcha.php' alt='captcha'></td></tr>\n\
        <tr><td>Число</td><td><input type='text' name='captcha'></td></tr>\n\
        </table>\n\
        <input type='submit' value='отправить'>\n\
        </form>";
    return dialog;
}

function restoreDialog(){
    var dialog = document.createElement('div');
    dialog.innerHTML=
        "<b>Восстановление пароля<b><br>\n\
        <form method='post' action='"+root+"/restore.php' onsubmit='return validate_form(this);'>\n\
        Введите логин или адрес email <input type='text' name='emailorlogin'><br>\n\
        <input type='submit' value='запросить'>\n\
        </form>";
    return dialog;
}

function showDialog(dialog_name){
    var dialog;
    switch(dialog_name){
        case 'login':
            dialog =loginDialog();
            break;
        case 'register':
            dialog = registerDialog();
            break;
        case 'message':
            dialog= messageDialog();
            break;
        case 'restore':
            dialog = restoreDialog();
            break;
        case 'change_psw':
            dialog= changePassword();
            break;
    }
    dialog.style.background='#fff';
    dialog.id=dialog_name;
    dialog.style.position='absolute';
    dialog.style.padding='10px';
    dialog.style.border='1px solid black';
    var btnClose = document.createElement('div');
    btnClose.innerHTML="<a href='#' onclick='closeDialog(\""+dialog_name+"\");'>Закрыть</a>";

    btnClose.style.position='absolute';
    btnClose.style.right=0;
    btnClose.style.top=0;
    dialog.appendChild(btnClose);


    var fade = fadeOver();
    document.body.appendChild(fade);

    document.body.appendChild(dialog);

    var w = document.documentElement.clientWidth;
    var h = document.documentElement.clientHeight;
    dialog.style.left= Math.floor((w-dialog.clientWidth)/2)+'px';
    dialog.style.top=Math.floor((h-dialog.clientHeight)/2)+'px';

}

function f1(){
    closeDialog('login');
    showDialog('register');
}

function f2(){
    closeDialog('login');
    showDialog('restore');
}

function closeDialog(dialog_name){
    var fade = document.getElementById('fade_over');
    document.body.removeChild(fade);
    var dialog = document.getElementById(dialog_name);
    document.body.removeChild(dialog);
}

function fadeOver(){
    var fade = document.createElement('div');
    fade.id='fade_over';
    fade.style.position='fixed';
    fade.style.left='0';
    fade.style.top='0';
    fade.style.width='100%';
    fade.style.height='100%';
    fade.style.background='#555';
    fade.style.opacity='0.5';
    return fade;
}

function logout(){
    alert('logout');
}


