<?php
session_start();
unset($_SESSION['id0']);
unset($_SESSION['idcard0']);
unset($_SESSION['role0']);
unset($_SESSION['id1']);
unset($_SESSION['idcard1']);
unset($_SESSION['role1']);
unset($_SESSION['id']);
unset($_SESSION['pswd']);
unset($_SESSION['role']);
header("location: student-home.php");
?>