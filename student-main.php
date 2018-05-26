<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศเพื่อการบริหารการศึกษา</title>
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
    </style>
    
</head>
<body>
    <?php 
        if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'student') {
            
        }
        else{
            header("location: student-home.php");
            exit('</body></html>');
        }
    ?>
    <div class="top" id="top">
            <a class = "active" href="student-main.php" >ข้อมูลนักศึกษา</a>
            <a href="student-main2.php">ลงทะเบียนเรียน</a>
            <a href="student-main3.php">ตารางเรียน</a>
            <a href="student-main4.php">ผลการเรียน</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="student-logout.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1" > ข้อมูลส่วนตัว</a></li>
            <li><a data-toggle="tab" href="#menu2">ข้อมูลติดต่อ</a></li>
            <!-- <li><a data-toggle="tab" href="#menu3">ประวัติด้านการศึกษา</a></li> -->
            <li><a data-toggle="tab" href="#menu4">ข้อมูลด้านการศึกษา</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active"></div>
            <div id="menu2" class="tab-pane fade"></div>
            <!-- <div id="menu3" class="tab-pane fade"></div> -->
            <div id="menu4" class="tab-pane fade"></div>
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
                var url = location.protocol+'//'+location.host+"/Project/student-profile-link.php?type=01&inID="+<?php echo $_SESSION['id'] ?>;
                
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
                var out1 = "<h2>ข้อมูลส่วนตัว</h2><br>"+
                    "<div class = 'row'>"+
                     "<div class= 'col-sm-4' >"+
                        "<p>รหัสประจำตัวนักศึกษา : &nbsp"+ arr[0].StudentID +"</p>"+
                        "<p>ชื่อ : &nbsp"+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</p>"+
                        "<p>รหัสบัตรประชาชน : &nbsp"+arr[0].IDCardNumber+"</p>"+
                        "<p>Email : &nbsp"+arr[0].Email+"</p>"+
                        "<p>เพศ : &nbsp"+arr[0].Gender+"</p>"+
                        "</div>"+
                        "<div class= 'col-sm-4'>"+
                        "<p>ระดับการศึกษา : &nbsp"+arr[0].Degree+"</p>"+
                        "<p>คณะ : &nbsp"+arr[0].Faculty+"</p>"+
                        "<p>ภาควิชา : &nbsp"+arr[0].Department+"</p>"+
                        "<p>หลักสูตร : &nbsp"+arr[0].Course+"</p>"+
                        "<p>สถานะ : &nbsp"+arr[0].Status+"</p>"+
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
                        "</select></p>"+
                        "<p>วันเกิด : <input type='date' id='inDOB' value='"+arr[0].DOB+"'></p>"+
                        "<p>สัญชาติ: <select id='inNa'>"+
                            "<option value='ไทย'>ไทย</option>"+
                            "<option value='จีน'>จีน</option>"+
                            "<option value='ญี่ปุ่น'>ญี่ปุ่น</option>"+
                            "<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
                        "</select></p>"+
                        "</div>"+
                        "<div class= 'col-sm-4' >"+
                        "<p>เชื้อชาติ : <select id='inRa'><br>"+
                            "<option value='ไทย'>ไทย</option>"+
                            "<option value='จีน'>จีน</option>"+
                            "<option value='ญี่ปุ่น'>ญี่ปุ่น</option>"+
                            "<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
                        "</select></p>"+
                        "<p>ศาสนา : <select id='inRe'><br>"+
                            "<option value='พุทธ'>พุทธ</option>"+
                            "<option value='คริสต์'>คริสต์</option>"+
                            "<option value='อิสลาม'>อิสลาม</option>"+
                            "<option value='ไม่ระบุ'>ไม่ระบุ</option>"+
                        "</select></p>"+
                        "<br><p><input type='button' value='แก้ไข' id='edit1' onclick='update1()'></p>"+
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

                var out2 = "<h2>ข้อมูลติดต่อ</h2><p>"+
                    "<div class = 'row'>"+
                     "<div class= 'col-sm-4' >"+
                        "<form>"+
                        "<p>ที่อยู่ : <textarea style='resize: none' rows=3 cols=40 id='inAdd'>"+arr[0].Address+"</textarea></p>"+
                        "<p>จังหวัด : <input type='text' id='inPr' class='bg' value='"+arr[0].Province+"'></p>"+
                        "<p>รหัสไปรษณีย์ : <input type='text' id='inPo' class='bg' value='"+arr[0].Postcode+"'></p>"+
                        "</div>"+"<div class= 'col-sm-4' >"+
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

                /*var out3 = "<h3>ข้อมูลผู้ปกครอง</h3>"+
                        "<form>"+
                        "<p><p>ความสัมพันธ์:</p><select id='inRela'><br>"+
                            "<option value='บิดา'>บิดา</option>"+
                            "<option value='มารดา'>มารดา</option>"+
                            "<option value='พี่'>พี่</option>"+
                            "<option value='อื่นๆ'>อื่นๆ</option>"+
                        "</select><br>"+
                        "<p>เบอร์โทรศัพท์มือถือ:</p><input type='text' id='inpMN' value='"+arr[0].pMobileNumber+"'><br>"+
                        "<p>เบอร์โทรศัพท์บ้าน:</p><input type='text' id='inpTN' value='"+arr[0].pTelNumber+"'><br>"+
                        "<p>Email:</p><input type='text' id='inpEm' value='"+arr[0].pEmail+"'><br>"+
                        "<p>รหัสบัตรประชาชน:</p><input type='text' id='inpID' value='"+arr[0].pIDCardNumber+"'><br>"+
                        "<p>คำนำหน้า:</p><select id='inpPre'><br>"+
                            "<option value='นาย'>นาย</option>"+
                            "<option value='นางสาว'>นางสาว</option>"+
                            "<option value='นาง'>นาง</option>"+
                        "</select><br>"+
                        "<p>ชื่อจริง:</p><input type='text' id='inpFn' value='"+arr[0].pFirstName+"'><br>"+
                        "<p>นามสกุล:</p><input type='text' id='inpLn' value='"+arr[0].pLastName+"'><br>"+
                        "<p>เพศ:</p><select id='inpGe'><br>"+
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
                        "<p><p>ที่อยู่:</p><textarea style='resize: none' rows=3 cols=50 id='inpAdd'>"+arr[0].pAddress+"</textarea><br>"+
                        "<p>จังหวัด:</p><input type='text' id='inpPr' value='"+arr[0].pProvince+"'><br>"+
                        "<p>รหัสไปรษณีย์:</p><input type='text' id='inpPo' value='"+arr[0].pPostcode+"'><br>"+
                        "<br><input type='button' value='แก้ไข' id='edit3' onclick='update2()'>"+
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

                var out4 = "<h2>ข้อมูลด้านการศึกษา</h2><p>"+
                    "<div class = 'row'>"+
                     "<div class= 'col-sm-4' >"+
                        "<p>ระดับการศึกษา : &nbsp"+arr[0].EducationBackground+"</p>"+
                        "<p>สาขา : &nbsp"+arr[0].Branch+"</p>"+
                        "<p>GPAX : &nbsp"+arr[0].SchoolGPAX+"</p>"+
                        "</div>"+
                        "<div class= 'col-sm-4' >"+
                        "<p>โรงเรียน : &nbsp"+arr[0].SchoolName+"</p>"+
                        "<p>ที่อยู่ : &nbsp"+arr[0].sAddress+"</p>"+
                        "<p>จังหวัด : &nbsp"+arr[0].sProvince+"</p>"+
                        "<p>รหัสไปรษณีย์ : &nbsp"+arr[0].sPostcode+"</p>"+
                        "<p>โทรศัพท์ : &nbsp"+arr[0].sTelNumber+"</p>"+
                        "</div>"+
                        "</div>";
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
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }*/

            // function myFunction() {
            //     var x = document.getElementById("top");
            //     if (x.className === "top") {
            //         x.className += " responsive";
            //     } 
            //     else {
            //         x.className = "top";
            //     }
            // }
        </script>
    </div>
</body>
</html>