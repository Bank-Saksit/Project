<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>สำหรับบุคลากร</title>
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
                position: relative;
            }
            #header > h1 {
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
            div#left > a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
            div#sub > a {
                text-decoration: underline;
                margin: 5px;
                color: #ffffff;
            }
            div#content {
                clear: both;
                width: 100%;
                position: relative;
            }
            #c-top {
                width: 50%;
                height: 350px;
                top: 0;
                text-align: left;
                position: relative;
                background: #444444;
                color: white;
                float: left;
            }
            #c-bot {
                width: 50%;
                height: 350px;
                top: 0;
                text-align: left;
                position: relative;
                background: #444444;
                color: white;
                float: right;
            }
            form{
                
                padding-left : 30px;
            }
            input[type=text] {
                background: #242424;
                margin-top: 10px;
                padding-left: 30px;
                width: 310px;
                height:30px;
                text-align: left;
                color: white;
            }
            ::placeholder {
                color: white;
            }
            input[type=submit] {
                width: 60px;
                background: white;
            }
            input[type=button] {
                font-family: "supermarket";
                width: 60px;
                background: white;
            }
            #sub{
                width: 310px;
                padding-left: 10px;
                margin-top:20px;
                text-align: left;
            }
            div#c-bot >a {
                text-decoration: underline;
                color : white;
            }
            #text{
                padding-left : 30px;
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
                <div id="c-bot">
                    
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
        
         
    </body>
</html>