<html>
้<head>
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
        $id =mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT Password
                                FROM studentinfo
                                WHERE StudentID = '$id' AND IDCardNumber ='$pswd';");
            if($id==NULL || $pswd==NULL){
                $conn->close();
                echo    "<script>
                            swal({
                                type: 'error',
                                title: 'เข้าสู่ระบบล้มเหลว',
                                text: 'กรุณากรอกข้อมูลให้ครบทุกช่อง',
                                confirmButtonText: '<a href=\"student-new-login.php\" style=\"text-decoration: none\"><font color=\"white\">กรอกข้อมูลใหม่</font></a>',
                            });
                            $(document).on('click',function(){
                                window.location='student-new-login.php'; 
                            })
                
                            // alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
                            // window.location='student-new-login.php'; 
                        </script>";
            }
            else if($result->num_rows == 1){
                $rs = $result->fetch_array(MYSQLI_ASSOC);
                if($rs['Password']==NULL){
                    $conn->close();
                    $_SESSION['id'] = $id;
                    $_SESSION['idcard'] = $pswd;
                    $_SESSION['role'] = 'student';
                    header("Location:student-changepw.php?");   
                }
                else{
                    $conn->close();
                    echo    "<script> 
                                swal({
                                    type: 'error',
                                    title: 'เข้าสู่ระบบล้มเหลว',
                                    text: 'คุณมีรหัสอยู่ผ่านแล้ว สามารถเข้าสู่ระบบได้เลย หากลืมรหัสผ่านกด ลืมรหัสผ่าน?',
                                    confirmButtonText: '<a href=\"student-home.php\" style=\"text-decoration: none\"><font color=\"white\">กรอกข้อมูลใหม่</font></a>',
                                });
                                $(document).on('click',function(){
                                    window.location='student-home.php'; 
                                })

                                // alert('คุณมีรหัสผ่านแล้ว');
                                // window.location='student-home.php'; 
                            </script>";
                }
            }
            else{
                $conn->close();   
                echo    "<script> 
                            swal({
                                type: 'error',
                                title: 'เข้าสู่ระบบล้มเหลว',
                                text: 'รหัสนักศึกษาหรือรหัสบัตรประจำตัวประชาชนไม่ตรงกัน',
                                confirmButtonText: '<a href=\"student-new-login.php\" style=\"text-decoration: none\"><font color=\"white\">กรอกข้อมูลใหม่</font></a>',
                            });
                            $(document).on('click',function(){
                                window.location='student-new-login.php'; 
                            })
                
                            // alert('รหัสนักศึกษาและรหัสบัตรประจำตัวประชาชนไม่ตรงกัน');
                            // window.location='student-new-login.php'; 
                        </script>";
            }
    ?>
</body>
</html>
