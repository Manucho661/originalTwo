<?php
// update_property.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the required fields
    if (isset($_POST['building_id'], $_POST['location'], $_POST['ownership'], $_POST['units'])) {
        // Sanitize and assign POST data
        $building_id = intval($_POST['building_id']);
        $location = htmlspecialchars($_POST['location']);
        $ownership = htmlspecialchars($_POST['ownership']);
        $units = intval($_POST['units']);

        // Database connection
        include '../db/connect.php';  // Make sure to include the DB connection file

        // Prepare the update query
        $query = "UPDATE buildings SET county = ?, ownership_info = ?, units_number = ? WHERE building_id = ?";

        if ($stmt = $conn->prepare($query)) {
            // Bind the parameters
            $stmt->bind_param("ssii", $location, $ownership, $units, $building_id);

            // Execute the query
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Property details updated successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update property details.']);
            }

            // Close the statement
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare the query.']);
        }

        // Close the database connection
        $conn->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
    }
}
?>
