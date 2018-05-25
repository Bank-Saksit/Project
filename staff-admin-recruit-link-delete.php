<?php
    include "dblink.php";
    mysqli_query($conn,"DELETE FROM recruitinfo WHERE RecruitID='".$_GET['RecruitID']."'");
    mysqli_close($conn);
?>