<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 20.01.15
 * Time: 12:05
 */
?>
<form action="/ajax/login" method="POST">
    Login: <input type="text" name="login"><br>
    Pass: <input type="text" name="pass"><br>
    <input type="submit"><br>
    <span><?=$this->login_error?></span>
</form>

<br>
<a href="/login/registration">Регистрация</a>