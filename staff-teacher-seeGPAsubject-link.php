<?php 
include "dblink.php";
$sub=mysqli_real_escape_string($conn,$_GET['sub']);
$result = $conn->query("SELECT ss.StudentID,st.FirstName,st.LastName,ss.GPA,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                        FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                        WHERE   st.StudentID = ss.StudentID AND
                                sc.SubjectID = su.SubjectID AND
                                ss.SubjectSectionID = sc.SubjectSectionID AND
                                ss.SubjectSectionID = $sub;");
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
            $outp .= '"GPA":"'.$rs["GPA"].'"}';
    }
    $outp .="]";
    echo($outp); 
?>