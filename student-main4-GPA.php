<?php
session_start();
include "dblink.php";
$result = $conn->query("SELECT ss.GPA,sj.Credit
                        FROM subjectinfo sj,sectioninfo st,student_subject ss,studentinfo sd
                        WHERE sj.SubjectID = st.SubjectID AND st.SubjectSectionID = ss.SubjectSectionID 
                                AND ss.StudentID = sd.StudentID AND sd.StudentID = '". $_SESSION['id']."'");
$GPAX = 0;
$cd = 0;
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if($rs['GPA'] !="" && $rs['GPA'] != -1){
        $GPAX =($rs['GPA'] * $rs['Credit']) + $GPAX;
        $cd = $rs['Credit'] + $cd;  
    }
}
$GPAX = $GPAX/$cd;
$GPAX = number_format($GPAX, 2, '.', ' ');
$outp = '[{"GPAX":"' .$GPAX. '","Credit":'.$cd.'}]';
$conn->close();
echo ($outp);

?>