<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$id = $_GET['Name'];
$name = $_GET['name'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE type SET name=? WHERE name=?";


$stmt = $conn->prepare($sql);


$stmt->bind_param("ss", $name, $id);


$stmt->execute();
header("Location: Bus_Type.php");

$stmt->close();
$conn->close();
