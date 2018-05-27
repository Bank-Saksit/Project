<?php 
include "dblink.php";
    $result = $conn->query("SELECT sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear,sc.SubjectSectionID
                                FROM sectioninfo sc,subjectinfo su
                                WHERE sc.SubjectID = su.SubjectID;");
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
        $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
        $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
        $outp .= '"Semester":"'.$rs["Semester"].'",';
        $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
        $outp .= '"SubjectSectionID":"'.$rs["SubjectSectionID"].'"}';
    }
    $outp .="]";
    echo($outp);
?>