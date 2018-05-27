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
            font-size:12px;
        }
        th{
            font-size:18px;
            font-weight:normal;
        }
    </style>
    
</head>
<body>
    <div class="top" id="top">
            <a class = "active" href="staff-admin-main.php">นักเรียนสอบเข้าโครงการ</a>
            <a href="staff-admin-main2.php">นักศึกษา</a>
            <a href="staff-admin-main3.php">อาจารย์</a>
            <a href="staff-admin-main4.php">รายวิชา</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
        <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลผู้สมัคร</a></li>
        <li><a data-toggle="tab" href="#menu2">นักเรียนที่จ่ายค่าแรกเข้าแล้ว</a></li>
        <li><a data-toggle="tab" href="#menu4">จำนวนผู้สมัครเข้าแต่ละคณะ</a></li>
        <li><a data-toggle="tab" href="#menu3p5">จำนวนผู้สละสิทธื์แต่ละคณะ</a></li>
        <li><a data-toggle="tab" href="#menu3">ข้อมูลผู้สละสิทธื์ที่ย้ายไปมหาวิทยาลัยอื่น</a></li>
        <li><a data-toggle="tab" href="#menu5">จำนวนผู้สมัครเข้าแต่ละโครงการ</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active"></div>
            <div id="menu2" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
            <div id="menu3p5" class="tab-pane fade">
                
            </div>
            <div id="menu3" class="tab-pane fade">
                
            </div> 
            <div id="menu5" class="tab-pane fade">
                
            </div> 
        </div>
    
    <script>
        loadload();

        function loadload(){
            load1();
            load2();
            load3();
            load4();
            load3p5();
            load5();
        }

        function myFunction() {
            var x = document.getElementById("top");
            if (x.className === "top") {
                x.className += " responsive";
                } 
            else {
                x.className = "top";
                }
        }
        
        //1
        function load1(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-recruit-link1.php";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    display1(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function filter(){
            var filter = document.getElementById("cut").value;
            if(filter == 'ทั้งหมด'){
                loadload();
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-admin-recruit-link-filter-status.php?filter="+filter;
                
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display1(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        }

        function display1(response) {
            var arr = JSON.parse(response);
            var i;
            var but = "<p>คัดกรอง <select id='cut'><option value='ทั้งหมด'>ทั้งหมด</option><option value='รอจ่ายค่าสมัคร'>รอจ่ายค่าสมัคร</option><option value='รอสอบ'>รอสอบ</option><option value='รอสัมภาษณ์'>รอสัมภาษณ์</option><option value='รอยืนยันสิทธิ์'>รอยืนยันสิทธิ์"+
                                            "</option><option value='รอจ่ายค่าเทอม'>รอจ่ายค่าแรกเข้า</option><option value='จ่ายค่าเทอมแล้ว'>จ่ายค่าแรกเข้าแล้ว</option><option value='ไม่ผ่าน'>ไม่ผ่าน</option><option value='สละสิทธิ์'>สละสิทธิ์</option>"+
                                "</select><button onclick=\"filter()\">ค้นหา</button></p><br>";
            var out = "<table>";
            
            for(i = 0; i < arr.length; i++) {
                if(i==0){
                    out += "<tr><td align='center'>รหัสผู้สมัคร</td><td align='center'>คำนำหน้า</td><td align='center'>ชื่อ</td><td align='center'>นามสกุล</td><td align='center'>เบอร์โทรติดต่อ</td><td align='center'>โรงเรียน</td><td align='center'>โครงการ</td><td align='center'>อันดับ</td><td align='center'>คณะ</td><td align='center'>ภาควิชา</td><td align='center'>สถานะ</td><td align='center'>อันดับที่ได้</td><td colspan='4' align='center'>แก้ไข</td></tr>";
                }
                if(arr[i].Status == 'จ่ายค่าเทอมแล้ว'){
                    var sta = 'จ่ายค่าแรกเข้าแล้ว';
                }
                else{
                    var sta = arr[i].Status;
                }
                out += "<tr><td>" + arr[i].RecruitID +
                "</td><td>" + arr[i].Prefix +
                "</td><td>" + arr[i].FirstName+
                "</td><td>" + arr[i].LastName+
                "</td><td>" + arr[i].MobileNumber+
                "</td><td>" + arr[i].SchoolName+
                "</td><td>" + arr[i].RecruitPlanName+
                "</td><td align=\'center\'>" + arr[i].No+
                "</td><td>" + arr[i].Faculty+
                "</td><td>" + arr[i].Department+    
                "</td><td>" + sta +
                "</td><td align=\'center\'>" + arr[i].NoPass+
                // "</td><td>" + arr[i].+
                "</td><td>" +
                "<button onclick=\"updateStatus('"+arr[i].RecruitID+"')\">เปลี่ยนสถานะ</button>"+
                "</td><td>" +
                "<button onclick=\"failed('"+arr[i].RecruitID+"')\">สอบไม่ผ่าน</button>"+
                "</td><td>" +
                "<select name='NPass' id='pass"+i+"'><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select>" + 
                "<button onclick=\"NumberPass('"+arr[i].RecruitID+"','"+i+"')\">ผ่านสัมภาษณ์ เลือกคณะ</button>"+
                "</td><td>" +
                "<button onclick=\"deleteRecruit('"+arr[i].RecruitID+"')\">ลบข้อมูล</button>"+
                "</td></tr>";
            }
            out += "</table>";
            document.getElementById("menu1").innerHTML = but+out;
        }
        
        function updateStatus(RecruitID) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-recruit-link-update.php?RecruitID="+RecruitID;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                loadload();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }

        function failed(RecruitID) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-recruit-link-failed.php?RecruitID="+RecruitID;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                loadload();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }

        function NumberPass(RecruitID,i) {
            var xmlhttp = new XMLHttpRequest();
            var NPass = document.getElementById('pass'+i).value;
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-recruit-link-NumberPass.php?RecruitID="+RecruitID+"&NPass="+NPass;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                loadload();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }

        function deleteRecruit(RecruitID) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-recruit-link-delete.php?RecruitID="+RecruitID;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                loadload();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }

        //2
        function load2(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-recruit-link2.php";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    display2(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function display2(response) {
            var arr = JSON.parse(response);
            var i;
            var out = "<table>";
            
            for(i = 0; i < arr.length; i++) {
                if(i==0){
                    out += "<tr><th align='center'>คณะ</th><th align='center'>ภาควิชา</th><th align='center'>รหัสผู้สมัคร</th><th align='center'>คำนำหน้า</th><th align='center'>ชื่อ</th><th align='center'>นามสกุล</th><th align='center'>รหัสบัตรประชาชน</th><th align='center'>เบอร์โทรติดต่อ</th><th align='center'>โครงการ</th><th align='center'>สถานะ</th><th colspan='4' align='center'>แก้ไข</th></tr>";
                }
                if(arr[i].Status == 'จ่ายค่าเทอมแล้ว'){
                    var sta = 'จ่ายค่าแรกเข้าแล้ว';
                }
                else{
                    var sta = arr[i].Status;
                }
                out += "<tr><th>" + arr[i].Faculty +
                "</th><th>" + arr[i].Department+
                "</th><th>" + arr[i].RecruitID +
                "</th><th>" + arr[i].Prefix +
                "</th><th>" + arr[i].FirstName +
                "</th><th>" + arr[i].LastName +
                "</th><th>" + arr[i].IDCardNumber +
                "</th><th>" + arr[i].MobileNumber +
                "</th><th>" + arr[i].RecruitPlanName +
                "</th><th>" + sta +
                "</th><th>" +
                "<button onclick=\"moveToStudent('"+arr[i].RecruitID+"','"+arr[i].RecruitPlanName+"','"+arr[i].Department+"','"+arr[i].MobileNumber+"','"+arr[i].TelNumber+"','"+
                arr[i].Email+"','"+arr[i].SchoolID+"','"+arr[i].EducationBackground+"','"+arr[i].Branch+"','"+arr[i].SchoolGPAX+"','"+arr[i].IDCardNumber+"','"+arr[i].Prefix+"','"+
                arr[i].FirstName+"','"+arr[i].LastName+"','"+arr[i].Gender+"','"+arr[i].DOB+"','"+arr[i].Nationality+"','"+arr[i].Race+"','"+arr[i].Religion+"','"+arr[i].BloodGroup+"','"+
                arr[i].Address+"','"+arr[i].Province+"','"+arr[i].PostCode+"')\">สร้างรหัสนักศึกษา</button>"+
                "</td><th>" +   
                "<button onclick=\"deleteRecruit('"+arr[i].RecruitID+"')\">ลบข้อมูล</button>"+
                "</td></tr>";
            }
            out += "</table>";
            document.getElementById("menu2").innerHTML =out;
        }
        
        function moveToStudent(RecruitID,RecruitPlanName,Department,MobileNumber,TelNumber,Email,SchoolID,EducationBackground,Branch,SchoolGPAX,IDCardNumber
                                ,Prefix,FirstName,LastName,Gender,DOB,Nationality,Race,Religion,BloodGroup,Address,Province,PostCode) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-recruit-link-moveToStudent.php?RecruitID="+RecruitID+"&RecruitPlanName="+RecruitPlanName+"&Department="+Department+
                        "&MobileNumber="+MobileNumber+"&TelNumber="+TelNumber+"&Email="+Email+"&SchoolID="+SchoolID+"&EducationBackground="+EducationBackground+"&Branch="+Branch+
                        "&SchoolGPAX="+SchoolGPAX+"&IDCardNumber="+IDCardNumber+"&Prefix="+Prefix+"&FirstName="+FirstName+"&LastName="+LastName+"&Gender="+Gender+"&DOB="+DOB+
                        "&Nationality="+Nationality+"&Race="+Race+"&Religion="+Religion+"&BloodGroup="+BloodGroup+"&Address="+Address+"&Province="+Province+"&PostCode="+PostCode;
            alert (url);
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                loadload();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }

        //3
        function load3(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-recruit-link3.php";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    display3(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function filterUni(){
            var filter = document.getElementById("cutuni").value;
            if(filter == 'ทั้งหมด'){
                loadload();
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/staff-admin-recruit-link-filter-uni.php?filter="+filter;
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        display3(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        }

        function display3(response) {
            var arr = JSON.parse(response);
            var i;
            var but = "<p>คัดกรอง <select id='cutuni'><option value='ทั้งหมด'>ทั้งหมด</option><option value='จุฬาลงกรณ์'>จุฬาลงกรณ์มหาวิทยาลัย</option><option value='เกษตรศาสตร์'>มหาวิทยาลัยเกษตรศาสตร์</option><option value='ธรรมศาสตร์'>มหาวิทยาลัยธรรมศาสตร์</option><option value='พระนครเหนือ'>สถาบันเทคโนโลยีพระจอมเกล้าพระนครเหนือ</option>"+
                        "<option value='ลาดกระบัง'>สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง</option><option value='มหิดล'>มหาวิทยาลัยมหิดล</option><option value='อื่น'>อื่นๆ</option>" + 
                                "</select> <button onclick=\"filterUni()\">ค้นหา</button></p><br>";
            
            var out = "<table>";
            for(i = 0; i < arr.length; i++) {
                if(i==0){
                    out += "<tr><th align='center'>รหัสผู้สมัคร</th><th align='center'>คำนำหน้า</th><th align='center'>ชื่อ</th><th align='center'>นามสกุล</th><th align='center'>เบอร์โทรติดต่อ</th><th align='center'>โรงเรียน</th><th align='center'>โครงการ</th><th align='center'>คณะ</th><th align='center'>ภาควิชา</th><th align='center'>สถานะ</th><th align='center'>มหาวิทยาลัยที่ย้ายไป</th></tr>";
                }
                if(arr[i].Status == 'จ่ายค่าเทอมแล้ว'){
                    var sta = 'จ่ายค่าแรกเข้าแล้ว';
                }
                else{
                    var sta = arr[i].Status;
                }
                out += "<tr><th>" + arr[i].RecruitID +
                "</th><th>" + arr[i].Prefix +
                "</th><th>" + arr[i].FirstName+
                "</th><th>" + arr[i].LastName+
                "</th><th>" + arr[i].MobileNumber+
                "</th><th>" + arr[i].SchoolName+
                "</th><th>" + arr[i].RecruitPlanName+
                "</th><th>" + arr[i].Faculty+
                "</th><th>" + arr[i].Department+    
                "</th><th>" + arr[i].Status+
                "</th><th>" + arr[i].MovedUniversityName+
                "</th></tr>";
            }
            out += "</table>";
            document.getElementById("menu3").innerHTML =but+out+"<br><p>รวมทั้งหมด "+arr.length+" คน</p>";
        }

        //4 จำนวนผู้สมัครเข้าแต่ละคณะ
        function load4() {
            <?php
                include "dblink.php";
               
                $result = mysqli_query($conn,"SELECT DISTINCT d.Faculty,count(n.No) AS sum
                                                FROM recruitinfo r, schoolinfo s, nodepartment n, departmentinfo d
                                                WHERE r.SchoolID=s.SchoolID AND r.RecruitID=n.RecruitID AND n.Department=d.Department
                                                AND n.No='1'
                                                GROUP BY d.Faculty");
                echo"var count=0;";
                echo"var out = '<table><tr><th align=\'center\'>คณะ</th><th align=\'center\'>จำนวน(คน)</th></tr>';";
                while($row = mysqli_fetch_array($result)){
                    echo "out += '<tr><th>'+'".$row['Faculty']."'+'</th><th align=\'center\'>'+'".$row['sum']."'+'</th></tr>';";  
                    echo "count += parseInt(".$row['sum'].");";          
                }
                
            ?>
            out += '<tr><th align=\'center\'>รวม</th><th align=\'center\'>'+count+'</th>';
            out += '</table>';
            document.getElementById("menu4").innerHTML = out;
        }
        
        //3p5 จำนวนผู้สละสิทธื์แต่ละคณะ
        function load3p5(){
            <?php
                include "dblink.php";
               
                $result = mysqli_query($conn,"SELECT DISTINCT d.Faculty,d.Department,count(r.recruitID) AS sum
                                                FROM recruitinfo r, schoolinfo s, nodepartment n, departmentinfo d
                                                WHERE r.SchoolID=s.SchoolID AND r.RecruitID=n.RecruitID AND n.Department=d.Department AND r.Status = 'สละสิทธิ์' AND n.No=r.NoPass
                                                GROUP BY d.Department");
                echo"var count=0;";
                echo"var out = '<table><tr><th align=\'center\'>ภาควิชา</th><th align=\'center\'>จำนวน(คน)</th></tr>';";
                while($row = mysqli_fetch_array($result)){
                    echo "out += '<tr><th>'+'".$row['Department']."'+'</th><th align=\'center\'>'+'".$row['sum']."'+'</th></tr>';";  
                    echo "count += parseInt(".$row['sum'].");";          
                }
                
            ?>
            out += '<tr><th align=\'center\'>รวม</th><th align=\'center\'>'+count+'</th></tr>';
            out += '</table>';
            document.getElementById("menu3p5").innerHTML = out;
        }

         //5 จำนวนผู้สมัครเข้าแต่ละโครงการ
        //  function load5(){
        //     <?php
        //         include "dblink.php";
               
        //         $result = mysqli_query($conn,"SELECT p.RecruitPlanName,p.Details,p.RecruitAmount,COUNT(r.RecruitID) AS sum
        //                                         FROM recruitinfo r,recruitplaninfo p 
        //                                         WHERE r.RecruitPlanName = p.RecruitPlanName AND r.Status != 'รอจ่ายค่าสมัคร'
        //                                         GROUP BY p.RecruitPlanName");
        //         echo"var count=0;";
        //         echo"var out = '<table><tr><td align=\'center\'>โครงการ</td><td align=\'center\'>รายละเอียด</td><td align=\'center\'>จำนวนที่รับสมัคร</td><td align=\'center\'>จำนวน(คน)</td></tr>';";
        //         while($row = mysqli_fetch_array($result)){
        //             echo "out += '<tr><th>'+'".$row['RecruitPlanName']."'+'</th><th>'+'".$row['Details']."'+'</th><th align=\'center\'>'+'".$row['RecruitAmount']."'+'</th><th align=\'center\'>'+'".$row['sum']."'+'</th></tr>';";  
        //             echo "count += parseInt(".$row['sum'].");";          
        //         }
                
        //     ?>
        //     out += '<tr><th colspan="3" align=\'center\'>รวม</th><th align=\'center\'>'+count+'</th>';
        //     out += '</table>';
        //     document.getElementById("menu5").innerHTML = out;
            
        // }
            
        function load5(){
            <?php
                include "dblink.php";
               
                $result = mysqli_query($conn,"SELECT Province,COUNT(Province)
                                                FROM studentinfo
                                                GROUP BY Province LIMIT 5");
                echo"var count=0;";
                echo"var out = '<table><tr><td align=\'center\'>โครงการ</td><td align=\'center\'>รายละเอียด</td><td align=\'center\'>จำนวนที่รับสมัคร</td><td align=\'center\'>จำนวน(คน)</td></tr>';";
                while($row = mysqli_fetch_array($result)){
                    echo "out += '<tr><th>'+'".$row['RecruitPlanName']."'+'</th><th>'+'".$row['Details']."'+'</th><th align=\'center\'>'+'".$row['RecruitAmount']."'+'</th><th align=\'center\'>'+'".$row['sum']."'+'</th></tr>';";  
                    echo "count += parseInt(".$row['sum'].");";          
                }
                
            ?>
            out += '<tr><th colspan="3" align=\'center\'>รวม</th><th align=\'center\'>'+count+'</th>';
            out += '</table>';
            document.getElementById("menu5").innerHTML = out;
            
        }

        
    
    </script>
    
    </div>
</body>
</html>