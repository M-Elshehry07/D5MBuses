<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Name = $_GET['name'];
// $Bus = $_POST['bus'];
$Phone = sha1($_GET['password']);
// $Point = $_POST['point'];
// $Seat = $_POST['seat'];
// $Time[] = $_POST['time'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql1 = "INSERT INTO admin(username, Password) VALUES ('$Name', '$Phone')";
$result = mysqli_query($conn, $sql1);

if ($result) {
    echo "Signup successful";
} else {
    echo "Sign up error";
}
mysqli_close($conn);

?>