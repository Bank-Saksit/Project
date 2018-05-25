<html>
้<head>
<link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<link href ="js/sweetalert2.all.js" rel="stylesheet">
    <script src="js/sweetalert21.js"></script>
    <style>
        @import "global1.css";
    </style>
</head>
<body>
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
    echo    "<script>
                swal({
                    type: 'error',
                    title: 'เข้าสู่ระบบล้มเหลว',
                    text: 'รหัสนักศึกษาหรือรหัสผ่านไม่ถูกต้อง',
                    confirmButtonText: '<a href=\"recruit-login.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                });
                $(document).on('click',function(){
                    window.location='recruit-login.php'; 
                })
                
                // alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
                // window.location='recruit-login.php'; 
            </script>";
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
    echo    "<script> 
                swal({
                    type: 'error',
                    title: 'เข้าสู่ระบบล้มเหลว',
                    text: 'รหัสประจำตัวผู้สมัครหรือรหัสบัตรประจำตัวประชาชนไม่ถูกต้อง',
                    confirmButtonText: '<a href=\"recruit-login.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                });
                $(document).on('click',function(){
                    window.location='recruit-login.php'; 
                })

                // alert('รหัสประจำตัวผู้สมัครหรือรหัสบัตรประจำตัวประชาชนไม่ถูกต้อง');
                // window.location='recruit-login.php'; 
            </script>";
}
?>
</body>
</html>