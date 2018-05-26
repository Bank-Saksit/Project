<?php
    include "dblink.php";
    mysqli_query($conn,"UPDATE recruitinfo SET Status='ไม่ผ่าน' WHERE RecruitID='".$_GET['RecruitID']."'");
    mysqli_close($conn);
?>