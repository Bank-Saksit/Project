<?php
session_start();
?>
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
    <link href ="js/sweetalert2.all.js" rel="stylesheet" >
    <script src="js/sweetalert21.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import "global1.css";
        @import "temple.css";
        .swal2-popup {
            font-size: 2rem;
        }
    </style>
    
</head>
<body>
    <?php 
        if(isset($_SESSION['id']) && isset($_SESSION['pswd']) && $_SESSION['role'] == 'student') {
            
        }
        else{
            header("location: student-home.php");
            exit('</body></html>');
        }
    ?>
    <div class="top" id="top">
        <a href="student-main.php">ข้อมูลนักศึกษา</a>
        <a class = "active" href="student-main2.php">ลงทะเบียนเรียน</a>
        <a href="student-main3.php">ตารางเรียน</a>
        <a href="student-main4.php">ผลการเรียน</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <a href="student-logout.php" class="logout">ออกจากระบบ</a>
    </div>
    <div id="left">
        <ul class="nav nav-pills nav-stacked" id="tab">
            <li class = "active"><a data-toggle="tab" href="#menu1">ลงทะเบียนรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu2">เพิ่มรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu3">ย้ายกลุ่ม</a></li>
            <li><a data-toggle="tab" href="#menu4">ลดรายวิชา</a></li>
            <li><a data-toggle="tab" href="#menu5">รายละเอียดกลุ่มวิชา</a></li>
        </ul>
     </div>
     <div id="main">
        <div class="tab-content" id="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                <h2>ลงทะเบียนรายวิชา</h2>
                <br>
                <div class = "row">
                <div class = "col-sm-8">
                <form>
                    <p><span>วิชาที่ 1 </span>
                    <?php
                        include "dblink.php";
                        $result = mysqli_query($conn,"SELECT DISTINCT SubjectID FROM sectioninfo");
                        echo"<select name = 'Subject1[]' class='subject1'>";
                        echo"<option value = ''>โปรดเลือก</option>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value = '" . $row['SubjectID']."'>".$row['SubjectID']."</option>";
                        }
                        echo"</select>";
                        echo" กลุ่ม <select name = \"Section1[]\" class='section1'>";
                        echo"<option value = 01 >1</option>";
                        echo"<option value = 02 >2</option>";
                        echo"<option value = 03 >3</option>";
                        echo"</select>";
                    ?>
                    </p>
                    <p><div id="demo"></div></p>
                    <pp><button type="button" id="add" class="check" >+</button></pp>
                    <pp><button type="button" id="remove" class="check" >-</button></pp>
                    <br><br>
                    <p><input type="button" value="ยืนยัน" id='ed1' onclick="update1()"></p>
                        <script>
                            $(function(){
                                $('#ed1').on('click',function(){
                                    swal({
                                        title:'<h1>ลงทะเบียนเรียบร้อย</h1>',
                                        confirmButtonText:'ตกลง',
                                    })    
                                })
                            })
                        </script>
                </form>
                </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h2>เพิ่มวิชา</h2>
                <br>
                <div class = "row">
                <div class = "col-sm-8">
                <form>
                    <p><span>วิชาที่ 1 </span>
                    <?php
                        include "dblink.php";
                        $result = mysqli_query($conn,"SELECT DISTINCT SubjectID FROM sectioninfo");
                        echo"<select name = 'Subject2[]' class='subject2'>";
                        echo"<option value = ''>โปรดเลือก</option>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<option value = '" . $row['SubjectID']."'>".$row['SubjectID']."</option>";
                        }
                        echo"</select>";
                        echo" กลุ่ม <select name = \"Section2[]\" class='section2'>";
                        echo"<option value = 01 >1</option>";
                        echo"<option value = 02 >2</option>";
                        echo"<option value = 03 >3</option>";
                        echo"</select>";
                    ?></p>
                    <div id="demo2"></div>
                    <pp><button type="button" id="add2" class="check2" >+</button></pp>
                    <pp><button type="button" id="remove2" class="check2" >-</button></pp>
                    <br><br>
                    <p><input type="button" value="ยืนยัน" id='ed2' onclick="update2()"></p>
                        <script>
                            $(function(){
                                $('#ed2').on('click',function(){
                                    swal({
                                        title:'<h1>รายวิชาถูกเพิ่มเรียบร้อย</h1>',
                                        confirmButtonText:'ตกลง',
                                    })    
                                })
                            })
                        </script>
                </form>
                </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade"></div>
            <div id="menu4" class="tab-pane fade"></div>
            <div id="menu5" class="tab-pane fade"></div>
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

            getID();

            function getID(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/student-main2-link.php?type=02&inID="+<?php echo $_SESSION['id'];?>;
                
                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        sname = JSON.parse(xmlhttp.responseText);
                        load();
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function load(){
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol+'//'+location.host+"/Project/student-main2-link.php?type=01&inID="+sname[0].StudentID;
                
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

                var out3 = "<h2>ย้ายกลุ่ม</h2><br><div class = 'row'><div class = 'col-sm-8'>"+
                        "<form>"+
                        "<p>วิชา: <select id='inSub3' onchange='change3()'>";
                for( var i=0 ; i<arr.length ; i++ )
                    out3+="<option value='"+arr[i].SubjectID+"'>"+arr[i].SubjectID+"</option>";
                out3+="</select> กลุ่ม <select id='inSec3'>"+
                        "<option value=01>1</option>"+
                        "<option value=02>2</option>"+
                        "<option value=03>3</option>"+
                        "</select>"+
                        "<br><br><input type='button' value='ยืนยัน' id='ed3' onclick='update3()'>"+
                        "</form></div></div>";
                document.getElementById("menu3").innerHTML = out3;
                $(function(){
                    $('#ed3').on('click',function(){
                        swal({
                            title:'<h1>ย้ายกลุ่มเรียบร้อย</h1>',
                            confirmButtonText:'ตกลง',
                        })    
                    })
                })

                var out4 = "<h2>ลดรายวิชา</h2><br><div class = 'row'><div class = 'col-sm-8'>"+
                        "<form>"+
                        "<p>วิชา: <select id='inSub4' onchange='change4()'>";
                for( var i=0 ; i<arr.length ; i++ )
                    out4+="<option value='"+arr[i].SubjectID+"'>"+arr[i].SubjectID+"</option>";
                out4+="</select> <div id='outSec4'></div>"+
                        "<p><input type='button' value='ยืนยัน' id='ed4' onclick='update4()'>"+
                        "</form></div></div>";
                document.getElementById("menu4").innerHTML = out4;
                $(function(){
                    $('#ed4').on('click',function(){
                        swal({
                            title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย</h1>',
                            confirmButtonText:'ตกลง',
                        })    
                    })
                })
                
                var out5 = "<h2>รายละเอียดกลุ่มวิชา</h2><br><div class = 'row'><div class = 'col-sm-8'>"+
                        "<p>วิชา: <select id='inSub5' onchange='change5()'>";
                <?php
                    include "dblink.php";
                    $result = $conn->query("SELECT * FROM subjectinfo");
                    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo"out5+=\"<option value='".$rs['SubjectID']."'>".$rs['SubjectID']."</option>\";";
                    }
                ?>
                // for( var i=0 ; i<arr.length ; i++ )
                //     out5+="<option value='"+arr[i].SubjectID+"'>"+arr[i].SubjectID+"</option>";
                out5+="</select> กลุ่ม <select id='inSec5' onchange='change5()'>"+
                        "<option value=01>1</option>"+
                        "<option value=02>2</option>"+
                        "<option value=03>3</option>"+
                        "</select>"+
                        "<br><div id='in5'></div></div></div>";
                document.getElementById("menu5").innerHTML = out5;

                change3();
                change4();
                change5();
            }

            function change3(){
                var tmp = document.getElementById('inSub3').value;
                for( var i=0 ; i<arr.length ; i++ ){
                    if( tmp==arr[i].SubjectID ){
                        document.getElementById('inSec3').selectedIndex = arr[i].SectionNumber-1;
                        break;
                    }
                }
            }

            function change4(){
                var tmp = document.getElementById('inSub4').value;
                for( var i=0 ; i<arr.length ; i++ ){
                    if( tmp==arr[i].SubjectID ){
                        document.getElementById('outSec4').innerHTML = "<p>กลุ่ม "+arr[i].SectionNumber;
                        break;
                    }
                }
            }

            function change5(){
                var sub = document.getElementById('inSub5').value;
                var sec = document.getElementById('inSec5').value;
                var xmlhttp = new XMLHttpRequest();
                var url = location.protocol + '//' + location.host+"/Project/student-main2-link.php?type=15&inID="+sname[0].StudentID;
                    url += "&inSub="+sub+"&inSec="+sec;

                    xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var tmp = JSON.parse(xmlhttp.responseText);
                        out5 = "<p>วิชา "+document.getElementById('inSub5').value+" กลุ่ม "+document.getElementById('inSec5').value+"<br>"+
                            "จำนวนที่นั่ง "+tmp[0].SeatAmount+"<br>"+
                            "วัน"+tmp[0].Day+" เวลา "+tmp[0].StartTime+" ถึง "+tmp[0].EndTime+"<br>"+
                            "ห้องเรียน "+tmp[0].Room;

                        document.getElementById('in5').innerHTML = out5;
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function update1(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementsByClassName('subject1');
                var sec = document.getElementsByClassName('section1');
                var url = location.protocol + '//' + location.host+"/Project/student-main2-link.php?type=11&inID="+sname[0].StudentID;
                    for( var i=0 ; i<6 ; i++ ){
                        if( sub[i] && sub[i].value!='' ) url+="&sub"+i+"="+sub[i].value+"&sec"+i+"="+sec[i].value;
                        else url+="&sub"+i+"=''&sec"+i+"=''";
                    }

                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("menu3").innerHTML = '';
                        document.getElementById("menu4").innerHTML = '';
                        load();
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
                
            }

            function update2(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementsByClassName('subject2');
                var sec = document.getElementsByClassName('section2');
                var url = location.protocol + '//' + location.host+"/Project/student-main2-link.php?type=12&inID="+sname[0].StudentID;
                    for( var i=0 ; i<3 ; i++ ){
                        if( sub[i] && sub[i].value!='' ) url+="&sub"+i+"="+sub[i].value+"&sec"+i+"="+sec[i].value;
                        else url+="&sub"+i+"=''&sec"+i+"=''";
                    }

                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("menu3").innerHTML = '';
                        document.getElementById("menu4").innerHTML = '';
                        load();
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
                load();
            }

            function update3(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementById('inSub3').value;
                var sec = document.getElementById('inSec3').value;
                var url = location.protocol + '//' + location.host+"/Project/student-main2-link.php?type=13&inID="+sname[0].StudentID;
                    url+="&inSub="+sub+"&inSec="+sec;

                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        load();
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            function update4(){
                var xmlhttp = new XMLHttpRequest();
                var sub = document.getElementById('inSub4').value;
                var url = location.protocol + '//' + location.host+"/Project/student-main2-link.php?type=14&inID="+sname[0].StudentID;
                    url+="&inSub="+sub;

                xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        load();
                    }
                }
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }

            $(function(){
                var n = 2;
                if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
                else{	$('button[id="remove"]').prop('disabled', false);	}
                if(n==7){	$('button[id="add"]').prop('disabled', true);	}
                else{	$('button[id="add"]').prop('disabled', false);	}
                
                <?php
                    $result = mysqli_query($conn,"SELECT DISTINCT SubjectID FROM sectioninfo");

                    echo"var input = '<select name = \"Subject1[]\" class=\"subject1\">'+";
                    echo"'<option value = \"\">โปรดเลือก</option>'+";
                    while($row = mysqli_fetch_array($result)){
                        echo "'<option value = \"" . $row['SubjectID']."\">".$row['SubjectID']."</option>'+";
                    }
                    echo"'</select>'+";
                    echo" ' กลุ่ม <select name = \"Section1[]\" class=\"section1\">'+ ";
                    echo" '<option value = 1 >1</option>'+ ";
                    echo" '<option value = 2 >2</option>'+ ";
                    echo" '<option value = 3 >3</option>'+ ";
                    echo"'</select>'";
                ?>	

                $('#add').click(function(){
                    $("#demo").append('<span><p>วิชาที่' +' '+ n +' '+input+ '</p>' );
                    n++;
                    if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
                    else{	$('button[id="remove"]').prop('disabled', false);	}
                    if(n==7){	$('button[id="add"]').prop('disabled', true);	}
                    else{	$('button[id="add"]').prop('disabled', false);	}
                })
                $('#remove').click(function(){
                    $('#demo > select[name^=Subject1]:last').remove();
                    $('#demo > select[name^=Section1]:last').remove();
                    $("#demo > br:last").remove();
                    $("span:last-child").remove();
                    n--;
                    if(n==2){	$('button[id="remove"]').prop('disabled', true);	}
                    else{	$('button[id="remove"]').prop('disabled', false);	}
                    if(n==7){	$('button[id="add"]').prop('disabled', true);	}
                    else{	$('button[id="add"]').prop('disabled', false);	}
                })	
            })

            $(function(){
                var n = 2;
                if(n==2){	$('button[id="remove2"]').prop('disabled', true);	}
                else{	$('button[id="remove2"]').prop('disabled', false);	}
                if(n==4){	$('button[id="add2"]').prop('disabled', true);	}
                else{	$('button[id="add2"]').prop('disabled', false);	}
                
                <?php
                    $result = mysqli_query($conn,"SELECT DISTINCT SubjectID FROM sectioninfo");

                    echo"var input = '<select name = \"Subject2[]\" class=\"subject2\">'+";
                    echo"'<option value = \"\">โปรดเลือก</option>'+";
                    while($row = mysqli_fetch_array($result)){
                        echo "'<option value = \"" . $row['SubjectID']."\">".$row['SubjectID']."</option>'+";
                    }
                    echo"'</select>'+";
                    echo" ' กลุ่ม <select name = \"Section2[]\" class=\"section2\">'+ ";
                    echo" '<option value = 1 >1</option>'+ ";
                    echo" '<option value = 2 >2</option>'+ ";
                    echo" '<option value = 3 >3</option>'+ ";
                    echo"'</select>'";
                ?>	

                $('#add2').click(function(){
                    $("#demo2").append('<span><p>วิชาที่' +' '+ n +' '+input+ '</p>' );
                    n++;
                    if(n==2){	$('button[id="remove2"]').prop('disabled', true);	}
                    else{	$('button[id="remove2"]').prop('disabled', false);	}
                    if(n==4){	$('button[id="add2"]').prop('disabled', true);	}
                    else{	$('button[id="add2"]').prop('disabled', false);	}
                })
                $('#remove2').click(function(){
                    $('#demo2 > select[name^=Subject2]:last').remove();
                    $('#demo2 > select[name^=Section2]:last').remove();
                    $("#demo2 > br:last").remove();
                    $("span:last-child").remove();
                    n--;
                    if(n==2){	$('button[id="remove2"]').prop('disabled', true);	}
                    else{	$('button[id="remove2"]').prop('disabled', false);	}
                    if(n==4){	$('button[id="add2"]').prop('disabled', true);	}
                    else{	$('button[id="add2"]').prop('disabled', false);	}
                })	
            })
        </script>
     </div>
</body>
</html>