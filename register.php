<?php
$server_name = "localhost";
$username = "webproject";
$password = "Kiran@1234";
$database_name = "database123";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $role = $_POST['new_selected_role'];
    $username = $_POST['new-username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password_hash = password_hash($_POST["new-password"], PASSWORD_DEFAULT); // Hash the password

    // Use prepared statements to prevent SQL injection
    $sql_query = "INSERT INTO register_user (selected_role, username, email, phone, password_hash)
                  VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql_query);

    if ($stmt) {
        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, "sssss", $role, $username, $email, $phone, $password_hash);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: thank_you.html");
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing the statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>






