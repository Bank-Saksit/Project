<?php
session_start();
session_destroy();
header("location: student-new-login.php");
?>