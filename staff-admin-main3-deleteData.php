<?php
include "dblink.php";
$result = $conn->query("DELETE FROM staffinfo
                        WHERE staffID =". $_GET['SID']);
$conn->close();

?>