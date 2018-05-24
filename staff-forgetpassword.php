<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับบุคลากร</title>
        <style>
            @import "global1.css";
            @import "temphome.css";
            div#content{          
                background-image: url(img/gallery/980x380/065.jpg);
            }
        </style>    

    </head>
    <body>
        <script>           
            function showpw() {
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host+"/Project/staff-forgetpassword-link.php?id="+document.getElementById("id").value+"&email="+document.getElementById("email").value;
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
            <br><a href="staff-home.php" id="back">< back</a>
        </div>
        <div id="main">
            <div id="header">
                <h1>ลืมรหัสผ่าน</h1>
            </div>
            <div id="content">
                <div id="c-top">
                    <form method="post" >
                        <h1>ระบบสารสนเทศ<br>สำหรับบุคลากรของมหาวิทยาลัย</h1>
                        <input type="text" id="id" name="id" placeholder="รหัสประจำตัวบุคลากร"><br>
                        <input type="text" id="email" name="email" placeholder="Email"><br>
                        <div id = "sub">
                            <input type="button" value="ตรวจสอบ" onclick ="showpw()"  >
                        </div>
                    </form>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
        
         
    </body>
</html>