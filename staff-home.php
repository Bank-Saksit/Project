<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับบุคลากร</title>
        <style>
            @import "global1.css";
            @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/065.jpg);
            }
        </style>    

    </head>
    <body>
        <?php
            if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'Teacher') {
                header("location: staff-teacher-main.php");
                exit('</body></html>');
            }
            else if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'Admin') {
                header("location: staff-afterlogin-test.php");
                exit('</body></html>');
            }
        ?> 
        <div id="left">
            <br><a href="#" id="back"></a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ยินดีต้อนรับ</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" action="staff-home-link.php">
                        <h1>ระบบสารสนเทศ<br>สำหรับบุคลากรของมหาวิทยาลัย</h1>
                        <input type="text" name="id" placeholder="รหัสประจำตัวบุคลากร"><br>
                        <input type="password" name="pswd" placeholder="รหัสผ่าน"><br>
                        <div id = "sub">
                            <input type="submit" value="เข้าสู่ระบบ">
                            <a href = "staff-forgetpassword.php">ลืมรหัสผ่าน?</a>
                        </div>
                    </form>
                </div>
                    
                <div id= "c-bot">
                    <div id = "text">
                        <br>สำหรับบุคลากรใหม่ <a href= "staff-new-login.php">ลงทะเบียนบุคลากรใหม่</a>
                    </div>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>