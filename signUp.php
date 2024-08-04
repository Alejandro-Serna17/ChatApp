<?php
$nameP = $_POST['username']; // Retrieving username from the signup form
$password = $_POST['password']; // Retrieving password from the signup form
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

// Prepare a SQL statement to insert a new user into the ChatDB table
$sql = "INSERT INTO ChatDB (Name, Password, LiveChat) VALUES (?, ?, '')";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param("ss", $nameP, $password);

// Execute the prepared statement to insert the new user
if ($stmt->execute()) {
    $result4 = '<p class="center-p"><strong>User created successfully</strong> </p>';
} else {
    $result4 = 'Error: ' . $sql . ' ' . $conn->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

echo $result4;
echo '<a class="center-a" href="https://web.njit.edu/~as4384/ChatApp.html">Start Chatting!</a>';
echo '<link rel="stylesheet" type="text/css" href="signUp.css">';

?>
