<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$BusN = $_GET['Name'];
$Plates = $_GET['plates'];
$Info = $_GET['info'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql = "INSERT INTO bus(BusName, Info, Plates) VALUES ('$BusN', '$Info', '$Plates')";
$result = mysqli_query($conn, $sql);

header("Location: admin2.php");
mysqli_close($conn);
