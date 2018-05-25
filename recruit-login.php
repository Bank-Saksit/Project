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
    <title>สำหรับนักเรียนที่ต้องการเข้าศึกษา</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"   
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous">
    </script>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 13%;
            position: relative;
            height: 100%;
        }
        #main {
            width: 72%;
            height: 100%;
            margin: auto;
            position: relative;
            top: 60px;
        }
        #content{
            margin-top: 2%;
        }
        #c-right,#c-left{
            width: 80%;
            height: 380px;  
        }
        #c-left {
            width: 59%;
            float: left;
            background: gray;
            position: relative;
        }
        #c-right {
            width: 40%;
            float: right;
            position: relative;
        }
        .cr{
            background-image: url(img/gallery/980x380/065.jpg);
        }
        #c-r-top {
            width: 100%;
            height: 200px;
            top: 0;
            text-align: center;
            position: absolute;
            background-color:#ff9999;;
            color: white;
        }
        #c-r-bottom {
            width: 100%;
            height: 170px;
            position: absolute;
            bottom: 0;
            background:#ff9999;
            cursor: pointer;
        }
        #c-r-bottom > h1 {
            margin-top: 10px;
            margin-left: 58px;
            font-size: 80px;
            color: white;
        }
        #c-r-bottom > div > h3 {
            font-size: 40px;
            color: white;
            margin-left: 30px;
        }
        #c-r-bottom > div {
            top: 75px;
            left: 30px;
            font-size: 25px;
            color: white;
            position: absolute;
        }
        #id,#pswd {
            background: rgba(0,0,0,0.8);
            padding: 3px;
            width: 70%;
            margin: 5px;
            text-align: center;
            color:white;
        }
        #submit {
            font-family: "supermarket";
            padding: 8px;
            width: 100px;
            margin-top: 5px;
            border-radius: 5px;
            background: white;
            color:black;
        }
        #next {
            position: absolute;
            bottom: 10px;
            right: 30px;
            font-size:40px;
            color: white;
        }
        h2 {
            margin:10px;
        } 
        @media only screen and (max-width:820px) {
            /* For mobile phones: */
                #content, #main,#c-left,#id,#pswd,#submit{
                width:100%;
                }
                #c-right,#c-r-top,#c-r-bottom {
                    float: left;
                    margin-left:0px;
                }
        }
            
    </style>    
</head>
<body>
    <?php
    if(isset($_COOKIE['id']) && isset($_COOKIE['pswd'])) {
        header("location: recruit-status.php");
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
            <h1>สำหรับนักเรียนที่ต้องการเข้าศึกษา   </h1>
        </div>
        <div id="content">
            <div id="c-left">
            <?php include "js/jssor/examples-jquery/recruit-slides.php"; ?>
            </div>
            <div id="c-right">
                <div id="c-r-top" >
                    <h2>ตรวจสอบสถานะ</h2>
                    <form id="login" method="post" action="recruit-login-check.php">
                        <input type="text" name="id" id="id" placeholder="รหัสประจำตัวผู้สมัคร" ><br>
                        <input type="password" name="pswd" id="pswd" placeholder="รหัสประจำตัวประชาชน" ><br>
                        <button id="submit">เข้าสู่ระบบ</button>
                    </form>
                </div>
                <div id="c-r-bottom" class = "card" onclick="window.location.href='recruit-register.php'">
                    <h1>สมัคร</h1>
                    <div>
                        <h3 id="text">เข้าร่วมโครงการ</h3><br>
                    </div>
                    <h3 id="next"> >> </h3>
                </div>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
    
</body>
</html>