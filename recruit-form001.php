<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="layout - form.css" >
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href ="js/jquery-ui.min.css" rel="stylesheet">
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
	<title>Recruit Form</title>
</head>
<body>
		<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
				<a href="#">Home</a>
				<a href="recruit - form001.html">Register</a>
				<a href="#">Profile</a>
				<a href="#">Status</a>
		</div>
			  
		<!-- Use any element to open the sidenav -->
		
		<div id="main">
			<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
			<form>
					<h1>แบบฟอร์มสมัคร</h1>
					ประวัติส่วนตัว<br>
					คำนำหน้า:<br>
					<select name="Prefix">
						<option value="นาย">นาย</option>
						<option value="นางสาว">นางสาว</option>
					</select><br>
					ชื่อจริง:<br>
					<input type="text" name="Fname"><br>
					นามสกุล:<br>
					<input type="text" name="Lname"><br>
					รหัสบัตรประชาชน:<br>
					<input type="text" name="IDCardNumber"><br>
					วันเกิด:<br>
					<input type="date" name="DOB"><br>
					เพศ:<br>
					<select name="Gender">
							<option value="Null">โปรดเลือก</option>
							<option value="ชาย">ชาย</option>
							<option value="หญิง">หญิง</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					กรุ๊ปเลือด:<br>
					<select name="BloodGroup">
						<option value="Null">โปรดเลือก</option>
						<option value="A">A</option>
						<option value="AB">AB</option>
						<option value="B">B</option>
						<option value="O">O</option>
					</select><br>
					สัญชาติ:<br>
					<select name="Nationality">
							<option value="Null">โปรดเลือก</option>
							<option value="ไทย">ไทย</option>
							<option value="จีน">จีน</option>
							<option value="ญี่ปุ่น">ญี่ปุ่น</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					เชื้อชาติ:<br>
					<select name="Race">
							<option value="Null">โปรดเลือก</option>
							<option value="ไทย">ไทย</option>
							<option value="จีน">จีน</option>
							<option value="ญี่ปุ่น">ญี่ปุ่น</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					ศาสนา:<br>
					<select name="Religion">
							<option value="Null">โปรดเลือก</option>
							<option value="ไทย">พุทธ</option>
							<option value="คริสต์">คริสต์</option>
							<option value="อิสลาม">อิสลาม</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					เบอร์โทรศัพท์มือถือ:<br>
					<input type="text" name="MobileNo"><br>
					เบอร์โทรศัพท์บ้าน:<br>
					<input type="text" name="TelNo"><br>
					E-mail:<br>
					<input type="text" name="Email" placeholder="inwza007@hotmail.com"><br><br>
					ที่อยู่ปัจจุบัน<br>
					ที่อยู่:<br>
					<input type="text" name="Address"><br>
					จังหวัด:<br>
					<input type="text" name="Province"><br>
					รหัสไปรษณีย์:<br>
					<input type="text" name="PostCode"><br>
					<br>
					ประวัติการศึกษา<br>
					โรงเรียน:<br>
						<?php
						$link = mysqli_connect('localhost','root','');
						mysqli_select_db($link,"projectdb");
						mysqli_query($link, "SET NAMES UTF8" );
						$result = mysqli_query($link,"SELECT * FROM schoolinfo");

						echo"<select name = 'school'>";
						echo"<option value = ''>โปรดเลือก";
						while($row = mysqli_fetch_array($result)){
							echo "<option value = '" . $row['SchoolID']."'>".$row['SchoolName']."</option>";
						}
						echo"</select>";
						?>
					<br>
					ระดับการศึกษา:<br>
					<select name="EducationBackground">
						<option value="Null">โปรดเลือก</option>
						<option value="ม.6">ม.6</option>
						<option value="ปวช.">ปวช.</option>
					</select><br>
					สาขา:<br>
					<input type="text" name="Branch"><br>
					GPAX:<br>
					<input type="Number" name="SchoolGPAX"><br>
					<br>
					โครงการที่สมัคร
					<br>
					โครงการ:<br>
					<select name="RecruitPlanName">
						<option value="Null">โปรดเลือก</option>
						<option value="2B">2B - KMUTT</option>
						<option value="Clearing House">Clearing House</option>
						<option value="เรียนดี">เรียนดี</option>
						<option value="Ar">Active Recruitment</option>
						<option value="Qu">Quota</option>
					</select><br>
					สาขา:<br>
					ลำดับที่ 1 <select name="Department">
						<option value="Null">โปรดเลือก</option>
						<option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>
						<option value="วิศวกรรมไฟฟ้า">วิศวกรรมไฟฟ้า</option>
					</select>
					 <button type="button" id="add">+</button>
					 <button type="button" id="remove">-</button>

					 <div id="demo"></div>
					<script>
						var n = 2;
						if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
								else{	$('button[id="remove"]').prop('disabled', false);	}
								if(n==5){	$('button[id="add"]').prop('disabled', true);	}
								else{	$('button[id="add"]').prop('disabled', false);	}
						$(function(){	
							var input = '<select name="Department[]">' +
														'<option value="Null">โปรดเลือก</option>' +
														'<option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>' +
														'<option value="วิศวกรรมไฟฟ้า">วิศวกรรมไฟฟ้า</option>' +
													'</select>';		
							$('#add').click(function(){
								$("#demo").append('<span>ลำดับที่' + n + '</span>');
								n++;
								$('#demo').append(input);
								$("#demo").append('<br>');
								if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
								else{	$('button[id="remove"]').prop('disabled', false);	}
								if(n==5){	$('button[id="add"]').prop('disabled', true);	}
								else{	$('button[id="add"]').prop('disabled', false);	}
							})
							$('#remove').click(function(){
								$('#demo > select[name^=Department]:last').remove();
								$("#demo > br:last").remove();
								$("span:last-child").remove();
								n--;
								if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
								else{	$('button[id="remove"]').prop('disabled', false);	}
								if(n==5){	$('button[id="add"]').prop('disabled', true);	}
								else{	$('button[id="add"]').prop('disabled', false);	}
								
							})
						})
					</script>
					 
					<br><br>
					<input type="submit" value="Submit">
					<br>
				</form>
			
				<p>
					if you click the "Submit" button, the form-data will be sent to a page called "action_page.php".
				</p>

		</div>	 
		<script>
				function openNav() {
					document.getElementById("mySidenav").style.width = "250px";
					document.getElementById("main").style.marginLeft = "250px";
				}
				
				function closeNav() {
					document.getElementById("mySidenav").style.width = "0";
					document.getElementById("main").style.marginLeft= "0";
				}
		</script>
</body>
</html>