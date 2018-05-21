<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครโครงการ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 250px;
            position: relative;
            height: 100%;
        }
        #tab {
            position: absolute;
            right: 0;
            top: 200px;
            text-align: right;
            border-right: 3px solid;
        }
        #tab-content {
            position: absolute;
            top:70px;
            margin-left: 30px;
        }
        #main {
            width: 950px;
            float: left;
            position: relative;
            top: 50px;
            background: #ebebeb;
        }
        #header {
            width: 100%;
            top: 50px;
            position: relative;
            /*list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color:#ebebeb;*/
        }
        #header > hi {
            font-family: "supermarket";
            font-size: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
            border-bottom: 10px solid;
            float: left;
        }
        #header > hi a {
            font-family: "supermarket";
            display: block;
            color:black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            border-bottom: 10px solid;
            float: left;
        }
        #header > hi a:hover {
            background-color: #111;
        }
        li{
            font-size: 20px;
        }
        select {
            margin-bottom: 10px;
        }

    </style>
    
</head>
<body>
     <div id="left">
        <br><a href="student-home.php" id="back">< back</a>
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ประวัติส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ที่อยุ่ปัจจุบัน</a></li>
            <li><a data-toggle="tab" href="#menu3">ประวัติด้านการศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu4">โครงการที่เข้าศึกษา</a></li>
        </ul>
     </div>
     <div id="main">
        <div id="header">
            <hi><a class="active" href="#home">ข้อมูลนักศึกษา</a></hi>
            <hi><a href="#news">ลงทะเบียนเรียน</a></hi>
            <hi><a href="#contact">ผลการเรียน</a></hi>
            <hi><a href="#about">ตารางเรียน</a></hi>
        </div>
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade">
                <h3>ประวัติส่วนตัว</h3>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>ที่อยุ่ปัจจุบัน</h3>
                
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>ประวัติด้านการศึกษา</h3>
                
            </div>
            <div id="menu4" class="tab-pane fade">
                <h3>โครงการที่เข้าศึกษา</h3>
                
            </div>
        </div>
     </div>
    </form>
</body>
</html>