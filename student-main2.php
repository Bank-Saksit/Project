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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import "global1.css";
        @import "temple.css";
    </style>
    
</head>
<body>
    <div class="top" id="top">
        <a href="student-main.php">ข้อมูลนักศึกษา</a>
        <a class = "active" href="student-main2.php">ลงทะเบียนเรียน</a>
        <a href="student-main3.php">ตารางเรียน</a>
        <a href="student-main4.php">ผลการเรียน</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <a href="student-home.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ลงทะเบียนรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2">เพิ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">ย้ายกลุ่ม</a></li>
            <li><a data-toggle="tab" href="#menu4">ลดรายวิชา</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                <h3>ลงทะเบียนรายวิชา</h3>
                <form>
                    <span>วิชาที่ 1 </span>
                    <?php
                        include "dblink.php";
                        $result = mysqli_query($conn,"SELECT * FROM subjectinfo");
                        echo"<select name = 'Subject[]' class='subject'>";
                        echo"<option value = ''>โปรดเลือก</option>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value = '" . $row['SubjectID']."'>".$row['SubjectID']."</option>";
                        }
                        echo"</select>";
                        echo" Section <select name = \"Section[]\" class='section'>";
                        echo"<option value = 01 >1</option>";
                        echo"<option value = 02 >2</option>";
                        echo"<option value = 03 >3</option>";
                        echo"</select>";
                    ?>
                    <button type="button" id="add" class="check" >+</button>
                    <button type="button" id="remove" class="check" >-</button>
                    <div id="demo"></div><br>
                    <input type="button" value="ยืนยัน" onclick="update1()">
                </form>
				<div id="alert"></div>
				<div id="alert1"></div>
            </div>
            <div id="menu2" class="tab-pane fade"></div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("top");
                if (x.className === "top") {
                    x.className += " responsive";
                } 
                else {
                    x.className = "top";
                }
            }

            load();

            function load(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/student-main2-link.php?type=01&inID=59070501066";
                
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
            }

            function update1(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementsByClassName('subject');
                var sec = document.getElementsByClassName('section');
                var url = location.protocol + '//' + location.host+"/Project/student-main2-link.php?type=11&inID="+arr[0].StudentID;
                    for( var i=0 ; i<6 ; i++ ){
                        if( sub[i] && sub[i].value!='' ) url+="&sub"+i+"="+sub[i].value+"&sec"+i+"="+sec[i].value;
                        else url+="&sub"+i+"=''&sec"+i+"=''";
                    }

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
                        document.getElementById("res2").innerHTML = "แก้ไขสำเร็จ";
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
                        document.getElementById("res3").innerHTML = "แก้ไขสำเร็จ";
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }*/

            $(function(){
                n = 2;
                if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
                else{	$('button[id="remove"]').prop('disabled', false);	}
                if(n==5){	$('button[id="add"]').prop('disabled', true);	}
                else{	$('button[id="add"]').prop('disabled', false);	}
                
                <?php
                    $result = mysqli_query($conn,"SELECT * FROM subjectinfo");

                    echo"var input = '<select name = \"Subject[]\" class=\"subject\">'+";
                    echo"'<option value = \"\">โปรดเลือก</option>'+";
                    while($row = mysqli_fetch_array($result)){
                        echo "'<option value = \"" . $row['SubjectID']."\">".$row['SubjectID']."</option>'+";
                    }
                    echo"'</select>'+";
                    echo" ' Section <select name = \"Section[]\" class=\"section\">'+ ";
                    echo" '<option value = 1 >1</option>'+ ";
                    echo" '<option value = 2 >2</option>'+ ";
                    echo" '<option value = 3 >3</option>'+ ";
                    echo"'</select>'";
                ?>	

                $('#add').click(function(){
                    $("#demo").append('<span>วิชาที่' +' '+ n +' '+input+'</span>'+ '<br>' );
                    n++;
                    if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
                    else{	$('button[id="remove"]').prop('disabled', false);	}
                    if(n==7){	$('button[id="add"]').prop('disabled', true);	}
                    else{	$('button[id="add"]').prop('disabled', false);	}
                })
                $('#remove').click(function(){
                    $('#demo > select[name^=Subject]:last').remove();
                    $('#demo > select[name^=Section]:last').remove();
                    $("#demo > br:last").remove();
                    $("span:last-child").remove();
                    n--;
                    if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
                    else{	$('button[id="remove"]').prop('disabled', false);	}
                    if(n==7){	$('button[id="add"]').prop('disabled', true);	}
                    else{	$('button[id="add"]').prop('disabled', false);	}
                })	
            })
        </script>
     </div>
</body>
</html>