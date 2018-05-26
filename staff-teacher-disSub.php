<?php 
include "dblink.php";
    $id=(int)$_GET['ID'];
    $result = $conn->query("SELECT DISTINCT sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear,sc.SubjectSectionID
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.Semester = '1' AND
                                    sc.AcademicYear = '2018' AND
                                    sc.SubjectSectionID NOT IN (SELECT SubjectSectionID
                                                                FROM teachersec 
                                                                WHERE StaffID=$id);");
    if($result->num_rows==0){
        $outp = '[';
        $outp .= '{"nop":"not found"}';
        $outp .="]";
    }
    else{
        $outp = "[";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($outp != "[") {$outp .= ",";}
            $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
            $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
            $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
            $outp .= '"Semester":"'.$rs["Semester"].'",';
            $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
            $outp .= '"SubjectSectionID":"'.$rs["SubjectSectionID"].'",';
            $outp .= '"nop":"found"}';
        }
        $outp .="]";
    }
    
    echo($outp);
?>