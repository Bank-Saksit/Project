<?php 
include "dblink.php";
$sub=(int)$_GET['sub'];
$result = $conn->query("SELECT ss.StudentID,st.FirstName,st.LastName,ss.GPA,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                        FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                        WHERE   st.StudentID = ss.StudentID AND
                                sc.SubjectID = su.SubjectID AND
                                ss.SubjectSectionID = sc.SubjectSectionID AND
                                ss.SubjectSectionID = $sub;");
    if($result->num_rows==0){
        $result2 = $conn->query("SELECT sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear,sc.SubjectSectionID
                                FROM sectioninfo sc,subjectinfo su
                                WHERE   sc.SubjectID = su.SubjectID AND
                                        sc.SubjectSectionID = $sub;");
        $rs = $result2->fetch_array(MYSQLI_ASSOC);
        $outp = '[';
                $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
                $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
                $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
                $outp .= '"Semester":"'.$rs["Semester"].'",';
                $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
                $outp .= '"nop":"not found"}';
                $outp .="]";
    }
    else{
        $outp = "[";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($outp != "[") {$outp .= ",";}
                $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
                $outp .= '"FirstName":"'.$rs["FirstName"].'",';
                $outp .= '"LastName":"'.$rs["LastName"].'",';
                $outp .= '"SubjectID":"'.$rs["SubjectID"].'",';
                $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
                $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
                $outp .= '"Semester":"'.$rs["Semester"].'",';
                $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
                $outp .= '"GPA":"'.$rs["GPA"].'",';
                $outp .= '"nop":"found"}';
        }
        $outp .="]";
    }
    
    echo($outp); 
?>