<?php
session_start();
include "dblink.php";
$id =(int)$_POST['id'];
$pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
$result = $conn->query("SELECT StaffID
                        FROM staffinfo
                        WHERE StaffId = $id AND IDCardNumber =$pswd;");

if($result->num_rows == 0){
    header("Location:staff-new-login.php");    
}
else{
    $_SESSION['id'] = $id;
    $_SESSION['pswd'] = $pswd;
    header("Location:staff-changepw.php?");
}
$conn->close();
?>