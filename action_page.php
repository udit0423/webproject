<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
        // Handle signup
        $email = $_POST["email"];
        $password = $_POST["psw"];
        header("Location: thank_you_page.html");
    } elseif (isset($_POST["login"])) {
        // Handle login
        $email = $_POST["email"];
        $password = $_POST["psw"];
        // You should validate and sanitize user input here
        
        // Check the user's credentials against a database or other authentication method
        // If authentication is successful, set a session variable to indicate the user is logged in.
        
        // Redirect the user to a dashboard or home page after successful login
        header("Location: loginsignuppage.html");
    }
}
?>
