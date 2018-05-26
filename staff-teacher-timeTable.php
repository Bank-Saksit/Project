<?php 
include "dblink.php";
    $id=(int)$_GET['ID'];
    $result = $conn->query("SELECT DISTINCT sc.AcademicYear
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    t.StaffID = $id;");
    if($result->num_rows==0){
        $outp = '[';
        $outp .= '{"nop":"not found"}';
        $outp .="]";
    }
    else{
        $outp = "[";
        while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
            if ($outp != "[") {$outp .= ",";}
            $outp .= '{"AcademicYear":"'.$rs["AcademicYear"].'",';
            $outp .= '"nop":"found"}';
        }
        $outp .="]";
    }
    
    echo($outp);
?>