<?php
require_once '../db/connect.php';

header('Content-Type: application/json');

// Validate input - FIXED THE SYNTAX ERROR HERE
if (!isset($_GET['unit'])) {
    die(json_encode(['error' => 'Unit parameter missing']));
}

$unitNumber = trim($_GET['unit']);

try {
    // Query to get the latest reading for ANY meter type
    $stmt = $pdo->prepare("SELECT current_reading
                          FROM meter_readings
                          WHERE unit_number = :unit
                          ORDER BY reading_date DESC
                          LIMIT 1");
    $stmt->bindParam(':unit', $unitNumber, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['current_reading'])) {
        echo json_encode([
            'success' => true,
            'previous_reading' => (float)$result['current_reading']
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'previous_reading' => null
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?>