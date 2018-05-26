<?php
include "dblink.php";
$result = $conn->query("SELECT st.StaffID,st.Department,st.MobileNumber,st.TelNumber,st.Email,st.EducationBackground,st.ConsultantStatus,
                                st.IDCardNumber,st.Prefix,st.FirstName,st.LastName,st.Gender,st.DOB, st.Nationality,
                                st.Race,st.Religion,st.BloodGroup,d.Faculty
                        FROM staffinfo st,departmentinfo d
                        WHERE st.Department = d.Department
                        ORDER BY st.StaffID");
                        

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"StaffID":"'.$rs["StaffID"].'",';
    $outp .= '"Department":"'.$rs["Department"].'",';
    $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",';
    $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
    $outp .= '"Email":"'.$rs["Email"].'",';
    $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
    $outp .= '"ConsultantStatus":"'.$rs["ConsultantStatus"].'",';
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
    $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>