<?php 
include "dblink.php";
    $result = $conn->query("SELECT DISTINCT Status 
                            FROM studentinfo");
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"Status":"'.$rs["Status"].'"}';
    }
    $outp .="]";
    echo($outp);
?>