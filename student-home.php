<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับนักศึกษา</title>
        <style>
            @import "global1.css";
            @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/064.jpg);
            } 
        </style>    

    </head>
    <body>
        <?php
            if(isset($_SESSION['id']) && isset($_SESSION['pswd']) &&  $_SESSION['role'] == 'student') {
                header("location: student-main.php");
                exit('</body></html>');
            }
        ?> 
        <div id="main">
            <div id="header">
                <h1>ยินดีต้อนรับ</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" action="student-home-link.php">
                        <h1>ระบบสารสนเทศ<br>เพื่อการบริหารการศึกษา</h1>
                        <input type="text" name="id" placeholder="รหัสนักศึกษา"><br>
                        <input type="password" name="pswd" placeholder="รหัสผ่าน"><br>
                        <div id = "sub">
                            <input type="submit" value="เข้าสู่ระบบ">
                            <a href = "student-forgetpassword.php">ลืมรหัสผ่าน?</a>
                        </div>
                    </form>
                </div>
                <div id= "c-bot">
                    <div id = "text">
                        <br>สำหรับนักศึกษาใหม่ <a href= "student-new-login.php">ลงทะเบียนนักศึกษาใหม่</a>
                    </div>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>