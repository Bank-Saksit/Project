<?php
session_start();
include "dblink.php";

$sql = "SELECT * FROM recruitinfo WHERE RecruitID = " . $_POST['id'] . " AND IDCardNumber = " . $_POST['pswd'];
$result = mysqli_query($conn,$sql);
if($result){
    $num_rows = mysqli_num_rows($result);
}else {
    $num_rows = 0;
}
$id = $_POST['id'];
$pswd = $_POST['pswd'];
if($id==NULL || $pswd==NULL){
    echo    '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    window.location="recruit-login.php"; 
            </script>';
}
else if($num_rows == 1) {
    $id = $_POST['id'];
    $pswd = $_POST['pswd'];
    $expire = time() + 15 * 60;
    setcookie('id',$id,$expire);
    setcookie('pswd',$pswd,$expire);
    $_SESSION['id'] = $id;
    header("location: recruit-status.php");
}
else {
    echo    '<script> 
                alert("รหัสประจำตัวผู้สมัครหรือรหัสบัตรประจำตัวประชาชนไม่ถูกต้อง");
                window.location="recruit-login.php"; 
            </script>';
}
?>