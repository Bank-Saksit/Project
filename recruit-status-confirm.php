<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ยืนยันสิทธิ์</title>
    <style>
        @import "global1.css";
        #content {
            font-size: 20px;
        }
        #bill {
            width: 100%;
            text-align: center;
        }
        #bill > button {
            width: 100px;
            height: 40px;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 5%;
            border-radius: 10px;
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
            <div id="detail"></div>
            <div id="bill">
                <button onclick="window.location.href='#'">พิมพ์ใบเสร็จ</button>
                <button onclick="window.location.href='recruit-status.php'">ย้อนกลับ</button>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
    

    <script>
        load();
        
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-confirm-link.php?inID="+
            <?php echo $_COOKIE['id'] ?>
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function displayResponse(response) {
            var arr = JSON.parse(response);
            var out = "รหัสประจำตัวผู้สมัคร : "+ arr[0].RecruitID +"<br>"+
                    "ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"<br>"+
                    "ชื่อโครงการ : "+ arr[0].RecruitPlanName +"<br>"+
                    "คณะ : "+ arr[0].Faculty +"<br>"+
                    "ภาควิชา : "+ arr[0].Department +"<br>"+
                    "เลขที่ใบเสร็จ : "+ arr[0].BillRecruitID +"<br>"+
                    "วันออกใบเสร็จ : "+ arr[0].DateRegister +"<br>"+
                    "ปีการศึกษา : 1/"+ arr[0].AcademicYear +"<br>"+
                    "จำนวนเงินที่ต้องจ่าย : 20,000 บาท";

            document.getElementById("detail").innerHTML = out;
        }
    </script>
</body>
</html>