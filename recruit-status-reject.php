<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สละสิทธิ์</title>
    <style>
        @import "global1.css";
        #sm,#sm-sub {
            width: 100px;
            height: 40px;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }
        #profile,#detail {
            margin-left:30%;
        }
        #button {
            margin-left:30px;
        }

    </style>
</head>
<body>
    <?php
    include "recruit-checkLog.php";
    ?>
    <div id="left">
        <a href="#" id="back"> < ออกจากระบบ </a>
    </div>
    <div id="main">
        <div id="header">
            <h1>สละสิทธิ์</h1>
        </div>
        <div id="content">
        <div id="profile"></div>
            <form>
                <div id="detail"></div>
                <div id="test"> </div>
            </form>
        </div>
    </div>
    

    <script>
        load();
        
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-confirm-link.php?inID=" +
            <?php echo $_SESSION['id']; ?>
            
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
        
        function displayResponse(response) {
            arr = JSON.parse(response);
            var out = "<h3>รหัสประจำตัวผู้สมัคร : "+ arr[0].RecruitID +"</h3>"+
                    "<h3>ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</h3>";
            document.getElementById("profile").innerHTML = out;

            var outlist =
                "<h3>ชื่อมหาวิทยาลัยที่เลือกศึกษาต่อ</h3>"+
                "<select name=\"inUni\" id=\"inUni\" onchange=\"otherField(this.value)\">"+
                    "<option value=\"ลาดกระบัง\">ลาดกระบัง</option>"+
                    "<option value=\"พระนครเหนือ\">พระนครเหนือ</option>"+
                    "<option value=\"จุฬา\">จุฬา</option>"+
                    "<option value=\"ธรรมศาสตร์\">ธรรมศาสตร์</option>"+
                    "<option value=\"มหิดล\">มหิดล</option>"+
                    "<option value=\"เกษตร\">เกษตร</option>"+
                    "<option value=\"มช\">มช</option>"+
                    "<option value=\"ABAC\">ABAC</option>"+
                    "<option value=\"ราม\">ราม</option>"+
                    "<option value=\"other\">อื่นๆ</option>"+
                "</select>"+
                "<br>เหตุผล<br>"+
                "<textarea rows=3 cols=50 name=\"reason\" style=\"resize:none\"></textarea><br>"+
                "<div id='button'>"+
                "<input id='sm-sub' type=\"button\" value=\"ยืนยัน\" onclick=\"update()\">"+
                "<input id='sm' type=\"button\" value=\"ย้อนกลับ\" onclick=\"window.location.href='recruit-status.php'\">"+
                "</div>";
            document.getElementById("detail").innerHTML = outlist;
        }

        function update() {
            var xmlhttp = new XMLHttpRequest();
            var uni = document.getElementById("inUni").value;
            if( uni=="other" ){
                uni = document.getElementById("other").value;
            }
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-reject-link.php?inID="+arr[0].RecruitID+"&inUni="+uni;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function otherField(val) {
            if( val=="other" )
                document.getElementById("test").innerHTML = "โปรดระบุ: <input type=\"text\" name=\"other\" id=\"other\"><br>";
            else
                document.getElementById("test").innerHTML = "";
        }
    </script>
</body>
</html>