<!DOCTYPE html>
<html lang="en">
<head>
	<link href ="js/jquery-ui.min.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<link href ="js/sweetalert2.all.js" rel="stylesheet">
	<script src="js/sweetalert21.js"></script>
</head>
<body>
<?php
include "dblink.php";
$Prefix= mysqli_real_escape_string($conn, $_GET['Prefix']);
$Fname= mysqli_real_escape_string($conn, $_GET['Fname']);
$Lname = mysqli_real_escape_string($conn, $_GET['Lname']);
$IDCardNum= mysqli_real_escape_string($conn, $_GET['IDCardNumber']);
$DOB = mysqli_real_escape_string($conn, $_GET['DOB']);
$Gender= mysqli_real_escape_string($conn, $_GET['Gender']);
$BloodGroup = mysqli_real_escape_string($conn, $_GET['BloodGroup']);
$EducationBackground = mysqli_real_escape_string($conn, $_GET['EducationBackground']);
$Nationality= mysqli_real_escape_string($conn, $_GET['Nationality']);
$Race= mysqli_real_escape_string($conn, $_GET['Race']);
$Religion= mysqli_real_escape_string($conn, $_GET['Religion']);
$MobileNo = mysqli_real_escape_string($conn, $_GET['MobileNo']);
$TelNo = mysqli_real_escape_string($conn, $_GET['TelNo']);
$Email = mysqli_real_escape_string($conn, $_GET['Email']);
$Address= mysqli_real_escape_string($conn, $_GET['Address']);
$Province= mysqli_real_escape_string($conn, $_GET['Province']);
$PostCode= mysqli_real_escape_string($conn, $_GET['PostCode']);
$Department=mysqli_real_escape_string($conn, $_GET['Department']);
$Role = "Teacher";

$sql="INSERT INTO staffinfo
VALUES ('',NULL,'$Role','$Department','$MobileNo','$TelNo','$Email','$EducationBackground','ยังไม่มี','$IDCardNum',
'$Prefix','$Fname','$Lname','$Gender','$DOB','$Nationality','$Race','$Religion','$BloodGroup','$Address','$Province','$PostCode')";
if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn));
}
echo "	<script>			
					swal({
						type: 'success',
						title: 'การลงทะเบียนอาจารย์เสร็จเรียบร้อย<br>',
						confirmButtonText: '<a href=\"staff-admin-main3.php\" style=\"text-decoration: none\"><font color=\"white\">กลับสู่หน้าเว็บ</font></a>',
					});
					$(document).on('click',function(){
						window.location='staff-admin-main3.php'; 
					})
				</script>";

mysqli_close($conn);

?>
</body>
</html>
