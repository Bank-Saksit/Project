<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศสำหรับอาจารย์</title>
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
            <a class = "active" href="staff-teacher-main.php">ข้อมูลอาจารย์</a>
            <a href="staff-teacher-main2.php">ลงทะเบียนสอน</a>
            <a href="staff-teacher-main3.php">บันทึกและตัดเกรด</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-logout.php" class="logout">ออกจากระบบ</a>
    </div>
   <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li><a data-toggle="tab" href="#menu1">ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ข้อมูลติดต่อ</a></li>
            <li><a data-toggle="tab" href="#menu3">ข้อมูลด้านการศึกษา</a></li>
        </ul>
     </div>
     <div id="main">
        <?php 
            if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'Teacher') {
                
            }
            else{
                header("location: staff-home.php");
                exit('</body></html>');
            }
        ?>
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
            <div id="menu3" class="tab-pane fade">
                
            </div>
        </div>
        <script>
        load();

        function myFunction() {
            var x = document.getElementById("top");
            if (x.className === "top") {
                x.className += " responsive";
                } 
            else {
                x.className = "top";
                }
        }
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol+'//'+location.host+"/Project/staff-teacher-profile-link.php?type=01&inID="+<?php echo $_SESSION['id'];?>;
                
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    display(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        function display(response){
            arr = JSON.parse(response);
                var out1 = "<h3>ข้อมูลส่วนตัว</h3>"+
                        "<p>รหัสประจำตัวบุคคลากร: "+ arr[0].StaffID +"<br>"+
                        "<p>ชื่อ: "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"<br>"+
                        "<p>รหัสบัตรประชาชน: "+arr[0].IDCardNumber+"<br>"+
                        "<p>Email: "+arr[0].Email+"<br>"+
                        "<p>ภาควิชา: "+arr[0].Department+"<br>"+
                        "<p>สถานะการเป็นที่ปรึกษา: "+arr[0].ConsultantStatus+"<br>"+
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
                var out3 = "<h3>ข้อมูลด้านการศึกษา</h3>"+
                        "<p>ระดับการศึกษา: "+arr[0].EducationBackground+"<br>";
                document.getElementById("menu3").innerHTML = out3;

        }
        
        </script>
     </div>
</body>
</html>