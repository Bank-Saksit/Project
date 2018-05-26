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
        #h4 {
            margin-bottom:-20px;
        }
        th,td {
            text-align:center;
            border:2px solid;
        }
        #t1 {
            width:1%;
        }
        #t2 {
            width:2%;
        }
        #me1 {
            width:50%;
        }
    </style>
    
</head>
<body>
    <?php 
        if(isset($_SESSION['id']) && isset($_SESSION['pswd'])) {
            
        }
        else{
            header("location: student-home.php");
        }
    ?>
    <div class="top" id="top">
            <a href="student-main.php">ข้อมูลนักศึกษา</a>
            <a href="student-main2.php">ลงทะเบียนเรียน</a>
            <a href="student-main3.php">ตารางเรียน</a>
            <a class = "active" href="student-main4.php">ผลการเรียน</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="student-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ผลการเรียน</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                <div id="me1-1"></div>
                <div id="me1-2"></div>
                <div id="me1-3"></div>
                <div id="me1-4"></div>
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
            var arr1 = JSON.parse(response);
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
            document.getElementById("me1-4").innerHTML = '';
            var arr2 = JSON.parse(response);
            var out  = " <h4>ภาคเรียนที่ <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr2.length; i++){
                            out += "<option value = '"+ arr2[i].Semester+"'>"+arr2[i].Semester+"</option>";
                        }
                out +=  "</select></h4>";
            document.getElementById("me1-2").innerHTML = out ;
            
        }

        function loadGPA(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main4-GPA.php";

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showGPA(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function showGPA(response){
            var arr3 = JSON.parse(response);
            var out = "<table><tr><th>GPAX</th><th>หน่วยกิตรวม</th></tr>"+
                    "<tr><td>" + arr3[0].GPAX + "</td><td>" + arr3[0].Credit + "</td></tr></table>";
            document.getElementById("me1-4").innerHTML = out;
        }

        function check(){
            if($('select[name="AcademicYear"]').val() && $('select[name="Semester"]').val()){
                document.getElementById("me1-3").innerHTML = '';
                document.getElementById("me1-4").innerHTML = '';
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
            var arr = JSON.parse(response);
            
            if(arr[0].GPA != ""){
            var out ="<table><tr><th id='t1'>รหัสวิชา</th><th  id='t2'>ชื่อวิชา</th><th id='t1'>หน่วยกิต</th><th>เกรด</th></tr>";
                for(i = 0; i < arr.length; i++){
                    out += "<tr><td id='t1'>"+ arr[i].SubjectID +"</td>"+
                            "<td id='t2'>"+ arr[i].SubjectName +"</td>"+
                            "<td id='t1'>"+ arr[i].Credit +"</td>";
                            var GPA;
                            if(arr[i].GPA == 4) {
                                GPA = 'A';
                            }
                            else if(arr[i].GPA == 3.5) {
                                GPA = 'B+';
                            }
                            else if(arr[i].GPA == 3) {
                                GPA = 'B';
                            }
                            else if(arr[i].GPA == 2.5) {
                                GPA = 'C+';
                            }
                            else if(arr[i].GPA == 2) {
                                GPA = 'C';
                            }
                            else if(arr[i].GPA == 1.5) {
                                GPA = 'D+';
                            }
                            else if(arr[i].GPA == 1) {
                                GPA = 'D+';
                            }
                            else if(arr[i].GPA == 0) {
                                GPA = 'F';
                            }
                    out +=  "<td id='t1'>"+ GPA +"</td></tr>";
                }
                out +="</table>";
            }else {
                var out = "ไม่มีข้อมูล";
            }
            
            document.getElementById("me1-3").innerHTML = out;
            loadGPA();
        }
        </script>
     </div>
</body>
</html>