<?php

$mysqli = new mysqli("localhost", "root", "", "Iot");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['delete'])) {
    $name = $_POST['delete'];
    $result = $mysqli->query("SELECT id FROM mudule WHERE name = '$name'");
    if ($result->num_rows == 0) {
        echo "Not found";
    } else {
        $sql = "DELETE FROM mudule WHERE name='$name'";

        if ($mysqli->query($sql) === true) {
            echo "Record deleted ";
        } else {
            echo "Error deleting record: " . $mysqli->error;
        }
    }
} else {
    $name = 'Erorr';
}

mysqli_close($mysqli);
