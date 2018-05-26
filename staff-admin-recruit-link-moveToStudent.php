<?php
    include "dblink.php";
    
    mysqli_query($conn,"INSERT INTO `studentinfo`(`StudentID`, `Password`, `RecruitPlanName`, `Department`, `Degree`, `Course`, `MobileNumber`, `TelNumber`, `Email`, `SchoolID`, `EducationBackground`, `Branch`, `SchoolGPAX`, `Status`, `IDCardNumber`, `Prefix`, `FirstName`, `LastName`, `Gender`, `DOB`, `Nationality`, `Race`, `Religion`, `BloodGroup`, `Address`, `Province`, `Postcode`)
                        VALUES   ('','')
                        WHERE RecruitID='".$_GET['RecruitID']."'");
    //mysqli_query($conn,"DELETE FROM recruitinfo WHERE RecruitID='".$_GET['RecruitID']."'");
    mysqli_close($conn);
?>