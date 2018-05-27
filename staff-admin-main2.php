<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศสำหรับผู้ดูแลระบบ</title>
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
        table, th , td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 5px;
        }
        table tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        table tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
    
</head>
<body>
    <div class="top" id="top">
            <a href="staff-admin-main.php">นักเรียนสอบเข้าโครงการ</a>
            <a class = "active" href="staff-admin-main2.php">นักศึกษา</a>
            <a href="staff-admin-main3.php">อาจารย์</a>
            <a href="staff-admin-main4.php">รายวิชา</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-home.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลนักศึกษา</a></li>
            <!-- <li><a data-toggle="tab" href="#menu2">ลบรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">แก้ไขรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu4">เพิ่มกลุ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu5">ลบกลุ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu6">แก้ไขกลุ่มรายวิชา</a></li> -->
        </ul>
    </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active"></div>
            <!-- <div id="menu2" class="tab-pane fade"></div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
            <div id="menu5" class="tab-pane fade"></div>
            <div id="menu6" class="tab-pane fade"></div> -->
        </div>

        <script>
        function myFunction() {
            var x = document.getElementById("top");
            if (x.className === "top"){
                x.className += " responsive";
            } 
            else{
                x.className = "top";
            }
        }

        load();

        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=01";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    arr = JSON.parse(xmlhttp.responseText);
                    display();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function display() {
            var i;
            var out1 = "<table>";
            
            for(i = 0; i < arr.length; i++) {
                if(i==0)
                    out1 += "<tr><td align='center'>รหัสนักศึกษา</td><td align='center'>คณะ</td><td align='center'>ภาควิชา</td><td align='center'>ระดับการศึกษา</td><td align='center'>หลักสูตร</td><td align='center'>เบอร์โทรศัพท์</td><td align='center'>เบอร์โทรศัพท์บ้าน</td><td align='center'>Email</td><td align='center'>สถานะ</td><td align='center'>คำนำหน้า</td><td align='center'>ชื่อ</td><td align='center'>นามสกุล</td><td colspan='2' align='center'>แก้ไข</td></tr>";
                out1 += "<tr><td>" + arr[i].StudentID +
                "</td><td>" + arr[i].Faculty+
                "</td><td>" + arr[i].Department+
                "</td><td>" + arr[i].Degree+
                "</td><td>" + arr[i].Course+
                "</td><td>" + arr[i].MobileNumber+
                "</td><td>" + arr[i].TelNumber+
                "</td><td>" + arr[i].Email+
                "</td><td>" + arr[i].Status+
                "</td><td>" + arr[i].Prefix+    
                "</td><td>" + arr[i].FirstName+
                "</td><td>" + arr[i].LastName+
                // -------------------------------------------------
                "</td><td>" +
                "<button onclick=\"updateStatus('"+arr[i].StudentID+"', '"+arr[i].Status+"')\">เปลี่ยนสถานะ</button>"+
                "</td><td>" +
                "<button onclick=\"sdelete('"+arr[i].StudentID+"')\">ลบข้อมูล</button>"+
                "</td></tr>";
            }
            out1 += "</table>";
            document.getElementById("menu1").innerHTML = out1;
        }

        function sdelete( sid ){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=11";
                url+="&sid="+sid;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function updateStatus( sid, st ) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=12";
                url+="&sid="+sid+"&st="+st;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        </script>

    </div>
</body>
</html>