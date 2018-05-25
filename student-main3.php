<?php
session_start();
?>
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
    <div class="top" id="top">
            <a href="student-main.php">ข้อมูลนักศึกษา</a>
            <a href="student-main2.php">ลงทะเบียนเรียน</a>
            <a class = "active" href="student-main3.php">ตารางเรียน</a>
            <a href="student-main4.php">ผลการเรียน</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="student-home.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ตารางเรียน</a></li>
            <li><a data-toggle="tab" href="#menu2">ตารางสอบ</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade">

            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
        </div>
        <script>
        var out = " ปีการศึกษา <select name = 'AcademicYear'>" +
                    "<option value = ''>โปรดเลือก</option>" +
                    "<option value = '2561'>2561</option></select><br>" + 
                    " ภาคเรียนที่ <select name='Semester'>" + 
                    "<option value = ''>โปรดเลือก</option>" +
                    "<option value ='2'>2</option></select>"+
                    "<br><input type='button' value='ยืนยัน' onclick=\"load()\">";
        document.getElementById("menu1").innerHTML = out ;

        //load();
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/student-main3-link.php?Year="+ 
            $('select[name="AcademicYear"]').val() + "&Semester=" + $('select[name="Semeter"]').val();

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
            
            var out = "รหัสวิชา : "+ arr[0].SubjectID +"<br>"+
                    "ชื่อวิชา : "+ arr[0].SubjectName +"<br>"+
                    "หน่วยกิต : "+ arr[0].Credit +"<br>"+
                    "คำอธิบายวิชา : "+ arr[0].Description +"<br>"+
                    "กลุ่ม : "+ arr[0].SectionNumber +"<br>"+
                    "ห้อง : "+ arr[0].Room +"<br>"+
                    "วัน : "+arr[0].Day + "<br>"+
                    "ภาคเรียน : "+ arr[0].Semester +"<br>"+
                    "ปีการศึกษา : "+ arr[0].AcademicYear +"<br>"+
                    "เวลาเรียน : "+ arr[0].StartTime + ' น. - ' + arr[0].EndTime +" น. <br>";

            document.getElementById("menu1").innerHTML = out;
        }
        </script>
     </div>
</body>
</html>