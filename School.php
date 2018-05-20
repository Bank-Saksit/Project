<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "projectdb");

$result = $conn->query("SELECT SchoolID,SchoolName FROM schoolinfo;");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"SchoolID":"'  . $rs["SchoolID"] . '",';
    $outp .= '"SchoolName":"'. $rs["SchoolName"]     . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>