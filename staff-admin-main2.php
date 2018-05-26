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
    </style>
    
</head>
<body>
    <div class="top" id="top">
            <a href="staff-admin-main.php">นักเรียนสอบเข้าโครงการ</a>
            <a class = "active" href="staff-admin-main2.php">นักศึกษา</a>
            <a href="staff-admin-main3.php">อาจารย์</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-home.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">แก้ไขรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2">เพิ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">เพิ่มกลุ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu4">ลบรายวิชา</a></li>
        </ul>
    </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active"></div>
            <div id="menu2" class="tab-pane fade"></div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
        </div>

        <script>
        function myFunction() {
            var x = document.getElementById("top");
            if (x.className === "top") {
                x.className += " responsive";
                } 
            else {
                x.className = "top";
                }
            }

        loadstudent();

        function loadstudent(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=01";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    vstu = JSON.parse(xmlhttp.responseText);
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function loadsubject(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=02";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    vsub = JSON.parse(xmlhttp.responseText);
                    display();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function display() {

            var out1 = "<h2>แก้ไขรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<p>วิชา: <select id='inSub1' onchange='change1()'>";
            for( var i=0 ; i<vsub.length ; i++ )
                out1+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out1+="</select><br><div id='in1'></div></div></div>";
            document.getElementById("menu1").innerHTML = out1;

            var out2 = "<h2>เพิ่มรายวิชา</h2><p>"+
                "<div class = 'row'>"+
                "<div class= 'col-sm-4' >"+
                "<form>"+
                "<p>รหัสวิชา : <input type='text' id='aSID' class='bg'></p>"+
                "<p>ชื่อวิชา : <input type='text' id='aSN' class='bg'></p>"+
                "<p>รายละเอียด : <textarea style='resize: none' rows=3 cols=40 id='aDes' class='bg'></textarea></p>"+
                "<p>หน่วยกิต : <input type='text' id='aCre' class='bg'></p>"+
                "<br><p><input type='button' value='ยืนยัน' onclick='update2()'></p>"+
                "</form>"+
                "</div>"+
                "</div>";
            document.getElementById("menu2").innerHTML = out2;

            var out3 = "<h2>เพิ่มกลุ่มรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<p>วิชา: <select id='inSub3'>";
            for( var i=0 ; i<vsub.length ; i++ )
                out3+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out3+="</select><p>กลุ่ม: <select id='inSec3'>"+
                        "<option value=1>1</option>"+
                        "<option value=2>2</option>"+
                        "<option value=3>3</option>"+
                        "</select>"+
                "<p>เทอมการศึกษา: <select id='inSem3'>"+
                        "<option value=1>1</option>"+
                        "<option value=2>2</option>"+
                        "</select>"+
                "<p>ปีการศึกษา: <input type='text' id='inY' class='bg'></p>"+
                "<p>จำนวนที่นั่ง: <input type='text' id='inSA' class='bg'></p>"+
                "<p>วัน: <input type='text' id='inD' class='bg'></p>"+
                "<p>เวลา: <input type='text' id='inTS' class='bg'> ถึง <input type='text' id='inTE' class='bg'></p>"+
                "<p>ห้องเรียน: <input type='text' id='inR' class='bg'></p>"+
                "<br><p><input type='button' value='ยืนยัน' onclick='update3()'></p>"+
                "</div></div>";
            document.getElementById("menu3").innerHTML = out3;

            var out4 = "<h2>ลบรายวิชา</h2><br><div class = 'row><div class = 'col-sm-8'>"+
                    "<form>"+
                    "<p>วิชา: <select id='inSub4'>";
            for( var i=0 ; i<vsub.length ; i++ )
                out4+="<option value='"+vsub[i].SubjectID+"'>"+vsub[i].SubjectID+"</option>";
            out4 += "</select><br><br><input type='button' value='ยืนยัน' onclick='update4()'></form></div></div>";
            document.getElementById("menu4").innerHTML = out4;

            change1();
        }

        function change1(){
            var sub = document.getElementById('inSub1').value;
            var index;
            for( var i=0 ; i<vsub.length ; i++ )
                if( sub==vsub[i].SubjectID ){ index=i; break;}
            var out = "<p><div class = 'row'>"+
                    "<div class= 'col-sm-4' >"+
                    "<form>"+
                    "<p>รหัสวิชา : <input type='text' id='cSID' class='bg' value='"+vsub[index].SubjectID+"'></p>"+
                    "<p>ชื่อวิชา : <input type='text' id='cSN' class='bg' value='"+vsub[index].SubjectName+"'></p>"+
                    "<p>รายละเอียด : <textarea style='resize: none' rows=3 cols=40 id='cDes' class='bg'>"+vsub[index].Description+"</textarea></p>"+
                    "<p>หน่วยกิต : <input type='text' id='cCre' class='bg' value='"+vsub[index].Credit+"'></p>"+
                    "<br><p><input type='button' value='ยืนยัน' onclick='update1()'></p>"+
                    "</form>"+
                    "</div>"+
                    "</div>";
            document.getElementById("in1").innerHTML = out;
        }

        function update1(){
            var xmlhttp = new XMLHttpRequest();
            var oldID = document.getElementById('inSub1').value;
            var inSID = document.getElementById('cSID').value;
            var inSN = document.getElementById('cSN').value;
            var inDes = document.getElementById('cDes').value;
            var inCre = document.getElementById('cCre').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=11";
                url+="&oldID="+oldID+"&inSID="+inSID+"&inSN="+inSN+"&inDes="+inDes+"&inCre="+inCre;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update2(){
            var xmlhttp = new XMLHttpRequest();
            var inSID = document.getElementById('aSID').value;
            var inSN = document.getElementById('aSN').value;
            var inDes = document.getElementById('aDes').value;
            var inCre = document.getElementById('aCre').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=12";
                url+="&inSID="+inSID+"&inSN="+inSN+"&inDes="+inDes+"&inCre="+inCre;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update3(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('inSub3').value;
            var sec = document.getElementById('inSec3').value;
            var sem = document.getElementById('inSem3').value;
            var year = document.getElementById('inY').value;
            var sa = document.getElementById('inSA').value;
            var day = document.getElementById('inD').value;
            var ts = document.getElementById('inTS').value;
            var te = document.getElementById('inTE').value;
            var room = document.getElementById('inR').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=13";
                url+="&sub="+sub+"&sec="+sec+"&sem="+sem+"&year="+year+"&sa="+sa+"&day="+day+"&ts="+ts+"&te="+te+"&room="+room;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function update4(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('inSub4').value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=14";
                url+="&inSub="+sub;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    loadsubject();
                    display();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        </script>

    </div>
</body>
</html>