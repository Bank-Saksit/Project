<?php
include "dblink.php";

$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, b.BillRecruitID, b.DateRegister, b.AcademicYear, n.Department, d.Faculty
                        FROM recruitinfo r,  billrecruit b, departmentinfo d, nodepartment n
                        WHERE r.RecruitID=b.RecruitID AND r.NoPass=n.No AND r.RecruitID=n.RecruitID AND n.Department=d.Department AND r.RecruitID = ".(int)$_GET['inID'].";");

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
    $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
    $outp .= '"Department":"'.$rs["Department"].'",';
    $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>