<html>
    <?php
        session_start();
        include "dblink.php";
        $id =mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT Password
                                FROM studentinfo
                                WHERE StudentID = $id AND IDCardNumber =$pswd;");
            if($id==NULL || $pswd==NULL){
                $conn->close();
                echo    '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                                window.location="student-new-login.php"; 
                        </script>';
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
                    echo    '<script> alert("คุณมีรหัสผ่านแล้ว");
                                window.location="student-home.php"; 
                            </script>';
                }
            }
            else{
                $conn->close();   
                echo    '<script> alert("รหัสนักศึกษาและรหัสบัตรประจำตัวประชาชนไม่ตรงกัน");
                                window.location="student-new-login.php"; 
                        </script>';
            }
    ?>
</html>
