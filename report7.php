<?php
    include "dblink.php";
    $result = $conn->query("SELECT  d.Faculty, COUNT(Faculty) AS NUM
                            FROM studentinfo st,departmentinfo d
                            WHERE	st.Department=d.Department AND
                                    st.StudentID IN(    SELECT st.StudentID
                                                        FROM   student_subject ss,studentinfo st,subjectinfo su,sectioninfo sc
                                                        WHERE   st.StudentID = ss.StudentID AND
                                                                sc.SubjectSectionID=ss.SubjectSectionID AND
                                                                sc.SubjectID = su.SubjectID AND
                                                                st.Status = 'จบการศึกษา' AND
                                                                ss.GPA >-1
                                                        GROUP BY st.StudentID
                                                        HAVING ROUND(SUM(ss.GPA*su.Credit)/SUM(su.Credit),2) >= 3.6)
                            GROUP BY d.Faculty;");

    $result1 = $conn->query("SELECT  d.Faculty, COUNT(Faculty) AS NUM
                            FROM studentinfo st,departmentinfo d
                            WHERE	st.Department=d.Department AND
                                    st.StudentID IN(    SELECT st.StudentID
                                                        FROM   student_subject ss,studentinfo st,subjectinfo su,sectioninfo sc
                                                        WHERE   st.StudentID = ss.StudentID AND
                                                                sc.SubjectSectionID=ss.SubjectSectionID AND
                                                                sc.SubjectID = su.SubjectID AND
                                                                st.Status = 'จบการศึกษา' AND
                                                                ss.GPA >-1
                                                        GROUP BY st.StudentID
                                                        HAVING ROUND(SUM(ss.GPA*su.Credit)/SUM(su.Credit),2) >=3.2 AND
                                                                ROUND(SUM(ss.GPA*su.Credit)/SUM(su.Credit),2) <3.6 )
                            GROUP BY d.Faculty;");
    
    // if($result->num_rows==0 && $result1->num_rows==0 ){
        
    // }
    // else{
        $out = "จำนวนจำนวนผู้สำเร็จการศึกษาระดับปริญญาตรีปีการศึกษาที่ได้รับเกียรตินิยม จำแนกตามอันดับเกียรตินิยม<br>";
        $out .= "<table><tr><th>คณะ</th><th>จำนวนผู้ได้เกียรตินิยมอันดับ1</th><th>จำนวนผู้ได้เกียรตินิยมอันดับ2</th></tr>";
        $result2 = $conn->query("   SELECT DISTINCT Faculty
                                    FROM departmentinfo
                                    ORDER BY Faculty;");
        $rs1=mysqli_fetch_all($result,MYSQLI_ASSOC);
        $rs2=mysqli_fetch_all($result1,MYSQLI_ASSOC);
        $rs3=mysqli_fetch_all($result2,MYSQLI_ASSOC);
        for($i=0;$i<$result2->num_rows;$i++){
            $found=0;
            for($j=0;$j<$result->num_rows;$j++){
                if($rs1[$j]['Faculty']==$rs3[$i]['Faculty']){
                    $found=1;
                    $mem=$j;
                }
            }
            if($found==1){
                $out .="<tr><td>".$rs3[$i]['Faculty']."</td><td>".$rs1[$mem]['NUM']."</td>";
            }
            else{
                $out .="<tr><td>".$rs3[$i]['Faculty']."</td><td>0</td>";
            }
            $found=0;
            for($k=0;$k<$result1->num_rows;$k++){
                if($rs2[$k]['Faculty']==$rs3[$i]['Faculty']){
                    $found=1;
                    $mem=$k;
                }
            }
            if($found==1){
                $out .="<td>".$rs2[$mem]['NUM']."</td></tr>";
            }
            else{
                $out .="<td>0</td></tr>";
            }
        }
        $out .="</table>";
        echo $out;
    //}            

?>