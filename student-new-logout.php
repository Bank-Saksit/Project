<?php
session_start();
unset($_SESSION['id0']);
unset($_SESSION['idcard0']);
unset($_SESSION['role0']);
header("location: student-new-login.php");
?>