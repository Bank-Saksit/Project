<?php 
include "dblink.php";
$sub=(int)$_GET['sub'];
    $result = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                            FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                            WHERE   st.StudentID = ss.StudentID AND
                                    sc.SubjectID = su.SubjectID AND
                                    ss.SubjectSectionID = sc.SubjectSectionID AND
                                    ss.SubjectSectionID = $sub AND
                                    ss.GPA = 4.00;");
    $result1 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 3.50;");
    $result2 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 3.00;");
    $result3 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 2.50;");
    $result4 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 2.00;");
    $result5 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 1.50;");
    $result6 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 1.00;");
    $result7 = $conn->query("SELECT COUNT(ss.GPA) AS num,sc.SubjectID, sc.SectionNumber,su.SubjectName,sc.Semester,sc.AcademicYear
                                FROM    student_subject ss,studentinfo st,sectioninfo sc,subjectinfo su
                                WHERE   st.StudentID = ss.StudentID AND
                                        sc.SubjectID = su.SubjectID AND
                                        ss.SubjectSectionID = sc.SubjectSectionID AND
                                        ss.SubjectSectionID = $sub AND
                                        ss.GPA = 0.00;");
        $rs = $result->fetch_array(MYSQLI_ASSOC);
        $outp = '<h2>'.$rs["SubjectID"].'&nbsp'.$rs["SubjectName"].'&nbspsec:'.$rs["SectionNumber"].'&nbspภาคเรียนที่:'.$rs["Semester"].'&nbspปีการศึกษา:'.$rs["AcademicYear"].'</h2>';
        $outp .= '<table><tr><th>เกรด</th><th>จำนวน</th></tr>';    
            
                $outp .= '<tr><td>A</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result1->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>B+</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result2->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>B</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result3->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>C+</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result4->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>C</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result5->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>D+</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result6->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>D</td><td>'.$rs["num"].'</td></tr>';
            $rs = $result7->fetch_array(MYSQLI_ASSOC);
                $outp .= '<tr><td>F</td><td>'.$rs["num"].'</td></tr>';
        $outp .="</table>";
    
    echo($outp); 
?>