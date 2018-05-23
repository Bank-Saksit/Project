<html>
    <?php
        session_start();
        include "dblink.php";
        $id =(int)$_POST['id'];
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT Password
                                FROM staffinfo
                                WHERE StaffId = $id AND IDCardNumber =$pswd;");

        if($id==NULL || $pswd==NULL){
            $conn->close();
            echo    '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                            window.location="student-home.php"; 
                    </script>';
        }
        else if($result->num_rows == 1){
            $rs = $result->fetch_array(MYSQLI_ASSOC);
            if($rs['Password']==NULL){
                $_SESSION['id'] = $id;
                $_SESSION['idcard'] = $pswd;
                $_SESSION['role'] = 'staff';
                header("Location:staff-changepw.php?");
                  
            }
            else{
                echo    '<script> alert("คุณมีรหัสผ่านแล้ว");
                            window.location="staff-home.php"; 
                        </script>';
            }    
        }
        else{
            echo    '<script> alert("รหัสประจำตัวบุคลากรและรหัสบัตรประจำตัวประชาชนไม่ตรงกัน");
                                window.location="staff-new-login.php"; 
                        </script>';
        }
        $conn->close();
    ?>
</html>
