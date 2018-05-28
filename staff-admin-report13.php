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

$outp = "<h2>รวมจำนวนผู้สำเร็จการศึกษาและจำนวนผู้กำลังศึกษา</h2><table><tr><td>ประเภท</td><td>จำนวน</td><tr>";
$outp .= "<tr><td>ผู้สำเร็จการศึกษา</td><td>".$end."</td></tr>";
$outp .= "<tr><td>ผู้กำลังศึกษา</td><td>".$now."</td></tr><table>";
echo($outp);     
?>