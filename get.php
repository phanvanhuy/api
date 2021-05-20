<?php

$mysqli = new mysqli("localhost", "root", "", "Iot");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} 
 
    $sql = "SELECT id, name, status FROM mudule";

    $result = $mysqli->query($sql);

    $data = array();

    while ( $row = $result->fetch_assoc() ){
        $data[] = $row;
    }
    echo json_encode( $data );

    mysqli_close($mysqli);
?>
