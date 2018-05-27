<?php 
include "dblink.php";
$result = $conn->query("SELECT DISTINCT sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear,sc.SubjectSectionID
                        FROM sectioninfo sc,subjectinfo su
                        WHERE   sc.SubjectID = su.SubjectID;");


?>