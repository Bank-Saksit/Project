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
        if(isset($_SESSION['id']) && isset($_SESSION['idcard']) &&  $_SESSION['role'] == 'staff') {
            header("location: staff-changepw.php");
            exit('</body></html>');
        }
        ?> 
        <div id="left">
            <br><a href="staff-home.php" id="back">< back</a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ลงทะเบียนสำหรับบุคลากรใหม่</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form action="staff-new-login-link.php" method="post" >
                        <h1>ระบบสารสนเทศ<br>สำหรับบุคคลากรของมหาวิทยาลัย</h1>
                        <input type="text" name="id" placeholder="รหัสประจำตัวบุคลากร"><br>
                        <input type="password" name="pswd" placeholder="รหัสบัตรประจำตัวประชาชน"><br>
                        <div id  = "sub">
                            <input type="submit" value="เข้าสู่ระบบ">
                        </div>
                    </form>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>