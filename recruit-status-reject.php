<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สละสิทธิ์</title>
    <style>
        h1 {
            font-size: 40px;
            margin-left: 10%;
            margin-right: 10%;
            border-bottom: 5px solid rgb(77, 77, 77);
        }
        #profile{
            background: rgb(54, 118, 255);
            width: 80%;
            margin-left: 10%;
        }
        #content {
            background: aquamarine;
            width: 80%;
            margin-left: 10%;
        }
        #res {
            background: red;
            width: 80%;
            margin-left: 10%;
            font-size: 50px;
        }
    </style>
</head>
<body>
        
    <div id="header">
        <caption><h1>สละสิทธิ์</h1></caption>
    </div>
    <div id="profile"></div>
    <form>
        <div id="content"></div>
        <div id="test"></div>
    </form>
    <div id="res"></div>

    <script>
        load();
        
        function load(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-confirm-link.php?inID=2";
            
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
            var out = "รหัสประจำตัวผู้สมัคร : "+ arr[0].RecruitID +"<br>"+
                    "ชื่อ : "+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"<br>";
            document.getElementById("profile").innerHTML = out;

            var outlist =// "<form>"+
                "ชื่อมหาวิทยาลัยที่เลือกศึกษาต่อ<br>"+
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
                "<input type=\"button\" value=\"ยืนยัน\" onclick=\"update()\">";//+
           // "</form>";
            document.getElementById("content").innerHTML = outlist;
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
            document.getElementById("res").innerHTML = "สละสิทธิ์สำเร็จ<br>ซะทีโว้ยยยย อีดอกกก";
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