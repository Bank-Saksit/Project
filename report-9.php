<?php
    include "dblink.php";
    $result = $conn->query("SELECT  sc.SubjectID,su.SubjectName, COUNT(ss.GPA) AS NUM
                            FROM student_subject ss,sectioninfo sc,subjectinfo su
                            WHERE	ss.SubjectSectionID=sc.SubjectSectionID AND
                                    sc.SubjectID=su.SubjectID AND
                                    ss.GPA = -1
                            GROUP BY su.SubjectName LIMIT 5;");
    $out = "แสดงวิชาที่มีคนดรอปสูงสุด 5 อันดับ แรก<br>";
    $out .= "<table><tr><th>รายวิชา</th><th>จำนวน</th></tr>";
    $rs1=mysqli_fetch_all($result,MYSQLI_ASSOC);
    for($i=0;$i<$result->num_rows;$i++){
        $out .="<tr><td>".$rs1[$i]['SubjectID']."&nbsp".$rs1[$i]['SubjectName']."</td><td>".$rs1[$i]['NUM']."</td>";
    }
    $out .="</table>";
    echo $out;          
?>