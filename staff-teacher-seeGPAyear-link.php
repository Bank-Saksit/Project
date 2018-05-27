<?php 
include "dblink.php";
$year = mysqli_real_escape_string($conn,$_GET['year']);
    $result = $conn->query("SELECT st.StudentID,st.FirstName,st.LastName, SUM(ss.GPA*su.Credit)/SUM(su.Credit) AS GPAX,st.Status
                            FROM   student_subject ss,studentinfo st,subjectinfo su,sectioninfo sc
                            WHERE   st.StudentID = ss.StudentID AND
                                    sc.SubjectSectionID=ss.SubjectSectionID AND
                                    sc.SubjectID = su.SubjectID AND
                                    st.Status = '$year'
                            GROUP BY st.StudentID;");
    if($result->num_rows==0){
        $outp = '[';
        $outp .= '{"Year":"'.$year.'",';
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
                $outp .= '"GPAX":"'.$rs["GPAX"].'",';
                $outp .= '"Year":"'.$rs["Status"].'",';
                $outp .= '"nop":"found"}';
        }
        $outp .="]";
    }
    echo($outp);
?>