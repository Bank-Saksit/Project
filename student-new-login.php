<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับนักศึกษาใหม่</title>
        <style>
            @import "global1.css";
            html, body { 
                margin: 0;
                padding: 0;
                background: #dfdfdf;
                color: #444444;
            }
            #main {
                width: 90%;
                float: right;
                position: relative;
                top: 50px;
            }
    
            #left {
                float: left;
                width: 10%;
                position: relative;
            }
            #back {
                margin: 20px;
                font-weight: bold;
            }
            #header {
                width: 100%;
                top: 100px;
                position: relative;
            }
            #header > h1 {
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
            div#left > a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
            div#sub > a {
                text-decoration: underline;
                margin: 5px;
                color: #ffffff;
            }
            div#content {
                clear: both;
                width: 100%;
                position: relative;
                height: 550px;
                top: 110px;
            }
            #c-top {
                width: 100%;
                height: 360px;
                top: 0;
                text-align: left;
                position: relative;
                background: gray;
                color: white;
            }
            form{
                padding-top : 5px;
                padding-left : 30px;
            }
            input[type=text] {
                background: #444444;
                margin-top: 10px;
                padding-left: 30px;
                width: 310px;
                height:30px;
                text-align: left;
            }
            input[type=password] {
                background: #444444;
                margin-top: 20px;
                padding-left: 30px;
                width: 310px;
                height: 30px;
                text-align: left;
            }
            ::placeholder {
                color: white;
            }
            input[type=submit] {
                padding: 5px;
                width: 80px;
                margin-top: 25px;
                margin-left: 10px;
                background: white;
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
        <div id="left">
            <br><a href="home.php" id="back">< ฺback</a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ลงทะเบียนสำหรับนักศึกษาใหม่</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post">
                        <h1>ระบบสารสนเทศ<br>เพื่อการบริหารการศึกษา</h1>
                        <input type="text" id="id" placeholder="รหัสนักศึกษา"><br>
                        <input type="password" id="pswd" placeholder="รหัสบัตรประจำตัวประชาชน"><br>
                        <input type="submit" value="เข้าสู่ระบบ">
                    </form>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>