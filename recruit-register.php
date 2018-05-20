<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 250px;
            position: relative;
            background: red;
            height: 100%;
        }
        #tab {
            position: absolute;
            right: 0;
            top: 200px;
            text-align: right;
            border-right: 3px solid;
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
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ประวัติส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ที่อยุ่ปัจจุบัน</a></li>
            <li><a data-toggle="tab" href="#menu3">ประวัติด้านการศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu4">โครงการที่เข้าศึกษา</a></li>
        </ul>
     </div>
     <div id="main">
        <div id="header">
            <h1>สมัครเข้า</h1>
        </div>
        
        <div class="tab-content">
            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
            </div>
        </div>
     </div>
</body>
</html>