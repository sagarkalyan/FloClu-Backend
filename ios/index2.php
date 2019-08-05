<?php
$servername = "localhost";
$username = "hf79csgsn2da";
$password = "Sk@2991993";
$db = "floclu";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
