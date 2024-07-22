<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Name = $_POST['name'];
$Password = $_POST['password'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";


$sql = "INSERT INTO test(Name, Password, email, phone) VALUES ('$Name', '$Password', '$Email', '$Phone')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Signup successful";
} else {
    echo "Sign up error";
}
mysqli_close($conn);
header("Location: test.html");

?>