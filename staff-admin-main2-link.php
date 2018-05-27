<?php
include "dblink.php";
if( $_GET['type']=='01' ){
    $result = $conn->query("SELECT *
                            FROM studentinfo s, departmentinfo d
                            WHERE s.Department=d.Department
                            ORDER BY s.StudentID ASC");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
        $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
        $outp .= '"Department":"'.$rs["Department"].'",'; 
        $outp .= '"Degree":"'.$rs["Degree"].'",'; 
        $outp .= '"Course":"'.$rs["Course"].'",'; 
        $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",'; 
        $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
        $outp .= '"Email":"'.$rs["Email"].'",';
        $outp .= '"SchoolID":"'.$rs["SchoolID"].'",';
        $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
        $outp .= '"Branch":"'.$rs["Branch"].'",';
        $outp .= '"SchoolGPAX":"'.$rs["SchoolGPAX"].'",';
        $outp .= '"Status":"'.$rs["Status"].'",';
        $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
        $outp .= '"Prefix":"'.$rs["Prefix"].'",';
        $outp .= '"FirstName":"'.$rs["FirstName"].'",';
        $outp .= '"LastName":"'.$rs["LastName"].'",';
        $outp .= '"Gender":"'.$rs["Gender"].'",';
        $outp .= '"DOB":"'.$rs["DOB"].'",';
        $outp .= '"Nationality":"'.$rs["Nationality"].'",';
        $outp .= '"Race":"'.$rs["Race"].'",';
        $outp .= '"Religion":"'.$rs["Religion"].'",';
        $outp .= '"BloodGroup":"'.$rs["BloodGroup"].'",';
        $outp .= '"Address":"'.$rs["Address"].'",';
        $outp .= '"Province":"'.$rs["Province"].'",';
        $outp .= '"Postcode":"'.$rs["Postcode"].'",';
        $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='02' ){
    $result = $conn->query("SELECT *
                            FROM studentinfo s, departmentinfo d
                            WHERE s.Department=d.Department
                            ORDER BY s.StudentID ASC");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
        $outp .= '"RecruitPlanName":"'.$rs["RecruitPlanName"].'",';
        $outp .= '"Department":"'.$rs["Department"].'",'; 
        $outp .= '"Degree":"'.$rs["Degree"].'",'; 
        $outp .= '"Course":"'.$rs["Course"].'",'; 
        $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",'; 
        $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
        $outp .= '"Email":"'.$rs["Email"].'",';
        $outp .= '"SchoolID":"'.$rs["SchoolID"].'",';
        $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
        $outp .= '"Branch":"'.$rs["Branch"].'",';
        $outp .= '"SchoolGPAX":"'.$rs["SchoolGPAX"].'",';
        $outp .= '"Status":"'.$rs["Status"].'",';
        $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
        $outp .= '"Prefix":"'.$rs["Prefix"].'",';
        $outp .= '"FirstName":"'.$rs["FirstName"].'",';
        $outp .= '"LastName":"'.$rs["LastName"].'",';
        $outp .= '"Gender":"'.$rs["Gender"].'",';
        $outp .= '"DOB":"'.$rs["DOB"].'",';
        $outp .= '"Nationality":"'.$rs["Nationality"].'",';
        $outp .= '"Race":"'.$rs["Race"].'",';
        $outp .= '"Religion":"'.$rs["Religion"].'",';
        $outp .= '"BloodGroup":"'.$rs["BloodGroup"].'",';
        $outp .= '"Address":"'.$rs["Address"].'",';
        $outp .= '"Province":"'.$rs["Province"].'",';
        $outp .= '"Postcode":"'.$rs["Postcode"].'",';
        $outp .= '"Faculty":"'.$rs["Faculty"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='11' ){
    if($_GET['st'] == 'ปี1')
        mysqli_query($conn,"UPDATE studentinfo SET Status='ปี2' WHERE StudentID='".$_GET['sid']."'");
    elseif($_GET['st'] == 'ปี2')
        mysqli_query($conn,"UPDATE studentinfo SET Status='ปี3' WHERE StudentID='".$_GET['sid']."'");
    elseif($_GET['st'] == 'ปี3')
        mysqli_query($conn,"UPDATE studentinfo SET Status='ปี4' WHERE StudentID='".$_GET['sid']."'");
    elseif($_GET['st'] == 'ปี4')
        mysqli_query($conn,"UPDATE studentinfo SET Status='จบการศึกษา' WHERE StudentID='".$_GET['sid']."'");
}
elseif( $_GET['type']=='12' ){
    if($_GET['st'] == '0')
        mysqli_query($conn,"UPDATE studentinfo SET Status='ลาออก' WHERE StudentID='".$_GET['sid']."'");
    elseif($_GET['st'] == '1')
        mysqli_query($conn,"UPDATE studentinfo SET Status='ไล่ออก' WHERE StudentID='".$_GET['sid']."'");
}
elseif( $_GET['type']=='13' ){
    $conn->query("DELETE FROM studentinfo
                WHERE StudentID='".$_GET['sid']."'");
}
elseif( $_GET['type']=='21' ){
    $result = $conn->query("SELECT Department, Gender, COUNT(*) AS mycount 
                            FROM studentinfo 
                            GROUP BY Department, Gender"); 

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"Department":"'.$rs["Department"].'",';
        $outp .= '"Gender":"'.$rs["Gender"].'",';
        $outp .= '"Count":"'.$rs["mycount"].'"}';
    }
    $outp .="]";
    echo($outp);
}

$conn->close();
?>