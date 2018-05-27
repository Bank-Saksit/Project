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
        $id =mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $enpw = md5(md5(md5(base64_encode($pswd))));
        $result = $conn->query("SELECT *
                                FROM studentinfo
                                WHERE StudentID = '$id' AND Password ='$enpw';");
        if($id==NULL || $pswd==NULL){
            $conn->close();
            echo    "<script>
                        swal({
                            type: 'error',
                            title: 'เข้าสู่ระบบล้มเหลว',
                            text: 'กรุณากรอกข้อมูลให้ครบทุกช่อง',
                            confirmButtonText: '<a href=\"student-home.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='student-home.php'; 
                        })
                    </script>";
        }
        else if($result->num_rows == 1){
            $conn->close();
            $_SESSION['id'] = $id;
            $_SESSION['pswd'] = $enpw;
            $_SESSION['role'] = 'student';
            header("Location:student-main.php");   
        }
        else{
            $conn->close();   
            echo    "<script> 
                        swal({
                            type: 'error',
                            title: 'เข้าสู่ระบบล้มเหลว',
                            text: 'รหัสนักศึกษาหรือรหัสผ่านไม่ถูกต้อง',
                            confirmButtonText: '<a href=\"student-home.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='student-home.php'; 
                        })
                    </script>";
        }
    ?>
</body>
</html>
