<?php
session_start();
include "dblink.php";
$pw=mysqli_real_escape_string($conn,$_POST['pw']);
$pw2=mysqli_real_escape_string($conn,$_POST['pw2']);
$id=$_SESSION['id'];
    if($pw==$pw2){
        $result=$conn->query("UPDATE studentinfo  SET Password = '$pw' WHERE StudentID = $id ;");
        $conn->close();
        header("Location:student-new-logout.php");
    }
    else{
        $conn->close();
        header("Location:student-changepw.php"); 
    }

?>