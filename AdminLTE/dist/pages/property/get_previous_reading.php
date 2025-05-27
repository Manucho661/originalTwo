<?php
header('Content-Type: application/json');

// Include DB connection
require_once '../db/connect.php'; // Make sure this file has your PDO or MySQLi connection

// Get unit and meter type from query string
$unitNumber = $_GET['unit_number'] ?? '';
$meterType = $_GET['meter_type'] ?? '';

// Sanitize inputs
$unitNumber = trim($unitNumber);
$meterType = trim($meterType);

// Validate inputs
if (empty($unitNumber) || empty($meterType)) {
    echo json_encode(['found' => false]);
    exit;
}

// Query to fetch the latest previous reading
$query = "SELECT current_reading
          FROM meter_readings
          WHERE unit_number = ? AND meter_type = ?
          ORDER BY reading_date DESC, id DESC
          LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $unitNumber, $meterType);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode([
        'found' => true,
        'previous_reading' => $row['current_reading']
    ]);
} else {
    echo json_encode(['found' => false]);
}
?>
