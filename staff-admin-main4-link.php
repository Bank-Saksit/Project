<?php
include "dblink.php";
if( $_GET['type']=='01' ){
    $result = $conn->query("SELECT *
                            FROM subjectinfo sub, sectioninfo sec
                            WHERE sub.SubjectID=sec.SubjectID
                            ORDER BY sub.SubjectID ASC, sec.SectionNumber ASC");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
        $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
        $outp .= '"Description":"'.$rs["Description"].'",';
        $outp .= '"Credit":"'.$rs["Credit"].'",';
        $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
        $outp .= '"Semester":"'.$rs["Semester"].'",';
        $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
        $outp .= '"SeatAmount":"'.$rs["SeatAmount"].'",';
        $outp .= '"Day":"'.$rs["Day"].'",';
        $outp .= '"StartTime":"'.$rs["StartTime"].'",';
        $outp .= '"EndTime":"'.$rs["EndTime"].'",';
        $outp .= '"Room":"'.$rs["Room"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='02' ){
    $result = $conn->query("SELECT *
                            FROM subjectinfo
                            ORDER BY SubjectID ASC");

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
    $conn->query("INSERT INTO subjectinfo
                VALUES( '".$_GET['inSID']."', '".$_GET['inSN']."', '".$_GET['inDes']."', ".$_GET['inCre']." )");
}
elseif( $_GET['type']=='12' ){
    $conn->query("DELETE FROM subjectinfo
                WHERE SubjectID='".$_GET['inSub']."'");
}
elseif( $_GET['type']=='13' ){
    $conn->query("UPDATE subjectinfo
                SET SubjectID='".$_GET['inSID']."', SubjectName='".$_GET['inSN']."', Description='".$_GET['inDes']."', Credit=".$_GET['inCre']."
                WHERE SubjectID='".$_GET['oldID']."'");
}
elseif( $_GET['type']=='14' ){
    $conn->query("INSERT INTO sectioninfo
                VALUES( '', '".$_GET['sub']."', '".$_GET['sec']."', '".$_GET['sem']."', '".$_GET['year']."', ".$_GET['sa'].", '".$_GET['day']."', '".$_GET['ts']."', '".$_GET['te']."', '".$_GET['room']."' )");
}
elseif( $_GET['type']=='15' ){
    $conn->query("DELETE FROM sectioninfo
                WHERE SubjectID='".$_GET['inSub']."' AND SectionNumber='".$_GET['inSec']."'");
}
elseif( $_GET['type']=='16' ){
    $conn->query("UPDATE sectioninfo
                SET Semester='".$_GET['sem']."', AcademicYear='".$_GET['year']."', SeatAmount=".$_GET['sa'].", Day='".$_GET['day']."', StartTime='".$_GET['ts']."', EndTime='".$_GET['te']."', Room='".$_GET['room']."'
                WHERE SubjectID='".$_GET['sub']."' AND SectionNumber='".$_GET['sec']."'");
}

$conn->close();
?>