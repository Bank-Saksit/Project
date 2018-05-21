<?php
session_start();
include "dblink.php";

$sql = "SELECT * FROM recruitinfo WHERE RecruitID = " . $_POST['id'] . " AND IDCardNumber = " . $_POST['pswd'];
$result = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($result);
if($num_rows == 1) {
    $id = $_POST['id'];
    $pswd = $_POST['pswd'];
    $expire = time() + 15 * 60;
    setcookie('id',$id,$expire);
    setcookie('pswd',$pswd,$expire);
    $_SESSION['id'] = $id;
    header("location: recruit-status.php");
    exit('</body></html>');
}
else {
    header("location: recruit-login.php");
}
?>