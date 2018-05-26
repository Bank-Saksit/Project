<?php 
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
    $id=(int)$_GET['ID'];
    $sem = mysqli_real_escape_string($conn,$_GET['sem']);
    $year = mysqli_real_escape_string($conn,$_GET['year']);

    $result = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'จันทร์' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    $result1 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'อังคาร' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    $result2 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'พุธ' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    $result3 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'พฤหัสบดี' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    $result4 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'ศุกร์' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    $result5 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'เสาร์' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    $result6 = $conn->query("SELECT DISTINCT su.SubjectID,su.SubjectName,sc.StartTime,sc.EndTime,sc.Room
                            FROM sectioninfo sc,subjectinfo su,teachersec t
                            WHERE   sc.SubjectID = su.SubjectID AND
                                    sc.SubjectSectionID = t.SubjectSectionID AND
                                    sc.Day = 'อาทิตย์' AND
                                    sc.Semester = '$sem' AND
                                    sc.AcademicYear = '$year' AND
                                    t.StaffID = $id
                            ORDER BY sc.StartTime;");
    if($result->num_rows==0&&$result1->num_rows==0&&$result2->num_rows==0&&$result3->num_rows==0&&$result4->num_rows==0&&$result5->num_rows==0&&$result6->num_rows==0){
        $outp = 'ไม่พบข้อมูล';
    }
    else{
        $outp = 'ตารางสอน<br>';
        $outp .= "<table><tr><td>วันเวลา</td><td>8.00-9.00</td><td>9.00-10.00</td><td>10.00-11.00</td><td>11.00-12.00</td><td>12.00-13.00</td><td>13.00-14.00</td><td>14.00-15.00</td><td>15.00-16.00</td><td>16.00-17.00</td></tr>";
        $outp .= '<tr><td>วันจันทร์</td>';
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
        $outp .= '<tr><td>วันอังคาร</td>';
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
        $outp .= '<tr><td>พุธ</td>';
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
        $outp .= '<tr><td>วันพฤหัสบดี</td>';
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
        $outp .= '<tr><td>วันศุกร์</td>';
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
        $outp .= '<tr><td>วันเสาร์</td>';
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
        $outp .= '<tr><td>วันอาทิตย์</td>';
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