<?php
$conn = new mysqli("localhost", "root", "", "instituition");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
