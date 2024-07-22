<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Name = $_GET['name'];
$Password = $_GET['password'];


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";

$sql = "SELECT * FROM test WHERE Name = '$Name' AND Password = '$Password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    
    $_SESSION['Name'] = $row['Name'];  
    echo "Login successful";
    header("Location: landing page/index.html");
} else {
    echo "Invalid login";
}

mysqli_close($conn);

?>