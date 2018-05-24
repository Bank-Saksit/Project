<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>สำหรับนักศึกษา</title>
        <style>
            @import "global1.css";
            @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/064.jpg);
            } 
        </style>    

    </head>
    <body>
        <script>           
            function showpw() {
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host+"/Project/student-forgetpassword-link.php?id="+document.getElementById("id").value+"&email="+document.getElementById("email").value;
                document.getElementById("id").value=""
                document.getElementById("email").value=""
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        displayResponse(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
            function displayResponse(response){
                document.getElementById("c-bot").innerHTML = response;
            }
            
        </script>
        <div id="left">
            <a href="student-home.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
            </a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ลืมรหัสผ่าน</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" >
                        <h1>สำหรับนักศึกษาใหม่</h1>
                        <h4>กรุณากรอกรหัสนักศึกษาและอีเมลเพื่อสร้างรหัสผ่านใหม่</h4>
                        <div id ="c-in">
                            <input type="text" id="id" name="id" placeholder="รหัสนักศึกษา"><br>
                            <input type="password" id="email" name="email" placeholder="Email"><br>
                            <div id = "sub">
                                <input type="button" value="ตรวจสอบ" onclick ="showpw()"  >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
        
         
    </body>
</html>