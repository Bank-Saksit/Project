<?php
include "dblink.php";
$result = $conn->query("SELECT s.Prefix, s.FirstName, s.LastName, s.StudentID, s.DOB, s.BloodGroup, s.IDCardNumber, s.Address, d.Faculty, s.Department
                        FROM studentinfo s, departmentinfo d
                        WHERE s.Department=d.Department AND s.StudentID = '".$_GET['inID']."';");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Prefix":"'.$rs["Prefix"].'",';
    $outp .= '"FirstName":"'.$rs["FirstName"].'",';
    $outp .= '"LastName":"'.$rs["LastName"].'",';
    $outp .= '"StudentID":"'.$rs["StudentID"].'",';
    $outp .= '"DOB":"'.$rs["DOB"].'",';
    $outp .= '"BloodGroup":"'.$rs["BloodGroup"].'",';
    $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
    $outp .= '"Address":"'.$rs["Address"].'",';
    $outp .= '"Faculty":"'.$rs["Faculty"].'",';
    $outp .= '"Department":"'.$rs["Department"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>