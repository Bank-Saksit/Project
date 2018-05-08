<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>หน้าหลัก</title>
        <style>
            @import "global.css";
            html, body { 
                margin: 0;
                padding: 0;
                background: #dfdfdf;
                color: #444444;
                width: 100%;
            }
            a {
                text-decoration: none;
                margin: 5px;
                color: #444444;
            }
            #main {
                width: 1100px;
                height: 500px;
                margin: auto;
                position: relative;
                top: 50px;
            }
            #header {
                width: 100%;
                
                top: 100px;
                position: relative;
            }
            #header > h1 {
                font-size: 50px;
                position: absolute;
                bottom: 0;
                width: 100%;
                border-bottom: 5px solid;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <h1>ระบบลงทะเบียน</h1>
            </div>

            <?php include "recruit-footer.php"; ?>
        </div>
    </body>