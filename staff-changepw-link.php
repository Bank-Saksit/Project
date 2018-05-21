<?php
include "dblink.php";
$id = (int)$_GET['inID'];
$result = $conn->query("SELECT Prefix, FirstName, LastName, StaffID, DOB, BloodGroup, IDCardNumber, s.Address, Department
                        FROM staffinfo s
                        WHERE StaffID = $id;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Prefix":"'.$rs["Prefix"].'",';
    $outp .= '"FirstName":"'.$rs["FirstName"].'",';
    $outp .= '"LastName":"'.$rs["LastName"].'",';
    $outp .= '"StaffID":"'.$rs["StaffID"].'",';
    $outp .= '"DOB":"'.$rs["DOB"].'",';
    $outp .= '"BloodGroup":"'.$rs["BloodGroup"].'",';
    $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
    $outp .= '"Address":"'.$rs["Address"].'",';
    $outp .= '"Department":"'.$rs["Department"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>