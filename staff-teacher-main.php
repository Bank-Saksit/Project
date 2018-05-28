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
    <link href ="js/sweetalert2.all.js" rel="stylesheet" >
	<script src="js/sweetalert21.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import "global1.css";
        @import "temple.css";
        .swal2-popup {
            font-size: 2rem;
        }
        #top{
            background-color:#33b2d6;
        }
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
            <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ข้อมูลติดต่อ</a></li>
            <!-- <li><a data-toggle="tab" href="#menu3">ข้อมูลด้านการศึกษา</a></li> -->
        </ul>
     </div>
     <div id="main">
        <?php 
            if(isset($_SESSION['id4']) && isset($_SESSION['pswd4']) && $_SESSION['role4'] == 'Teacher') {
                
            }
            else{
                header("location: staff-home.php");
                exit('</body></html>');
            }
        ?>
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
            <!-- <div id="menu3" class="tab-pane fade">
                
            </div> -->
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
            var url = location.protocol+'//'+location.host+"/Project/staff-teacher-profile-link.php?type=01&inID="+<?php echo $_SESSION['id4'];?>;
                
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
            var out1 = "<h2>ข้อมูลส่วนตัว</h2><br>"+
                    "<div class = 'row'>"+
                     "<div class= 'col-sm-4' >"+
                        "<p>รหัสประจำตัวบุคคลากร : &nbsp"+ arr[0].StaffID +"</p>"+
                        "<p>ชื่อ : &nbsp"+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</p>"+
                        "<p>รหัสบัตรประชาชน : &nbsp"+arr[0].IDCardNumber+"</p>"+
                        "<p>Email : &nbsp"+arr[0].Email+"</p>"+
                        "<p>เพศ : &nbsp"+arr[0].Gender+"</p>"+
                        "</div>"+
                        "<div class= 'col-sm-4'>"+
                        "<p>ระดับการศึกษา : &nbsp"+arr[0].EducationBackground+"</p>"+
                        "<p>คณะ : &nbsp"+arr[0].Faculty+"</p>"+
                        "<p>ภาควิชา : &nbsp"+arr[0].Department+"</p>"+
                        "<p>สถานะการเป็นที่ปรึกษา : &nbsp"+arr[0].ConsultantStatus+"</p>"+
                     "</div>"+
                     "</div>"+
                     "<div class= 'row'>"+"<br>"+"</div>"+
                     "<div class= 'row'>"+
                     "<div class= 'col-sm-4' >"+
                        "<form>"+
                        "<p>หมู่เลือด : <select id='inBl'>"+
                            "<option value='A'>A</option>"+
                            "<option value='B'>B</option>"+
                            "<option value='AB'>AB</option>"+
                            "<option value='O'>O</option>"+
                        "</select> </p>"+
                        "<p>วันเกิด :<input type='date' id='inDOB' value='"+arr[0].DOB+"'></p>"+
                        "<p>สัญชาติ: <input type = 'text' id='inNa' value ='"+arr[0].Nationality+"'>"+
                        "</p>"+
                        "</div>"+
                        "<div class= 'col-sm-4' >"+
                        "<p>เชื้อชาติ : <input type = 'text' id='inRa' value ='"+arr[0].Race+"'>"+
                        "</p>"+
                        "<p>ศาสนา : <select id='inRe'><br>"+
                            "<option value='พุทธ'>พุทธ</option>"+
                            "<option value='คริสต์'>คริสต์</option>"+
                            "<option value='อิสลาม'>อิสลาม</option>"+
                            "<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
                        "</select> </p>"+
                        "<br><p><input type='button' value='แก้ไข' id='edit1' onclick='update1()'> </p>"+
                        "<div id='res1'></div>"
                        "</form>"+
                        "</div>"+
                        "</div>";
                document.getElementById("menu1").innerHTML = out1;
                
                $(function(){
                    $('#edit1').on('click',function(){
                        swal({
                            title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย</h1>',
                            confirmButtonText:'ตกลง',
                        })
                    })
                })

                // if( arr[0].BloodGroup=='A' )
                //     document.getElementById('inBl').selectedIndex = '0';
                // else if( arr[0].BloodGroup=='B' )
                //     document.getElementById('inBl').selectedIndex = '1';
                // else if( arr[0].BloodGroup=='AB' )
                //     document.getElementById('inBl').selectedIndex = '2';
                // else
                //     document.getElementById('inBl').selectedIndex = '3';

                // if( arr[0].Nationality=='ไทย' )
                //     document.getElementById('inNa').selectedIndex = '0';
                // else if( arr[0].Nationality=='จีน' )
                //     document.getElementById('inNa').selectedIndex = '1';
                // else if( arr[0].Nationality=='ญี่ปุ่น' )
                //     document.getElementById('inNa').selectedIndex = '2';
                // else
                //     document.getElementById('inNa').selectedIndex = '3';

                // if( arr[0].Race=='ไทย' )
                //     document.getElementById('inRa').selectedIndex = '0';
                // else if( arr[0].Race=='จีน' )
                //     document.getElementById('inRa').selectedIndex = '1';
                // else if( arr[0].Race=='ญี่ปุ่น' )
                //     document.getElementById('inRa').selectedIndex = '2';
                // else
                //     document.getElementById('inRa').selectedIndex = '3';

                // if( arr[0].Religion=='พุทธ' )
                //     document.getElementById('inRe').selectedIndex = '0';
                // else if( arr[0].Religion=='คริสต์' )
                //     document.getElementById('inRe').selectedIndex = '1';
                // else if( arr[0].Religion=='อิสลาม' )
                //     document.getElementById('inRe').selectedIndex = '2';
                // else
                    document.getElementById('inRe').selectedIndex = '3';
    
                var out2 = "<h2>ข้อมูลติดต่อ</h2><p>"+
                "<div class = 'row'>"+
                    "<div class= 'col-sm-4' >"+
                    "<form>"+
                    "<p>ที่อยู่ : <textarea style='resize: none' rows=3 cols=40 id='inAdd'>"+arr[0].Address+"</textarea></p>"+
                    "<p>จังหวัด : <input type='text' id='inPr' class='bg' value='"+arr[0].Province+"'></p>"+
                    "<p>รหัสไปรษณีย์ : <input type='text' id='inPo' class='bg' value='"+arr[0].Postcode+"'></p>"+
                    "<p>เบอร์โทรศัพท์มือถือ : <input type='text' id='inMN' class='bg' value='"+arr[0].MobileNumber+"'></p>"+
                    "<p>เบอร์โทรศัพท์บ้าน : <input type='text' id='inTN' class='bg' value='"+arr[0].TelNumber+"'></p>"+
                    "<br><p><input type='button' value='แก้ไข' id='edit2' onclick='update2()'></p>"+
                    "<div id='res2'></div>"
                    "</form>"+
                    "</div>"+
                    "</div>";
                document.getElementById("menu2").innerHTML = out2;
                
                $(function(){
                    $('#edit2').on('click',function(){
                        swal({
                            title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย</h1>',
                            confirmButtonText:'ตกลง',
                        })
                        
                    })
                })
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
            var url = location.protocol + '//' + location.host+"/Project/staff-teacher-profile-link.php?type=11&inID="+arr[0].StaffID+
                "&inDOB="+inDOB+"&inBl="+inBl+"&inNa="+inNa+"&inRa="+inRa+"&inRe="+inRe+"&inAdd="+inAdd+"&inMN="+inMN+"&inTN="+inTN;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
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
            var url = location.protocol + '//' + location.host+"/Project/staff-teacher-profile-link.php?type=12&inID="+arr[0].StaffID+
                "&inAdd="+inAdd+"&inPr="+inPr+"&inPo="+inPo+"&inMN="+inMN+"&inTN="+inTN;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        </script>
     </div>
</body>
</html>