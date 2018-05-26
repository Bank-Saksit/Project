<?php
include "dblink.php";
$result = $conn->query("SELECT r.RecruitID, r.Prefix, r.FirstName, r.LastName, r.RecruitPlanName, r.SchoolID, r.SchoolGPAX, r.IDCardNumber,r.MobileNumber, r.Status, s.SchoolName, n.No, n.Department, d.Faculty, r.NoPass
                        FROM recruitinfo r, schoolinfo s, nodepartment n, departmentinfo d
                        WHERE r.SchoolID=s.SchoolID AND r.RecruitID=n.RecruitID AND n.Department=d.Department
                              AND  r.Status='จ่ายค่าเทอมแล้ว' AND n.No=r.NoPass
                        order by d.Faculty,d.Department,r.RecruitID;");

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
    $outp .= '"SchoolName":"'.$rs["SchoolName"].'",';
    $outp .= '"No":"'.$rs["No"].'",';
    $outp .= '"Department":"'.$rs["Department"].'",';
    $outp .= '"NoPass":"'.$rs["NoPass"].'",';
    $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
    $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
    
}
$outp .="]";

$conn->close();

echo($outp);
?>