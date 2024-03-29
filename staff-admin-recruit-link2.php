<?php
include "dblink.php";
$result = $conn->query("SELECT r.*,s.*,n.*,d.*
                        FROM recruitinfo r, schoolinfo s, nodepartment n, departmentinfo d
                        WHERE r.SchoolID=s.SchoolID AND r.RecruitID=n.RecruitID AND n.Department=d.Department
                              AND  r.Status='จ่ายค่าเทอมแล้ว' AND n.No=r.NoPass
                        order by d.Faculty,d.Department,r.RecruitID;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    //r
    $outp .= '{"RecruitID":"'.$rs["RecruitID"].'",';
    $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
    $outp .= '"NoPass":"'.$rs["NoPass"].'",';
    $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",'; 
    $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
    $outp .= '"Email":"'.$rs["Email"].'",';
    $outp .= '"SchoolID":"'.$rs["SchoolID"].'",';
    $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
    $outp .= '"Branch":"'.$rs["Branch"].'",';
    $outp .= '"SchoolGPAX":"'.$rs["SchoolGPAX"].'",';
    $outp .= '"Status":"'.$rs["Status"].'",';
    $outp .= '"MovedUniversityName":"'.$rs["MovedUniversityName"].'",';
    $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
    $outp .= '"Prefix":"'.$rs["Prefix"].'",';
    $outp .= '"FirstName":"'.$rs["FirstName"].'",';
    $outp .= '"LastName":"'.$rs["LastName"].'",';
    $outp .= '"Gender":"'.$rs["Gender"].'",';
    $outp .= '"DOB":"'.$rs["DOB"].'",';
    $outp .= '"Nationality":"'.$rs["Nationality"].'",';
    $outp .= '"Race":"'.$rs["Race"].'",';
    $outp .= '"Religion":"'.$rs["Religion"].'",';
    $outp .= '"BloodGroup":"'.$rs["BloodGroup"].'",';
    $outp .= '"Address":"'.$rs["Address"].'",';
    $outp .= '"Province":"'.$rs["Province"].'",';
    $outp .= '"PostCode":"'.$rs["PostCode"].'",';
    //s
    $outp .= '"SchoolName":"'.$rs["SchoolName"].'",';
    //n
    $outp .= '"No":"'.$rs["No"].'",';
    //d
    $outp .= '"Department":"'.$rs["Department"].'",';
    $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
    
    //$outp .= '"":"'.$rs[""].'",';
}
$outp .="]";

$conn->close();

echo($outp);
?>