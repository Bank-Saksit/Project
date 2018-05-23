<html>
    <?php
        session_start();
        include "dblink.php";
        $id =mysqli_real_escape_string($conn,$_POST['id']);
        $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
        $result = $conn->query("SELECT *
                                FROM studentinfo
                                WHERE StudentID = '$id' AND Password ='$pswd';");
            if($id==NULL || $pswd==NULL){
                $conn->close();
                echo    '<script> alert("กรุณากรอกข้อมูลให้ครบทุกช่อง");
                                window.location="student-home.php"; 
                        </script>';
            }
            else if($result->num_rows == 1){
                $conn->close();
                $_SESSION['id'] = $id;
                $_SESSION['pswd'] = $pswd;
                header("Location:student-afterlogin-test.php?");   
            }
            else{
                $conn->close();   
                echo    '<script> alert("รหัสนักศึกษาและรหัสผ่านไม่ตรงกัน");
                                window.location="student-home.php"; 
                        </script>';
            }
    ?>
</html>
