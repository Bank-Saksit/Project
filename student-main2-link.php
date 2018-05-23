<?php
include "dblink.php";
if( $_GET['type']=='01' ){
    $result = $conn->query("SELECT s.StudentID
                            FROM studentinfo s
                            WHERE s.StudentID = '".$_GET['inID']."';");

    $outp = "[";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "[") {$outp .= ",";}
        $outp .= '{"StudentID":"'.$rs["StudentID"].'"}';
        // $outp .= '"Department":"'.$rs["Department"].'",';
        // $outp .= '"Degree":"'.$rs["Degree"].'",';
        // $outp .= '"Course":"'.$rs["Course"].'",';
        // $outp .= '"MobileNumber":"'.$rs["MobileNumber"].'",';
        // $outp .= '"TelNumber":"'.$rs["TelNumber"].'",';
        // $outp .= '"Email":"'.$rs["Email"].'",';
        // $outp .= '"Status":"'.$rs["Status"].'",';
        // $outp .= '"IDCardNumber":"'.$rs["IDCardNumber"].'",';
        // $outp .= '"Prefix":"'.$rs["Prefix"].'",';
        // $outp .= '"FirstName":"'.$rs["FirstName"].'",';
        // $outp .= '"LastName":"'.$rs["LastName"].'",';
        // $outp .= '"Gender":"'.$rs["Gender"].'",';
        // $outp .= '"DOB":"'.$rs["DOB"].'",';
        // $outp .= '"Nationality":"'.$rs["Nationality"].'",';
        // $outp .= '"Race":"'.$rs["Race"].'",';
        // $outp .= '"Religion":"'.$rs["Religion"].'",';
        // $outp .= '"BloodGroup":"'.$rs["BloodGroup"].'",';
        // $outp .= '"Address":"'.$rs["Address"].'",';
        // $outp .= '"Province":"'.$rs["Province"].'",';
        // $outp .= '"Postcode":"'.$rs["Postcode"].'",';
        // $outp .= '"Course":"'.$rs["Course"].'",';
        // $outp .= '"Status":"'.$rs["Status"].'",';
        // $outp .= '"EducationBackground":"'.$rs["EducationBackground"].'",';
        // $outp .= '"Branch":"'.$rs["Branch"].'",';
        // $outp .= '"SchoolGPAX":"'.$rs["SchoolGPAX"].'",';
        // $outp .= '"SchoolName":"'.$rs["SchoolName"].'",';
        // $outp .= '"Faculty":"'.$rs["Faculty"].'",';
        // $outp .= '"sAddress":"'.$rs["Address"].'",';
        // $outp .= '"sProvince":"'.$rs["Province"].'",';
        // $outp .= '"sPostcode":"'.$rs["Postcode"].'",';
        // $outp .= '"sTelNumber":"'.$rs["TelNumber"].'"}';
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
    if( $_GET['sub0']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub0']."' AND SectionNumber=".$_GET['sec0']);
    if( $_GET['sub1']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub1']."' AND SectionNumber=".$_GET['sec1']);
    if( $_GET['sub2']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub2']."' AND SectionNumber=".$_GET['sec2']);
    if( $_GET['sub3']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub3']."' AND SectionNumber=".$_GET['sec3']);
    if( $_GET['sub4']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub4']."' AND SectionNumber=".$_GET['sec4']);
    if( $_GET['sub5']!='' )
        $conn->query("INSERT INTO student_subject
                    SELECT SubjectSectionID, ".$_GET['inID'].", 0
                    FROM sectioninfo
                    WHERE SubjectID='".$_GET['sub5']."' AND SectionNumber=".$_GET['sec5']);
}
elseif( $_GET['type']=='12' ){
    $conn->query("UPDATE studentinfo
                SET Address='".$_GET['inAdd']."', Province='".$_GET['inPr']."', Postcode='".$_GET['inPo']."', MobileNumber='".$_GET['inMN']."', TelNumber='".$_GET['inTN']."'
                WHERE StudentID='".$_GET['inID']."';");
}

$conn->close();
?>