<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>หน้าหลัก</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <style>
 
            @font-face{
                font-family: "supermarket";
                src: url(font/supermarket.woff);
            }
            html, body { 
                font-family: "supermarket";
                margin: 0;
                padding: 0;
                background: #ebebeb;
                color: #444444;
                width: 100%;
            }
            #main {
                width: 1100px;
                height: 100%;
                margin: auto;
                position: relative;
                top: 50px;
            }
            #header {
                width: 100%;
                height: 100px;
                position: relative;
            }
            #header > h1 {
                font-family: "supermarket";
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
            #content {
                margin-top: 2%;
                position: relative;
                width:100%;
                display: inline-block;  
            }
            #left,#right,#center{
                margin-top: 10px;
                width: 340px;
                height: 310px;
                position: relative;
                text-align: center;
                background: white;
                cursor: pointer;
            }
            .s1{
                margin-top:9%;
                font-size: 32px;
            }
            #center {
                float: left;
                margin-left: 40px;
            }
            #right {
                float: right;
            }
            #left {
                float: left;
            }
            img {
                width: 340px;
                height: 215px;
            }
            .card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 40%;
            }
            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }
            .container {
                padding: 2px 16px;
            }
            @media only screen and (max-width:1100px) {
            /* For mobile phones: */
                #main {
                width:100%;
                margin-left: 15px;
                }
                #center{
                    float: left;
                    margin-left:20px;
                }
                #right{
                    float:left;
                }
            }
            @media only screen and (max-width:710px) {
            /* For mobile phones: */
                #main {
                width:100%;
                margin-left: 15px;
                }
                #left,#center,#right{
                    float: center;
                    margin-left:0px;
                }
            }
            footer {
                position: absolute;
                text-align: right;
                width: 100%;
                bottom: -60px;
                border-top: 2px solid;
                
            }
            footer>a{   
                padding: 15px 10px;
                font-size: 20px;
            }
            footer> a:hover{   
                color: #444444;
                text-decoration: underline;
                transition: 0.5s;
            }
            a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h1>ระบบลงทะเบียน</h1>
            </div>
            <div id="content">
                <div id="left" class="card" onclick="window.location.href='recruit-login.php'">
                    <img data-u="image" src="img/gallery/980x380/056.jpg" />
                    <h1 class = "s1">นักเรียน</h1>
                </div>
                <div id="center" class="card" onclick="window.location.href='student-home.php'">
                    <img data-u="image" src="img/gallery/980x380/057.jpg" />
                    <h1 class = "s1">นักศึกษา</h1>
                </div>
                <div id="right" class="card" onclick="window.location.href='staff-home.php'">
                    <img data-u="image" src="img/gallery/980x380/058.jpg" />
                    <h1 class = "s1">บุคลากร</h1>
                </div>
            </div>
            <?php include "recruit-footer.php"; ?>
        </div>
    </body>
</html>