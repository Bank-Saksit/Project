<?php 
include "dblink.php";
$sub=(int)$_GET['sub'];
$id=(int)$_GET['ID'];
$result = $conn->query("INSERT INTO teachersec (StaffID,SubjectSectionID)
                        VALUES ($id,$sub)");
?>
