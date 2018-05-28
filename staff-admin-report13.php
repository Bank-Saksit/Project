<?php
include "dblink.php";
$result = $conn->query("SELECT Status, COUNT(*) As num 
                        FROM studentinfo 
                        WHERE (Status = 'ปี1' OR Status = 'ปี2' OR Status = 'ปี3' OR Status = 'ปี4' 
                            OR Status = 'ปี5' OR Status = 'จบการศึกษา' OR Status = 'พักการเรียน') 
                        GROUP BY Status ");
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