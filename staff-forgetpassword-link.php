<html>
<?php
    include "dblink.php";
    $id=(int)$_GET['id'];
    $email=mysqli_real_escape_string($conn,$_GET['email']);
    $result = $conn->query("SELECT *
                            FROM staffinfo
                            WHERE StaffID=$id AND Email = '$email'");
        if($id==NULL || $email==NULL){
            echo    '<h1>"กรุณากรอกข้อมูลให้ครบถ้วน"</h1>';
        }
        else if($result->num_rows == 1){
            $rs = $result->fetch_array(MYSQLI_ASSOC);
            if($rs['Password']!=NULL){
                $pw="<h1>รหัสผ่านของคุณคือ : </h1><h2>".$rs['Password']."</h2>";
                $conn->close();
                echo $pw;
            }
            else{
                $conn->close();
                echo '<h1>"คุณยังไม่ได้ลงทะเบียนบุคคลากรใหม่"</h1><a href= "staff-new-login.php">ลงทะเบียนบุคคลากรใหม่</a>';
            }
        }
        else{
            $conn->close();
            echo    '<h1>"ไม่มีรหัสประจำตัวบุคคลากรนี้ในระบบ"</h1>';
        }
    ?>
</html>
