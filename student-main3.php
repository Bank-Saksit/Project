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
            font-size:18px;
            font-weight:normal;
            background:#f1f1f1;
        }
        #t2 {
            text-align:center;
            height: 100px;
            font-size:18px;
            border:1px solid;
            background:white;
        }
        #h4 {
            margin-top: 10px;
            font-size:16px;
        }
        #top{
            background-color:#52128e;
        }
        th{
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
            font-size:18px;
            font-weight:normal;
            background:#f1f1f1;
        }
        td{
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
            font-size:18px;
            background:white;
        }
    </style>
    
</head>
<body>
    <?php 
        if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'student') {
            
        }
        else{
            header("location: student-home.php");
            exit('</body></html>');
        }
    ?>
    <div class="top" id="top">
            <a href="student-main.php">ข้อมูลนักศึกษา</a>
            <a href="student-main2.php">ลงทะเบียนเรียน</a>
            <a class = "active" href="student-main3.php">ตารางเรียน</a>
            <a href="student-main4.php">ผลการเรียน</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="student-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">แผนการเรียน</a></li>
            <li><a data-toggle="tab" href="#menu2">ตารางเรียน</a></li>
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
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class = "row">
                    <div id="me2-1"></div>
                    <div id="me2-2"></div>
                </div>
                <div id ="h4">
                    <div id="me2-3"></div>
                </div>
            </div>
        </div>
        <script>
        loadYear();
        loadYear1();
        document.getElementById("me1-2").innerHTML = "<div class = 'col-sm-3' ><p> ภาคเรียนที่ : <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option></select></p></div>";
        document.getElementById("me2-2").innerHTML = "<div class = 'col-sm-3' ><p> ภาคเรียนที่ : <select name='Semester1' onclick=\"check1()\">" + 
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
            var out = " <div class = 'col-sm-3' ><p> ปีการศึกษา : <select name = 'AcademicYear' onclick=\"loadSemester()\">" +
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
            var arr2 = JSON.parse(response);
            var out  = " <div class = 'col-sm-3' ><p>ภาคเรียนที่ : <select name='Semester' onclick=\"check()\">" + 
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr2.length; i++){
                            out += "<option value = '"+ arr2[i].Semester+"'>"+arr2[i].Semester+"</option>";
                        }
                out +=  "</select></p></div>";
            document.getElementById("me1-2").innerHTML = out ; 
        }
        function check(){
            if($('select[name="AcademicYear"]').val() && $('select[name="Semester"]').val()){
                document.getElementById("me1-3").innerHTML = '';
                load();
            }
                
        }


        function loadYear1(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main3-link1.php";
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showYear1(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function loadSemester1(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main3-link2.php?Year="+ 
            $('select[name="AcademicYear1"]').val();

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showSemester1(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function showYear1(response){
            var arr4 = JSON.parse(response);
            
            var out4 = " <div class = 'col-sm-3' ><p> ปีการศึกษา : <select name = 'AcademicYear1' onclick=\"loadSemester1()\">" +
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr4.length; i++){
                            out4 += "<option value = '"+ arr4[i].AcademicYear+"' >"+arr4[i].AcademicYear+"</option>";
                        }
                out4 +=  "</select></p></div>";
                document.getElementById("me2-1").innerHTML = out4 ;
                loadSemester1();
        }
        function showSemester1(response){
            document.getElementById("me2-3").innerHTML = '';
            var arr3 = JSON.parse(response);
            var out5  = " <div class = 'col-sm-3' ><p>ภาคเรียนที่ : <select name='Semester1' onclick=\"check1()\">" + 
                        "<option value = ''>โปรดเลือก</option>";
                        for(i = 0; i < arr3.length; i++){
                            out5 += "<option value = '"+ arr3[i].Semester+"'>"+arr3[i].Semester+"</option>";
                        }
                out5 +=  "</select></p></div>";
            document.getElementById("me2-2").innerHTML = out5 ; 
        }
        function check1(){
            if($('select[name="AcademicYear1"]').val() && $('select[name="Semester1"]').val()){
                document.getElementById("me2-3").innerHTML = '';
                timeTable();
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
        
            var out ="<table><tr><div class = 'row'><div class = 'col-sm-1' id ='t1'>รหัสวิชา</div><div class = 'col-sm-2' id ='t1'>ชื่อวิชา</div><div class = 'col-sm-1' id ='t1'>กลุ่ม</div><div class = 'col-sm-1' id ='t1'>วัน</div>" +
                 "<div class = 'col-sm-2' id ='t1'>เวลาเรียน</div><div class = 'col-sm-1' id ='t1'>ห้อง</div><div class = 'col-sm-2' id ='t1'>คำอธิบายวิชา</div><div class = 'col-sm-1' id ='t1'>หน่วยกิต</div></div></tr>";
            for(i = 0; i < arr.length; i++){
            out += "<tr><div class = 'row'><div class = 'col-sm-1' id ='t2'>"+ arr[i].SubjectID +"</div>"+
                    "<div class = 'col-sm-2' id ='t2'>"+ arr[i].SubjectName +"</div>"+
                    "<div class = 'col-sm-1' id ='t2'>"+ arr[i].SectionNumber +"</div>"+
                    "<div class = 'col-sm-1' id ='t2'>"+ arr[i].Day +"</div>"+
                    "<div class = 'col-sm-2' id ='t2'>"+ arr[i].StartTime + ' น. - ' + arr[i].EndTime +"น. </div>"+
                    "<div class = 'col-sm-1' id ='t2'>"+ arr[i].Room +"</div>"+
                    "<div class = 'col-sm-2' id ='t2'>"+ arr[i].Description + "</div>"+
                    "<div class = 'col-sm-1' id ='t2'>"+ arr[i].Credit +"</div></div></tr>";
            }
            out +="</table></div>";

            document.getElementById("me1-3").innerHTML = out;
        }

        function timeTable(){
            var xmlhttp = new XMLHttpRequest();
            var sem = $('select[name="Semester1"]').val()
            var year = $('select[name="AcademicYear1"]').val();
            var url = location.protocol+'//'+location.host+"/Project/student-timeTable-link.php?sem="+sem+"&year="+year;
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("me2-3").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        </script>
     </div>
</body>
</html>