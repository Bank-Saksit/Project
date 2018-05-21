<?php
session_start();
include "dblink.php";
$id =mysqli_real_escape_string($conn,$_POST['id']);
$pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
$result = $conn->query("SELECT *
                        FROM studentinfo
                        WHERE StudentID = $id AND IDCardNumber =$pswd;");

if($result->num_rows == 0){
    header("Location:student-new-login.php");    
}
else{
    $_SESSION['id'] = $id;
    $_SESSION['pswd'] = $pswd;
    header("Location:student-changepw.php?");
}
$conn->close();
?>