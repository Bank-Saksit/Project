<html>
    <?php
    session_start();
    include "dblink.php";
    $pw=mysqli_real_escape_string($conn,$_POST['pw']);
    $pw2=mysqli_real_escape_string($conn,$_POST['pw2']);
    $id=$_SESSION['id'];
        if($pw==NULL || $pw2 ==NULL){
            echo    '<script> alert("กรุณากรอกรหัสผ่านใหม่ให้ครบ2ช่อง");
                        window.location="staff-changepw.php"; 
                    </script>';
        }
        else if($pw==$pw2){
            $conn->query("UPDATE staffinfo  SET Password = '$pw' WHERE StaffID = $id ;");
            $conn->close();
            echo    '<script> alert("อัพเดตรหัสผ่านใหม่เรียบร้อยแล้ว");
                        window.location="staff-new-logout.php"; 
                    </script>';
        }
        else{
            $conn->close();
            echo    '<script> alert("รหัสผ่านไม่ตรงกัน");
                        window.location="staff-changepw.php"; 
                    </script>';
        }
    ?>
</html>

