<?php
// Database connection
require_once '../db/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $location = $_POST['location'];
    $ownership = $_POST['ownership'];
    $units = $_POST['units'];

    // Validate and sanitize inputs here

    $stmt = $conn->prepare("UPDATE buildings SET
                          location = ?,
                          ownership = ?,
                          units = ?
                          WHERE building_id = ?");
    $stmt->bind_param("ssii", $location, $ownership, $units, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
}
?>
