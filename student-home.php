<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับนักศึกษา</title>
        <style>
            @import "global.css";
            html, body { 
                margin: 0;
                padding: 0;
                background: #dfdfdf;
                color: #444444;
            }
            #main {
                width: 1100px;
                float: left;
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
                width: 1100px;
                position: relative;
                height: 550px;
                top: 110px;
            }
            #c-top {
                padding-left: 30px;
                padding-top:5px;
                width: 1070px;
                height: 220px;
                top: 0;
                text-align: left;
                position: relative;
                background: gray;
                color: white;
            }
            #c-bot {
                padding-left: 30px;
                width: 1070px;
                height: 40px;
                padding-top:20px;
                top: 0;
                text-align: left;
                position: relative;
                background: white;
                color: black;
            }
            input[type=text] {
                background: #444444;
                padding: 3px;
                width: 300px;
                text-align: left;
            }
            input[type=password] {
                background: #444444;
                margin-top: 5px;
                padding: 3px;
                width: 300px;
                text-align: left;
            }
            input[type=summit] {
                padding: 10px;
                width: 100px;
                margin-top: 7px;
                border-radius: 5px;
                background: white;
            }
            #sub{
                width: 300px;
                margin-top:20px;
                text-align: center;
            }
            div#c-bot >a {
                text-decoration: underline;
            }
        </style>    

    </head>
    <body>
        <div id="left">
            <br><a href="home.php" id="back">< ฺback</a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ยินดีต้อนรับ</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post">
                        <h2>ระบบสารสนเทศ<br>เพื่อการบริหารการศึกษา</h2>
                        <input type="text" id="id" placeholder="รหัสนักศึกษา"><br>
                        <input type="password" id="pswd" placeholder="รหัสผ่าน"><br>
                        <div id = "sub">
                            <input type="submit" value="เข้าสู่ระบบ">
                            <a href = "www.google.com">ลืมรหัสผ่าน?</a>
                        </div>
                    </form>
                </div>
                    
                <div id= "c-bot">
                    สำหรับนักศึกษาใหม่ <a href= "">ลงทะเบียนนักศึกษาใหม่</a>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>