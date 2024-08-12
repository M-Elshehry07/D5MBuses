<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Seat = $_GET['Seat'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql = "INSERT INTO seats(Name) VALUES ('$Seat')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Seat Added";
    header("Location: add-schedule.php");
} else {
    echo "Failure";
}
mysqli_close($conn);
