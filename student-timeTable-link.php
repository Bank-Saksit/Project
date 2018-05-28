<?php 
session_start();
    function getcol($start,$end){
        $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
        $e=array('09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00','17:00:00');
        for($i=0;$i<count($s);$i++){
            if($start==$s[$i]){
                $a=$i;
            }
        }
        for($j=0;$j<count($e);$j++){
            if($end==$e[$j]){
                $b=$j;
            }
        }
        $col=$b-$a+1;
        return $col;
    }
include "dblink.php";
    $sem = $_GET['sem'];
    $year = $_GET['year'];

    $result = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = ss.SubjectSectionID AND
                                    sd.StudentID = ss.StudentID AND
                                    sc.Day = 'จันทร์' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    $result1 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                             FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                             WHERE   sc.SubjectID = su.SubjectID AND
                                     sc.SubjectSectionID = ss.SubjectSectionID AND
                                     sd.StudentID = ss.StudentID AND
                                     sc.Day = 'อังคาร' AND
                                     sc.Semester = '$sem' AND
                                     sc.AcademicYear = '$year' AND
                                     sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    $result2 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                             FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                             WHERE   sc.SubjectID = su.SubjectID AND
                                     sc.SubjectSectionID = ss.SubjectSectionID AND
                                     sd.StudentID = ss.StudentID AND
                                     sc.Day = 'พุธ' AND
                                     sc.Semester = '$sem' AND
                                     sc.AcademicYear = '$year' AND
                                     sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    $result3 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                             FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                             WHERE   sc.SubjectID = su.SubjectID AND
                                     sc.SubjectSectionID = ss.SubjectSectionID AND
                                     sd.StudentID = ss.StudentID AND
                                     sc.Day = 'พฤหัสบดี' AND
                                     sc.Semester = '$sem' AND
                                     sc.AcademicYear = '$year' AND
                                     sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    $result4 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                             FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                             WHERE   sc.SubjectID = su.SubjectID AND
                                     sc.SubjectSectionID = ss.SubjectSectionID AND
                                     sd.StudentID = ss.StudentID AND
                                     sc.Day = 'ศุกร์' AND
                                     sc.Semester = '$sem' AND
                                     sc.AcademicYear = '$year' AND
                                     sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    $result5 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                             FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                             WHERE   sc.SubjectID = su.SubjectID AND
                                     sc.SubjectSectionID = ss.SubjectSectionID AND
                                     sd.StudentID = ss.StudentID AND
                                     sc.Day = 'เสาร์' AND
                                     sc.Semester = '$sem' AND
                                     sc.AcademicYear = '$year' AND
                                     sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    $result6 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                             FROM sectioninfo sc,subjectinfo su,studentinfo sd,student_subject ss
                             WHERE   sc.SubjectID = su.SubjectID AND
                                     sc.SubjectSectionID = ss.SubjectSectionID AND
                                     sd.StudentID = ss.StudentID AND
                                     sc.Day = 'อาทิตย์' AND
                                     sc.Semester = '$sem' AND
                                     sc.AcademicYear = '$year' AND
                                     sd.StudentID ='".$_SESSION['id']."'
                             ORDER BY sc.StartTime;");
    if($result->num_rows==0&&$result1->num_rows==0&&$result2->num_rows==0&&$result3->num_rows==0&&$result4->num_rows==0&&$result5->num_rows==0&&$result6->num_rows==0){
        $outp = '<h2>ไม่พบข้อมูล<h2>';
    }
    else{
        $outp = "<table><tr><th>วันเวลา</th><th>8.00-9.00</th><th>9.00-10.00</th><th>10.00-11.00</th><th>11.00-12.00</th><th>12.00-13.00</th><th>13.00-14.00</th><th>14.00-15.00</th><th>15.00-16.00</th><th>16.00-17.00</td></tr>";
        $outp .= '<tr><th>วันจันทร์</th>';
        if($result->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            if($now!=9){
                for($now;$now<9;$now++){
                    $outp .= "<td></td>";
                }
            }
            $outp .= "</tr>";
        }
        $outp .= '<tr><th>วันอังคาร</th>';
        if($result1->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result1->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            if($now!=9){
                for($now;$now<9;$now++){
                    $outp .= "<td></td>";
                }
            }
            $outp .= "</tr>";
        }
        $outp .= '<tr><th>วันพุธ</th>';
        if($result2->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result2->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            if($now!=9){
                for($now;$now<9;$now++){
                    $outp .= "<td></td>";
                }
            }
            $outp .= "</tr>";
        }
        $outp .= '<tr><th>วันพฤหัสบดี</th>';
        if($result3->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result3->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            if($now!=9){
                for($now;$now<9;$now++){
                    $outp .= "<td></td>";
                }
            }
            $outp .= "</tr>";
        }
        $outp .= '<tr><th>วันศุกร์</th>';
        if($result4->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result4->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            if($now!=9){
                for($now;$now<9;$now++){
                    $outp .= "<td></td>";
                }
            }
            $outp .= "</tr>";
        }
        $outp .= '<tr><th>วันเสาร์</th>';
        if($result5->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result5->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            if($now!=9){
                for($now;$now<9;$now++){
                    $outp .= "<td></td>";
                }
            }
            $outp .= "</tr>";
        }
        $outp .= '<tr><th>วันอาทิตย์</th>';
        if($result6->num_rows==0){
            for($i=0;$i<9;$i++){
                $outp .= '<td></td>';
            }
            $outp .= '</tr>';
        }
        else{
            
            $s=array('08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00');
            $now=0;
            while($rs = $result6->fetch_array(MYSQLI_ASSOC)) {
                $colspan=getcol($rs['StartTime'],$rs['EndTime']);
                for($i=0;$i<count($s);$i++){
                    if($rs['StartTime']==$s[$i]){
                        $a=$i;
                    }
                }
                if($a!=$now){
                    for($now;$now<$a;$now++){
                        $outp .= "<td></td>";
                    }        
                }
                $outp .= "<td colspan='".$colspan."'>".$rs['SubjectID']."&nbsp".$rs['SubjectName']."<br>".$rs['Room']."</td>";
                $now+=$colspan;
            }
            $outp .= "</tr>";
        }
        if($now!=9){
            for($now;$now<9;$now++){
                $outp .= "<td></td>";
            }
        }
        $outp .= "</table>";
    }
    
    
    echo($outp);
?>