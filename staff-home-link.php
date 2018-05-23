<html>
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
                echo    '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                                window.location="staff-home.php"; 
                        </script>';
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
                   
            }
            else{
                $conn->close();   
                echo    '<script> alert("รหัสประจำตัวบุคลากรและรหัสผ่านไม่ตรงกัน");
                                window.location="staff-home.php"; 
                        </script>';
            }
    ?>
</html>
