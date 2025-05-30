<?php
// get_property_details.php

if (isset($_GET['building_id'])) {
    $building_id = intval($_GET['building_id']);

    // Include database connection
    include '../db/connect.php';  // Include your DB connection

    try {
        // Get the building details using prepared statement
        $query = "SELECT * FROM buildings WHERE building_id = :building_id";
        $stmt = $pdo->prepare($query);

        // Bind the parameter
        $stmt->bindParam(':building_id', $building_id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result
        $building = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($building) {
            echo json_encode(['success' => true, 'building' => $building]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Building not found.']);
        }

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }

    // Optionally, the PDO connection will automatically close when the script ends
    $pdo = null;
}
?>
