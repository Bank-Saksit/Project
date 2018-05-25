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
    <style>
        @import "global1.css";
        @import "temple.css";
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
            <li class = "active"><a data-toggle="tab" href="#menu1">บันทึกเกรดในรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2">เกรดของนักเรียนของแต่ละปี</a></li>
            <li><a data-toggle="tab" href="#menu3">เกรดของนักเรียนของแต่ละรายวิชา</a></li>
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
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-cutgrade-link.php?type=01&inID="+<?php echo $_SESSION['id'];?>+"&sub=0"+"&gpa=''&SID=''";
                    
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
                var out1 = "<form> รายวิชาที่ต้องการตัดเกรด: <select id='sub'>";
                        for(i=0;i<arr.length;i++){
                            out1+="<option value="+arr[i].SubjectSectionID+">"+arr[i].SubjectID+"&nbspsec:"+arr[i].SectionNumber+"&nbsp"+arr[i].SubjectName+"</option>";
                        }
                    out1 += "</select><br>"+
                            "<br><input type='button' value='เลือก' id='edit1' onclick='selectSub()'>"+
                            "</form>";
                    document.getElementById("menu1").innerHTML = out1;
            }

            function selectSub(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementById('sub').value;
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-cutgrade-link.php?type=02&inID="+<?php echo $_SESSION['id'];?>+"&sub="+sub+"&gpa=''&SID=''";
                    
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
                var out1 = "<table><form>";
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
                                "</select><br>"+
                                "</td></tr>";
                    }
                    out1+= "</table><br><input type='button' value='ยืนยัน' onclick='Grade("+JSON.stringify(response)+")'></form>"
                    document.getElementById("menu1").innerHTML = out1;
            }
            function Grade(response){
                var arr = JSON.parse(response);
                var x = document.getElementsByClassName("GPA");
                for(i=0;i<x.length;i++){
                    sendGrade(x[i].value,arr[i].StudentID);
                }
                alert("ตัดเกรดเรียบร้อยแล้ว");
                load();

            }
            function sendGrade(gpa,SID){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-teacher-cutgrade-link.php?type=03&inID="+<?php echo $_SESSION['id'];?>+"&sub=0"+"&gpa="+gpa+"&SID="+SID;
                    
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