<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href ="js/sweetalert2.all.js" rel="stylesheet" >
    <script src="js/sweetalert21.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>ยืนยันสิทธิ์</title>
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
        #header {
			width: 100%;
			height: 80px;
            position: relative;
        }
        #content {
            margin-top: 2%;
            font-size: 20px;
        }
        #bill {
            width: 100%;
            text-align: center;
        }
        #sm,#sm-sub {
            margin-top: 2%;
            color:white;
            width: 100px;
            height: 40px;
            margin-left: 20px;
            margin-right: 20px;
            border-radius: 8px;
            font-size:18px;
            font-weight:none;
        }
        #sm{
            background:#d33;
        }
        #sm-sub{
            background:#3085d6;
        }
        dd{
            margin-left: 30%;
        }
        .swal2-popup {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <?php
    include "recruit-checkLog.php";
    ?>
    <div id="left">
        <br><a href="home.php" id="back"></a>
    </div>
    <div id="main">
        <div id="header">
            <h1>รอจ่ายเงิน</h1>
        </div>
        <div id="content">
            <div id="detail" ></div>
            <div id="bill">
                <button id="sm-sub" onclick="window.location.href='#'">พิมพ์ใบเสร็จ</button>
                <button id = "sm" onclick="window.location.href='recruit-status.php'">ย้อนกลับ</button>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
    

    <script>
        load();
        
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-confirm-link.php?inID="+
            <?php echo $_COOKIE['id']; ?>   

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function displayResponse(response) {
            window.arr = JSON.parse(response);
            
            var out = "<div class = 'row'><div class = 'col-sm-4' ><p>รหัสประจำตัวผู้สมัคร : "+ arr[0].RecruitID +"</p>"+
                    "<p>ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</p></div>"+
                    "<div class = 'col-sm-4' ><p>ชื่อโครงการ : "+ arr[0].RecruitPlanName +"</p>"+
                    "<p>คณะ : "+ arr[0].Faculty +"</p></div><div class = 'col-sm-4' >"+
                    "<p>ภาควิชา : "+ arr[0].Department +"</p></div></div>"+
                    "<br><div class = 'row'><div class = 'col-sm-4' ><p>เลขที่ใบเสร็จ : "+ arr[0].BillRecruitID +"</p>"+
                    "<p>วันออกใบเสร็จ : "+ arr[0].DateRegister +"</p></div>"+
                    "<div class = 'col-sm-4' ><p>ปีการศึกษา : 1/"+ arr[0].AcademicYear +"</p>"+
                    "<p>จำนวนเงินที่ต้องจ่าย : 20,000 บาท</p></div></div>";

            document.getElementById("detail").innerHTML = out;
        }
    </script>
</body>
</html>