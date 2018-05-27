<?php
include "dblink.php";
$result = $conn->query("SELECT s.Status, COUNT(*) As num FROM bill b, studentinfo s WHERE b.StudentID = s.StudentID AND 
            (s.Status = 'ปี1' OR s.Status = 'ปี2' OR s.Status = 'ปี3' OR s.Status = 'ปี4' 
            OR s.Status = 'ปี1' OR s.Status = 'ปี5' OR s.Status = 'จบการศึกษา' OR s.Status = 'พักการเรียน')
            GROUP BY s.Status");
$now=0;$end=0;
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if($rs['Status'] == 'จบการศึกษา') {
        $end = $rs['num'] + $end;
    }else {
        $now = $rs['num'] + $now;
    }
}


echo($end.' '.$now);     

?>