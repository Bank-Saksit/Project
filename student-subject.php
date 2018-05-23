<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 250px;
            position: relative;
            height: 100%;
        }
        #tab {
            position: absolute;
            right: 0;
            top: 200px;
            text-align: right;
            border-right: 3px solid;
        }
        #tab-content {
            position: absolute;
            top:70px;
            margin-left: 30px;
        }
        #main {
            width: 950px;
            float: left;
            position: relative;
            top: 50px;
            background: #ebebeb;
        }
        #header {
            width: 100%;
            top: 80px;
            position: relative;
        }
        #header > h1 {
            font-family: "supermarket";
            font-size: 70px;
            position: absolute;
            bottom: 0;
            width: 100%;
            border-bottom: 5px solid;
        }
        li{
            font-size: 20px;
        }
    </style>
    
</head>
<body>
    <form>
     <div id="left">
        <br><a href="recruit-login.php" id="back">< back</a>
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ลงทะเบียนรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2">เพิ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">ย้ายกลุ่ม</a></li>
            <li><a data-toggle="tab" href="#menu4">ลดรายวิชา</a></li>
        </ul>
     </div>
     <div id="main">
        <div id="header">
            <h1>ลงทะเบียนเรียน</h1>
        </div>
        
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade"></div>
            <div id="menu2" class="tab-pane fade"></div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
        </div>
     </div>
    </form>

    <script>
		load();

        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/student-subject-link.php?type=01&inID=59070501066";
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					display(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function display(response) {
            arr = JSON.parse(response);
            var out1 = "<h3>ลงทะเบียนรายวิชา</h3>"+
					"<p>รหัสประจำตัวนักศึกษา: "+ arr[0].StudentID +"<br>"+
                    "<p>ชื่อ: "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"<br>"+
					"<p>รหัสบัตรประชาชน: "+arr[0].IDCardNumber+"<br>"+
					"<p>Email: "+arr[0].Email+"<br>"+
					"<p>ระดับการศึกษา: "+arr[0].Degree+"<br>"+
					"<p>คณะ: "+arr[0].Faculty+"<br>"+
					"<p>ภาควิชา: "+arr[0].Department+"<br>"+
					"<p>หลักสูตร: "+arr[0].Course+"<br>"+
					"<p>สถานะ: "+arr[0].Status+"<br>"+
                    "<br><p>เพศ: "+arr[0].Gender+"<br>"+
					"<form>"+
					"<p>หมู่เลือด: <select id='inBl'>"+
						"<option value='A'>A</option>"+
						"<option value='B'>B</option>"+
						"<option value='AB'>AB</option>"+
						"<option value='O'>O</option>"+
					"</select><br>"+
                    "<p>วันเกิด: <input type='date' id='inDOB' value='"+arr[0].DOB+"'><br>"+
                    "<p>สัญชาติ: <select id='inNa'>"+
						"<option value='ไทย'>ไทย</option>"+
						"<option value='จีน'>จีน</option>"+
						"<option value='ญี่ปุ่น'>ญี่ปุ่น</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
                    "<p>เชื้อชาติ: <select id='inRa'><br>"+
						"<option value='ไทย'>ไทย</option>"+
						"<option value='จีน'>จีน</option>"+
						"<option value='ญี่ปุ่น'>ญี่ปุ่น</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
                    "<p>ศาสนา: <select id='inRe'><br>"+
						"<option value='พุทธ'>พุทธ</option>"+
						"<option value='คริสต์'>คริสต์</option>"+
						"<option value='อิสลาม'>อิสลาม</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
					"<br><input type='button' value='แก้ไข' onclick='update1()'>"+
					"<div id='res1'></div>"
					"</form>";
            document.getElementById("menu1").innerHTML = out1;
			if( arr[0].BloodGroup=='A' )
				document.getElementById('inBl').selectedIndex = '0';
			else if( arr[0].BloodGroup=='B' )
				document.getElementById('inBl').selectedIndex = '1';
			else if( arr[0].BloodGroup=='AB' )
				document.getElementById('inBl').selectedIndex = '2';
			else
				document.getElementById('inBl').selectedIndex = '3';

			if( arr[0].Nationality=='ไทย' )
				document.getElementById('inNa').selectedIndex = '0';
			else if( arr[0].Nationality=='จีน' )
				document.getElementById('inNa').selectedIndex = '1';
			else if( arr[0].Nationality=='ญี่ปุ่น' )
				document.getElementById('inNa').selectedIndex = '2';
			else
				document.getElementById('inNa').selectedIndex = '3';

			if( arr[0].Race=='ไทย' )
				document.getElementById('inRa').selectedIndex = '0';
			else if( arr[0].Race=='จีน' )
				document.getElementById('inRa').selectedIndex = '1';
			else if( arr[0].Race=='ญี่ปุ่น' )
				document.getElementById('inRa').selectedIndex = '2';
			else
				document.getElementById('inRa').selectedIndex = '3';

			if( arr[0].Religion=='พุทธ' )
				document.getElementById('inRe').selectedIndex = '0';
			else if( arr[0].Religion=='คริสต์' )
				document.getElementById('inRe').selectedIndex = '1';
			else if( arr[0].Religion=='อิสลาม' )
				document.getElementById('inRe').selectedIndex = '2';
			else
				document.getElementById('inRe').selectedIndex = '3';

			var out2 = "<h3>ข้อมูลติดต่อ</h3>"+
					"<form>"+
					"<p><h5>ที่อยู่:</h5><textarea style='resize: none' rows=3 cols=50 id='inAdd'>"+arr[0].Address+"</textarea><br>"+
                    "<h5>จังหวัด:</h5><input type='text' id='inPr' value='"+arr[0].Province+"'><br>"+
					"<h5>รหัสไปรษณีย์:</h5><input type='text' id='inPo' value='"+arr[0].Postcode+"'><br>"+
					"<h5>เบอร์โทรศัพท์มือถือ:</h5><input type='text' id='inMN' value='"+arr[0].MobileNumber+"'><br>"+
                    "<h5>เบอร์โทรศัพท์บ้าน:</h5><input type='text' id='inTN' value='"+arr[0].TelNumber+"'><br>"+
					"<br><input type='button' value='แก้ไข' onclick='update2()'>"+
					"<div id='res2'></div>"
					"</form>";
            document.getElementById("menu2").innerHTML = out2;

			/*var out3 = "<h3>ข้อมูลผู้ปกครอง</h3>"+
					"<form>"+
					"<p><h5>ความสัมพันธ์:</h5><select id='inRela'><br>"+
						"<option value='บิดา'>บิดา</option>"+
						"<option value='มารดา'>มารดา</option>"+
						"<option value='พี่'>พี่</option>"+
						"<option value='อื่นๆ'>อื่นๆ</option>"+
					"</select><br>"+
					"<h5>เบอร์โทรศัพท์มือถือ:</h5><input type='text' id='inpMN' value='"+arr[0].pMobileNumber+"'><br>"+
                    "<h5>เบอร์โทรศัพท์บ้าน:</h5><input type='text' id='inpTN' value='"+arr[0].pTelNumber+"'><br>"+
					"<h5>Email:</h5><input type='text' id='inpEm' value='"+arr[0].pEmail+"'><br>"+
					"<h5>รหัสบัตรประชาชน:</h5><input type='text' id='inpID' value='"+arr[0].pIDCardNumber+"'><br>"+
					"<h5>คำนำหน้า:</h5><select id='inpPre'><br>"+
						"<option value='นาย'>นาย</option>"+
						"<option value='นางสาว'>นางสาว</option>"+
						"<option value='นาง'>นาง</option>"+
					"</select><br>"+
					"<h5>ชื่อจริง:</h5><input type='text' id='inpFn' value='"+arr[0].pFirstName+"'><br>"+
					"<h5>นามสกุล:</h5><input type='text' id='inpLn' value='"+arr[0].pLastName+"'><br>"+
					"<h5>เพศ:</h5><select id='inpGe'><br>"+
						"<option value='ชาย'>ชาย</option>"+
						"<option value='หญิง'>หญิง</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
					"<p>วันเกิด: <input type='date' id='inpDOB' value='"+arr[0].pDOB+"'><br>"+
					"<p>สัญชาติ: <select id='inpNa'>"+
						"<option value='ไทย'>ไทย</option>"+
						"<option value='จีน'>จีน</option>"+
						"<option value='ญี่ปุ่น'>ญี่ปุ่น</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
                    "<p>เชื้อชาติ: <select id='inpRa'><br>"+
						"<option value='ไทย'>ไทย</option>"+
						"<option value='จีน'>จีน</option>"+
						"<option value='ญี่ปุ่น'>ญี่ปุ่น</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
                    "<p>ศาสนา: <select id='inpRe'><br>"+
						"<option value='พุทธ'>พุทธ</option>"+
						"<option value='คริสต์'>คริสต์</option>"+
						"<option value='อิสลาม'>อิสลาม</option>"+
						"<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
					"</select><br>"+
					"<p>หมู่เลือด: <select id='inpBl'><br>"+
						"<option value='A'>A</option>"+
						"<option value='B'>B</option>"+
						"<option value='AB'>AB</option>"+
						"<option value='O'>O</option>"+
					"</select><br>"+
					"<p><h5>ที่อยู่:</h5><textarea style='resize: none' rows=3 cols=50 id='inpAdd'>"+arr[0].pAddress+"</textarea><br>"+
                    "<h5>จังหวัด:</h5><input type='text' id='inpPr' value='"+arr[0].pProvince+"'><br>"+
					"<h5>รหัสไปรษณีย์:</h5><input type='text' id='inpPo' value='"+arr[0].pPostcode+"'><br>"+
					"<br><input type='button' value='แก้ไข' onclick='update2()'>"+
					"<div id='res3'></div>"
					"</form>";
            document.getElementById("menu3").innerHTML = out3;
			if( arr[0].Relation=='บิดา' )
				document.getElementById('inRela').selectedIndex = '0';
			else if( arr[0].Relation=='มารดา' )
				document.getElementById('inRela').selectedIndex = '1';
			else if( arr[0].Relation=='พี่' )
				document.getElementById('inRela').selectedIndex = '2';
			else if( arr[0].Relation=='อื่นๆ' )
				document.getElementById('inRela').selectedIndex = '3';
			else
				document.getElementById('inRela').selectedIndex = '-1';

			if( arr[0].pPrefix=='นาย' )
				document.getElementById('inpPre').selectedIndex = '0';
			else if( arr[0].pPrefix=='นางสาว' )
				document.getElementById('inpPre').selectedIndex = '1';
			else if( arr[0].pPrefix=='นาง' )
				document.getElementById('inpPre').selectedIndex = '2';
			else
				document.getElementById('inpPre').selectedIndex = '-1';

			if( arr[0].pGender=='ชาย' )
				document.getElementById('inpGe').selectedIndex = '0';
			else if( arr[0].pGender=='หญิง' )
				document.getElementById('inpGe').selectedIndex = '1';
			else if( arr[0].pGender=='ไม่ระบุ' )
				document.getElementById('inpGe').selectedIndex = '2';
			else
				document.getElementById('inpGe').selectedIndex = '-1';

			if( arr[0].pNationality=='ไทย' )
				document.getElementById('inpNa').selectedIndex = '0';
			else if( arr[0].pNationality=='จีน' )
				document.getElementById('inpNa').selectedIndex = '1';
			else if( arr[0].pNationality=='ญี่ปุ่น' )
				document.getElementById('inpNa').selectedIndex = '2';
			else if( arr[0].pNationality=='ไม่ระบุ' )
				document.getElementById('inpNa').selectedIndex = '3';
			else
				document.getElementById('inpNa').selectedIndex = '-1';

			if( arr[0].pRace=='ไทย' )
				document.getElementById('inpRa').selectedIndex = '0';
			else if( arr[0].pRace=='จีน' )
				document.getElementById('inpRa').selectedIndex = '1';
			else if( arr[0].pRace=='ญี่ปุ่น' )
				document.getElementById('inpRa').selectedIndex = '2';
			else if( arr[0].pRace=='ไม่ระบุ' )
				document.getElementById('inpRa').selectedIndex = '3';
			else
				document.getElementById('inpRa').selectedIndex = '-1';

			if( arr[0].pReligion=='พุทธ' )
				document.getElementById('inpRe').selectedIndex = '0';
			else if( arr[0].pReligion=='คริสต์' )
				document.getElementById('inpRe').selectedIndex = '1';
			else if( arr[0].pReligion=='อิสลาม' )
				document.getElementById('inpRe').selectedIndex = '2';
			else if( arr[0].pReligion=='ไม่ระบุ' )
				document.getElementById('inpRe').selectedIndex = '3';
			else
				document.getElementById('inpRe').selectedIndex = '-1';

			if( arr[0].pBloodGroup=='A' )
				document.getElementById('inpBl').selectedIndex = '0';
			else if( arr[0].pBloodGroup=='B' )
				document.getElementById('inpBl').selectedIndex = '1';
			else if( arr[0].pBloodGroup=='AB' )
				document.getElementById('inpBl').selectedIndex = '2';
			else if( arr[0].pBloodGroup=='O' )
				document.getElementById('inpBl').selectedIndex = '3';
			else
				document.getElementById('inpBl').selectedIndex = '-1';*/

			var out4 = "<h3>ข้อมูลด้านการศึกษา</h3>"+
					"<p>ระดับการศึกษา: "+arr[0].EducationBackground+"<br>"+
					"<p>สาขา: "+arr[0].Branch+"<br>"+
					"<p>GPAX: "+arr[0].SchoolGPAX+"<br>"+
					"<br><p>โรงเรียน: "+arr[0].SchoolName+"<br>"+
					"<p>ที่อยู่: "+arr[0].sAddress+"<br>"+
					"<p>จังหวัด: "+arr[0].sProvince+"<br>"+
					"<p>รหัสไปรษณีย์: "+arr[0].sPostcode+"<br>"+
					"<p>โทรศัพท์: "+arr[0].sTelNumber+"<br>";
            document.getElementById("menu4").innerHTML = out4;
        }

		function update1(){
			var xmlhttp = new XMLHttpRequest();
			var inDOB = document.getElementById('inDOB').value;
			var inBl = document.getElementById('inBl').value;
			var inNa = document.getElementById('inNa').value;
			var inRa = document.getElementById('inRa').value;
			var inRe = document.getElementById('inRe').value;
			var inMN = document.getElementById('inMN').value;
			var inTN = document.getElementById('inTN').value;
            var inAdd = document.getElementById('inAdd').value;
            var url = location.protocol + '//' + location.host+"/Project/student-profile-link.php?type=11&inID="+arr[0].StudentID+
				"&inDOB="+inDOB+"&inBl="+inBl+"&inNa="+inNa+"&inRa="+inRa+"&inRe="+inRe+"&inAdd="+inAdd+"&inMN="+inMN+"&inTN="+inTN;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("res1").innerHTML = "แก้ไขสำเร็จ";
				}
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
		}

		function update2(){
			var xmlhttp = new XMLHttpRequest();
			var inAdd = document.getElementById('inAdd').value;
			var inPr = document.getElementById('inPr').value;
			var inPo = document.getElementById('inPo').value;
			var inMN = document.getElementById('inMN').value;
			var inTN = document.getElementById('inTN').value;
            var url = location.protocol + '//' + location.host+"/Project/student-profile-link.php?type=12&inID="+arr[0].StudentID+
				"&inAdd="+inAdd+"&inPr="+inPr+"&inPo="+inPo+"&inMN="+inMN+"&inTN="+inTN;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("res2").innerHTML = "แก้ไขสำเร็จ";
				}
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
		}

		/*function update3(){
			var xmlhttp = new XMLHttpRequest();
			var inRela = document.getElementById('inRela').value;
			var inpMN = document.getElementById('inpMN').value;
			var inpTN = document.getElementById('inpTN').value;
			var inpEm = document.getElementById('inpEm').value;
			var inpID = document.getElementById('inpID').value;
			var inpPre = document.getElementById('inpPre').value;
			var inpFn = document.getElementById('inpFn').value;
			var inpLn = document.getElementById('inpLn').value;
			var inpGe = document.getElementById('inpGe').value;
			var inpDOB = document.getElementById('inpDOB').value;
			var inpNa = document.getElementById('inpNa').value;
			var inpRa = document.getElementById('inpRa').value;
			var inpRe = document.getElementById('inpRe').value;
			var inpBl = document.getElementById('inpBl').value;
			var inpAdd = document.getElementById('inpAdd').value;
			var inpPr = document.getElementById('inpPr').value;
			var inpPo = document.getElementById('inpPo').value;
            var url = location.protocol + '//' + location.host+"/Project/student-profile-link.php?type=13&inID="+arr[0].StudentID+
				"&inRela="+inRela+"&inpMN="+inpMN+"&inpTN="+inpTN+"&inpEm="+inpEm+"&inpID="+inpID+"&inpPre="+inpPre+"&inpFn="+inpFn+
				"&inpLn="+inpLn+"&inpGe="+inpGe+"&inpDOB="+inpDOB+"&inpNa="+inpNa+"&inpRa="+inpRa+"&inpRe="+inpRe+"&inpBl="+inpBl+
				"&inpAdd="+inpAdd+"&inpPr="+inpPr+"&inpPo="+inpPo;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("res3").innerHTML = "แก้ไขสำเร็จ";
				}
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
		}*/
    </script>
</body>
</html>