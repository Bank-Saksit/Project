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
            text-align:center;
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
            font-size:18px;
        }
        th{
            font-size:18px;
            font-weight:normal;
        }
        .ei {
            width:15%;
        }
        #ei {
            margin-left:10px;
        }
        #top{
            background-color:#2c437c;
        }
    </style>
    
</head>
<body>
    <div class="top" id="top">
            <a href="staff-admin-main.php">นักเรียนสอบเข้าโครงการ</a>
            <a href="staff-admin-main2.php">นักศึกษา</a>
            <a class = "active" href="staff-admin-main3.php">อาจารย์</a>
            <a href="staff-admin-main4.php">รายวิชา</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลอาจารย์</a></li>
            <li><a data-toggle="tab" href="#menu2">ลงทะเบียนอาจารย์</a></li>
            <li><a data-toggle="tab" href="#menu3">สถิติ</a></li>
        </ul>
     </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                <form methode="get" action="staff-admin-main3-upteach.php">
                    <div id = "ei">
                        <div class = "row">
                            <div class = "col-sm-4"><h2>ประวัติส่วนตัว</h2></div>
                            <div class = "col-sm-5"><h2>ข้อมูลติดต่อ</h2></div>
                            
                        </div>
                        <div class = "row">
                            <div class="col-sm-2" >
                                <p>คำนำหน้า : <br>
                                <input type="text" name="Prefix" class="check" id="a1"></p>
                                <p>ชื่อจริง : <br>
                                <input type="text" name="Fname" class="check" id="a2"></p>
                                <p>นามสกุล : <br>
                                <input type="text" name="Lname" class="check" id="a3"></p>
                                <p>รหัสบัตรประชาชน : <br>
                                <input type="text" name="IDCardNumber" class="check" id="a4"></p>
                                <p>วันเกิด : <br>
                                <input type="date" name="DOB" class="check" id="a5"></p>
                                <p>วุฒิการศึกษา : <br>
                                <input type="text" name="EducationBackground" class="check" id="a11"></p>
                            </div>
                            <div class="col-sm-2" >
                                <p>สัญชาติ : <br>
                                <input type="text" name="Nationality" class="check" id="a8"></p>
                                <p>เชื้อชาติ : <br>
                                <input type="text" name="Race" class="check" id="a9"></p>
                                <p>เพศ : <br>
                                <select name="Gender" class="check" id="a6">
                                        <option value="">โปรดเลือก</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                                </select></p>
                                <p>หมู่เลือด : <br>
                                <select name="BloodGroup" class="check" id="a7">
                                    <option value="">โปรดเลือก</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select></p>
                                <p>ศาสนา : <br>
                                <select name="Religion" class="check" id="a10">
                                        <option value="">โปรดเลือก</option>
                                        <option value="ไทย">พุทธ</option>
                                        <option value="คริสต์">คริสต์</option>
                                        <option value="อิสลาม">อิสลาม</option>
                                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                                </select></p>
                            </div>
                            <div class="col-sm-3" id="e1">
                                <p>ที่อยู่ : <br>
                                <textarea style="resize:none" rows='4' cols='30' name="Address" class="check" id="b1"></textarea></p>
                                <p>จังหวัด:<br>
                                <input type="text" name="Province" class="check" id="b2"></p>
                                <p>รหัสไปรษณีย์:<br>
                                <input type="text" name="PostCode" class="check" id="b3"></p>
                                <br>
                                <h2>สาขา</h2>
                                <p><?php
                                include "dblink.php";
                                $result = mysqli_query($conn,"SELECT * FROM departmentinfo");
                                echo"<select name = 'Department' class='check department' id='d2'>";
                                echo"<option value = ''>โปรดเลือก</option>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<option value = '".$row['Department']."'>".$row['Faculty'].'  '.$row['Department']."</option>";
                                }
                                echo"</select><br>";
                                ?></p>
                                <p><input type="submit" value="ยืนยัน" id="submit"></p>
                                <div id="alert"></div>
                            </div>
                            <div class="col-sm-2" id="e2">
                                <p>เบอร์โทรศัพท์มือถือ : <br>
                                <input type="text" name="MobileNo" class="check" id="b4"></p>
                                <p>เบอร์โทรศัพท์บ้าน:<br>
                                <input type="text" name="TelNo" class="check" id="b5"></p>
                                <p>E-mail:<br>
                                <input type="text" name="Email" class="check" id="b6"></p>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="menu3" class="tab-pane fade in active">
                <div id="menu3-1"></div>
                <div id="menu3-2"></div>
                <div id="menu3-3"></div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
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
            document.getElementById("menu3-3").innerHTML = out2;
        }

        loadreport13();
        function loadreport13() {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-report13.php";
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("menu3-2").innerHTML = xmlhttp.responseText;
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
            document.getElementById("menu3-1").innerHTML = out1;
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

        $(function(){
			$(document).on('click',function(){
			var a1 = document.getElementById("a1").value;
			var a2 = document.getElementById("a2").value;
			var a3 = document.getElementById("a3").value;
			var a4 = document.getElementById("a4").value;
			var a5 = document.getElementById("a5").value;
			var a6 = document.getElementById("a6").value;
			var a7 = document.getElementById("a7").value;
			var a8 = document.getElementById("a8").value;
			var a9 = document.getElementById("a9").value;
			var a10 = document.getElementById("a10").value;
            var a10 = document.getElementById("a11").value;
			var b1 = document.getElementById("b1").value;
			var b2 = document.getElementById("b2").value;
			var b3 = document.getElementById("b3").value;
			var b4 = document.getElementById("b4").value;
			var b5 = document.getElementById("b5").value;
			var b6 = document.getElementById("b6").value;
            var d2 = document.getElementById("d2").value;

				if(a1==""||a2==""||a3=="" ||a4=="" ||a5=="" ||a6=="" ||a7=="" ||a8=="" ||a9=="" ||a10==""
				||a11=="" ||b1==""||b2==""||b3==""||b4==""||b5==""||b6==""||d2==""){
					document.getElementById("alert").innerHTML = '<p>โปรดกรอกข้อมูลให้ครบ</p>';
					$('input[id="submit"]').prop('disabled', true);
				}
				else {
					document.getElementById("alert").innerHTML = '';
					$('input[id="submit"]').prop('disabled', false);
				}
			})
		})
		$('html').bind('keypress', function(e){ //Disable keyboard <enter>
			if(e.keyCode == 13){
				return false;
			}
		});

        load();
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-main3-show.php";

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function displayResponse(response){
            var arr = JSON.parse(response);
            var out = "<h2>ข้อมูลผู้สอน</h2><table><tr><td>ID</td><td>ชื่อ</td><td>ภาควิชา</td><td>เบอร์</td><td>เพิ่มเติม</td></tr>";
            for(i=0;i<arr.length;i++){
                out += "<tr><td>"+ arr[i].StaffID +"</td>"+
                    "<td>"+ arr[i].Prefix + arr[i].FirstName +' '+ arr[i].LastName +"</td>"+
                    "<td>"+ arr[i].Faculty +' '+ arr[i].Department +"</td>"+
                    "<td>"+ arr[i].MobileNumber +"</td>" +
                    "<td><input type='button' id='bt' value='ดูข้อมูล' onclick=\"data("+arr[i].StaffID+")\">"+
                    "<input type='button' id='bt' value='ลบข้อมูล' onclick=\"deleteData("+arr[i].StaffID+")\"></td></tr>";
            }
                out += "</table>";
            document.getElementById("menu1").innerHTML = out;
        }

        function deleteData(staffID){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-main3-deleteData.php?SID="+staffID;
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function data(staffID){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/staff-admin-main3-data.php?SID="+staffID;
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    ShowData(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function ShowData(response){
            var arr = JSON.parse(response);
            var out = "<h2>ข้อมูลผู้สอน</h2>";
            
                out += "รหัสประจำตัว : "+ arr[0].StaffID +"<br>"+
                    "ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +' '+ arr[0].LastName +"<br>"+
                    "เลขบัตรประจำตัวประชาชน : "+ arr[0].IDCardNumber +"<br>" +
                    "วุฒิการศึกษา : "+ arr[0].EducationBackground +"<br>" +
                    "ภาควิชา : "+ arr[0].Faculty +' '+ arr[0].Department +"<br>"+
                    "เป็นที่ปรึกษา : "+ arr[0].ConsultantStatus +"<br>" +
                    "เบอร์โทรศัพมือถือ : "+ arr[0].MobileNumber +"<br>" +
                    "เบอร์โทร : "+ arr[0].TelNumber +"<br>" +
                    "Email : "+ arr[0].Email +"<br>" +
                    "เพศ : "+ arr[0].Gender +"<br>" +
                    "วันเกิด : "+ arr[0].DOB +"<br>" +
                    "สัญชาติ : "+ arr[0].Nationality +"<br>" +
                    "เชื้อชาติ : "+ arr[0].Race +"<br>" +
                    "ศาสนา : "+ arr[0].Religion +"<br>" +
                    "กรุ๊ปเลือด : "+ arr[0].BloodGroup +"<br>" +
                    "<button onclick=\"load()\">ย้อนกลับ</button>";
                
            document.getElementById("menu1").innerHTML = out;
        }
        </script>
     </div>
</body>
</html>