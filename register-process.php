<?php
// Database connection
require_once "db.php";

// Registration logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if the username already exists
        $stmt = $conn->prepare("SELECT * FROM logins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(array("success" => false, "message" => "Username already exists"));
        } else {
            // Insert new user into the database
            $stmt = $conn->prepare("INSERT INTO logins (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);

            if ($stmt->execute()) {
                echo json_encode(array("success" => true, "message" => "Registration successful"));
            } else {
                echo json_encode(array("success" => false, "message" => "Error occurred during registration"));
            }
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Username or password is empty"));
    }
}

$conn->close();
?>
