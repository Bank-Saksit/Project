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
        .swal2-popup {
            font-size: 2rem;
        }
        table {
            border-collapse: collapse;
        }
        #t1 {
            text-align:center;
            font-size:20px;
            border:1px solid;
            font-weight:normal;
            background: #f1f1f1;
        }
        #t2 {
            text-align:center;
            padding:14px 16px;
            font-size:18px;
            background:white;
            border:1px solid;
        }
        #h4 {
            margin-top: 10px;
            font-size:16px;
        }
        #t3{
            margin-top: 2%;
            margin-left:20%;
        }
        #top{
            background-color:#52128e;
        }
    </style>
    
</head>
<body>
    <?php 
        // if(isset($_SESSION['id']) && isset($_SESSION['pswd'])) {
            
        // }
        // else{
        //     header("location: student-home.php");
        // }
        $_SESSION['id'] = '59070501066';
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
            <div class = "row">
                <div id="me1-1"></div>
                <div id="me1-2"></div>
                </div>
                <div id ="h4">
                <div id="me1-3"></div>
                </div>
                <div id ="t3">
                <div id="me1-4"></div>
                </div>
            </div>
        </div>
        <script>
        loadYear();
        document.getElementById("me1-2").innerHTML = " <div class = 'col-sm-3' ><p> ภาคเรียนที่ <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option></select></p></div>";
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
            var out = "  <div class = 'col-sm-3' ><p> ปีการศึกษา <select name = 'AcademicYear' onclick=\"loadSemester()\">" +
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr1.length; i++){
                            out += "<option value = '"+ arr1[i].AcademicYear+"' >"+arr1[i].AcademicYear+"</option>";
                        }
                out +=  "</select></p></div>";
                document.getElementById("me1-1").innerHTML = out ;
                loadSemester();
        }
        function showSemester(response){
            document.getElementById("me1-3").innerHTML = '';
            document.getElementById("me1-4").innerHTML = '';
            var arr2 = JSON.parse(response);
            var out  = "  <div class = 'col-sm-3' ><p>ภาคเรียนที่ <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr2.length; i++){
                            out += "<option value = '"+ arr2[i].Semester+"'>"+arr2[i].Semester+"</option>";
                        }
                out +=  "</select></p></div>";
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
            var out = "<table><tr><div class ='row'><div class = 'col-sm-2' id ='t1'>GPAX</div><div class = 'col-sm-2' id ='t1'>หน่วยกิตรวม</div></div></tr>"+
                    "<tr><div class ='row'><div class = 'col-sm-2' id ='t2'>" + arr3[0].GPAX + "</div><div class = 'col-sm-2' id ='t2'>" + arr3[0].Credit + "</div></div></tr></table>";
            document.getElementById("me1-4").innerHTML = out;
        }

        function check(){
            if($('select[name="AcademicYear"]').val() !='' && $('select[name="Semester"]').val() !=''){
                document.getElementById("me1-3").innerHTML = '';
                document.getElementById("me1-4").innerHTML = '';
                load();
            }
            else {
                document.getElementById("me1-3").innerHTML = '';
                document.getElementById("me1-4").innerHTML = '';
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
            var out ="<table><tr><div class = 'row'><div class = 'col-sm-2' id ='t1'>รหัสวิชา</div><div class = 'col-sm-3' id ='t1'>ชื่อวิชา</div><div class = 'col-sm-2' id ='t1'>หน่วยกิต</div><div class = 'col-sm-2' id ='t1'>เกรด</div></div></tr>";
                for(i = 0; i < arr.length; i++){
                    out += "<tr><div class = 'row'><div class = 'col-sm-2' id ='t2'>"+ arr[i].SubjectID +"</div>"+
                            "<div class = 'col-sm-3' id ='t2'>"+ arr[i].SubjectName +"</div>"+
                            "<div class = 'col-sm-2' id ='t2'>"+ arr[i].Credit +"</div>";
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
                            else if(arr[i].GPA == "") {
                                GPA = 'ยังไม่ออก';
                            }
                            else if(arr[i].GPA == 0) {
                                GPA = 'F';
                            }
                            else if(arr[i].GPA == -1){
                                GPA = 'ถอนรายวิชา';
                            }
                    out +=  "<div class = 'col-sm-2' id ='t2'>"+ GPA +"</div></div></tr>";
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