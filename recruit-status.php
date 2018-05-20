<?php
include "dblink.php";
$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, r.SchoolID, r.SchoolGPAX, r.MobileNumber, r.Status, s.SchoolName FROM recruitinfo r, schoolinfo s WHERE r.SchoolID=s.SchoolID AND RecruitID = '".$_GET['inID']."';");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"RecruitID":"'.$rs["RecruitID"].'",';
    $outp .= '"Prefix":"'.$rs["Prefix"].'",';
    $outp .= '"FirstName":"'.$rs["FirstName"].'",';
    $outp .= '"LastName":"'.$rs["LastName"].'",';
    $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
    $outp .= '"SchoolID":"'.$rs["SchoolID"].'",';
    $outp .= '"SchoolGPAX":"'.$rs["SchoolGPAX"].'",';
    $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",';
    $outp .= '"Status":"'.$rs["Status"].'",';
    $outp .= '"SchoolName":"'.$rs["SchoolName"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>