<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$confPass = $_POST['confPass'];
$ID = $_POST['id'];

$_SESSION['msg'] = '';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$hashedOldPass = sha1($oldPass);

$sql = "SELECT Password FROM admin WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ID);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$storedPass = $row['Password'];

if ($hashedOldPass !== $storedPass) {
    $_SESSION['msg'] = $_SESSION['msg'] . "- Old password is incorrect <br>" . $hashedOldPass . "<br>" . $storedPass . "<br>";
}

if ($newPass !== $confPass) {
    $_SESSION['msg'] = $_SESSION['msg'] . "-New password and confirm password do not match";
}

if ($_SESSION['msg'] !== '') {
    header("Location: edit_admin.php?id=$ID");
} else {
    $hashedNewPass = sha1($newPass);
    $sql = "UPDATE admin SET Password=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashedNewPass, $ID);
    $stmt->execute();
    header("Location: AdminPage.php");
}

$stmt->close();