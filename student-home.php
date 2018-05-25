<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <div id = "left">
            <a href="home.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a>
        </div>
        <div id="main" >
            <div id="header">
                <h1>ยินดีต้อนรับ</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" action="student-home-link.php">
                        <h1 class = "header">ระบบสารสนเทศ</h1>
                        <h1 class = "header">เพื่อการบริหารการศึกษา</h1>
                        <div id = "c-in">
                            <input type="text" name="id" placeholder="รหัสนักศึกษา"><br>
                            <input type="password" name="pswd" placeholder="รหัสผ่าน"><br>
                            <div id = "sub">
                                <input type="submit" value="เข้าสู่ระบบ">
                                <a href = "student-forgetpassword.php">ลืมรหัสผ่าน?</a>
                            </div>
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