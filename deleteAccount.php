<?php
$nameP = $_POST['username']; // Retrieving username from the delete form
$password = $_POST['password']; // Retrieving password from the delete form
$servername = "";
$username = "";
$dbpassword = "";
$dbname = "";

// Create a new MySQLi object to establish a connection to the database
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement with placeholders
$sql = "DELETE FROM ChatDB WHERE Name = ? AND Password = ?";
$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param("ss", $nameP, $password);

// Execute the prepared statement to delete the user
if ($stmt->execute()) {
    $result4 = 'Sorry to see you go...';
} else {
    $result4 = 'Error deleting account. Please try again.';
    $statement = 'Keep in mind data is case sensitive';
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

echo $result4;
echo $statement;
?>