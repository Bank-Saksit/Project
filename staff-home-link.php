<html>
<head>
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
        $id =(int)$_POST['id'];
        $id2 = mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $enpw = md5(md5(md5(base64_encode($pswd))));
        $result = $conn->query("SELECT *
                                FROM staffinfo
                                WHERE StaffID = $id AND Password ='$enpw';");
            if($id2==NULL || $pswd==NULL){
                $conn->close();
                echo    "<script>
                            swal({
                                type: 'error',
                                title: 'เข้าสู่ระบบล้มเหลว',
                                text: 'กรุณากรอกข้อมูลให้ครบทุกช่อง',
                                confirmButtonText: '<a href=\"staff-home.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                            });
                            $(document).on('click',function(){
                                window.location='staff-home.php'; 
                            })
                        </script>";
                
                        // '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                        //         window.location="staff-home.php"; 
                        // </script>';
            }
            else if($result->num_rows == 1){
                $rs= $result->fetch_array(MYSQLI_ASSOC);
                $conn->close();
                
                
                if($rs['Role']=='Teacher'){
                    $_SESSION['id4'] = $id;
                    $_SESSION['pswd4'] = $enpw;
                    $_SESSION['role4'] = $rs['Role'];
                   header("Location:staff-teacher-main.php");
                }
                elseif($rs['Role']=='Admin'){
                    $_SESSION['id5'] = $id;
                    $_SESSION['pswd5'] = $enpw;
                    $_SESSION['role5'] = $rs['Role'];
                    header("Location:staff-admin-main.php");
                 }
                   
            }
            else{
                $conn->close();   
                echo   "<script>
                            swal({
                                type: 'error',
                                title: 'เข้าสู่ระบบล้มเหลว',
                                text: 'รหัสประจำตัวบุคลากรและรหัสผ่านไม่ตรงกัน',
                                confirmButtonText: '<a href=\"staff-home.php\" style=\"text-decoration: none\"><font color=\"white\">ลองใหม่อีกครั้ง</font></a>',
                            });
                            $(document).on('click',function(){
                                window.location='staff-home.php'; 
                            })
                        </script>";
                
                        // '<script> alert("รหัสประจำตัวบุคลากรและรหัสผ่านไม่ตรงกัน");
                        //         window.location="staff-home.php"; 
                        // </script>';
            }
    ?>
</body>
</html>
