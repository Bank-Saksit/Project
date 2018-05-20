<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตรวจสอบสถานะ</title>
    <style>
         @import "global1.css";
        table {
            background: aquamarine;
            position: absolute;
            width: 100%;
            top:0;
            left:0;
        }
        td {
            width:16.67%;
            text-align: center;
        }
        #t1 {
            text-align: right;
            font-weight:bold;
        }
        #t2 {
            text-align: left;
        }
        #out {
            position: absolute;
            bottom:30px;
            right:0;
            cursor: pointer;
        }
        status {
            text-align: center;
            font-style: bold;
        }
    </style>
</head>
<body>
    <div id="left">
        <br><a href="#" id="back">< ฺback</a>
    </div>
    <div id="main">
        <div id="header">
            <h1>ตรวจสอบสถานะ</h1>
            <h4 id="out">ออกจากระบบ</h3>
        </div>
        <div id="content">
            <div id="infoRecruit"></div>
            <div id="detail-rc"> 
                <table>

                </table>
                <div id="status"></div>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
=======
<?php
include "dblink.php";
$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, r.SchoolID, r.SchoolGPAX, r.MobileNumber, r.Status, s.SchoolName FROM recruitinfo r, schoolinfo s WHERE r.SchoolID=s.SchoolID AND RecruitID = '".$_GET['inID']."';");
>>>>>>> 15f07275e33c2cfeb4838112890d26f123132bb0

    <script>
        loadRecruit();
        
        function loadRecruit(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-link.php?inID=1";
            
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
            var i;
            var out = "<table>";
            var stat;

            out += "<tr>"+
                        "<td id='t1'>รหัสประจำตัวผู้สมัคร : </td><td id='t2'>"+ arr[0].RecruitID +"</td>"+
                        "<td id='t1'>ชื่อ : </td><td id='t2'>"+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</td>"+
                        "<td id='t1'>ชื่อโครงการ : </td><td id='t2'>"+ arr[0].RecruitPlanName +"</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td id='t1'>โรงเรียนของฉัน : </td><td id='t2'>"+ arr[0].SchoolName +"</td>"+
                        "<td id='t1'>GPAX : </td><td id='t2'>"+ arr[0].SchoolGPAX +"</td>"+
                        "<td id='t1'>เบอร์ติดต่อ : </td><td id='t2'>"+ arr[0].MobileNumber +"</td>"+
                    "</tr>";
            out += "</table>";
            stat = "<status>"+arr[0].Status+"</status>";
            document.getElementById("infoRecruit").innerHTML = out;
            document.getElementById("status").innerHTML = stat;
        }
    </script>
</body>
</html>