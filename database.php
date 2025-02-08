<?php
session_start();
// session_destroy();
$servername = "localhost"; // या 127.0.0.1
$username = "root"; // अपने MySQL का यूजरनेम डालें
$password = ""; // अगर पासवर्ड है तो डालें, नहीं तो खाली छोड़ दें
$dbname = "phptutorial"; // आपके डेटाबेस का नाम

// Create Connection
$conn = @new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
