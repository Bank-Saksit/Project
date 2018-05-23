<?php
    $conn = mysqli_connect( "localhost", "root", "", "projectdb" ) or die( mysqli_connect_error() );
    mysqli_query( $conn, "SET NAMES UTF8" );
?>