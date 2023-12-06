<?php
include_once "assets/php/connection.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION ['username'] = $username;
    header("Location: applicants.php");
    exit();
} else {
    echo "Login failed. Please check your username and password.";
}

$conn->close();
?>
