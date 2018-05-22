<html>
    <?php
        session_start();
        include "dblink.php";
        $id =mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT Password
                                FROM studentinfo
                                WHERE StudentID = $id AND IDCardNumber =$pswd;");

            if($result->num_rows == 1){
                $rs = $result->fetch_array(MYSQLI_ASSOC);
                if($rs['Password']==NULL){
                    $_SESSION['id'] = $id;
                    $_SESSION['pswd'] = $pswd;
                    header("Location:student-changepw.php?");   
                }
                else{
                    echo    '<script> alert("คุณมีรหัสผ่านแล้ว");
                                window.location="student-home.php"; 
                            </script>';
                }
            }
            else{   
                echo    '<script> alert("รหัสนักศึกษาและรหัสบัตรประจำตัวประชาชนไม่ตรงกัน");
                                window.location="student-new-login.php"; 
                        </script>';
            }
        $conn->close();
    ?>
</html>
