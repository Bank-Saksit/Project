<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศเพื่อการบริหารการศึกษา</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import "global1.css";
        @import "temple.css";
    </style>
    
</head>
<body>
    <div class="header" id="header">
            <a class = "active" href="student-main.php">ข้อมูลนักศึกษา</a>
            <a href="student-main2.php">ลงทะเบียนเรียน</a>
            <a href="student-main3.php">ตารางเรียน</a>
            <a href="student-main4.php">ผลการเรียน</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="student-home.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ประวัติส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ที่อยุ่ปัจจุบัน</a></li>
            <li><a data-toggle="tab" href="#menu3">ประวัติด้านการศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu4">โครงการที่เข้าศึกษา</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade">
                <h3>sfaasfa</h3>
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
            <div id="menu3" class="tab-pane fade">
                
            </div>
            <div id="menu4" class="tab-pane fade">
                
            </div>
        </div>
        <script>
        function myFunction() {
            var x = document.getElementById("header");
            if (x.className === "header") {
                x.className += " responsive";
                } 
            else {
                x.className = "header";
                }
            }
        </script>
     </div>
</body>
</html>