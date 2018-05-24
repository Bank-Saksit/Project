<html>
<head>
<link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<link href ="js/sweetalert2.all.js" rel="stylesheet">
	<script src="js/sweetalert21.js"></script>
</head>
<body>
    <?php
        session_start();
        include "dblink.php";
        $id =(int)$_POST['id'];
        $id2 = mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT *
                                FROM staffinfo
                                WHERE StaffID = $id AND Password ='$pswd';");
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
                $_SESSION['id'] = $id;
                $_SESSION['pswd'] = $pswd;
                $_SESSION['role'] = $rs['Role'];
                if($_SESSION['role']=='Teacher'){
                   header("Location:staff-teacher-main.php");
                }
                elseif($_SESSION['role']=='Admin'){
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
