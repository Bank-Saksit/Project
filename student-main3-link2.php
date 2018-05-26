<?php
session_start();
include "dblink.php";
$result = $conn->query("SELECT DISTINCT st.Semester
                        FROM subjectinfo sj,sectioninfo st,student_subject ss,studentinfo sd
                        WHERE sj.SubjectID = st.SubjectID AND st.SubjectSectionID = ss.SubjectSectionID 
                                AND ss.StudentID = sd.StudentID AND sd.StudentID = '". $_SESSION['id'] ."' " .
                               "AND st.AcademicYear=".$_GET['Year']." ORDER BY st.Semester");
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Semester":"'.$rs["Semester"].'"}';
}
$outp .= "]";
$conn->close();

echo($outp);
?>