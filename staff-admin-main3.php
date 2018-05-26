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
            <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลอาจารย์</a></li>
            <li><a data-toggle="tab" href="#menu2">ลงทะเบียนอาจารย์</a></li>
        </ul>
     </div>
    <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                <form methode="get" action="staff-admin-main3-upteach.php">
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
                            <h4>วุฒิการศึกษา:</h4>
                            <input type="text" name="EducationBackground" class="check" id="a11"><br>
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
                    
                    
                    <div id="e1" class = "row">
                        <h3>ข้อมูลติดต่อ</h3>
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
                    <div id="e2" class = "row">
                        <h3>สาขา</h3>
                        <div class="col-sm-4" >
                            <?php
                            include "dblink.php";
                            $result = mysqli_query($conn,"SELECT * FROM departmentinfo");
                            echo"<select name = 'Department' class='check department' id='d2'>";
                            echo"<option value = ''>โปรดเลือก</option>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<option value = '".$row['Department']."'>".$row['Faculty'].'  '.$row['Department']."</option>";
                            }
                            echo"</select><br>";
                            ?>
                        </div>
                    </div>
                    <br>    <input type="submit" value="ยืนยัน" id="submit">
                    <div id="alert"></div>
                </form>
            </div>
            
                
        </div>
    </div>
        <script type="text/javascript">

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

        
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+ "/Project/student-main3-link.php";

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
       
        </script>
     </div>
</body>
</html>