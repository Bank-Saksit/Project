<?php
    include "dblink.php";   
    date_default_timezone_set('Asia/Bangkok');
    $year = date('Y',time());
    $year = (int)($year+543);
    $id = $_GET['inID'];
    $sql = "INSERT INTO Billrecruit(RecruitID,DateRegister,AcademicYear) VAlUES($id,NOW(),$year)";
    mysqli_query($conn,$sql);
    $sql = "UPDATE recruitinfo SET Status = 'รอจ่ายค่าเทอม' WHERE recruitID = $id";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
?>