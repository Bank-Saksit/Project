<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สำหรับนักเรียนที่ต้องการเข้าศึกษา</title>
    <style>
        @import "global.css";

        html, body { 
            height: 100%;
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
        * :not(h1){
            font: 14px;
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
        a {
            text-decoration: none;
            margin: 5px;
            color: #444444;
        }
        div#content {
            clear: both;
            width: 100%;
            height: 400px;
            position: relative;
            top: 110px
        }
        #c-right,#c-r-top,#c-left{
            background: black;
        }
        #c-left {
            clear: left;
            height: 400px;
            width: 100px;
        }
        
    </style>    
    
</head>
<body>  
    <div id="left">
        <br><a href="intro.html" id="back">< ฺback</a>
    </div>
    <div id="main">
        <div id="header">
            <h1>ยินดีต้อนรับ</h1>
        </div>
        <div id="content">
            <div id="c-left">

            </div>
            <div id="c-right">
                <div id="c-r-top">

                </div>
                <div id="c-r-bottom">
                    
                </div>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
</body>
</html>