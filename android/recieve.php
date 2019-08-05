<?php
require_once('settings.php');
require_once('google-login-api.php');

$servername = "localhost";
$username = "hf79csgsn2da";
$password = "Sk@2991993";
$dbname = "oauth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM tokens2 WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
        $mToken=$row["idToken"];
        $code=$row["authCode"];

echo json_encode($row);		
    }
    
}
else {
    echo "0 results";
}







$conn->close();
?>