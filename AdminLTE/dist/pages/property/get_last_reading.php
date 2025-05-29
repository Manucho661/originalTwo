<?php
// Database connection
require_once '../db/connect.php';

header('Content-Type: application/json');

$unitNumber = $_GET['unit_number'] ?? '';
$meterType = $_GET['meter_type'] ?? '';

if (empty($unitNumber) || empty($meterType)) {
    echo json_encode(['success' => false, 'message' => 'Unit number and meter type are required']);
    exit;
}

try {
    // Query to get the last reading for this unit and meter type
    $stmt = $pdo->prepare("
        SELECT current_reading
        FROM meter_readings
        WHERE unit_number = :unit_number AND meter_type = :meter_type
        ORDER BY reading_date DESC, created_at DESC
        LIMIT 1
    ");
    $stmt->execute([':unit_number' => $unitNumber, ':meter_type' => $meterType]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode(['success' => true, 'last_reading' => $result['current_reading']]);
    } else {
        echo json_encode(['success' => true, 'last_reading' => null]);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>