
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
    <title>main2</title>
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
    
    <h1>    เพิ่มรายวิชา</h1>
        <div id="content">
            <div id="infoRecruit"></div>
            <div id="detail-rc"></div>
            
            <div id="submit"></div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>

    <script>
        loadRecruit();
        function loadSubject(){
            var xmlhttp = new XMLHttpRequest();
            var url = location.protocol + '//' + location.host+"/Project/student-main2-add-link.php?inID="+ <?php echo $_SESSION['id']; ?> 
            console.log(url)
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
                        "<td id='t1'>รหัสประจำนักศึกษา : </td><td id='t2'>"+ arr[0].RecruitID +"</td>"+
                        "<td id='t1'>ชื่อ : </td><td id='t2'>"+ arr[0].Prefix + arr[0].FirstName +" "+ arr[0].LastName +"</td>"+
                        "<td id='t1'>ภาควิชา : </td><td id='t2'>"+ arr[0].RecruitPlanName +"</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td id='t1'>คณะ : </td><td id='t2'>"+ arr[0].SchoolName +"</td>"+
                        "<td id='t1'>ชั้นปี : </td><td id='t2'>"+ arr[0].SchoolGPAX +"</td>"+
                        "<td id='t1'>หน่วยกิต : </td><td id='t2'>"+ arr[0].MobileNumber +"</td>"+
                    "</tr>";
            out += "</table>";
            document.getElementById("infoRecruit").innerHTML = out;

            var list = "<table id='list'><tr><td id='t3'>ลำดับ</td><td id='t3'>รายการของรายวิชาที่ลงทะเบียนเสร็จเรียร้อย</td><td id='t3'>สาขา</td></tr>";
            for( i=0 ; i<arr.length ; i++ ){
                list += "<tr>"+
                        "<td id='t3'>"+ arr[i].No +"</td>"+
                        "<td id='t3'>"+ arr[i].Faculty +"</td>"+
                        "<td id='t3'>"+ arr[i].Department +"</td>"+
                    "</tr>";
            }
            list += "</table>";
            document.getElementById("detail-rc").innerHTML = list;

            
            
                document.getElementById("submit").innerHTML = "<button id='sm-sub' onclick=\"window.location.href='recruit-status-confirm.php'\">ยืนยันสิทธิ์</button><button id='sm' onclick=\"window.location.href='recruit-status-reject.php'\">สละสิทธิ์</button>";
                // sm = "<button id='sm-sub' onclick=\"window.location.href='recruit-status-confirm.php'\">ยืนยันสิทธิ์</button>";
                 $(function(){
            $('#sm-sub').on('click',function(){
                swal({
                    title: 'คุณต้องการที่จะยืนยันเพิ่มรายวิชาใช่หรือไม่',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                });

            })
            $('#sm').on('click',function(){
                swal({
					type: 'success',
					title: '<h1>เพิ่มรายวิชาเสร็จเรียบร้อย</h1><br><h4>สามารถตรวจสถานะได้ในเว็บ</h4>',
					confirmButtonText: '<a href=\"recruit-login.php\" style=\"text-decoration: none\"><font color=\"white\">กลับสู่หน้าเว็บ</font></a>',
				});

            })
        })
            
            // document.getElementById("submit").innerHTML = sm;
        }

      

    </script>
</body>
</html>