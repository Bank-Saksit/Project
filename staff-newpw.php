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
    <title>แก้ไขรหัสผ่าน</title>
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
        if(!isset($_SESSION['id'])||!isset($_SESSION['idcard'])||$_SESSION['role']!='staff'){
            header("location:staff-forgetpassword.php");
        }
    ?>
    <div id="left">
        <br><a href="staff-logout.php" id="back"></a>
        <!-- <a href="staff-new-logout.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a> -->
    </div>
    <div id="main">
        <div id="header">
             <h1>สร้างรหัสผ่านใหม่</h1>
        </div>
        <div id="content">
            <div id="c-left">
                <form method="post" action ="staff-update-newpw.php" >
                        <h1>สร้างรหัสผ่านใหม่</h1>
                        <div id = "c-in">
                            <input type="password" name="pw" placeholder="รหัสผ่านใหม่"><br>
                            <input type="password" name="pw2" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                            <div id = "sub">
                                <input type="submit" value="ยืนยัน">
                                <input type="button" id="cancle" onclick ="window.location.href='staff-logout.php'" value = "ยกเลิก">
                            </div>
                        </div>
                    </form>
                </div>
            <div id="c-right">
                
                
            </div>
        </div>
         <?php include "recruit-footer.php"; ?>
    </div>    
    
</body>
</html>
