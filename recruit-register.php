<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครโครงการ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<link href ="js/sweetalert2.all.js" rel="stylesheet">
	<script src="js/sweetalert21.js"></script>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 15%;
            position: relative;
            height: 100%;
        }
        #tab {
            position: absolute;
            right: 0;
            top: 150px;
            text-align: right;
            border-right: 3px solid;
        }
        #tab-content {
            position: absolute;
            top:80px;
			margin-left: 30px;
			width:100%;
        }
        #main {
            float: left;
			position: relative;
			width:80%;
            top: 50px;
            background: #ebebeb;
        }
        #header {
			width: 100%;
			height: 80px;
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
        select {
            margin-bottom: 10px;
		}
		#menu1 {
			width:100%;
		}
		footer {
			width:97%;
		}

    </style>
</head>
<body>
    <form action = "recruit-form.php" method = "post" accept-charset = "UTF-8" id="ismForm" >
     <div id="left">
        <a href="recruit-login.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
		</a>
		<br>
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ประวัติส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ที่อยุ่ปัจจุบัน</a></li>
            <li><a data-toggle="tab" href="#menu3">ประวัติด้านการศึกษา</a></li>
            <li><a data-toggle="tab" href="#menu4">โครงการที่เข้าศึกษา</a></li>
        </ul>
     </div>
     <div id="main">
        <div id="header">
            <h1>สมัครเข้า</h1>
        </div>
        
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
				<h3>ประวัติส่วนตัว</h3>
				<div class = "row">
				<div class="col-sm-4" >
                <h4>คำนำหน้า:</h4>
					<select name="Prefix" class="check" id="a1" >
						<option value="">โปรดเลือก</option>
						<option value="นาย">นาย</option>
						<option value="นางสาว">นางสาว</option>
						<option value="นาง">นาง</option>
					</select>
					<h4>ชื่อจริง:</h4>
					<input type="text" name="Fname" class="check" id="a2"><br>
					<h4>นามสกุล:</h4>
					<input type="text" name="Lname" class="check" id="a3"><br>
					<h4>รหัสบัตรประชาชน:</h4>
					<input type="text" name="IDCardNumber" class="check" id="a4"><br>
					<h4>วันเกิด:</h4>
					<input type="date" name="DOB" class="check" id="a5"><br>
				</div>
				<div class="col-sm-4" >
					<h4>เพศ:</h4>
					<select name="Gender" class="check" id="a6">
							<option value="">โปรดเลือก</option>
							<option value="ชาย">ชาย</option>
							<option value="หญิง">หญิง</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					<h4>หมู่เลือด:</h4>
					<select name="BloodGroup" class="check" id="a7">
						<option value="">โปรดเลือก</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="AB">AB</option>
						<option value="O">O</option>
					</select><br>
					<h4>สัญชาติ:</h4>
					<select name="Nationality" class="check" id="a8">
							<option value="">โปรดเลือก</option>
							<option value="ไทย">ไทย</option>
							<option value="จีน">จีน</option>
							<option value="ญี่ปุ่น">ญี่ปุ่น</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					<h4>เชื้อชาติ:</h4>
					<select name="Race" class="check" id="a9">
							<option value="">โปรดเลือก</option>
							<option value="ไทย">ไทย</option>
							<option value="จีน">จีน</option>
							<option value="ญี่ปุ่น">ญี่ปุ่น</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					<h4>ศาสนา:</h4>
					<select name="Religion" class="check" id="a10">
							<option value="">โปรดเลือก</option>
							<option value="ไทย">พุทธ</option>
							<option value="คริสต์">คริสต์</option>
							<option value="อิสลาม">อิสลาม</option>
							<option value="ไม่ระบุ">ไม่ระบุ</option>
					</select><br>
					</div>	
				</div>
            </div>
            <div id="menu2" class="tab-pane fade">
				<h3>ข้อมูลติดต่อ</h3>
				<div class = "row">
				<div class="col-sm-4" >
                	<h4>ที่อยู่:</h4>
                    <textarea style="resize:none" rows='3' cols='50' name="Address" class="check" id="b1"></textarea><br>
					<h4>จังหวัด:</h4>
					<input type="text" name="Province" class="check" id="b2"><br>
					<h4>รหัสไปรษณีย์:</h4>
					<input type="text" name="PostCode" class="check" id="b3"></p></p>
                    <h4>เบอร์โทรศัพท์มือถือ:</h4>
					<input type="text" name="MobileNo" class="check" id="b4"><br>
					<h4>เบอร์โทรศัพท์บ้าน:</h4>
					<input type="text" name="TelNo" class="check" id="b5"><br>
					<h4>E-mail:</h4>
					<input type="text" name="Email" class="check" id="b6">
				</div>
				</div>
            </div>
            <div id="menu3" class="tab-pane fade">
				<h3>ประวัติด้านการศึกษา</h3>
				<div class = "row">
				<div class="col-sm-4" >
                <h4>โรงเรียน:</h4>
						<?php
						 include "dblink.php";
						$result = mysqli_query($conn,"SELECT * FROM schoolinfo");
						// class="check" id="b"
						echo"<select name = 'School'class='check' id='c1' >";
						echo"<option value = ''>โปรดเลือก</option>";
						while($row = $result->fetch_array(MYSQLI_ASSOC)){
							echo "<option value = '" . $row['SchoolID']."'>".$row['SchoolID'].$row['SchoolName']."</option>";
						}
						echo"</select>";
						?>
					<br>
					<h4>ระดับการศึกษา:</h4>
					<select name="EducationBackground" class="check" id="c2">
						<option value="">โปรดเลือก</option>
						<option value="ม.6">ม.6</option>
						<option value="ปวช.">ปวช.</option>
					</select><br>
					<h4>สาขา:</h4>
					<select name="Branch"class="check" id="c3">
						<option value="">โปรดเลือก</option>
						<option value="วิทย์-คณิต">วิทย์-คณิต</option>
						<option value="ศิลป์-คณิต">ศิลป์-คณิต</option>
						<option value="ศิลป์-ภาษา">ศิลป์-ภาษา</option>
					</select><br>
					<h4>GPAX:</h4>
					<input type="text" name="SchoolGPAX" class="check" id="c4"><br></p>
				</div>
				</div>
            </div>
            <div id="menu4" class="tab-pane fade">
				<h3>โครงการที่เข้าศึกษา</h3>
				<div class = "row">
					<div class="col-sm-4">
					<h4>โครงการ:</h4>
						<?php
							$result = mysqli_query($conn,"SELECT * FROM recruitplaninfo");
							echo"<select name = 'RecruitPlanName' class='check' id='d1'>";
							echo"<option value = ''>โปรดเลือก</option>";
							while($row = $result->fetch_array(MYSQLI_ASSOC)){
								echo "<option value = '" . $row['RecruitPlanName']."'>".$row['RecruitPlanName']."</option>";
							}
							echo"</select>";
						?><br>
					</div>
					<div class="col-sm-4" >
					<h4>สาขา:</h4>
					<span>อันดับที่ 1 </span><?php
								$result = mysqli_query($conn,"SELECT * FROM departmentinfo");

								echo"<select name = 'Department[]' class='check department' id='d2'>";
								echo"<option value = ''>โปรดเลือก</option>";
								while($row = mysqli_fetch_array($result)){
									echo "<option value = '" . $row['Department']."'>".$row['Faculty'].'  '.$row['Department']."</option>";
								}
								echo"</select>";
							?>
							
					 <button type="button" id="add" class="check" >+</button>
					 <button type="button" id="remove" class="check" >-</button>
					 			
					 <div id="demo"></div>
					 <h4>*สามารถเลือกได้สูงสุด4อันดับและระบบจะเลือกความสำคัญตามลำดับ</h4>
					<br>
					<input type="submit" value="ยืนยัน" id="submit">
					<h4><div id="alert"></div></h4>
					<h4><div id="alert1"></div></h4>
					</div>
					</div>
            </div>
			<?php include "recruit-footer.php"; ?>
        </div>
     </div>
	</form>
	
	<script type="text/javascript">
		
		$(function(){
		var n = 2;
		if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
		else{	$('button[id="remove"]').prop('disabled', false);	}
		if(n==5){	$('button[id="add"]').prop('disabled', true);	}
		else{	$('button[id="add"]').prop('disabled', false);	}
			
			<?php
				$result = mysqli_query($conn,"SELECT * FROM departmentinfo");

				echo"var input = '<select name = \"Department[]\" class=\"check department\">'+";
				echo"'<option value = \"\">โปรดเลือก</option>'+";
				while($row = mysqli_fetch_array($result)){
					echo "'<option value = \"" . $row['Department']."\">".$row['Faculty'].'  '.$row['Department']."</option>'+";
				}
				echo"'</select>'";
			?>
			// var input = '<select name="Department[]" class="check department">' +
			// 							'<option value="">โปรดเลือก</option>' +
			// 							'<option value="วิศวกรรมคอมพิวเตอร์">วิศวกรรมคอมพิวเตอร์</option>' +
			// 							'<option value="วิศวกรรมไฟฟ้า">วิศวกรรมไฟฟ้า</option>' +
			// 							'<option value="วิศวกรรมเครื่องกล">วิศวกรรมเครื่องกล</option>' +
			// 							'<option value="วิศวกรรมสิ่งแวดล้อม">วิศวกรรมสิ่งแวดล้อม</option>' +
			// 							'<option value="วิศวกรรมไฟฟ้าสื่อสารและอิเล็กทรอนิกส์">วิศวกรรมไฟฟ้าสื่อสารและอิเล็กทรอนิกส์</option>' +
			// 							'<option value="วิศวกรรมเคมี">วิศวกรรมเคมี</option>' +
			// 							'<option value="วิศวกรรมโยธา">วิศวกรรมโยธา</option>' +
			// 							'<option value="วิทยาการคอมพิวเตอร์ประยุกต์">วิทยาการคอมพิวเตอร์ประยุกต์</option>' +
			// 							'<option value="วิทยาศาสตร์และเทคโนโลยีการอาหาร">วิทยาศาสตร์และเทคโนโลยีการอาหาร</option>' +
			// 							'<option value="ฟิสิกส์ประยุกต์">ฟิสิกส์ประยุกต์</option>' +
			// 							'<option value="จุลชีววิทยา">จุลชีววิทยา</option>' +
			// 							'<option value="เคมี">เคมี</option>' +
			// 							'<option value="เทคโนโลยีการศึกษาและสื่อสารมวลชน">เทคโนโลยีการศึกษาและสื่อสารมวลชน</option>' +
			// 							'<option value="สถาปัตยกรรมภายใน">สถาปัตยกรรมภายใน</option>' +
			// 							'<option value="สถาปัตยกรรม">สถาปัตยกรรม</option>' +
			// 						'</select>';		

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
		
		// $('input[id="submit"]').prop('disabled', true);
		// document.getElementById("alert").innerHTML = 'โปรดกรอกข้อมูลให้ครบ';
		// $(function(){
		// 	$(document).on('change', '.check',function(){
		// 	var a1 = document.getElementById("a1").value;
		// 	var a2 = document.getElementById("a2").value;
		// 	var a3 = document.getElementById("a3").value;
		// 	var a4 = document.getElementById("a4").value;
		// 	var a5 = document.getElementById("a5").value;
		// 	var a6 = document.getElementById("a6").value;
		// 	var a7 = document.getElementById("a7").value;
		// 	var a8 = document.getElementById("a8").value;
		// 	var a9 = document.getElementById("a9").value;
		// 	var a10 = document.getElementById("a10").value;
		// 	var b1 = document.getElementById("b1").value;
		// 	var b2 = document.getElementById("b2").value;
		// 	var b3 = document.getElementById("b3").value;
		// 	var b4 = document.getElementById("b4").value;
		// 	var b5 = document.getElementById("b5").value;
		// 	var b6 = document.getElementById("b6").value;
		// 	var c1 = document.getElementById("c1").value;
		// 	var c2 = document.getElementById("c2").value;
		// 	var c3 = document.getElementById("c3").value;
		// 	var c4 = document.getElementById("c4").value;
		// 	var d1 = document.getElementById("d1").value;
		// 	var d3 = document.getElementsByClassName("department");
		
		// 		if(a1==""||a2==""||a3=="" ||a4=="" ||a5=="" ||a6=="" ||a7=="" ||a8=="" ||a9=="" ||a10==""
		// 		||b1==""||b2==""||b3==""||b4==""||b5==""||b6==""||c1==""||c2==""||c3==""||c4==""||d1==""
		// 		|| (d3[0] && d3[0].value=="") || (d3[1] && d3[1].value=="") || (d3[2] && d3[2].value=="") || (d3[3] && d3[3].value=="")){
		// 			document.getElementById("alert").innerHTML = 'โปรดกรอกข้อมูลให้ครบ';
		// 			$('input[id="submit"]').prop('disabled', true);
		// 		}
		// 		else {
		// 			document.getElementById("alert").innerHTML = '';
		// 			$('input[id="submit"]').prop('disabled', false);
		// 		}
		// 	})
		// })

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
			var b1 = document.getElementById("b1").value;
			var b2 = document.getElementById("b2").value;
			var b3 = document.getElementById("b3").value;
			var b4 = document.getElementById("b4").value;
			var b5 = document.getElementById("b5").value;
			var b6 = document.getElementById("b6").value;
			var c1 = document.getElementById("c1").value;
			var c2 = document.getElementById("c2").value;
			var c3 = document.getElementById("c3").value;
			var c4 = document.getElementById("c4").value;
			var d1 = document.getElementById("d1").value;
			var d3 = document.getElementsByClassName("department");

				if(a1==""||a2==""||a3=="" ||a4=="" ||a5=="" ||a6=="" ||a7=="" ||a8=="" ||a9=="" ||a10==""
				||b1==""||b2==""||b3==""||b4==""||b5==""||b6==""||c1==""||c2==""||c3==""||c4==""||d1==""
				|| (d3[0] && d3[0].value=="") || (d3[1] && d3[1].value=="") || (d3[2] && d3[2].value=="") || (d3[3] && d3[3].value=="")){
					document.getElementById("alert").innerHTML = 'โปรดกรอกข้อมูลให้ครบ';
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

	</script>
</body>
</html>