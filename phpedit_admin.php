<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Username = $_GET['username'];
$Pass = $_GET['password'];
$ID = $_GET['id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$sql = "UPDATE admin SET username=?, Password=? WHERE ID=?";


$stmt = $conn->prepare($sql);


$stmt->bind_param("sss", $Username, $Pass, $ID);


$stmt->execute();
header("Location: AdminPage.php");

$stmt->close();
$conn->close();
