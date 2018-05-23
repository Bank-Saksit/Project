<?php
include "dblink.php";
$result = $conn->query("SELECT st.studentID,st.perfix,st. 
                        FROM studentunfo st, departmentinfo d,subjectinfo s,student_subject ss,sectioninfo sec
                        WHERE st.studentID = ss.studentID and ss.SubjectSectionID = sec.SubjectSectionID and st.department = d.department

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
    $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>