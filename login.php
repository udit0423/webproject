<?php
// User login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establish a database connection
    $db = new mysqli('localhost', 'webproject', 'Kiran@1234', 'database123');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $query = "SELECT selected_role, password_hash FROM register_user WHERE username = ?";

    // Using prepared statements to prevent SQL injection
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($storedRole, $storedHashedPassword);
        $stmt->fetch();

        // Verify the entered password against the stored hashed password
        if (password_verify($password, $storedHashedPassword)) {
            // Password is correct, allow access
            echo "Login successful. You are now authenticated as '$storedRole'!";
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
    } else {
        echo "Error in SQL query: " . $db->error;
    }

    $db->close();
}