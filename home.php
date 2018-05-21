<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>หน้าหลัก</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <style>
            @import "global.css";
            @font-face{
                font-family: "supermarket";
                src: url(font/supermarket.woff);
            }
            html, body { 
                font-family: "supermarket";
                margin: 0;
                padding: 0;
                background: #ebebeb;
                color: #444444;
                width: 100%;
            }
            #main {
                width: 1100px;
                height: 500px;
                margin: auto;
                position: relative;
                top: 50px;
            }
            #header {
                width: 100%;
                top: 100px;
                position: relative;
            }
            #header > h1 {
                font-family: "supermarket";
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
            #content {
                position: relative;
                top:110px;
                width: 1100px;
                height: 350px;
            }
            #left,#right {
                float: left;
                margin-top: 10px;
                width: 340px;
                height: 300px;
                position: relative;
                
            }
            #left > div,#right > div ,#center > div {
                position: absolute;
                text-align: center;
                bottom: 0px;
                width: 100%;
                background: white;
                cursor: pointer;
            }
            #center {
                float: left;
                margin-top: 10px;
                margin-left: 40px;
                width: 340px;
                height: 300px;
                position: relative;
            }
            #right {
                float: right;
            }
            img {
                width: 340px;
                height: 215px;
            }
            @media only screen and (max-width:820px) {
            /* For mobile phones: */
                #content, #main {
                width:100%;
                }
                #center,#right{
                    float: left;
                    margin-left:0px;
                }
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h1>ระบบลงทะเบียน</h1>
            </div>
            <div id="content">
            <div id="left" onclick="window.location.href='recruit-login.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/056.jpg" />
                        <h1>นักเรียน</h1>
                    </div>
                </div>
                <div id="center" onclick="window.location.href='student-home.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/057.jpg" />
                        <h1>นักศึกษา</h1>
                    </div>
                </div>
                <div id="right" onclick="window.location.href='staff-home.php'">
                    <div>
                        <img data-u="image" src="img/gallery/980x380/058.jpg" />
                        <h1>บุคลากร</h1>
                    </div>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>