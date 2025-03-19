<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "gift_station";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//  else {
//     echo "Database connected successfully!";
// }
?>
