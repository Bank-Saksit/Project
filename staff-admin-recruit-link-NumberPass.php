<?php
    include "dblink.php";
    mysqli_query($conn,"UPDATE recruitinfo SET Status='รอยืนยันสิทธิ์',NoPass=".$_GET['NPass']." WHERE RecruitID='".$_GET['RecruitID']."'");
    mysqli_close($conn);
?>