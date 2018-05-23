<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขรหัสผ่าน</title>
    <style>
        @import "global1.css";
        #main {
                width: 90%;
                float: right;
                position: relative;
                top: 50px;
        }
        #c-left > h1{
            margin-left: 30px;
        }
        div#left > a {
            margin: 5px;
        }
        div#content {
            width: 100%;
            background-image: url(img/gallery/980x380/065.jpg);
        }
        
        #c-left {
            width: 50%;
            height: 350px;
            top: 0;
            text-align: left;
            position: relative;
            color: white;
            float: left;
        }
        #c-right {
            width: 50%;
            height: 350px;
            top: 0;
            text-align: left;
            position: relative;
            color: #ffffff;
            float: left;
        }
        #data{
            margin-left: 30px;
            padding-left:20px; 
            width:85%;
            background-color:rgba(0,0,0,0.8);
        }
        form{
            padding-left : 30px;
        }
        input[type=text] {
            background-color:rgba(0,0,0,0.8);
            margin-top: 0px;
            padding-left: 30px;
            width: 310px;
            height:30px;
            text-align: left;
            color: white;
        }
        input[type=password] {
            background-color:rgba(0,0,0,0.8);
            margin-top: 15px;
            padding-left: 30px;
            width: 310px;
            height: 30px;
            text-align: left;
            color: white;
        }
        input[type=submit] {
            margin-top: 20px;
            margin-left: 10px;
            width: 60px;
            background: white;
        }
        input[type=button]{
            font-family: "supermarket";
            width: 60px;
            margin-top: 20px;
            margin-left: 25px;
            background: white;
        }
    </style>
</head>
<body>
    
    <?php
        if(!isset($_SESSION['id'])||!isset($_SESSION['idcard'])||$_SESSION['role']!='staff'){
            header("location:staff-new-login.php");
        }
    ?>
    <div id="left">
        <br><a href="staff-new-logout.php" id="back">< logout</a>
    </div>
    <div id="main">
        <div id="header">
             <h1>แก้ไขรหัสผ่าน</h1>
        </div>
        <div id="content">
            <div id="c-left">
                <h1>ข้อมูลบุคลากร</h1>
                <div id ="data">
                    
                </div>
            </div>
            <div id="c-right">
                <form method="post" action ="staff-update-pw.php" >
                    <h1>สร้างรหัสผ่านใหม่</h1>
                    <input type="password" name="pw" placeholder="รหัสผ่านใหม่"><br>
                    <input type="password" name="pw2" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                    <input type="submit" value="ยืนยัน">
                    <input type="button" id="cancle" onclick ="window.location.href='staff-new-logout.php'" value = "ยกเลิก">
                </form>
                
            </div>
        </div>
            
        <script>
            load();
                    
            function load(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host+"/Project/staff-changepw-link.php?inID="+<?php echo $_SESSION['id'];?>;
                        
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        displayResponse(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
                    
            function displayResponse(response) {
                var arr = JSON.parse(response);
                var i;
                var age;
                age = 18;
            
                var out = "ชื่อ "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"<br>"+
                            "รหัสประจำตัวบุคคลากร "+ arr[0].StaffID +"<br>"+
                            "วันเกิด "+ arr[0].DOB +
                            " อายุ "+ age +" ปี"+
                            " หมู่เลือด "+ arr[0].BloodGroup +"<br>"+
                            "รหัสประจำตัวประชาชน "+ arr[0].IDCardNumber +"<br>"+
                            "ที่อยู่ "+ arr[0].Address +"<br>"+
                            "ภาควิชา "+ arr[0].Department;
            
                document.getElementById("data").innerHTML = out;
            }
        </script>
         <?php include "recruit-footer.php"; ?>
    </div>    
    
</body>
</html>