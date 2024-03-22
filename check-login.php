<?php
// check-login.php

// Include database connection
require_once "db.php";

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT * FROM logins WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            echo json_encode(array("success" => true, "message" => "Login successful"));
        } else {
            echo json_encode(array("success" => false, "message" => "Invalid username or password"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Username or password is empty"));
    }
}

$conn->close();
?>
