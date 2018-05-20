<?php
include "dblink.php";
$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, b.BillRecruitID, b.DateRegister, b.AcademicYear
                        FROM recruitinfo r,  billrecruit b
                        WHERE r.RecruitID=b.RecruitID AND r.RecruitID = '".$_GET['inID']."';");

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
    $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>