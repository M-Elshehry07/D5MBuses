<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$BusN = $_GET['Name'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO type (name) VALUES ('$BusN')";
$result = mysqli_query($conn, $sql);

header("Location: Bus_Type.php");
mysqli_close($conn);
