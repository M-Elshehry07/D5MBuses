<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$DriverN = $_GET['Name'];
$PhoneNum = $_GET['number'];
$ID = $_GET['id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$sql = "UPDATE driver SET name=?, `phone number`=? WHERE ID=?";


$stmt = $conn->prepare($sql);


$stmt->bind_param("sii", $DriverN, $PhoneNum, $ID);


$stmt->execute();
header("Location: driver.php");

$stmt->close();
$conn->close();
