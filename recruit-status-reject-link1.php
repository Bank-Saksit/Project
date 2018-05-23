<?php
include "dblink.php";
$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, n.Department, d.Faculty
                        FROM recruitinfo r, departmentinfo d, nodepartment n
                        WHERE r.NoPass=n.No AND r.RecruitID=n.RecruitID AND n.Department=d.Department AND r.RecruitID = '".$_GET['inID']."';");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"RecruitID":"'.$rs["RecruitID"].'",';
    $outp .= '"Prefix":"'.$rs["Prefix"].'",';
    $outp .= '"FirstName":"'.$rs["FirstName"].'",';
    $outp .= '"LastName":"'.$rs["LastName"].'",';
    $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
    $outp .= '"Department":"'.$rs["Department"].'",';
    $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>