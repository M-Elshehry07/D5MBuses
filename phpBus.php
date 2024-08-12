<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$BusN = $_GET['Name'];
$Info = $_GET['info'];
$Plates = $_GET['plates'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql = "INSERT INTO bus(BusName, Info, Plates) VALUES ('$BusN', '$Info', '$Plates')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Bus Added";
} else {
    echo "Failure";
}
mysqli_close($conn);
