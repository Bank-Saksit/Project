<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>สำหรับบุคลากร</title>
        <style>
            @import "global1.css";
            @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/065.jpg);
            }
            .swal2-popup {
                font-size: 2rem;
            }
        </style>    

    </head>
    <body>
        <?php
            if(isset($_SESSION['id4']) && isset($_SESSION['pswd4']) && $_SESSION['role4'] == 'Teacher') {
                header("location: staff-teacher-main.php");
                exit('</body></html>');
            }
            else if(isset($_SESSION['id5']) && isset($_SESSION['pswd5']) && $_SESSION['role5'] == 'Admin') {
                header("location: staff-admin-main.php");
                exit('</body></html>');
            }
        ?> 
        <div id="left">
            <a href="home.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ยินดีต้อนรับ</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" action="staff-home-link.php">
                        <h1>ระบบสารสนเทศ</h1>
                        <h1>สำหรับบุคลากรของมหาวิทยาลัย</h1>
                        <div id = "c-in">
                            <input type="text" name="id" placeholder="รหัสประจำตัวบุคลากร"><br>
                            <input type="password" name="pswd" placeholder="รหัสผ่าน"><br>
                            <div id = "sub">
                                <input type="submit" value="เข้าสู่ระบบ">
                                <a href = "staff-forgetpassword.php">ลืมรหัสผ่าน?</a>
                            </div>
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