<?php 
$conn = new mysqli('localhost', 'root', '', 'hm');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>