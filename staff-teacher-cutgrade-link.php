<?php 
include "dblink.php";
$id=(int)$_GET['inID'];
$sub=mysqli_real_escape_string($conn,$_GET['sub']);
    if( $_GET['type']=='01' ){
        $result = $conn->query("SELECT sc.SubjectID, sc.SectionNumber,su.SubjectName,t.SubjectSectionID
                                FROM teachersec t,sectioninfo sc,subjectinfo su
                                WHERE   t.SubjectSectionID=sc.SubjectSectionID AND 
                                        sc.SubjectID = su.SubjectID AND
                                        sc.Semester = '1' AND
                                        sc.AcademicYear = '2018'AND
                                        t.StaffID = $id;");
            
            $outp = "[";
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                if ($outp != "[") {$outp .= ",";}
                $outp .= '{"SubjectID":"'.$rs["SubjectID"].'",';
                $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
                $outp .= '"SubjectSectionID":"'.$rs["SubjectSectionID"].'",';
                $outp .= '"SubjectName":"'.$rs["SubjectName"].'"}';
            }
            $outp .="]";
            echo($outp);    
    }
    else if( $_GET['type']=='02' ){
        $result = $conn->query("SELECT ss.StudentID,st.FirstName,st.LastName,sc.SubjectID,sc.SectionNumber,su.SubjectName
                                FROM teachersec t,sectioninfo sc,student_subject ss,subjectinfo su,studentinfo st
                                WHERE   t.SubjectSectionID=ss.SubjectSectionID AND 
                                        t.SubjectSectionID=sc.SubjectSectionID AND 
                                        sc.SubjectID = su.SubjectID AND
                                        sc.Semester = '1' AND
                                        sc.AcademicYear = '2018'AND
                                        st.StudentID = ss.StudentID AND
                                        t.StaffID = $id AND 
                                        ss.SubjectSectionID = $sub;");
        
            $outp = "[";
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                if ($outp != "[") {$outp .= ",";}
                $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
                $outp .= '"FirstName":"'.$rs["FirstName"].'",';
                $outp .= '"LastName":"'.$rs["LastName"].'",';
                $outp .= '"SubjectID":"'.$rs["SubjectID"].'",';
                $outp .= '"SectionNumber":"'.$rs["SectionNumber"].'",';
                $outp .= '"SubjectName":"'.$rs["SubjectName"].'"}';
            }
            $outp .="]";
            echo($outp);    
    }
    else if( $_GET['type']=='03' ){
        if($_GET['gpa']!=-1){
            $gpa=floatval($_GET['gpa']);
            $sid=mysqli_real_escape_string($conn,$_GET['SID']);
            $result = $conn->query("UPDATE student_subject
                                    SET GPA= $gpa
                                    WHERE StudentID='$sid'");
        }
    }

?>