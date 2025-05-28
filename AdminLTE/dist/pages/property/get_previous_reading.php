<?php
header('Content-Type: application/json');
require '../db/connect.php'; // Update to your actual DB connection file

$unit_number = $_GET['unit_number'] ?? '';
$meter_type = $_GET['meter_type'] ?? '';

$response = ['previous_reading' => null];

if ($unit_number && $meter_type) {
    $stmt = $pdo->prepare("
        SELECT current_reading
        FROM meter_readings
        WHERE unit_number = ? AND meter_type = ?
        ORDER BY reading_date DESC
        LIMIT 1
    ");
    $stmt->execute([$unit_number, $meter_type]);
    $lastReading = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($lastReading) {
        $response['previous_reading'] = $lastReading['current_reading'];
    }
}

echo json_encode($response);
