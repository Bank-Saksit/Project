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
        $id =(int)$_POST['id'];
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT Password
                                FROM staffinfo
                                WHERE StaffId = $id AND IDCardNumber ='$pswd';");

        if($_POST['id']==NULL || $pswd==NULL){
            $conn->close();
            echo     "<script>
                        swal({
                            type: 'error',
                            title: 'ล้มเหลว',
                            text: 'กรุณากรอกข้อมูลให้ครบทุกช่อง',
                            confirmButtonText: '<a href=\"staff-forgetpassword.php\" style=\"text-decoration: none\"><font color=\"white\">กรอกข้อมูลใหม่</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='staff-forgetpassword.php'; 
                        })
                    </script>";
            
                    // '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                    //         window.location="staff-new-login.php"; 
                    // </script>';
        }
        else if($result->num_rows == 1){
            
            $rs = $result->fetch_array(MYSQLI_ASSOC);
            if($rs['Password']!=NULL){
                $conn->close();
                $_SESSION['id3'] = $id;
                $_SESSION['idcard3'] = $pswd;
                $_SESSION['role3'] = 'staff';
                header("Location:staff-newpw.php");
            }
            else{
                $conn->close();
                echo    "<script> 
                            swal({
                                type: 'error',
                                title: 'ล้มเหลว',
                                text: 'คุณยังไม่มีรหัสผ่าน กรุณาลงทะเบียนบุคลากรใหม่',
                                confirmButtonText: '<a href=\"staff-new-login.php\" style=\"text-decoration: none\"><font color=\"white\">ตกลง</font></a>',
                            });
                            $(document).on('click',function(){
                                window.location='staff-new-login.php'; 
                            })
                        </script>";
            }
        }
        else{
            $conn->close();
            echo    "<script>
                        swal({
                            type: 'error',
                            title: 'ล้มเหลว',
                            text: 'รหัสประจำตัวบุคลากรและรหัสบัตรประจำตัวประชาชนไม่ตรงกัน',
                            confirmButtonText: '<a href=\"staff-forgetpassword.php\" style=\"text-decoration: none\"><font color=\"white\">กรอกข้อมูลใหม่</font></a>',
                        });
                        $(document).on('click',function(){
                            window.location='staff-forgetpassword.php'; 
                        })
                    </script>";
            
                // '<script> alert("รหัสประจำตัวบุคลากรและรหัสบัตรประจำตัวประชาชนไม่ตรงกัน");
                //     window.location="staff-new-login.php"; 
                // </script>';
        }
        
    ?>
</body>
</html>
