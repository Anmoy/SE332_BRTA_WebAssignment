<?php

include_once "assets/php/connection.php";
$email= $_POST ["email"];
$sql = "INSERT INTO `subscribers` (`email`) VALUES ('$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>