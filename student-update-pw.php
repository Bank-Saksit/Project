<!DOCTYPE html>
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
    $pw=mysqli_real_escape_string($conn,$_POST['pw']);
    $pw2=mysqli_real_escape_string($conn,$_POST['pw2']);
    $id=$_SESSION['id'];
        if($pw==NULL || $pw2 ==NULL){
            echo    "<script>
                        swal({
                            type: 'error',
                            title: 'การตั้งรหัสผ่านล้มเหลว',
                            text: 'กรุณากรอกรหัสผ่านใหม่ให้ครบ2ช่อง',
                            confirmButtonText: '<a href=\"student-changepw.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='student-changepw.php'; 
                        })
                    </script>";
            
                    // '<script> alert("กรุณากรอกรหัสผ่านใหม่ให้ครบ2ช่อง");
                    //     window.location="student-changepw.php"; 
                    // </script>';
        }
        else if($pw==$pw2){
            $enpw = md5(md5(md5(base64_encode($pw))));
            $result=$conn->query("UPDATE studentinfo  SET Password = '$enpw' WHERE StudentID = $id ;");
            $conn->close();
            session_destroy();
            echo    "<script>
                        swal({
                           
                            title: 'การตั้งรหัสผ่านสำเร็จ',
                            text: 'สามารถเข้าใช้ระบบสารสนเทศเพื่อการบริหารการศึกษาได้แล้ว',
                            showCancelButton: false,
                            confirmButtonText: '<a href=\"student-home.php\" style=\"text-decoration: none\"><font color=\"white\">ตกลง</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='student-home.php'; 
                        })
                    </script>";
                    
                    // '<script> alert("อัพเดตรหัสผ่านใหม่เรียบร้อยแล้ว");
                    //     window.location="student-home.php"; 
                    // </script>';
        }
        else{
            $conn->close();
            echo    "<script>
                        swal({
                            type: 'error',
                            title: 'การตั้งรหัสผ่านล้มเหลว',
                            text: 'รหัสผ่านไม่ตรงกัน',
                            confirmButtonText: '<a href=\"student-changepw.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='student-changepw.php'; 
                        })
                    </script>";
            
                    // '<script> alert("รหัสผ่านไม่ตรงกัน");
                    //     window.location="student-changepw.php"; 
                    // </script>';
        }
    ?>
</body>
</html>
