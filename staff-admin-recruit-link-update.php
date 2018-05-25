<?php
    include "dblink.php";
    $result = mysqli_query($conn,"SELECT * FROM recruitinfo WHERE RecruitID='".$_GET['RecruitID']."'");
    while($row = $result->fetch_array(MYSQLI_ASSOC)){

        if($row['Status'] == 'รอจ่ายค่าสมัคร'){
            mysqli_query($conn,"UPDATE recruitinfo SET Status='รอสอบ' WHERE RecruitID='".$row['RecruitID']."'");
        }
        elseif($row['Status'] == 'รอสอบ'){
            mysqli_query($conn,"UPDATE recruitinfo SET Status='รอสัมภาษณ์' WHERE RecruitID='".$row['RecruitID']."'");
        }
        elseif($row['Status'] == 'รอจ่ายค่าเทอม'){
            mysqli_query($conn,"UPDATE recruitinfo SET Status='จ่ายค่าเทอมแล้ว' WHERE RecruitID='".$row['RecruitID']."'");
        }
    }   
    mysqli_close($conn);
?>