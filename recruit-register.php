<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 250px;
            position: relative;
            background: red;
            height: 100%;
        }
        h3 {
            margin-top:0px;
            margin-bottom:0px;
        }
        #tab {
            position: absolute;
            right: 0;
            top: 200px;
            text-align: right;
            border-right: 3px solid;
        }
        #back {
            margin: 20px;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            margin: 5px;
            color: #444444;
        }
        #main {
            width: 900px;
            float: left;
            position: relative;
            top: 50px;
        }
    </style>
    
</head>
<body>
     <div id="left">
        <br><a href="recruit-login.php" id="back">< ฺback</a>
        <div id="tab">
            <h3>ประวัติส่วนตัว&nbsp;</h3><br>
            <h3>ที่อยุ่ปัจจุบัน&nbsp;</h3><br>
            <h3>ประวัติด้านการศึกษา&nbsp;</h3><br>
            <h3>โครงการที่เข้าศึกษา&nbsp;</h3><br>
        </div>
     </div>
     <div id="main">
        <div id="header">
            <h1>สมัครเข้า</h1>
            
        </div>
     </div>
</body>
</html>