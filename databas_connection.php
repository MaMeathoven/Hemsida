<?php

// Replace these variables with your actual database credentials
$servername = "sql212.epizy.com";
$username = "epiz_34035076";
$password = "pnxUiFQEza";
$dbname = "epiz_34035076_databas";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO users (mail, username, password, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $mail, $username, $password, $firstname, $lastname);

// Set the user information from the POST request
$mail = $_POST["mail"];
$username = $_POST["username"];
$password = $_POST["password"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

// Execute the statement
if ($stmt->execute() === TRUE) {
    echo "User created successfully";
} else {
    echo "Error creating user: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
