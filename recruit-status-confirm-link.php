<?php
include "dblink.php";
$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, b.BillRecruitID, b.DateRegister, b.AcademicYear, r.Department, d.Faculty
                        FROM recruitinfo r,  billrecruit b, departmentinfo d
                        WHERE r.RecruitID=b.RecruitID AND r.Department=d.Department AND r.RecruitID = '".$_GET['inID']."';");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"RecruitID":"'.$rs["RecruitID"].'",';
    $outp .= '"Prefix":"'.$rs["Prefix"].'",';
    $outp .= '"FirstName":"'.$rs["FirstName"].'",';
    $outp .= '"LastName":"'.$rs["LastName"].'",';
    $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
    $outp .= '"BillRecruitID":"'.$rs["BillRecruitID"].'",';
    $outp .= '"DateRegister":"'.$rs["DateRegister"].'",';
    $outp .= '"Department":"'.$rs["Department"].'",';
    $outp .= '"Faculty":"'.$rs["Faculty"].'",';
    $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>