<?php
include "dblink.php";
$result = $conn->query("UPDATE recruitinfo
                        SET Status='สละสิทธิ์', MovedUniversityName='".$_POST['inUni']."'
                        WHERE RecruitID='".$_GET['inID']."';");

$conn->close();
?>