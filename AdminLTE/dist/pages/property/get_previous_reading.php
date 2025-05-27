<?php
header('Content-Type: application/json');

// Include your database connection file (e.g., db_connect.php)
// Make sure this file contains the necessary database connection logic
require_once '../db/connect.php'; // Adjust the path as needed

$response = ['previous_reading' => null];

if (isset($_GET['unit_number']) && isset($_GET['meter_type'])) {
    $unitNumber = $_GET['unit_number'];
    $meterType = $_GET['meter_type'];

    // Prepare a statement to fetch the latest reading for the selected unit and meter type
    // Assuming your meter readings table is named 'meter_readings' and has columns like 'unit_number', 'meter_type', 'current_reading', 'reading_date'
    $stmt = $pdo->prepare("SELECT current_reading FROM meter_readings WHERE unit_number = :unit_number AND meter_type = :meter_type ORDER BY reading_date DESC, id DESC LIMIT 1");
    $stmt->execute(['unit_number' => $unitNumber, 'meter_type' => $meterType]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $response['previous_reading'] = $result['current_reading'];
    }
}

echo json_encode($response);
?>