<?php

$mysqli = new mysqli("localhost", "root", "", "Iot");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if (isset($_POST['status']) && $name!='') {
        $status = $_POST['status'];
        $result = $mysqli->query("SELECT id FROM mudule WHERE name = '$name'");

        if ($result->num_rows == 0) {
            // row not found, do stuff...
            echo "Not found";

        } else {
            $sql = "UPDATE mudule SET status='$status' WHERE name='$name'";

            if ($mysqli->query($sql) === true) {
                    echo "Record updated";
                 } else {
                            echo "Error updating record: " . $mysqli->error;
                        }

        }

    } else {
        echo "Erorr";
    }
} else {
    echo "Erorr";
}

mysqli_close($mysqli);
