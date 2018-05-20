<?php
    header( "Access-Control-Allow-Origin: *" );
    header( "Content-Type: application/json; charset=UTF-8" );

    $conn = mysqli_connect( "127.0.0.1", "root", "", "projectdb" ) or die( mysqli_connect_error() );
    mysqli_query( $conn, "SET NAMES UTF8" );
?>