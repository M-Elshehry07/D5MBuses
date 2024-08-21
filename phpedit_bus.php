<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$BusN = $_GET['Name'];
$Plates = $_GET['plates'];
$seats = $_GET['numSeats'];
$bus_id = $_GET['id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$sql = "UPDATE bus SET bus_name=?, capacity=?, Plates=? WHERE ID=?";


$stmt = $conn->prepare($sql);


$stmt->bind_param("sisi", $BusN, $seats, $Plates, $bus_id);


$stmt->execute();
header("Location: bus.php");

$stmt->close();
$conn->close();
