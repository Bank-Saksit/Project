<?php
session_start();
unset($_SESSION['id3']);
unset($_SESSION['idcard3']);
unset($_SESSION['role3']);
unset($_SESSION['id2']);
unset($_SESSION['idcard2']);
unset($_SESSION['role2']);
unset($_SESSION['id4']);
unset($_SESSION['pswd4']);
unset($_SESSION['role4']);
unset($_SESSION['id5']);
unset($_SESSION['pswd5']);
unset($_SESSION['role5']);
header("location: staff-home.php");
?>