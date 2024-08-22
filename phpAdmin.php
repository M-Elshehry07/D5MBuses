<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$DriverN = $_POST['Name'];
$PhoneNum = sha1($_POST['adminPassword']);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO admin (username, Password) VALUES ('$DriverN', '$PhoneNum')";
$result = mysqli_query($conn, $sql);

header("location:AdminPage.php");
mysqli_close($conn);
