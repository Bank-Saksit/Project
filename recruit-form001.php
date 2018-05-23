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

        <link href ="js/sweetalert2all.js" rel="stylesheet">
		<script src="js/sweetalert21.js"></script>
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
			<!-- <form action = "recruit-form.php" method = "post" accept-charset = "UTF-8"> -->
					<h1>แบบฟอร์มสมัคร</h1>
					ประวัติส่วนตัว<br>
					คำนำหน้า:<br>
					<select name="Prefix">
						<option value="นาย">นาย</option>
						<option value="นางสาว">นางสาว</option>
						<option value="นาง">นาง</option>
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
							<option value="">โปรดเลือก</option>
							<option value="ชาย">ชาย</option>
							<option value="หญิง">หญิง</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					กรุ๊ปเลือด:<br>
					<select name="BloodGroup">
						<option value="">โปรดเลือก</option>
						<option value="A">A</option>
						<option value="AB">AB</option>
						<option value="B">B</option>
						<option value="O">O</option>
					</select><br>
					สัญชาติ:<br>
					<select name="Nationality">
							<option value="">โปรดเลือก</option>
							<option value="ไทย">ไทย</option>
							<option value="จีน">จีน</option>
							<option value="ญี่ปุ่น">ญี่ปุ่น</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					เชื้อชาติ:<br>
					<select name="Race">
							<option value="">โปรดเลือก</option>
							<option value="ไทย">ไทย</option>
							<option value="จีน">จีน</option>
							<option value="ญี่ปุ่น">ญี่ปุ่น</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					ศาสนา:<br>
					<select name="Religion">
							<option value="">โปรดเลือก</option>
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
						 include "dblink.php";
						// $conn = mysqli_connect('localhost','root','');
						// mysqli_select_db($conn,"projectdb");
						// mysqli_query($conn, "SET NAMES UTF8" );
						$result = mysqli_query($conn,"SELECT * FROM schoolinfo");

						echo"<select name = 'School'>";
						echo"<option value = ''>โปรดเลือก</option>";
						while($row = $result->fetch_array(MYSQLI_ASSOC)){
							echo "<option value = '" . $row['SchoolID']."'>".$row['SchoolID'].$row['SchoolName']."</option>";
						}
						echo"</select>";
						?>
					<br>
					ระดับการศึกษา:<br>
					<select name="EducationBackground">
						<option value="">โปรดเลือก</option>
						<option value="ม.6">ม.6</option>
						<option value="ปวช.">ปวช.</option>
					</select><br>
					สาขา:<br>
					<select name="Branch">
						<option value="">โปรดเลือก</option>
						<option value="วิทย์-คณิต">วิทย์-คณิต</option>
						<option value="ศิลป์-คณิต">ศิลป์-คณิต</option>
						<option value="ศิลป์-ภาษา">ศิลป์-ภาษา</option>
					</select><br>
					GPAX:<br>
					<input type="text" name="SchoolGPAX"><br>
					<br>
					โครงการที่สมัคร
					<br>
					โครงการ:<br>
					<?php
						$result = mysqli_query($conn,"SELECT * FROM recruitplaninfo");
						echo"<select name = 'RecruitPlanName'>";
						echo"<option value = ''>โปรดเลือก</option>";
						while($row = $result->fetch_array(MYSQLI_ASSOC)){
							echo "<option value = '" . $row['RecruitPlanName']."'>".$row['RecruitPlanName']."</option>";
						}
						echo"</select>";
					?><br>
					สาขา:<br>
					ลำดับที่ 1 <?php
								// include "dblink.php";
								// $conn = mysqli_connect('localhost','root','');
								// mysqli_select_db($conn,"projectdb");
								// mysqli_query($conn, "SET NAMES UTF8" );
								$result = mysqli_query($conn,"SELECT * FROM departmentinfo");

								echo"<select name = 'Department[]'>";
								echo"<option value = ''>โปรดเลือก";
								while($row = mysqli_fetch_array($result)){
									echo "<option value = '" . $row['Department']."'>".$row['Faculty'].'  '.$row['Department']."</option>";
								}
								echo"</select>";
							?>
					 <button type="button" id="add">+</button>
					 <button type="button" id="remove">-</button>

					 <div id="demo"></div>
					<script type="text/javascript">
						var n = 2;
						if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
						else{	$('button[id="remove"]').prop('disabled', false);	}
						if(n==5){	$('button[id="add"]').prop('disabled', true);	}
						else{	$('button[id="add"]').prop('disabled', false);	}
						
						$(function(){	
							var input = '<select name="Department[]">' +
														'<option value="">โปรดเลือก</option>' +
														'<option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>' +
														'<option value="วิศวกรรมไฟฟ้า">วิศวกรรมไฟฟ้า</option>' +
														'<option value="วิศวกรรมเครื่องกล">วิศวกรรมเครื่องกล</option>' +
														'<option value="วิศวกรรมสิ่งแวดล้อม">วิศวกรรมสิ่งแวดล้อม</option>' +
														'<option value="วิศวกรรมไฟฟ้าสื่อสารและอิเล็กทรอนิกส์">วิศวกรรมไฟฟ้าสื่อสารและอิเล็กทรอนิกส์</option>' +
														'<option value="วิศวกรรมเคมี">วิศวกรรมเคมี</option>' +
														'<option value="วิศวกรรมโยธา">วิศวกรรมโยธา</option>' +
														'<option value="วิทยาการคอมพิวเตอร์ประยุกต์">วิทยาการคอมพิวเตอร์ประยุกต์</option>' +
														'<option value="วิทยาศาสตร์และเทคโนโลยีการอาหาร">วิทยาศาสตร์และเทคโนโลยีการอาหาร</option>' +
														'<option value="ฟิสิกส์ประยุกต์">ฟิสิกส์ประยุกต์</option>' +
														'<option value="จุลชีววิทยา">จุลชีววิทยา</option>' +
														'<option value="เคมี">เคมี</option>' +
														'<option value="เทคโนโลยีการศึกษาและสื่อสารมวลชน">เทคโนโลยีการศึกษาและสื่อสารมวลชน</option>' +
														'<option value="สถาปัตยกรรมภายใน">สถาปัตยกรรมภายใน</option>' +
														'<option value="สถาปัตยกรรม">สถาปัตยกรรม</option>' +
													'</select>';		
							
							// 	// //include "dblink.php";
							// 				// $conn = mysqli_connect('localhost','root','');
							// 				// mysqli_select_db($conn,"projectdb");
							// 				// mysqli_query($conn, "SET NAMES UTF8" );
							// 				// $result = mysqli_query($conn,"SELECT * FROM departmentinfo");

							// var input = '$result = mysqli_query($conn,"SELECT * FROM departmentinfo"); echo"<select name = \'Department[]\'>";echo"<option value = \'\'>โปรดเลือก";while($row = mysqli_fetch_array($result)){echo "<option value = \'" . $row[\'Department\']."\'>".$row[\'Faculty\'].\'  \'.$row[\'Department\']."</option>";}echo"</select>"; ';
							
							// // <?php
							// // 	// include "dblink.php";
							// // 	// $conn = mysqli_connect('localhost','root','');
							// // 	// mysqli_select_db($conn,"projectdb");
							// // 	// mysqli_query($conn, "SET NAMES UTF8" );
							// // 	$result = mysqli_query($conn,"SELECT * FROM departmentinfo");

							// // 	echo"<select name = 'Department[]'>";
							// // 	echo"<option value = ''>โปรดเลือก";
							// // 	while($row = mysqli_fetch_array($result)){
							// // 		echo "<option value = '" . $row['Department']."'>".$row['Faculty'].'  '.$row['Department']."</option>";
							// // 	}
							// // 	echo"</select>";
							// // ?>
							
							 

							$('#add').click(function(){
								$("#demo").append('<span>ลำดับที่' +' '+ n +' '+'</span>'+input+ '<br>' );
								n++;
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
					 
			
				
					
				</form>
					<button id="eiei">submit</button>
					
		</div>	
			<script>
	 		$('#eiei').click(function(){
				swal('สมัครเรียบร้อยยย');
			});	</script>
</body>	
</html>