<?php
include "dblink.php";
if( $_GET['type']=='01' ){
    $result = $conn->query("SELECT *
                            FROM studentinfo");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
        $outp .= '"Status":"'.$rs["Status"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='02' ){
    $result = $conn->query("SELECT *
                            FROM subjectinfo");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
        $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
        $outp .= '"Description":"'.$rs["Description"].'",';
        $outp .= '"Credit":"'.$rs["Credit"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='11' ){
    $conn->query("UPDATE subjectinfo
                SET SubjectID='".$_GET['inSID']."', SubjectName='".$_GET['inSN']."', Description='".$_GET['inDes']."', Credit=".$_GET['inCre']."
                WHERE SubjectID='".$_GET['oldID']."'");
}
elseif( $_GET['type']=='12' ){
    $conn->query("INSERT INTO subjectinfo
                VALUES( '".$_GET['inSID']."', '".$_GET['inSN']."', '".$_GET['inDes']."', ".$_GET['inCre']." )");
}
elseif( $_GET['type']=='13' ){
    $conn->query("INSERT INTO sectioninfo
                VALUES( '', '".$_GET['sub']."', '".$_GET['sec']."', '".$_GET['sem']."', '".$_GET['year']."', ".$_GET['sa'].", '".$_GET['day']."', '".$_GET['ts']."', '".$_GET['te']."', '".$_GET['room']."' )");
}
elseif( $_GET['type']=='14' ){
    $conn->query("DELETE FROM subjectinfo
                WHERE SubjectID='".$_GET['inSub']."'");
}

$conn->close();
?>