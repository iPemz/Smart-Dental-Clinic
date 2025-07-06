<?php
// config.php - Basic configuration file
$site_name = "My Dental Clinic";
$base_url = "http://localhost/ssdc";

// Database credentials
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "smart_database";

// Establish database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
