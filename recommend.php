<?php
$servername = "localhost"; // Update with your server info
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "college_recommendation"; // Update with your database name

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and fetch percentile input
$percentile = isset($_POST['percentile']) ? floatval($_POST['percentile']) : 0;

$sql = "SELECT college_name, course_name FROM recommendations WHERE percentile <= ? ORDER BY percentile DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("d", $percentile);
$stmt->execute();
$result = $stmt->get_result();

$recommendations = [];
while ($row = $result->fetch_assoc()) {
    $recommendations[] = $row;
}

$stmt->close();
$conn->close();

include 'recommend.html';
?>
