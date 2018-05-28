<?php
include "dblink.php";
$result = $conn->query("SELECT Nationality, Degree, COUNT(*) As Num
                        FROM studentinfo
                        WHERE  Nationality IN(SELECT Nationality 
                                                FROM studentinfo
                                                WHERE Nationality != '' AND Nationality != 'ไทย'
                                                GROUP BY Nationality
                                                ORDER BY COUNT(*) DESC)
                        GROUP BY Nationality,Degree");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Nationality":"'.$rs["Nationality"].'",';
    $outp .= '"Degree":"'.$rs["Degree"].'",';
    $outp .= '"Num":'.$rs["Num"].'}';
}
$outp .="]";

echo($outp);     

?>