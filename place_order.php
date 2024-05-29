<?php
session_start();

// Get the username from the session
$username = $_SESSION['Username'];

// Get other order details from the POST request
$address = $_POST['address'];
$items = $_POST['items'];
$price = $_POST['price'];

// Insert order details into the database
$server = "localhost";
$db_username = "root"; // Changed variable name here
$password = "";
$dbname = "cart";

// Create connection
$conn = new mysqli($server, $db_username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO orders (Username, Address, Items, Price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $username, $address, $items, $price);

// Execute SQL statement
if ($stmt->execute() === TRUE) {
    echo "Order placed successfully.";
} else {
    echo "Error placing order: " . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
