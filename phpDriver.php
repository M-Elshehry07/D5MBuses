<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$DriverN = $_GET['Name'];
$PhoneNum = $_GET['numSeats'];


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO driver (name,`phone number`) VALUES ('$DriverN','$PhoneNum' )";
$result = mysqli_query($conn, $sql);

header("Location: driver.php");
mysqli_close($conn);
