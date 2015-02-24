<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 23.02.2015
 * Time: 19:40
 */
?>

<form action="/ajax/registration" method="POST">
    Login: <input type="text" name="login" required><br>
    Pass: <input type="text" name="pass" required><br>
    E-mail: <input type="text" name="email" required><br>
    Username: <input type="text" name="username" required><br>
    <input type="submit"><br>
    <span><?=$this->registration_error?></span>
</form>