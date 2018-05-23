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
            input[type=text] {
                background-color:rgba(0,0,0,0.8);
                margin-top: 0px;
                padding-left: 30px;
                width: 310px;
                height:30px;
                text-align: left;
                color: white;
            }
            ::placeholder {
                color: white;
            }
            input[type=password] {
                background-color:rgba(0,0,0,0.8);
                margin-top: 15px;
                padding-left: 30px;
                width: 310px;
                height: 30px;
                text-align: left;
                color: white;
            }
            input[type=submit] {
                width: 60px;
                background: white;
            }       
            #sub{
                width: 310px;
                padding-left:25px;
                margin-top:20px;
                text-align: left;
            }
            div#text >a {
                text-decoration: underline;
            }
            #text{
                padding-left : 30px;
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