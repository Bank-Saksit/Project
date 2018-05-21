<?php
session_start();
session_destroy();
unset($_COOKIE['id']);
unset($_COOKIE['pswd']);
setcookie('id', null, -1);
setcookie('pswd', null, -1);
header("location: recruit-login.php");
?>