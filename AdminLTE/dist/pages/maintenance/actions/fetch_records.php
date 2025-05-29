<?php
header('Content-Type: application/json');

require_once '../../db/connect.php';

try {
    // Step 2: Now fetch the inspections
    $stmt = $pdo->prepare("SELECT * FROM maintenance_requests");
    $stmt->execute();
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Step 3: Send JSON response
    echo json_encode([
        'success' => true,
        'data' => $requests
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
