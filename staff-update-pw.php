<?php
session_start();
include "dblink.php";
$pw=mysqli_real_escape_string($conn,$_POST['pw']);
$pw2=mysqli_real_escape_string($conn,$_POST['pw2']);
$id=$_SESSION['id'];
    if($pw==$pw2){
        $conn->query("UPDATE staffinfo  SET Password = '$pw' WHERE StaffID = $id ;");
        $conn->close();
        header("Location:staff-new-logout.php");
    }
    else{
        $conn->close();
        header("Location:staff-changepw.php"); 
    }

?>