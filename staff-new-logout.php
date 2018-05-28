<?php
session_start();
unset($_SESSION['id2']);
unset($_SESSION['idcard2']);
unset($_SESSION['role2']);
header("location: staff-new-login.php");
?>