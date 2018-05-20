<?php
$con=mysqli_connect("localhost","root","","projectdb");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// escape variables for security
$Prefix= mysqli_real_escape_string($con, $_POST['Prefix']);
$Fname= mysqli_real_escape_string($con, $_POST['Fname']);
$Lname = mysqli_real_escape_string($con, $_POST['Lname']);
$IDCardNum= mysqli_real_escape_string($con, $_POST['IDCardNumber']);
$DOB = mysqli_real_escape_string($con, $_POST['DOB']);
$Gender= mysqli_real_escape_string($con, $_POST['Gender']);
$BloodGroup = mysqli_real_escape_string($con, $_POST['BloodGroup']);
$Nationality= mysqli_real_escape_string($con, $_POST['Nationality']);
$Race= mysqli_real_escape_string($con, $_POST['Race']);
$Religion= mysqli_real_escape_string($con, $_POST['Religion']);
$MobileNo = mysqli_real_escape_string($con, $_POST['MobileNo']);
$TelNo = mysqli_real_escape_string($con, $_POST['TelNo']);
$Email = mysqli_real_escape_string($con, $_POST['Email']);
$Address= mysqli_real_escape_string($con, $_POST['Address']);
$Province= mysqli_real_escape_string($con, $_POST['Province']);
$PostCode= mysqli_real_escape_string($con, $_POST['PostCode']);
$SchoolID= mysqli_real_escape_string($con, $_POST['SchoolID']);
$EducationBackground= mysqli_real_escape_string($con, $_POST['EducationBackground']);
$Branch= mysqli_real_escape_string($con, $_POST['Branch']);
$SchoolGPAX= mysqli_real_escape_string($con, $_POST['SchoolGPAX']);
$RecruitPlanName = mysqli_real_escape_string($con, $_POST['RecruitPlanName']);
$Department = mysqli_real_escape_string($con, $_POST['Department']);
$Status =  'รอจ่ายค่าสมัคร' 

$sql="INSERT INTO recruitinfo
VALUES ('','$RecruitPlanName','$MobileNo','$TelNo','$Email','$SchoolID','$EducationBackground',
'$Branch','$SchoolGPAX','$Status','','$','$','$','$','$','$','$','$','$','$','$','$','$','$')";
$sql="INSERT INTO nodepartment"
VALUES ();

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}
echo "1 record added";
mysqli_close($con);
?>