<?php
include "dblink.php";
$result = $conn->query("SELECT d.Faculty,si.RecruitPlanName, COUNT(*) As Num
                            FROM departmentinfo d,studentinfo si
                            WHERE d.Department = si.Department AND Status = 'ปี1'
                            GROUP BY si.RecruitPlanName,d.Faculty
                            ORDER BY d.Faculty,si.RecruitPlanName");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Faculty":"'.$rs["Faculty"].'",';
    $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
    $outp .= '"Num":'.$rs["Num"].'}';
}
$outp .="]";

echo($outp);     

?>