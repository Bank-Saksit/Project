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
        html, body { 
            margin: 0;
            padding: 0;
            background: #dfdfdf;
            color: #444444;
        }
        #main {
                width: 90%;
                float: right;
                position: relative;
                top: 50px;
        }
        #left {
            float: left;
            width: 10%;
            position: relative;
        }
        #back {
            margin: 20px;
            font-weight: bold;
        }
        #header {
            width: 100%;
            top: 100px;
            position: relative;
        }
        #header > h1 {
            font-size: 50px;
            position: absolute;
            bottom: 0;
            width: 100%;
            border-bottom: 5px solid;
        }
        #c-left > h1{
            margin-left: 30px;
        }
        div#left > a {
            text-decoration: none;
            margin: 5px;
            color: #444444;
        }
        div#content {
            clear: both;
            width: 100%;
            position: relative;
            height: 450px;
            top: 110px;
        }
        #c-left {
            width: 50%;
            height: 350px;
            top: 0;
            text-align: left;
            position: relative;
            background: gray;
            color: white;
            float: left;
        }
        #c-right {
            width: 50%;
            height: 350px;
            top: 0;
            text-align: left;
            position: relative;
            background: #444444;
            color: #ffffff;
            float: right;
        }
        #data{
            margin-left: 30px;
            padding-left:20px; 
            width:85%;
            background: #242424;
        }
        form{
            padding-left : 30px;
        }
        input[type=text] {
            background: #242424;
            margin-top: 0px;
            padding-left: 30px;
            width: 310px;
            height:30px;
            text-align: left;
            color: white;
        }
        ::placeholder {
            color: white;
        }
        input[type=password] {
            background: #242420;
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
        #cancle{
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
        if(!isset($_SESSION['id'])){
            header("location:student-new-login.php");
        }
    ?>
    <div id="left">
        <br><a href="student-new-logout.php" id="back">< logout</a>
    </div>
    <div id="main">
        <div id="header">
             <h1>แก้ไขรหัสผ่าน</h1>
        </div>
        <div id="content">
            <div id="c-left">
                <h1>ข้อมูลนักศึกษา</h1>
                <div id ="data">
                    
                </div>
            </div>
            <div id="c-right">
                <form method="post">
                    <h1>สร้างรหัสผ่านใหม่</h1>
                    <input type="text" id="id" placeholder="รหัสผ่านใหม่"><br>
                    <input type="password" id="pswd" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                    <input type="submit" value="ยืนยัน">
                    <button id="cancle">ยกเลิก</button>
                </form>
            </div>
        </div>
            
        <script>
            load();
                    
            function load(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host+"/Project/student-changepw-link.php?inID="+<?php echo $_SESSION['id'];?>;
                        
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
                            "รหัสนักศึกษา "+ arr[0].StudentID +"<br>"+
                            "วันเกิด "+ arr[0].DOB +
                            " อายุ "+ age +" ปี"+
                            " กลุ่มเลือด "+ arr[0].BloodGroup +"<br>"+
                            "รหัสประจำตัวประชาชน "+ arr[0].IDCardNumber +"<br>"+
                            "ที่อยู่ "+ arr[0].Address +"<br>"+
                            "คณะ "+ arr[0].Faculty +"<br>"+
                            "ภาควิชา "+ arr[0].Department;
            
                document.getElementById("data").innerHTML = out;
            }
        </script>
         <?php include "recruit-footer.php"; ?>
    </div>    
    
</body>
</html>