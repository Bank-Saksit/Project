<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสารสนเทศสำหรับผู้ดูแลระบบ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import "global1.css";
        @import "temple.css";
        table, th , td {
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 5px;
        }
        table tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        table tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
    
</head>
<body>
    <div class="top" id="top">
            <a class = "active" href="staff-admin-main.php">ตรวจสอบข้อมูล</a>
            <a href="staff-admin-main2.php">แก้ไขรายวิชา</a>
            <a href="staff-admin-main3.php">menu3</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <a href="staff-home.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
        <li class = "active"><a data-toggle="tab" href="#menu1">ข้อมูลผู้สมัคร</a></li>
        <li><a data-toggle="tab" href="#menu2">ข้อมูลนักศึกษา</a></li>
        <li><a data-toggle="tab" href="#menu3">ข้อมูลอาจารย์</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                
            </div>
            <div id="menu2" class="tab-pane fade">
                
            </div>
            <div id="menu3" class="tab-pane fade">
                
            </div>
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
            var url = location.protocol+'//'+location.host+"/Project/staff-admin-recruit-link.php";
            
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
            var i;
            var out = "<table>";

            for(i = 0; i < arr.length; i++) {
                if(i==0){
                    out += "<tr><td>RecruitID</td><td>Prefix</td><td>First name</td><td>LastName</td><td>RecruitPlanName</td><td>SchoolID</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                }
                out += "<tr><td>" + arr[i].RecruitID +
                "</td><td>" + arr[i].Prefix +
                "</td><td>" + arr[i].FirstName+
                "</td><td>" + arr[i].LastName+
                "</td><td>" + arr[i].RecruitPlanName+
                "</td><td>" + arr[i].SchoolID+
                "</td><td>" + arr[i].SchoolGPAX+
                "</td><td>" + arr[i].MobileNumber+
                "</td><td>" + arr[i].Status+
                "</td><td>" + arr[i].SchoolName+
                "</td><td>" + arr[i].No+
                "</td><td>" + arr[i].Department+
                "</td><td>" + arr[i].NoPass+
                "</td><td>" + arr[i].Faculty+
                // "</td><td>" + arr[i].+
                "</td><td>" +
                "<button onclick=\"deletePaper('"+arr[i].RecruitID+"')\">Delete</button>"+
                "</td></tr>";
            }
            out += "</table>";
            document.getElementById("menu1").innerHTML =out;
        


        }
        
        function deletePaper(RecruitID) {
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/staff-admin-recruit-link-delete.php?RecruitID="+RecruitID;

            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //displayResponse(xmlhttp.responseText);
                load();
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

        }



    
    </script>
    
    </div>
</body>
</html>