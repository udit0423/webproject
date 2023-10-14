<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $mode = $_POST["mode"];

    // Data to be saved in CSV format
    $data = array($name, $email, $phone, $mode);

    // Open the CSV file for writing (you can adjust the filename and path)
    $csvFile = 'data.csv';
    $file = fopen($csvFile, 'a'); // 'a' mode appends to the file

    // Write the data to the CSV file
    fputcsv($file, $data);

    // Close the CSV file
    fclose($file);

    header("Location: thank_you.html"); 
} else {

    echo "Form not submitted.";
}
?>
