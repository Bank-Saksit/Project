INSERT INTO staffinfo (Role,Department,MobileNumber,TelNumber,Email,EducationBackground,ConsultantStatus,IDCardNumber,Prefix,FirstName,LastName,Gender,DOB,Nationality,Race,Religion,BloodGroup,Address,Province,Postcode)
VALUES ('teacher','วิศวกรรมคอมพิวเตอร์','0895671234','-','jardet.123@mail.kmutt.ac.th','ปริญญาโท','ปี4','2345678901234','นาย','จาเด็ต','หม้อ','ไบ','1997-09-28','ไทย','ไทย','นอน','F','111','ขอนแก่น','12345');
INSERT INTO studentinfo 
VALUES ('59070501044','bakabaka','เรียนดี','วิศวกรรมคอมพิวเตอร์','ปริญญาตรี','ปกติ','0897654321','034123456','nawakanok.sk134@mail.kmutt.ac.th',1,'มัธยมศึกษาปีที่6',3.67,'ปี1','3456789012345','นาย','นวกนก','เมืองคำ','ชาย','1997-12-27','ไทย','ไทย','พุทธ','A','226/5','นครปฐม','73000');


SELECT t.StaffID, sc.SubjectID, sc.SectionNumber,su.SubjectName,ss.StudentID
FROM teachersec t,sectioninfo sc,student_subject ss,subjectinfo su
WHERE t.SubjectSectionID=ss.SubjectSectionID AND 
        t.SubjectSectionID=sc.SubjectSectionID AND 
        sc.SubjectID = su.SubjectID AND
        sc.Semester = '1' AND
        sc.AcademicYear = '2018';

SELECT sc.SubjectID, sc.SectionNumber,su.SubjectName
FROM teachersec t,sectioninfo sc,subjectinfo su
WHERE   t.SubjectSectionID=sc.SubjectSectionID AND 
        sc.SubjectID = su.SubjectID AND
        sc.Semester = '1' AND
        sc.AcademicYear = '2018'AND
        t.StaffID = 10001;

SELECT st.StudentID,st.FirstName,st.LastName, SUM(ss.GPA*su.Credit)/SUM(su.Credit) AS GPAX
FROM   student_subject ss,studentinfo st,subjectinfo su,sectioninfo sc
WHERE   st.StudentID = ss.StudentID AND
        sc.SubjectSectionID=ss.SubjectSectionID AND
        sc.SubjectID = su.SubjectID AND
        st.Status = $
GROUP BY st.StudentID;

INSERT INTO teachersec (StaffID,SubjectSectionID)
VALUES ($id,$sub);
