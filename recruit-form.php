<?php
include "dblink.php";
$Prefix= mysqli_real_escape_string($conn, $_POST['Prefix']);
$Fname= mysqli_real_escape_string($conn, $_POST['Fname']);
$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
$IDCardNum= mysqli_real_escape_string($conn, $_POST['IDCardNumber']);
$DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
$Gender= mysqli_real_escape_string($conn, $_POST['Gender']);
$BloodGroup = mysqli_real_escape_string($conn, $_POST['BloodGroup']);
$Nationality= mysqli_real_escape_string($conn, $_POST['Nationality']);
$Race= mysqli_real_escape_string($conn, $_POST['Race']);
$Religion= mysqli_real_escape_string($conn, $_POST['Religion']);
$MobileNo = mysqli_real_escape_string($conn, $_POST['MobileNo']);
$TelNo = mysqli_real_escape_string($conn, $_POST['TelNo']);
$Email = mysqli_real_escape_string($conn, $_POST['Email']);
$Address= mysqli_real_escape_string($conn, $_POST['Address']);
$Province= mysqli_real_escape_string($conn, $_POST['Province']);
$PostCode= mysqli_real_escape_string($conn, $_POST['PostCode']);
$School= mysqli_real_escape_string($conn, $_POST['School']);
$EducationBackground= mysqli_real_escape_string($conn, $_POST['EducationBackground']);
$Branch= mysqli_real_escape_string($conn, $_POST['Branch']);
$SchoolGPAX= mysqli_real_escape_string($conn, $_POST['SchoolGPAX']);
$RecruitPlanName = mysqli_real_escape_string($conn, $_POST['RecruitPlanName']);
$Status =  'รอจ่ายค่าสมัคร' ;
$sql="INSERT INTO `recruitinfo`(`RecruitPlanName`, `MobileNumber`, `TelNumber`, `Email`, `SchoolID`, `EducationBackground`, `Branch`, `SchoolGPAX`, `Status`, `IDCardNumber`, `Prefix`, `FirstName`, `LastName`, `Gender`, `DOB`, `Nationality`, `Race`, `Religion`, `BloodGroup`, `Address`, `Province`, `PostCode`)
VALUES ('$RecruitPlanName','$MobileNo','$TelNo','$Email','$School','$EducationBackground',
'$Branch','$SchoolGPAX','$Status','$IDCardNum','$Prefix','$Fname','$Lname','$Gender','$DOB ','$Nationality',
'$Race','$Religion','$BloodGroup','$Address','$Province','$PostCode')";
if (!mysqli_query($conn,$sql)) {
	die('Error: ' . mysqli_error($conn));
}
echo "1 record added";
$result = $conn ->query("SELECT RecruitID FROM recruitinfo WHERE IDCardNumber=$IDCardNum AND RecruitPlanName='$RecruitPlanName'");
while($row = $result->fetch_array(MYSQLI_ASSOC)){	
	for($i=0; $i<count($_POST["Department"]) ;$i++){
	if(trim($_POST["Department"][$i] != '' )){
		echo "555";
		$Department = mysqli_real_escape_string($conn, $_POST['Department'][$i]);
		$sql = "INSERT INTO nodepartment VALUES('".$row["RecruitID"]."','$i','$Department')"; 
		if (!mysqli_query($conn,$sql)) {
			die('Error: ' . mysqli_error($conn));
		}
	}
}
}
mysqli_close($conn);
?>