
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>ตรวจสอบสถานะ</title>
    <style>
         @import "global1.css";
         #left {
            float: left;
            width: 13%;
            position: relative;
            height: 100%;
        }
        #main {
            width: 72%;
            height: 100%;
            margin: auto;
            position: relative;
            top: 60px;
        }
        #header {
			width: 100%;
			height: 80px;
            position: relative;
        }
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
        t1 {
            text-align: left;
            font-size: 20px;
            font-weight:bold;
        }
        t2 {
            text-align: left;
            font-size: 18px;
        }
        #out {
            position: absolute;
            bottom: 10px;
            right:0;
            cursor: pointer;
        }
        #out:hover{
            text-decoration: underline;
        }
        #status {
            text-align: center;
            font-style: bold;
            position: relative;
            margin-left: 35%;
            top:20px;
            width:80%;
        }
        #tb-status {
            border:2px solid;
            width:33.33%;
            background: #efefef;
            position:relative;
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
            color:white;
            width: 100px;
            height: 40px;
            margin-left: 20px;
            margin-right: 20px;
            border-radius: 8px;
        }
        #sm{
            background:#d33;
        }
        #sm-sub{
            background:#3085d6;
        }
        .dd{
            margin-top: 2%;
            margin-left:5%;
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
            <h3 id="out" onclick="window.location.href='recruit-logout.php'" >ออกจากระบบ</h3>
        </div>
        <div id="content">
            <div id="infoRecruit" class = "dd"></div>
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
            
            out += "<div class = 'row'>"+
                        "<div class = 'col-sm-4' ><t1>รหัสประจำตัวผู้สมัคร : </t1><t2>"+ arr[0].RecruitID +"</t2></div>"+
                        "<div class = 'col-sm-4'><t1>ชื่อ : </t1><t2>"+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</t2></div>"+
                        "<div class = 'col-sm-4'><t1>ชื่อโครงการ : </t1><t2>"+ arr[0].RecruitPlanName +"</t2></div>"+
                    "</div>"+
                    "<div class = 'row'>"+
                        "<div class = 'col-sm-4'><t1>โรงเรียนของฉัน : </t1><t2>"+ arr[0].SchoolName +"</t2></div>"+
                        "<div class = 'col-sm-4'><t1>GPAX : </t1><t2>"+ arr[0].SchoolGPAX +"</t2></div>"+
                        "<div class = 'col-sm-4'><t1>เบอร์ติดต่อ : </t1><t2>"+ arr[0].MobileNumber +"</t2></div>"+
                    "</div>";
            out += "</table>";
            document.getElementById("infoRecruit").innerHTML = out;
            var list = "<table id='list'><div class = 'row'><tr><td id='t3'><t1>ลำดับ</t1></td><td id='t3'><t1>คณะ</t1></td><td id='t3'><t1>สาขา</t1></td></tr></div>";
            for( i=0 ; i<arr.length ; i++ ){
                if(arr[0].NoPass == 0){
                    list += "<div class = 'row'><tr>"+
                        "<td id='t3'><t2>"+ arr[i].No +"</t2></td>"+
                        "<td id='t3'><t2>"+ arr[i].Faculty +"</t2></td>"+
                        "<td id='t3'><t2>"+ arr[i].Department +"</t2></td>"+
                    "</tr></div>";
                }else if(arr[0].NoPass-1 == i) {
                    list += "<div class = 'row'><tr>"+
                        "<td id='t3'><t2>"+ arr[i].No +"</t2></td>"+
                        "<td id='t3'><t2>"+ arr[i].Faculty +"</t2></td>"+
                        "<td id='t3'><t2>"+ arr[i].Department +"</t2></td>"+
                    "</tr></div>";
                }  
            }
            list += "</table>";
            document.getElementById("detail-rc").innerHTML = list;

            stat = "<table id='tb-status'<tr><td id='t4'><t1> สถานะ </t1></td><td><t2>" + arr[0].Status; +"<t2></td></tr></table>";
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
                            cancelButtonText: '<font>ยกเลิก</font>'
                        }).then((result) => {
                            if (result.value){
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