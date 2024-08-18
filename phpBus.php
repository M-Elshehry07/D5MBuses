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

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO bus(bus_name, capacity, Plates) VALUES ('$BusN', '$seats', '$Plates')";
$result = mysqli_query($conn, $sql);

header("Location: admin2.php");
mysqli_close($conn);
