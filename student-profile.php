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
    <form action = "recruit-form.php" method = "post" accept-charset = "UTF-8">
     <div id="left">
        <br><a href="recruit-login.php" id="back">< back</a>
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ข้อมูลผู้ปกครอง</a></li>
            <li><a data-toggle="tab" href="#menu3">ข้อมูลที่อยู่</a></li>
            <li><a data-toggle="tab" href="#menu4">ข้อมูล???</a></li>
        </ul>
     </div>
     <div id="main">
        <div id="header">
            <h1>ข้อมูลของนักศึกษา</h1>
        </div>
        
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade">
                <h3>ข้อมูลส่วนตัว</h3>
                <p>รหัสนักศึกษา:
                    <?php
						include "dblink.php";
						$result = mysqli_query($conn,"SELECT StudentID FROM studentinfo WHERE StudentID='59070501066'");
						while($row = $result->fetch_array(MYSQLI_ASSOC))
							echo $row['StudentID'];
					?>
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
                <!-- <p>รหัสนักศึกษา:<br>
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
					</select><br> -->
					
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>ที่อยุ่ปัจจุบัน</h3>
                <p>	ที่อยู่:<br>
                    <textarea style="resize:none" row='7' cols='50' name="Address">
                    </textarea><br>
					จังหวัด:<br>
					<input type="text" name="Province"><br>
					รหัสไปรษณีย์:<br>
					<input type="text" name="PostCode"></p></p>
                    เบอร์โทรศัพท์มือถือ:<br>
					<input type="text" name="MobileNo"><br>
					เบอร์โทรศัพท์บ้าน:<br>
					<input type="text" name="TelNo"><br>
					E-mail:<br>
					<input type="text" name="Email">
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>ประวัติด้านการศึกษา</h3>
                <p>โรงเรียน:<br>
						<?php
						 include "dblink.php";
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
					<input type="text" name="SchoolGPAX"><br></p>
            </div>
            <div id="menu4" class="tab-pane fade">
                <h3>โครงการที่เข้าศึกษา</h3>
                <p>โครงการ:<br>
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
					อันดับที่ 1 <?php
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

							$('#add').click(function(){
								$("#demo").append('<span>อันดับที่' +' '+ n +' '+'</span>'+input+ '<br>' );
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
					 *สามารถเลือกได้สูงสุด4อันดับและระบบจะเลือกความสำคัญตามลำดับ
					<br><br>
					<input type="submit" value="Submit">
					<br></p>
            </div>
        </div>
     </div>
    </form>
</body>
</html>