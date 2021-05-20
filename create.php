<?php

$mysqli = new mysqli("localhost", "root", "", "Iot");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['fname'])) {
    $name = $_POST['fname'];
    $result = $mysqli->query("SELECT id FROM mudule WHERE name = '$name'");

    if ($result->num_rows == 0 && $name!='') {
        // row not found, do stuff...
        $sql = "INSERT INTO mudule (name)
     VALUES ('$name')";

        if (mysqli_query($mysqli, $sql)) {
            echo "New record created";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }

    } else {
        echo "Enrorr";
    }
} else {
    echo "Enrorr";
}

mysqli_close($mysqli);
