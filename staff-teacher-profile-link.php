<?php
include "dblink.php";
$id=(int)$_GET['inID'];
if( $_GET['type']=='01' ){
    $result = $conn->query("SELECT * 
                            FROM staffinfo 
                            WHERE StaffID = $id;");
    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StaffID":"'.$rs["StaffID"].'",';
        $outp .= '"Department":"'.$rs["Department"].'",';
        $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",';
        $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
        $outp .= '"Email":"'.$rs["Email"].'",';
        $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
        $outp .= '"ConsultantStatus":"'.$rs["ConsultantStatus"].'",';
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
        $outp .= '"Postcode":"'.$rs["Postcode"].'"}';
    }
    $outp .="]";
    echo($outp);      
}
?>