<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$BusN = $_POST['Name'];
$Plates = $_POST['plates'];
$seats = $_POST['numSeats'];
$bus_id = $_POST['id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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



$sql = "UPDATE bus SET bus_name=?, capacity=?, Plates=? , image_path=? WHERE ID=?";


$stmt = $conn->prepare($sql);


$stmt->bind_param("sissi", $BusN, $seats, $Plates, $imagePath, $bus_id);


$stmt->execute();
header("Location: bus.php");

$stmt->close();
$conn->close();
