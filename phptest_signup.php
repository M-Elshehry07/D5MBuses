<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Name = $_GET['name'];
// $Bus = $_POST['bus'];
$Email = $_GET['email'];
$Phone = $_GET['phone'];
// $Point = $_POST['point'];
// $Seat = $_POST['seat'];
// $Time[] = $_POST['time'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql1 = "INSERT INTO ticket(Name, Email, Phone) VALUES ('$Name', '$Email', '$Phone')";
$result = mysqli_query($conn, $sql1);

if ($result) {
    echo "Signup successful";
} else {
    echo "Sign up error";
}
mysqli_close($conn);

?>