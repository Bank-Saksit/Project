<?php
session_start();
include "dblink.php";
$result = $conn->query("SELECT DISTINCT st.AcademicYear
                        FROM subjectinfo sj,sectioninfo st,student_subject ss,studentinfo sd
                        WHERE sj.SubjectID = st.SubjectID AND st.SubjectSectionID = ss.SubjectSectionID 
                                AND ss.StudentID = sd.StudentID AND sd.StudentID = '". $_SESSION['id'] ."' " .
                       "ORDER BY st.AcademicYear");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"AcademicYear":"'.$rs["AcademicYear"].'"}';
}
$outp .= "]";
$conn->close();

echo($outp);
?>