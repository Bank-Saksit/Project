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
        td{
            font-size:14px;
        }
        #t{
            font-size:18px;
        }
        #top{
            background-color:#2c437c;
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
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลนักศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu2">นักศึกษาถอนรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">จำนวนนักศึกษาแต่ละภาควิชา</a></li>
            <li><a data-toggle="tab" href="#menu5">จำนวนผู้จบการศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu4">จำนวนนักศึกษาที่ลาออก</a></li>
            <li><a data-toggle="tab" href="#menu6">จำนวนนักศึกษาที่ถูกไล่ออก</a></li>
            <li><a data-toggle="tab" href="#menu7">5 จังหวัดที่นักศึกษาอยู่มากสุด</a></li>
            <li><a data-toggle="tab" href="#menu8">จำนวนผู้สำเร็จการศึกษาและจำนวนผู้กำลังศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu9">จํานวนนักศึกษาใหม่ระดับบปริญญาตรี</a></li>
            <li><a data-toggle="tab" href="#menu10">จํานวนนักศึกษาต่างชาติ</a></li>
            <li><a data-toggle="tab" href="#menu11" onclick = "load7()">จำนวนจำนวนผู้สำเร็จการศึกษาระดับปริญญาตรีปีการศึกษาที่ได้รับเกียรตินิยม จำแนกตามอันดับเกียรตินิยม</a></li>
            <li><a data-toggle="tab" href="#menu12" onclick = "load8()">จํานวนนักศึกษาที่ได้เกรดต่างๆในรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu13" onclick = "load9()">รายวิชาที่มีคนดรอปสูงสุด5อันดับแรก</a></li>
        </ul>
    </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active"></div>
            <div id="menu2" class="tab-pane fade"></div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu5" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
            <div id="menu6" class="tab-pane fade"></div>
            <div id="menu7" class="tab-pane fade"></div>
            <div id="menu8" class="tab-pane fade"></div>
            <div id="menu9" class="tab-pane fade"></div>
            <div id="menu10" class="tab-pane fade"></div>
            <div id="menu11" class="tab-pane fade"></div>
            <div id="menu12" class="tab-pane fade"></div>
            <div id="menu13" class="tab-pane fade"></div>
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
                    load2();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function load2(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=02";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    ssub = JSON.parse(xmlhttp.responseText);
                    load3();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function load3(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=21";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    report1 = JSON.parse(xmlhttp.responseText);
                    load4();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function load4(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=22";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    report2 = JSON.parse(xmlhttp.responseText);
                    load5();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function load5(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-main2-link.php?type=23";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    report3 = JSON.parse(xmlhttp.responseText);
                    load6();
                    display();  
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        //6 จังหวัดที่นักศึกษาอยู่มากสุด 
        function load6(){
            <?php
                include "dblink.php";
                
                //หาจำนวนนศ.ทั้งหมด
                echo"var allMing=0;";
                $result2 = mysqli_query($conn,"SELECT COUNT(StudentID) AS allN 
                                                FROM studentinfo ");
                while($row = mysqli_fetch_array($result2)){
                    echo"allMing = '".$row['allN']."';";
                }
               
                //หาจำนวนนศ.5อันดับแรก+สร้างตาราง
                $result = mysqli_query($conn,"SELECT Province,COUNT(Province) AS sum
                                                FROM studentinfo
                                                GROUP BY Province 
                                                ORDER BY COUNT(Province) DESC LIMIT 3");
                echo"var countMing=0;";
                echo"var outMing = '<h2>5 จังหวัดที่มีนักศึกษาอยู่มากที่สุด</h2><table><tr><td id = \'t\' align=\'center\'>โครงการ</td><td id = \'t\' align=\'center\'>จำนวน(คน)</td><td id = \'t\' align=\'center\'>ร้อยละ</td></tr>';";
                while($row = mysqli_fetch_array($result)){
                    echo "outMing += '<tr><td id = \'t\'>'+'".$row['Province']."'+'</td><td id = \'t\' align=\'center\'>'+'".$row['sum']."'+'</td><td id = \'t\' align=\'center\'>'+parseFloat(parseInt('".$row['sum']."')/allMing*100).toFixed(2)+'</td></tr>';";  
                    echo "countMing += parseInt(".$row['sum'].");";          
                } 
            ?> 
            
            var otherMing = parseInt(allMing)-parseInt(countMing);
            outMing += '<tr><td id = \'t\'>อื่นๆ</td><td id = \'t\' align = \'center\'>'+otherMing+'</td><td id = \'t\'>'+parseFloat(parseInt(otherMing)/parseInt(allMing)*100).toFixed(2)+'</td></tr>';
            outMing += '<tr><td id = \'t\' colspan="1" align=\'center\'>รวม</td><td id = \'t\' align=\'center\'>'+allMing+'</td><td id = \'t\' colspan="1" align=\'center\'>100</td></tr>';
            outMing += '</table>';
            document.getElementById("menu7").innerHTML = outMing;
        }

        function display() {
            var out1 = "<h2>ข้อมูลนักศึกษา</h2><table>";
            for( var i = 0; i < arr.length; i++) {
                if(i==0)
                    out1 += "<tr><td align='center'>รหัสนักศึกษา</td><td align='center'>คณะ</td><td align='center'>ภาควิชา</td><td align='center'>ระดับการศึกษา</td><td align='center'>หลักสูตร</td><td align='center'>เบอร์โทรศัพท์</td><td align='center'>เบอร์โทรศัพท์บ้าน</td><td align='center'>Email</td><td align='center'>สถานะ</td><td align='center'>คำนำหน้า</td><td align='center'>ชื่อ</td><td align='center'>นามสกุล</td><td colspan='4' align='center'>แก้ไข</td></tr>";
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
                "</td><td>" +
                "<button onclick=\"updateStatus('"+arr[i].StudentID+"', '"+arr[i].Status+"')\">เปลี่ยนสถานะ</button>"+
                "</td><td>" +
                "<button onclick=\"sout('"+arr[i].StudentID+"', '0')\">ลาออก</button>"+
                "</td><td>" +
                "<button onclick=\"sout('"+arr[i].StudentID+"', '1')\">ไล่ออก</button>"+
                "</td><td>" +
                "<button onclick=\"sdelete('"+arr[i].StudentID+"')\">ลบข้อมูล</button>"+
                "</td></tr>";
            }
            out1 += "</table>";
            document.getElementById("menu1").innerHTML = out1;

            var out2 = "<h2>นักศึกษาถอนรายวิชา</h2><table>";
            for( var i = 0; i < ssub.length; i++) {
                var secnum;
                if( ssub[i].GPA=='-1' ) secnum = 'ถอนแล้ว';
                else secnum = ssub[i].GPA;
                if(i==0) out2 += "<tr><td id = 't' align='center'>รหัสนักศึกษา</td><td id = 't' align='center'>คณะ</td><td id = 't' align='center'>ภาควิชา</td><td id = 't' align='center'>ระดับการศึกษา</td><td id = 't' align='center'>หลักสูตร</td><td id = 't' align='center'>สถานะ</td><td id = 't' align='center'>คำนำหน้า</td><td id = 't' align='center'>ชื่อ</td><td id = 't' align='center'>นามสกุล</td><td id = 't' align='center'>รหัสวิชา</td><td id = 't' align='center'>กลุ่ม</td><td id = 't' align='center'>GPA</td><td id = 't' align='center'>แก้ไข</td></tr>";
                out2 += "<tr><td id = 't'>" + ssub[i].StudentID +
                "</td><td id = 't'>" + ssub[i].Faculty+
                "</td><td id = 't'>" + ssub[i].Department+
                "</td><td id = 't'>" + ssub[i].Degree+
                "</td><td id = 't'>" + ssub[i].Course+
                "</td><td id = 't'>" + ssub[i].Status+
                "</td><td id = 't'>" + ssub[i].Prefix+    
                "</td><td id = 't'>" + ssub[i].FirstName+
                "</td><td id = 't'>" + ssub[i].LastName+
                "</td><td id = 't'>" + ssub[i].SubjectID+
                "</td><td id = 't'>" + ssub[i].SectionNumber+
                "</td><td id = 't'>" + secnum+
                "</td><td id = 't'>" +
                "<button onclick=\"sdrop('"+ssub[i].StudentID+"', '"+ssub[i].SubjectSectionID+"')\">ถอน</button>"+
                "</td></tr>";
            }
            out2 += "</table>";
            document.getElementById("menu2").innerHTML = out2;

            var countm3 = 0, countw3 = 0;
            var out3 = "<h2>จำนวนนักศึกษาแต่ละนักศึกษา</h2><table>";
            out3 += "<tr><td id = 't' align='center'>ภาควิชา</td><td id = 't' align='center'>ชาย</td><td id = 't' align='center'>หญิง</td><td id = 't' align='center'>รวม</td></tr>";
            for( var i=0 ; i<report1.length ; i++ ){
                out3 += "<tr><td id = 't'>"+report1[i].Department+"</td>";
                if( i+1<report1.length && report1[i].Department==report1[i+1].Department ){
                    var tmp = parseInt(report1[i].Count)+parseInt(report1[i+1].Count);
                    out3 += "<td id = 't' align='center'>"+report1[i].Count+"</td><td id = 't' align='center'>"+report1[i+1].Count+"</td><td id = 't' align='center'>"+tmp+"</td></tr>";
                    i++;
                }
                else if ( report1[i].Gender=='ชาย' ){
                    var tmp = parseInt(report1[i].Count);
                    out3 += "<td id = 't' align='center'>"+report1[i].Count+"</td><td id = 't' align='center'>0</td><td id = 't' align='center'>"+tmp+"</td></tr>";
                }
                else{
                    var tmp = parseInt(report1[i].Count);
                    out3 += "<td id = 't' align='center'>0</td><td id = 't' align='center'>"+report1[i].Count+"</td><td id = 't' align='center'>"+tmp+"</td></tr>";
                }
            }
            for( var i=0 ; i<report1.length ; i++ ){
                if( report1[i].Gender=='ชาย' ) countm3+=parseInt(report1[i].Count);
                else countw3+=parseInt(report1[i].Count);
            }
            out3 += "<tr><td id = 't' align='center'>รวม</td><td id = 't' align='center'>"+countm3+"</td><td id = 't' align='center'>"+countw3+"</td><td id = 't' align='center'>"+(countm3+countw3)+"</td></tr>";
            out3 += "</table>";
            document.getElementById("menu3").innerHTML = out3;

            var c4 = 0;
            var out4 = "<h2>จำนวนนักศึกษาที่ลาออก</h2><table>";
            out4 += "<tr><td id = 't' align='center'>ภาควิชา</td><td id = 't' align='center'>ลาออก</td><td id = 't' align='center'>นักศึกษาทั้งหมด</td><td id = 't' align='center'>อัตราส่วน</td></tr>";
            for( var i=0 ; i<report2.length ; i++ ){
                if ( report2[i].Status=='ลาออก' ){
                    out4 += "<tr><td id = 't'>"+report2[i].Faculty+"</td>";
                    var scount=0;
                    for( var j=0 ; j<arr.length ; j++ ) if( report2[i].Faculty==arr[j].Faculty ) scount++;
                    var tmp = parseInt(report2[i].Count);
                    out4 += "<td id = 't' align='center'>"+tmp+"</td><td id = 't' align='center'>"+scount+"</td><td id = 't' align='center'>"+parseFloat(parseInt(tmp)/scount*100).toFixed(2)+"</td></tr>";
                }
            }
            for( var i=0 ; i<report2.length ; i++ ){
                if( report2[i].Status=='ลาออก' ) c4+=parseInt(report2[i].Count);
            }
            out4 += "<tr><td id = 't' align='center'>รวม</td><td id = 't' align='center'>"+c4+"</td><td id = 't' align='center'>"+arr.length+"</td><td id = 't' align='center'>"+parseFloat(parseInt(c4)/arr.length*100).toFixed(2)+"</td></tr>";
            out4 += "</table>";
            document.getElementById("menu4").innerHTML = out4;

            var countm5 = 0, countw5 = 0;
            var out5 = "<h2>จำนวนผู้จบการศึกษา</h2><table>";
            out5 += "<tr><td id = 't' align='center'>ภาควิชา</td><td id = 't' align='center'>ชาย</td><td id = 't' align='center'>หญิง</td><td id = 't' align='center'>รวม</td></tr>";
            for( var i=0 ; i<report3.length ; i++ ){
                out5 += "<tr><td id = 't'>"+report3[i].Department+"</td>";
                var m=0, w=0;
                for( var j=0 ; j<arr.length ; j++ ){
                    if( arr[j].Department==report3[i].Department && arr[j].Status=='จบการศึกษา' ){
                        if( arr[j].Gender=='ชาย' ){ m++; countm5++ }
                        else{ w++; countw5++; }
                    }
                }
                out5 += "<td id = 't' align='center'>"+m+"</td><td id = 't' align='center'>"+w+"</td><td id = 't' align='center'>"+(m+w)+"</td></tr>";
            }
            out5 += "<tr><td id = 't' align='center'>รวม</td><td id = 't' align='center'>"+countm5+"</td><td id = 't' align='center'>"+countw5+"</td><td id = 't' align='center'>"+(countm5+countw5)+"</td></tr>";
            out5 += "</table>";
            document.getElementById("menu5").innerHTML = out5;

            var c6 = 0;
            var out6 = "<h2>จำนวนนักศึกษาที่ถูกไล่ออก</h2><table>";
            out6 += "<tr><td id = 't' align='center'>ภาควิชา</td><td id = 't' align='center'>ไล่ออก</td><td id = 't' align='center'>นักศึกษาทั้งหมด</td><td id = 't' align='center'>อัตราส่วน</td></tr>";
            for( var i=0 ; i<report2.length ; i++ ){
                if ( report2[i].Status=='ไล่ออก' ){
                    out6 += "<tr><td id = 't'>"+report2[i].Faculty+"</td>";
                    var scount=0;
                    for( var j=0 ; j<arr.length ; j++ ) if( report2[i].Faculty==arr[j].Faculty ) scount++;
                    var tmp = parseInt(report2[i].Count);
                    out6 += "<td id = 't' align='center'>"+tmp+"</td><td id = 't' align='center'>"+scount+"</td><td id = 't' align='center'>"+parseFloat(parseInt(tmp)/scount*100).toFixed(2)+"</td></tr>";
                }
            }
            for( var i=0 ; i<report2.length ; i++ ){
                if( report2[i].Status=='ไล่ออก' ) c6+=parseInt(report2[i].Count);
            }
            out6 += "<tr><td id = 't' align='center'>รวม</td><td id = 't' align='center'>"+c6+"</td><td id = 't' align='center'>"+arr.length+"</td><td id = 't' align='center'>"+parseFloat(parseInt(c6)/arr.length*100).toFixed(2)+"</td></tr>";
            out6 += "</table>";
            document.getElementById("menu6").innerHTML = out6;
        }
        
        loadreport13();
        function loadreport13() {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-report13.php";
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("menu8").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        loadreport14();
        function loadreport14(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-report14.php";

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showreport14(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function showreport14(response){
            var report = JSON.parse(response);
            var out1 = "<h2>จํานวนนักศึกษาใหม่ระดับบปริญญาตรี</h2><table><tr><th rowspan='2'>คณะ</th><th colspan='6'>ประเภทการเข้า</th></tr>"+
                        "<tr><th class='ei'>2B</th><th class='ei'>Active Recruitment</th><th class='ei'>Clearing House</th><th class='ei'>เรียนดี</th><th class='ei'>Admission</th><th class='ei'>รวม</th></tr>";
            var prev = report[0].Faculty;
            var B2 = 0,Active = 0,ch = 0,good = 0,adm = 0,total = 0;
            var tB2 = 0,tActive = 0,tch = 0,tgood = 0,tadm = 0,ttotal =0;
            for(i=0;i<report.length;i++){
                    if(report[i].Faculty.localeCompare(prev)!=0){
                        out1 += "<tr><td>"+prev+"</td><td>"+B2+"</td><td>"+Active+"</td><td>"+ch+"</td><td>"+good+"</td>"+
                            "<td>"+adm+"</td><td>"+total+"</td></tr>";
                        B2 = 0,Active = 0,ch = 0,good = 0,adm = 0,total = 0;
                        prev = report[i].Faculty;
                    }
                    if(report[i].RecruitPlanName.localeCompare("2B")==0){
                        B2 = report[i].Num;
                        tB2 = B2 + tB2;
                    }
                    else if(report[i].RecruitPlanName.localeCompare("Active Recruitment")==0){
                        Active = report[i].Num;
                        tActive = Active + tActive;
                    }   
                    else if(report[i].RecruitPlanName.localeCompare("Admission")==0){
                        adm = report[i].Num;
                        tadm = adm + tadm;
                    }   
                    else if(report[i].RecruitPlanName.localeCompare("Clearing House")==0){
                        ch = report[i].Num;
                        tch = ch + tch;
                    }   
                    else if(report[i].RecruitPlanName.localeCompare("เรียนดี")==0){
                        good = report[i].Num;
                        tgood = good + tgood;
                    }
                    if(report[i].RecruitPlanName.localeCompare(prev)==0){
                        prev = report[i].Faculty;
                    }
                    total = B2 + Active + adm + ch + good;
                    
                }
            ttotal = tadm + tB2 + tActive + tch + tgood;
            out1 += "<tr><td>"+prev+"</td><td>"+B2+"</td><td>"+Active+"</td><td>"+ch+"</td><td>"+good+"</td>"+
                            "<td>"+adm+"</td><td>"+total+"</td></tr>";
            out1 += "<tr><td>รวมทั้งหมด</td><td>"+tB2+"</td><td>"+tActive+"</td><td>"+tch+"</td><td>"+tgood+"</td>"+
                            "<td>"+tadm+"</td><td>"+ttotal+"</td></tr>"
            out1 += "</table>";
            document.getElementById("menu9").innerHTML = out1;
        }

        loadreport12();
        function loadreport12() {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-report12.php";
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    showreport12(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function showreport12(response){
            var report1 = JSON.parse(response);
            var out2 = "<h2>จํานวนนักศึกษาต่างชาติ</h2><table><tr><th>ชื่อสัญชาติ/th><th>ปริญญาตรี</th>"+
                        "<th>ปริญญาโท</th><th>ปริญญาเอก</th><th>รวม</th></tr>";
            var prev = report1[0].Nationality;
            var tee = 0,to = 0,ek = 0,total = 0;
            var ttee = 0,tto = 0,tek = 0,ttotal = 0;
            for(i=0;i<report1.length;i++){
                    if(report1[i].Nationality.localeCompare(prev)!=0){
                        out2 += "<tr><td>"+prev+"</td><td>"+tee+"</td><td>"+to+"</td><td>"+ek+"</td><td>"+total+"</td></tr>";
                        tee = 0,to = 0,ek = 0,total = 0;
                        prev = report1[i].Nationality;
                    }
                    if(report1[i].Degree.localeCompare("ปริญญาตรี")==0){
                        tee = report1[i].Num;
                        ttee = tee + ttee;
                        
                    }
                    else if(report1[i].Degree.localeCompare("ปริญญาโท")==0){
                        to = report1[i].Num;
                        tto = to + tto;
                    }   
                    else if(report1[i].Degree.localeCompare("ปริญญาเอก")==0){
                        ek = report1[i].Num;
                        tek = ek + tek;
                    }   
                    if(report1[i].Degree.localeCompare(prev)==0){
                        prev = report1[i].Faculty;
                    }
                    total = tee + to + ek;
                }
            ttotal = ttee + tto + tek;
            out2 += "<tr><td>"+prev+"</td><td>"+tee+"</td><td>"+to+"</td><td>"+ek+"</td><td>"+total+"</td></tr>";
            out2 += "<tr><td>รวมทั้งหมด</td><td>"+ttee+"</td><td>"+tto+"</td><td>"+tek+"</td><td>"+ttotal+"</td></tr>";
            out2 += "</table>";
            document.getElementById("menu10").innerHTML = out2;
        }


        function updateStatus( sid, st ) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=11";
                url+="&sid="+sid+"&st="+st;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function sout( sid, st ) {
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

        function sdelete( sid ){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=13";
                url+="&sid="+sid;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function sdrop( sid, secid ){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-main2-link.php?type=14";
                url+="&sid="+sid+"&secid="+secid;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        load8();
        function load8(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/report-8.php";
                
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    dis8(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function dis8(response){
            var arr = JSON.parse(response);
            var out7 = "<form><h2>เลือกรายวิชาที่ต้องการดูเกรด : </h2><p><select id='sub'>";
            for(i=0;i<arr.length;i++){
                out7+="<option value="+
                        arr[i].SubjectSectionID+">"+
                        arr[i].SubjectID+
                        "&nbsp"+arr[i].SubjectName+
                        "&nbspsec : "+arr[i].SectionNumber+
                        "&nbspภาคเรียนที่ : "+arr[i].Semester+
                        "&nbspปีการศึกษา : "+arr[i].AcademicYear+
                        "</option>";
            }
            out7 += "</select></p>"+
                    "<p><input type='button' value='ตรวจสอบ' onclick='show8()'></p>"+
                    "</form>";
            document.getElementById("menu12").innerHTML = out7;
        }

        function show8(){
            var xmlhttp = new XMLHttpRequest();
            var sub = document.getElementById('sub').value;
            var url = location.protocol+'//'+location.host+"/Project/report-8-link.php?sub="+sub;
                
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("menu12").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        load7();
        function load7(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/report7.php";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("menu11").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        load9();
        function load9(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/report-9.php";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("menu13").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        </script>

    </div>
</body>
</html>