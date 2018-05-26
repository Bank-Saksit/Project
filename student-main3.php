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
  
        th,td {
            text-align:center;
            border:2px solid;
        }
        #t1 {
            width:5%;
        }
        #t2 {
            width:10%;
        }
        #h4 {
            margin-bottom:-20px;
        }
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
            <li class = "active"><a data-toggle="tab" href="#menu1">ตารางเรียน</a></li>
            <li><a data-toggle="tab" href="#menu2">ตารางสอบ</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                <div id="me1-1"></div>
                <div id="me1-2"></div>
                <div id="me1-3"></div>
            
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
        </div>
        <script>
        loadYear();
        document.getElementById("me1-2").innerHTML = "<h4> ภาคเรียนที่ <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option></select></h4>";
        function loadYear(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main3-link1.php";
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showYear(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function loadSemester(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main3-link2.php?Year="+ 
            $('select[name="AcademicYear"]').val();

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showSemester(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function showYear(response){
            window.arr1 = JSON.parse(response);
            var out = " <h4 id='h4'> ปีการศึกษา <select name = 'AcademicYear' onclick=\"loadSemester()\">" +
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr1.length; i++){
                            out += "<option value = '"+ arr1[i].AcademicYear+"' >"+arr1[i].AcademicYear+"</option>";
                        }
                out +=  "</select></h4><br>";
                document.getElementById("me1-1").innerHTML = out ;
                loadSemester();
        }
        function showSemester(response){
            document.getElementById("me1-3").innerHTML = '';
            window.arr2 = JSON.parse(response);
            var out  = " <h4>ภาคเรียนที่ <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr2.length; i++){
                            out += "<option value = '"+ arr2[i].Semester+"'>"+arr2[i].Semester+"</option>";
                        }
                out +=  "</select></h4>";
            document.getElementById("me1-2").innerHTML = out ;
            
        }
        function check(){
            if($('select[name="AcademicYear"]').val() && $('select[name="Semester"]').val()){
                document.getElementById("me1-3").innerHTML = '';
                load();
            }
                
        }

        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main3-link.php?Year="+ 
            $('select[name="AcademicYear"]').val() + "&Semester=" + $('select[name="Semester"]').val();

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
        
            var out ="<table><tr><th id='t1'>รหัสวิชา</th><th  id='t2'>ชื่อวิชา</th><th id='t1'>กลุ่ม</th><th th id='t1'>วัน</th>" +
                 "<th id='t2'>เวลาเรียน</th><th id='t1'>ห้อง</th><th id='t2'>คำอธิบายวิชา</th><th id='t1'>หน่วยกิต</th></tr>";
            for(i = 0; i < arr.length; i++){
            out += "<tr><td>"+ arr[i].SubjectID +"</td>"+
                    "<td>"+ arr[i].SubjectName +"</td>"+
                    "<td>"+ arr[i].SectionNumber +"</td>"+
                    "<td>"+ arr[i].Day +"</td>"+
                    "<td>"+ arr[i].StartTime + ' น. - ' + arr[i].EndTime +"น. </td>"+
                    "<td>"+ arr[i].Room +"</td>"+
                    "<td>"+ arr[i].Description + "</td>"+
                    "<td>"+ arr[i].Credit +"</td></tr>";
            }
            out +="</table>";

            document.getElementById("me1-3").innerHTML = out;
        }
        </script>
     </div>
</body>
</html>