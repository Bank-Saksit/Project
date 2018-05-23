<<!DOCTYPE html>
<html>
    <?php
    session_start();
    include "dblink.php";
    $pw=mysqli_real_escape_string($conn,$_POST['pw']);
    $pw2=mysqli_real_escape_string($conn,$_POST['pw2']);
    $id=$_SESSION['id'];
        if($pw==NULL || $pw2 ==NULL){
            echo    '<script> alert("กรุณากรอกรหัสผ่านใหม่ให้ครบ2ช่อง");
                        window.location="student-changepw.php"; 
                    </script>';
        }
        else if($pw==$pw2){
            $result=$conn->query("UPDATE studentinfo  SET Password = '$pw' WHERE StudentID = $id ;");
            $conn->close();
            session_destroy();
            echo    '<script> alert("อัพเดตรหัสผ่านใหม่เรียบร้อยแล้ว");
                        window.location="student-home.php"; 
                    </script>';
        }
        else{
            $conn->close();
            echo    '<script> alert("รหัสผ่านไม่ตรงกัน");
                        window.location="student-changepw.php"; 
                    </script>';
        }
    ?>
</html>
