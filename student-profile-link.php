<?php
include "dblink.php";
if( $_GET['type']=='01' ){
    $result = $conn->query("SELECT s.StudentID, s.Department, s.Degree, s.Course, s.MobileNumber, s.TelNumber, s.Email, s.Status, s.IDCardNumber, s.Prefix, s.FirstName, s.LastName, s.Gender, s.DOB, s.Nationality, s.Race, s.Religion, s.BloodGroup, s.Address, s.Province, s.Postcode, s.Course, s.Status, s.EducationBackground, s.Branch, s.SchoolGPAX, sc.SchoolName, d.Faculty
                                , sc.Address, sc.Province, sc.Postcode, sc.TelNumber
                            /*, p.Relation, p.MobileNumber, p.TelNumber, p.Email, p.IDCardNumber, p.Prefix, p.FirstName, p.LastName, p.Gender, p.DOB, p.Nationality, p.Race, p.Religion, p.BloodGroup, p.Address, p.Province, p.Postcode*/
                            FROM studentinfo s, departmentinfo d, schoolinfo sc/*, parentinfo p*/
                            WHERE s.Department=d.Department /*AND s.StudentID=p.StudentID*/ AND s.SchoolID=sc.SchoolID AND s.StudentID = '".$_GET['inID']."';");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'",';
        $outp .= '"Department":"'.$rs["Department"].'",';
        $outp .= '"Degree":"'.$rs["Degree"].'",';
        $outp .= '"Course":"'.$rs["Course"].'",';
        $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",';
        $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
        $outp .= '"Email":"'.$rs["Email"].'",';
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
        $outp .= '"Course":"'.$rs["Course"].'",';
        $outp .= '"Status":"'.$rs["Status"].'",';
        $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
        $outp .= '"Branch":"'.$rs["Branch"].'",';
        $outp .= '"SchoolGPAX":"'.$rs["SchoolGPAX"].'",';
        $outp .= '"SchoolName":"'.$rs["SchoolName"].'",';
        $outp .= '"Faculty":"'.$rs["Faculty"].'",';
        $outp .= '"sAddress":"'.$rs["Address"].'",';
        $outp .= '"sProvince":"'.$rs["Province"].'",';
        $outp .= '"sPostcode":"'.$rs["Postcode"].'",';
        $outp .= '"sTelNumber":"'.$rs["TelNumber"].'"}';
        // $outp .= '"Relation":"'.$rs["Relation"].'",';
        // $outp .= '"pMobileNumber":"'.$rs["pMobileNumber"].'",';
        // $outp .= '"pTelNumber":"'.$rs["pTelNumber"].'",';
        // $outp .= '"pEmail":"'.$rs["pEmail"].'",';
        // $outp .= '"pIDCardNumber":"'.$rs["pIDCardNumber"].'",';
        // $outp .= '"pPrefix":"'.$rs["pPrefix"].'",';
        // $outp .= '"pFirstName":"'.$rs["pFirstName"].'",';
        // $outp .= '"pLastName":"'.$rs["pLastName"].'",';
        // $outp .= '"pGender":"'.$rs["pGender"].'",';
        // $outp .= '"pDOB":"'.$rs["pDOB"].'",';
        // $outp .= '"pNationality":"'.$rs["pNationality"].'",';
        // $outp .= '"pRace":"'.$rs["pRace"].'",';
        // $outp .= '"pReligion":"'.$rs["pReligion"].'",';
        // $outp .= '"pBloodGroup":"'.$rs["pBloodGroup"].'",';
        // $outp .= '"pAddress":"'.$rs["pAddress"].'",';
        // $outp .= '"pProvince":"'.$rs["pProvince"].'",';
        // $outp .= '"pPostcode":"'.$rs["pPostcode"].'"}';
    }
    $outp .="]";
    echo($outp);
}
elseif( $_GET['type']=='11' ){
    $conn->query("UPDATE studentinfo
                SET DOB='".$_GET['inDOB']."', Nationality='".$_GET['inNa']."', Race='".$_GET['inRa']."', Religion='".$_GET['inRe']."', BloodGroup='".$_GET['inBl']."', MobileNumber='".$_GET['inMN']."', TelNumber='".$_GET['inTN']."'
                WHERE StudentID='".$_GET['inID']."';");
}
elseif( $_GET['type']=='12' ){
    $conn->query("UPDATE studentinfo
                SET Address='".$_GET['inAdd']."', Province='".$_GET['inPr']."', Postcode='".$_GET['inPo']."', MobileNumber='".$_GET['inMN']."', TelNumber='".$_GET['inTN']."'
                WHERE StudentID='".$_GET['inID']."';");
}
/*elseif( $_GET['type']=='13' ){
    $conn->query("INSERT INTO parentinfo
                VALUES ( '', ".$_GET['inID'].", ".$_GET['inRela'].", ".$_GET['inpMN']."
                , ".$_GET['inpTN'].", ".$_GET['inpEm'].", ".$_GET['inpID'].", ".$_GET['inpPre']."
                , ".$_GET['inpFn'].", ".$_GET['inpLn'].", ".$_GET['inpGe'].", ".$_GET['inpDOB']."
                , ".$_GET['inpNa'].", ".$_GET['inpRa'].", ".$_GET['inpRe'].", ".$_GET['inpBl']."
                , ".$_GET['inpAdd'].", ".$_GET['inpPr'].", ".$_GET['inpPo']." );
                ");
}*/

$conn->close();
?>