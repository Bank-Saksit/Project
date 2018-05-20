<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สำหรับนักเรียนที่ต้องการเข้าศึกษา</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"   
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous">
    </script>


    <style>
        @import "global1.css";
        #c-right,#c-left{
            height: 380px;   
        }
        #c-left {
            width: 650px;
            float: left;
            background: gray;
            position: relative;
        }
        #c-right {
            width: 420px;
            float: right;
            position: relative;
        }
        #c-r-top {
            width: 100%;
            height: 200px;
            top: 0;
            text-align: center;
            position: absolute;
            background: gray;
            color: white;
        }
        #c-r-bottom {
            width: 100%;
            height: 170px;
            position: absolute;
            bottom: 0;
            background: gray;
            cursor: pointer;
        }
        #c-r-bottom > h1 {
            margin-top: 0;
            font-size: 70px;
            color: white;
        }
        #c-r-bottom > div {
            top: 50px;
            left: 50px;
            font-size: 25px;
            color: white;
            position: absolute;
        }
        input {
            background: #444444;
            padding: 3px;
            width: 300px;
            margin: 5px;
            text-align: center;
        }
        button {
            padding: 10px;
            width: 100px;
            margin-top: 5px;
            border-radius: 5px;
            background: white;
        }
        #next {
            position: absolute;
            bottom: -40px;
            right: 10px;
            font-size:40px;
            color: white;
        }
    </style>    

</head>
<body>  
    <div id="left">
        <br><a href="home.php" id="back">< ฺback</a>
    </div>
    <div id="main">
        <div id="header">
            <h1>ยินดีต้อนรับ</h1>
        </div>
        <div id="content">
            <div id="c-left">
                <?php include "js/jssor/examples-jquery/recruit-slides.php"; ?>

            </div>
            <div id="c-right">
                <div id="c-r-top">
                    <form method="post">
                        <h2>ตรวจสอบสถานะ</h2>
                        <input type="text" id="id" placeholder="รหัสประจำตัวผู้สมัคร"><br>
                        <input type="password" id="pswd" placeholder="รหัสประจำตัวประชาชน"><br>
                        <button>เข้าสู่ระบบ</button>
                    </form>
                </div>
                <div id="c-r-bottom" onclick="window.location.href='recruit-register.php'">
                    <h1>&nbsp; สมัคร</h1>
                    <div>
                        <h3>&nbsp; เข้าร่วมโครงการ</h3><br>
                    </div>
                    <h3 id="next"> >> </h3>
                </div>
            </div>
        </div>
        <?php include "recruit-footer.php"; ?>
    </div>
    
</body>
</html>