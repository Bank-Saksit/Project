<?php 
function checkTime($s1,$e1,$s2,$e2){
    $f=1;
    $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
    $e=array('09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00','17:00:00');
    for($i=0;$i<count($s);$i++){
        if($s1==$s[$i]){
            $a=$i;
        }
    }
    for($j=0;$j<count($e);$j++){
        if($e1==$e[$j]){
            $b=$j;
        }
    }
    for($j=0;$j<count($s);$j++){
        if($s2==$s[$j]){
            $c=$j;
        }
    }
    for($j=0;$j<count($e);$j++){
        if($e2==$e[$j]){
            $d=$j;
        }
    }
    if($a<$e2){
        $f=0;
    }
    if($b>$s2){
        $f=0;
    }
    return $f;
}
include "dblink.php";
    $id=(int)$_GET['ID'];
    $result = $conn->query("SELECT DISTINCT sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear,sc.SubjectSectionID,sc.StartTime,sc.EndTime,sc.Day
                            FROM sectioninfo sc,subjectinfo su
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
            $skip=0;
            $result2 = $conn->query("SELECT DISTINCT sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear,sc.SubjectSectionID,sc.StartTime,sc.EndTime,sc.Day
                                FROM sectioninfo sc,subjectinfo su
                                WHERE   sc.SubjectID = su.SubjectID AND
                                        sc.Semester = '1' AND
                                        sc.AcademicYear = '2018' AND
                                        sc.SubjectSectionID IN (SELECT SubjectSectionID
                                                                    FROM teachersec 
                                                                    WHERE StaffID=$id);");
            while($rs2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                if($rs2['Day']==$rs['Day']){
                    $same=checkTime($rs['StartTime'],$rs['EndTime'],$rs2['StartTime'],$rs2['EndTime']);
                    if($same==0){
                        $skip=1;
                    }
                }
            }
            if($skip==0){
                if ($outp != "[") {$outp .= ",";}
                $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
                $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
                $outp .= '"SubjectName":"'.$rs["SubjectName"].'",';
                $outp .= '"Semester":"'.$rs["Semester"].'",';
                $outp .= '"AcademicYear":"'.$rs["AcademicYear"].'",';
                $outp .= '"SubjectSectionID":"'.$rs["SubjectSectionID"].'",';
                $outp .= '"StartTime":"'.$rs["StartTime"].'",';
                $outp .= '"EndTime":"'.$rs["EndTime"].'",';
                $outp .= '"Day":"'.$rs["Day"].'",';
                $outp .= '"nop":"found"}';
            }
            
        }
        if($outp=="["){
            $outp = '[';
            $outp .= '{"nop":"not found"}';
            $outp .="]";
        }
        else{
            $outp .="]";
        }
        
    }
    echo($outp);
?>