
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href ="js/sweetalert2.all.js" rel="stylesheet" >
	<script src="js/sweetalert21.js"></script>
    <title>ตรวจสอบสถานะ</title>
    <style>
         @import "global1.css";
        table#tb1{
            position: relative;
            width: 100%;
            top:0;
            left:0;
        }
        table#list{
            background: #efefef;
            position: relative;
            width: 100%;
            margin-top: 5%;
            border: 2px solid;
            border-collapse: collapse;
        }
        #t3 {
            border: 2px solid;
        }
        td {
            width:16.67%;
            text-align: center;
        }
        #t1 {
            text-align: right;
            font-weight:bold;
        }
        #t2 {
            text-align: left;
        }
        #out {
            position: absolute;
            bottom:30px;
            right:0;
            cursor: pointer;
        }
        #status {
            text-align: center;
            font-style: bold;
            position: relative;
            margin-left: 367px;
            top:20px;
            width:100%;
        }
        #tb-status {
            border:2px solid;
            width:33.33%;
            background: #efefef;
            border-collapse: collapse;
        }
        #t4 {
            border:2px solid;
            width:10%;
        }
        #submit {
            width:100%;
            position:relative;
            text-align:center;
            margin-top:40px;
        }
        #sm,#sm-sub {
            width: 100px;
            height: 40px;
            margin-left: 20px;
            margin-right: 20px;
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <?php
    include "recruit-checkLog.php";
    ?>
    <div id="left">
        <br><a href="#" id="back"></a>
    </div>
    <div id="main">
        <div id="header">
            <h1>ตรวจสอบสถานะ</h1>
            <h4 id="out" onclick="window.location.href='recruit-logout.php'">ออกจากระบบ</h3>
        </div>
        <div id="content">
            <div id="infoRecruit"></div>
            <div id="detail-rc"></div>
            <div id="status"></div>
            <div id="submit"></div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
    <script>
        loadRecruit();
        function updateRecruit(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-conUp.php?inID="+ <?php echo $_SESSION['id']; ?> 
            console.log(url)
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function loadRecruit(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/recruit-status-link.php?inID="+ <?php echo $_SESSION['id']; ?> 
 
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    displayResponse(xmlhttp.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function displayResponse(response) {
            console.log(response)
            var arr = JSON.parse(response);
            var i;
            var out = "<table id='tb1'>";
            var stat;
            
            out += "<tr>"+
                        "<td id='t1'>รหัสประจำตัวผู้สมัคร : </td><td id='t2'>"+ arr[0].RecruitID +"</td>"+
                        "<td id='t1'>ชื่อ : </td><td id='t2'>"+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</td>"+
                        "<td id='t1'>ชื่อโครงการ : </td><td id='t2'>"+ arr[0].RecruitPlanName +"</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td id='t1'>โรงเรียนของฉัน : </td><td id='t2'>"+ arr[0].SchoolName +"</td>"+
                        "<td id='t1'>GPAX : </td><td id='t2'>"+ arr[0].SchoolGPAX +"</td>"+
                        "<td id='t1'>เบอร์ติดต่อ : </td><td id='t2'>"+ arr[0].MobileNumber +"</td>"+
                    "</tr>";
            out += "</table>";
            document.getElementById("infoRecruit").innerHTML = out;

            var list = "<table id='list'><tr><td id='t3'>ลำดับ</td><td id='t3'>คณะ</td><td id='t3'>สาขา</td></tr>";
            for( i=0 ; i<arr.length ; i++ ){
                if(arr[0].NoPass == 0){
                    list += "<tr>"+
                        "<td id='t3'>"+ arr[i].No +"</td>"+
                        "<td id='t3'>"+ arr[i].Faculty +"</td>"+
                        "<td id='t3'>"+ arr[i].Department +"</td>"+
                    "</tr>";
                }else if(arr[0].NoPass-1 == i) {
                    list += "<tr>"+
                        "<td id='t3'>"+ arr[i].No +"</td>"+
                        "<td id='t3'>"+ arr[i].Faculty +"</td>"+
                        "<td id='t3'>"+ arr[i].Department +"</td>"+
                    "</tr>";
                }
                
            }
            list += "</table>";
            document.getElementById("detail-rc").innerHTML = list;

            stat = "<table id='tb-status'<tr><td id='t4'> สถานะ </td><td>" + arr[0].Status; +"</td></tr></table>";
            document.getElementById("status").innerHTML = stat;

            if(arr[0].Status == "รอยืนยันสิทธิ์"){
                document.getElementById("submit").innerHTML = "<button id='sm-sub'>ยืนยันสิทธิ์</button><button id='sm' onclick=\"window.location.href='recruit-status-reject.php'\">สละสิทธิ์</button>";
                 $(function(){
                    $('#sm-sub').on('click',function(){
                        swal({
                            title: 'คุณต้องการที่จะยืนยันสิทธ์ใช่หรือไม่',
                            text: "หากคุณยืนยันสิทธิ์แล้ว คุณต้องชำระค่าใช้จ่ายแรกเข้าภายในวันที่กำหนด ถ้าไม่ชำระเงินภายในวันที่กำหนด จะถือว่าสละสิทธิ์",
                            type: 'warning',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<a href="recruit-status-confirm.php" ><font color="white">ยืนยันสิทธิ์</font></a>',
                            cancelButtonText: 'ยกเลิก'
                        }).then(function(isConfirm){
                            if (isConfirm){
                                updateRecruit();
                            }
                        })
                    })
                })
            }else if(arr[0].Status == "รอจ่ายค่าเทอม"){
                document.getElementById("submit").innerHTML = "<button id='sm-sub' onclick=\"window.location.href='recruit-status-confirm.php'\">ดูรายละเอียด</button>";
            }
        }

      

    </script>
</body>
</html>