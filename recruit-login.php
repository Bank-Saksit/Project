<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<link href ="js/sweetalert2.all.js" rel="stylesheet">
	<script src="js/sweetalert21.js"></script>
    <title>สำหรับนักเรียนที่ต้องการเข้าศึกษา</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"   
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous">
    </script>
    <style>
        @import "global1.css";
        #left {
            float: left;
            width: 13%;
            position: relative;
            height: 100%;
        }
        #main {
            width: 75%;
            height: 100%;
            margin: auto;
            position: relative;
            top: 60px;
        }

        #content{
            margin-top: 2%;
        }
        #c-right,#c-left{
            height: 380px;  
        }
        #c-left {
            width: 59%;
            float: left;
            background: gray;
            position: relative;
            /* cursor: pointer; */
        }
        #c-right {
            width: 40%;
            float: right;
            position: relative;
        }
        .cr{
            background-image: url(img/gallery/980x380/065.jpg);
        }
        #c-r-top {
            width: 100%;
            height: 200px;
            top: 0;
            text-align: center;
            position: absolute;
            background-color:#ff9999;;
            color: white;
        }
        #c-r-bottom {
            width: 100%;
            height: 180px;
            position: absolute;
            bottom: -20px;
            background:#ff9999;
            cursor: pointer;
        }
        #c-r-bottom > h1 {
            margin-top: 10px;
            margin-left: 58px;
            font-size: 80px;
            color: white;
        }
        #c-r-bottom > div > h3 {
            font-size: 40px;
            color: white;
            margin-left: 30px;
        }
        #c-r-bottom > div {
            top: 75px;
            left: 30px;
            font-size: 25px;
            color: white;
            position: absolute;
        }
        #id,#pswd {
            background: rgba(0,0,0,0.8);
            padding: 3px;
            width: 70%;
            margin: 5px;
            text-align: center;
            color:white;
        }
        #submit {
            font-family: "supermarket";
            padding: 8px;
            width: 100px;
            margin-top: 5px;
            border-radius: 5px;
            background: white;
            color:black;
        }
        #next {
            position: absolute;
            bottom: 10px;
            right: 30px;
            font-size:40px;
            color: white;
        }
        h2 {
            margin:10px;
        } 
        @media only screen and (max-width:1100px) {
            /* For mobile phones: */
                #main {
                width:100%;
                margin-left: 15px;
                }
                #c-left{
                    width: 55%;
                }
                #c-right{
                    margin-left: 10px;
                    float:left;
                }
            }
        @media only screen and (max-width:820px) {
            /* For mobile phones: */
                #content,#main{
                    margin-left: 15px;
                    width:100%;
                }
                #c-left,#c-right,#header,#footer{
                    float: left;
                    margin-top:15px;
                    margin-left:0px;
                    width:90%;
                }
        }
        
    </style>    
</head>
<body>
    <?php
    if(isset($_COOKIE['id']) && isset($_COOKIE['pswd'])) {
        header("location: recruit-status.php");
        exit('</body></html>');
        ob_end_flush();
    }
    ?>  
    <div id="left">
        <a href="home.php" class="btn btn-info btn-lg" id = "back">
                <span class="glyphicon glyphicon-chevron-left"></span> 
		</a>
    </div>
    <div id="main">
        <div id="header">
            <h1>สำหรับผู้สนใจที่ต้องการเข้าศึกษาต่อ   </h1>
        </div>
        <div id="content">
            <div id="c-left">
            <?php #include "js/jssor/examples-jquery/recruit-slides.php"; ?>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="img\gallery\980x380\059.jpg" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="img\gallery\980x380\060.jpg" style="width:100%;">
                        </div>
                        
                        <div class="item">
                            <img src="img\gallery\980x380\061.jpg" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="img\gallery\980x380\062.jpg" style="width:100%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div id="c-right">
                <div id="c-r-top" >
                    <h2>ตรวจสอบสถานะ</h2>
                    <form id="login" method="post" action="recruit-login-check.php">
                        <input type="text" name="id" id="id" placeholder="รหัสประจำตัวผู้สมัคร" ><br>
                        <input type="password" name="pswd" id="pswd" placeholder="รหัสประจำตัวประชาชน" ><br>
                        <button id="submit">เข้าสู่ระบบ</button>
                    </form>
                </div>
                <div id="c-r-bottom" class = "card" onclick="window.location.href='recruit-register.php'">
                    <h1>สมัคร</h1>
                    <div>
                        <h3 id="text">เข้าร่วมโครงการ</h3><br>
                    </div>
                    <h3 id="next"> >> </h3>
                </div>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>

    <!-- <script>
        function plan1(){
            $('#pop1').on('click',function(){
                swal({
                    title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย</h1>',
                    confirmButtonText:'ปิด',
                })    
            })

            $('#pop2').on('click',function(){
                swal({
                    title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย5555</h1>',
                    confirmButtonText:'ปิด',
                })    
            })

            $('#pop3').on('click',function(){
                swal({
                    title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย66666</h1>',
                    confirmButtonText:'ปิด',
                })    
            })

            $('#pop4').on('click',function(){
                swal({
                    title:'<h1>ข้อมูลถูกแก้ไขเรียบร้อย7777</h1>',
                    confirmButtonText:'ปิด',
                })    
            })
        }
    </script> -->
    
</body>
</html>