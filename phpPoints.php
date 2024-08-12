<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Points = $_GET['Name'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql = "INSERT INTO point(Name) VALUES ('$Points')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Point Added";
    header("Location: add-point.php");
} else {
    echo "Failure";
}
mysqli_close($conn);
