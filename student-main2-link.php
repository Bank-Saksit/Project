<?php
include "dblink.php";
if( $_GET['type']=='02' ){
    $result = $conn->query("SELECT StudentID, FirstName
                            FROM studentinfo
                            WHERE StudentID = '".$_GET['inID']."';");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
        $outp .= '"FirstName":"'.$rs["FirstName"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='01' ){
    $result = $conn->query("SELECT s.StudentID, ss.SubjectSectionID, se.SubjectID, se.SectionNumber
                            FROM studentinfo s, student_subject ss, sectioninfo se
                            WHERE s.StudentID=ss.StudentID AND ss.SubjectSectionID=se.SubjectSectionID AND s.StudentID = '".$_GET['inID']."';");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
        $outp .= '"SubjectSectionID":"'.$rs["SubjectSectionID"].'",';
        $outp .= '"SubjectID":"'.$rs["SubjectID"].'",';
        $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='11' ){
    if( $_GET['sub0']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub0']."' AND SectionNumber=".$_GET['sec0']);
    if( $_GET['sub1']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub1']."' AND SectionNumber=".$_GET['sec1']);
    if( $_GET['sub2']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub2']."' AND SectionNumber=".$_GET['sec2']);
    if( $_GET['sub3']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub3']."' AND SectionNumber=".$_GET['sec3']);
    if( $_GET['sub4']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub4']."' AND SectionNumber=".$_GET['sec4']);
    if( $_GET['sub5']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub5']."' AND SectionNumber=".$_GET['sec5']);
}
elseif( $_GET['type']=='12' ){
    if( $_GET['sub0']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub0']."' AND SectionNumber=".$_GET['sec0']);
    if( $_GET['sub1']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub1']."' AND SectionNumber=".$_GET['sec1']);
    if( $_GET['sub2']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub2']."' AND SectionNumber=".$_GET['sec2']);
}
elseif( $_GET['type']=='13' ){
    $conn->query("UPDATE student_subject
                SET SubjectSectionID=(SELECT SubjectSectionID
                                    FROM sectioninfo
                                    WHERE SubjectID='".$_GET['inSub']."' AND SectionNumber=".$_GET['inSec'].")
                WHERE StudentID='".$_GET['inID']."' AND SubjectSectionID IN (SELECT SubjectSectionID
                                                                FROM sectioninfo
                                                                WHERE SubjectID='".$_GET['inSub']."' )");
}
elseif( $_GET['type']=='14' ){
    $conn->query( "DELETE FROM student_subject
                WHERE StudentID='".$_GET['inID']."' AND SubjectSectionID IN (SELECT SubjectSectionID
                                                                            FROM sectioninfo
                                                                            WHERE SubjectID='".$_GET['inSub']."')" );
}
elseif( $_GET['type']=='15' ){
    $result = $conn->query("SELECT SeatAmount, Day, StartTime, EndTime, Room
                            FROM sectioninfo
                            WHERE SubjectID = '".$_GET['inSub']."' AND SectionNumber = ".$_GET['inSec'].";");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"SeatAmount":"'.$rs["SeatAmount"].'",';
        $outp .= '"Day":"'.$rs["Day"].'",';
        $outp .= '"StartTime":"'.$rs["StartTime"].'",';
        $outp .= '"EndTime":"'.$rs["EndTime"].'",';
        $outp .= '"Room":"'.$rs["Room"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='21' ){
    $result = $conn->query( "SELECT SeatAmount, Day, StartTime, EndTime, Room
                FROM sectioninfo
                WHERE SubjectID='".$_GET['inSub']."' AND SectionNumber=".$_GET['inSec']."
                " );

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"SeatAmount":"'.$rs["SeatAmount"].'",';
        $outp .= '"Day":"'.$rs["Day"].'",';
        $outp .= '"StartTime":"'.$rs["StartTime"].'",';
        $outp .= '"EndTime":"'.$rs["EndTime"].'",';
        $outp .= '"Room":"'.$rs["Room"].'"}';
    }
    $outp .="]";
    echo($outp);
}

$conn->close();
?>