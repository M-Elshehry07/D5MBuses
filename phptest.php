<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$Name = $_POST['name'];
$Password = sha1($_POST['password']);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";

$sql = "SELECT * FROM admin WHERE Username = '$Name' AND Password = '$Password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['Name'] = $row['Name'];
    echo "Login successful";
    header("Location:admin2.php");
} else {
    echo "Invalid login";
}

mysqli_close($conn);

?>