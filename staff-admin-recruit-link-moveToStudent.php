<?php
    include "dblink.php";
    
    mysqli_query($conn,"INSERT INTO `studentinfo`(`StudentID`,`RecruitPlanName`, `Department`, `Degree`, `Course`, `MobileNumber`, `TelNumber`, `Email`, `SchoolID`,
                                        `EducationBackground`, `Branch`, `SchoolGPAX`, `Status`, `IDCardNumber`, `Prefix`, `FirstName`, `LastName`,
                                        `Gender`, `DOB`, `Nationality`, `Race`, `Religion`, `BloodGroup`, `Address`, `Province`, `PostCode`)
                        VALUES  ('".$_GET['RecruitID']."','".$_GET['RecruitPlanName']."','".$_GET['Department']."','ปริญญาตรี','ปกติ','".$_GET['MobileNumber']."','".$_GET['TelNumber']."','".$_GET['Email']."',".$_GET['SchoolID'].",
                '".$_GET['EducationBackground']."','".$_GET['Branch']."',".$_GET['SchoolGPAX'].",'ปี1','".$_GET['IDCardNumber']."','".$_GET['Prefix']."','".$_GET['FirstName']."','".$_GET['LastName']."',
                '".$_GET['Gender']."','".$_GET['DOB']."','".$_GET['Nationality']."','".$_GET['Race']."','".$_GET['Religion']."','".$_GET['BloodGroup']."','".$_GET['Address']."','".$_GET['Province']."','".$_GET['PostCode']."')
                        ");
    // mysqli_query($conn,"DELETE FROM recruitinfo WHERE RecruitID='".$_GET['RecruitID']."'");
    mysqli_close($conn);
?>