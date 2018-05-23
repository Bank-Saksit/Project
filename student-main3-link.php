<?php
include "dblink.php";
$result = $conn->query("SELECT sj.SubjectID, sj.SubjectName, sj.Credit, sj.Description, st.SectionNumber,
                             st.Day, st.Semester, st.AcademicYear, st.StartTime, st.EndTime, st.Room   
                        FROM subjectinfo sj,sectioninfo st,student_subject ss,studentinfo sd
                        WHERE sj.SubjectID = st.SubjectID AND st.SubjectSectionID = ss.SubjectSection 
                                AND ss.StudentID = sd.StudentID AND s.StudentID = '".$_GET['inID']."';");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
    $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
    $outp .= '"Credit":"'.$rs["Credit"].'",';
    $outp .= '"Description":"'.$rs["Description"].'",';
    $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
    $outp .= '"Day":"'.$rs["Day"].'",';
    $outp .= '"Semester":"'.$rs["Semester"].'",';
    $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
    $outp .= '"Room":"'.$rs["Room"].'",';
    $outp .= '"StartTime":"'.$rs["StartTime"].'",';
    $outp .= '"EndTime":"'.$rs["EndTime"].'"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>