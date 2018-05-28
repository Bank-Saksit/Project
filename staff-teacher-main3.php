<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศสำหรับอาจารย์</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<!-- <link href ="js/sweetalert2.all.js" rel="stylesheet"> -->
    <script src="js/sweetalert21.js"></script>
    <style>
        @import "global1.css";
        @import "temple.css";
        table, th,td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
        th{
            font-size:18px;
            font-weight:normal;
            background:#f1f1f1;
        }
        td{
            font-size:18px;
            background:white;
        }
        #top{
            background-color:#33b2d6;
        }
        .swal2-popup {
            font-size: 2rem;
        }
    </style>
    
</head>
<body>
        <?php 
            if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'Teacher') {
                
            }
            else{
                header("location: staff-home.php");
                exit('</body></html>');
            }
        ?>
    <div class="top" id="top">
            <a href="staff-teacher-main.php">ข้อมูลอาจารย์</a>
            <a href="staff-teacher-main2.php">ลงทะเบียนสอน</a>
            <a class = "active" href="staff-teacher-main3.php">บันทึกและตัดเกรด</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1" onclick="load()">บันทึกเกรดในรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2" onclick="load2()" >เกรดของนักเรียนของแต่ละปี</a></li>
            <li><a data-toggle="tab" href="#menu3" onclick="load3()" >เกรดของนักเรียนของแต่ละรายวิชา</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
            <div id="menu3" class="tab-pane fade">
                
            </div>
        </div>
        <script>
            load();
            load2();
            load3();

            function myFunction() {
                var x = document.getElementById("top");
                if (x.className === "top") {
                    x.className += " responsive";
                } 
                else {
                    x.className = "top";
                }
            }

            function load(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-cutgrade-link.php?type=01&inID="+<?php echo $_SESSION['id'];?>+"&sub=0"+"&gpa=''&SID=''"+"&ssID=''";
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function display(response){
                var arr = JSON.parse(response);
                if(arr[0].nop =="not found" ){
                    var out1 =  "<h2>"+"ไม่พบรายวิชาที่ต้องตัดเกรด</h2>" ;
                }
                else{
                    var out1 = "<form><h2>เลือกรายวิชาที่ต้องการตัดเกรด : </h2><p><select id='sub'>";
                            for(i=0;i<arr.length;i++){
                                out1+="<option value="+arr[i].SubjectSectionID+">"+arr[i].SubjectID+"&nbsp"+arr[i].SubjectName+"&nbspsec :"+arr[i].SectionNumber+"</option>";
                            }
                        out1 += "</select></p>"+
                            "<p><input type='button' value='ยืนยัน' id='edit1' onclick='selectSub()'></p>"+
                            "</form>";
                }
                    document.getElementById("menu1").innerHTML = out1;
            }

            function load2(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-seeGPAyear.php";
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display2(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function display2(response){
                var arr = JSON.parse(response);
                var out2 = "<form><h2>เลือกชั้นปีที่ต้องการดูเกรด: </h2><p><select id='year'>";
                        for(i=0;i<arr.length;i++){
                            out2+="<option value="+arr[i].Status+">"+arr[i].Status+"</option>";
                        }
                    out2 += "</select></p>"+
                            "<p><input type='button' value='ตรวจสอบ' onclick='selectYear()'></p>"+
                            "</form>";
                    document.getElementById("menu2").innerHTML = out2;
            }
            
            function selectYear(){
                var xmlhttp = new XMLHttpRequest();
                var year = document.getElementById('year').value;
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-seeGPAyear-link.php?year="+year;
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        disGrade2(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function disGrade2(response){
                var arr = JSON.parse(response);
                var out2;
                if(arr[0].nop =="not found" ){
                    out2 =  "<h2>"+arr[0].Year+
                            "&nbsp"+"ไม่พบข้อมูล</h2>" ;
                }
                else{
                    out2=   "<h2>"+arr[0].Year +"</h2>"+
                            "<table>"+
                            "<tr><th>" +
                            "รหัสนักศึกษา"+
                            "</th><th>" +
                            "ชื่อ"+
                            "</th><th>" +
                            "นามสกุล"+
                            "</th><th>" +
                            "GPA"+
                            "</th></tr>";
                    for(i=0;i<arr.length;i++){
                        out2+=  "<tr><td>" +
                                arr[i].StudentID+
                                "</td><td>" +
                                arr[i].FirstName+
                                "</td><td>" +
                                arr[i].LastName+
                                "</td><td>" +
                                arr[i].GPAX+
                                "</td></tr>";
                    }
                    out2+= "</table>"
                }
                
                document.getElementById("menu2").innerHTML = out2;
            }

            function load3(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-seeGPAsubject.php";
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display3(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function display3(response){
                var arr = JSON.parse(response);
                var out3 = "<form><h2>เลือกรายวิชาที่ต้องการดูเกรด : </h2><p><select id='sub3'>";
                        for(i=0;i<arr.length;i++){
                            out3+="<option value="+
                                    arr[i].SubjectSectionID+">"+
                                    arr[i].SubjectID+
                                    "&nbsp"+arr[i].SubjectName+
                                    "&nbspsec : "+arr[i].SectionNumber+
                                    "&nbspภาคเรียนที่ : "+arr[i].Semester+
                                    "&nbspปีการศึกษา : "+arr[i].AcademicYear+
                                    "</option>";
                        }
                    out3 += "</select><p>"+
                            "<p><input type='button' value='ตรวจสอบ' onclick='selectSub3()'><p>"+
                            "</form>";
                    document.getElementById("menu3").innerHTML = out3;
            }

            function selectSub3(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementById('sub3').value;
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-seeGPAsubject-link.php?sub="+sub;
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        disGrade3(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function disGrade3(response){
                var arr = JSON.parse(response);
                var out3;
                if(arr[0].nop =="not found" ){
                    out3 =  "<h2>"+arr[0].SubjectID+
                            "&nbsp"+arr[0].SubjectName+
                            "&nbspsec : "+arr[0].SectionNumber+
                            "&nbspภาคเรียนที่ : "+arr[0].Semester+
                            "&nbspปีการศึกษา : "+arr[0].AcademicYear+
                            "</h2><h2>"+"ไม่พบข้อมูล</h2>" ;
                }
                else{
                        out3= "<h2>"+arr[0].SubjectID+
                            "&nbsp"+arr[0].SubjectName+
                            "&nbspsec : "+arr[0].SectionNumber+
                            "&nbspภาคเรียนที่ : "+arr[0].Semester+
                            "&nbspปีการศึกษา : "+arr[0].AcademicYear+
                            "</h2><table>"+
                            "<tr><th>" +
                            "รหัสนักศึกษา"+
                            "</th><th>" +
                            "ชื่อ"+
                            "</th><th>" +
                            "นามสกุล"+
                            "</th><th>" +
                            "GPA"+
                            "</th></tr>";
                    for(i=0;i<arr.length;i++){
                        out3+=  "<tr><td>" +
                                arr[i].StudentID+
                                "</td><td>" +
                                arr[i].FirstName+
                                "</td><td>" +
                                arr[i].LastName+
                                "</td><td>" +
                                arr[i].GPA+
                                "</td></tr>";
                    }
                    out3+= "</table>"
                }
                
                document.getElementById("menu3").innerHTML = out3;
            }

            function selectSub(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementById('sub').value;
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-cutgrade-link.php?type=02&inID="+<?php echo $_SESSION['id'];?>+"&sub="+sub+"&gpa=''&SID=''"+"&ssID=''";
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        disGrade(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function disGrade(response){
                var arr = JSON.parse(response);
                if(arr[0].nop=="not found"){
                    var out1 = "<h2>ไม่พบข้อมูลนักศึกษา</h2>";
                }
                else{
                    var out1 =  "<h2>"+arr[0].SubjectID+
                            "&nbsp"+arr[0].SubjectName+
                            "&nbspsec :"+arr[0].SectionNumber+
                            "</h2>"+
                            "<table><form>";
                    for(i=0;i<arr.length;i++){
                        out1+=  "<tr><td>" +
                                arr[i].StudentID+"&nbsp"+
                                "</td><td>" +
                                arr[i].FirstName+"&nbsp"+
                                "</td><td>" +
                                arr[i].LastName+"&nbsp"+
                                "</td><td>" +
                                "<select class='GPA'>"+
                                "<option value=-1>-</option>"+
                                "<option value=4.00>A</option>"+
                                "<option value=3.50>B+</option>"+
                                "<option value=3.00>B</option>"+
                                "<option value=2.50>C+</option>"+
                                "<option value=2.00>C</option>"+
                                "<option value=1.50>D+</option>"+
                                "<option value=1.00>D</option>"+
                                "<option value=0.00>F</option>"+
                                "</select>"+
                                "</td></tr>";
                    }
                    out1+= "</form></table><br><p><button value='ยืนยัน' onclick='Grade("+JSON.stringify(response)+")'>ยืนยัน</button></p>"
                }
                
                    document.getElementById("menu1").innerHTML = out1;
            }

            function Grade(response){
                var arr = JSON.parse(response);
                var x = document.getElementsByClassName("GPA");
                for(i=0;i<x.length;i++){
                    sendGrade(x[i].value,arr[i].StudentID,arr[i].SubjectSectionID);
                }
                
                swal({
                    type: 'success',
                    title: '<h1>ตัดเกรดเรียบร้อยแล้ว</h1>'
                });
                load();
                
            }

            function sendGrade(gpa,SID,ssID){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-cutgrade-link.php?type=03&inID="+<?php echo $_SESSION['id'];?>+"&sub=0"+"&gpa="+gpa+"&SID="+SID+"&ssID="+ssID;
                    
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

        </script>
     </div>
</body>
</html>