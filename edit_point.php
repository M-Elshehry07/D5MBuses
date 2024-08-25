<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('connection.php');

    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['Name'];

    // Initialize image path variable
    $imagePath = null;

    // Handle the uploaded image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];

        // Move the uploaded file to a designated directory (e.g., "uploads/")
        $uploadDir = 'images/uploads/';
        $destination = $uploadDir . basename($imageName);

        if (move_uploaded_file($imageTmpPath, $destination)) {
            echo "File uploaded successfully!";
            // Store the image path to save in the database
            $imagePath = $destination;
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "No file uploaded or there was an error.";
    }

    // Update the point name and image path in the database
    $stmt = $conn->prepare("UPDATE points SET point_name = ?, image_path = ? WHERE ID = ?");
    $stmt->bind_param("ssi", $name, $imagePath, $id);
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
