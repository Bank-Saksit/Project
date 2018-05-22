<?php
session_start();

if(!isset($_COOKIE['id']) && !isset($_COOKIE['pswd'])) {
    header("location: recruit-login.php");
}
?>