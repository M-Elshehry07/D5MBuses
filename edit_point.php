<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$PointN = $_GET['Name'];
$ID = $_GET['id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$sql = "UPDATE points SET point_name=? WHERE ID=?";


$stmt = $conn->prepare($sql);


$stmt->bind_param("si", $PointN, $ID);


$stmt->execute();
header("Location: points.php");

$stmt->close();
$conn->close();
