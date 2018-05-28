<?php 
include "dblink.php";
    $result = $conn->query("SELECT DISTINCT Status 
                            FROM studentinfo
                            WHERE Status IN ('ปี1','ปี2','ปี3','ปี4')");
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"Status":"'.$rs["Status"].'"}';
    }
    $outp .="]";
    echo($outp);
?>