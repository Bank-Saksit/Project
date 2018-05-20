<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"projectdb");

    $result = mysqli_query($link,"SELECT * FROM schoolinfo");

    echo"<select name = 'school'>";
    while($row = mysqli_fetch_array($result)){
        echo "<option value = '" . $row['SchoolName']."'>".$row['SchoolName']."</option>";
    }
    echo"</select>";
?>      