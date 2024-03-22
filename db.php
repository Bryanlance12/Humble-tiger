<?php
// db.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Humble-tiger"; // Change to your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(array("success" => false, "message" => "Connection failed: " . $conn->connect_error)));
}
?>
