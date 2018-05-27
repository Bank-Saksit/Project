<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>แก้ไขรหัสผ่าน</title>
    <style>
        @import "global1.css";
        @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/064.jpg);
            }
            .swal2-popup {
                font-size: 2rem;
            }
            /* input[type=submit] {
                color:white;
                background:#3085d6;
            }
            input[type=button] {
                color:white;
                background:#d33;
            } */
    </style>
</head>
<body>
    <?php
        if(!isset($_SESSION['id'])|| !isset($_SESSION['idcard']) || $_SESSION['role'] != 'student'){
            header("location:student-new-login.php");
        }
    ?>
    <div id="left">
            <a href="#" id = "back"></a>
            <!-- <a href="student-new-login.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a> -->
            
    </div>
    <div id="main">
        <div id="header">
             <h1>แก้ไขรหัสผ่าน</h1>
             <!-- <a href="student-new-logout.php">ออกจากระบบ</a> -->
        </div>
        <div id="content">
            <div id="c-left">
                <h1>ข้อมูลนักศึกษา</h1>
                <div id = "c-in">
                    <div id ="data">
                    
                    </div>
                </div>
            </div>
            <div id="c-right">
                <form method="post" action="student-update-pw.php">
                    <h1>สร้างรหัสผ่านใหม่</h1>
                    <div id = "c-in">
                        <input type="password" name="pw" placeholder="รหัสผ่านใหม่"><br>
                        <input type="password" name="pw2" placeholder="ยืนยันรหัสผ่านใหม่"><br>
                        <div id = "sub">
                            <input type="submit" value="ยืนยัน">
                            <input type="button" id="cancle" onclick ="window.location.href='student-new-logout.php'" value = "ยกเลิก">
                        </div>
                    </div>
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
                            " หมู่เลือด "+ arr[0].BloodGroup +"<br>"+
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