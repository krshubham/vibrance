<?php
define("DB_SERVER", "localhost");
define("DB_USER", "rrobotic_root");
define("DB_PASS", "KinG82++");
define("DB_NAME", "rrobotic_r2robotics");

// Create connection
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>