<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('connection.php');

    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['Name'];


    // Update the point name and image path in the database
    $stmt = $conn->prepare("UPDATE points SET point_name = ? WHERE ID = ?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: points.php");
    } else {
        echo "You are a failure.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
