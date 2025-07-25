<?php
 include '../db/connect.php';


header('Content-Type: application/json');

$building = isset($_GET['building']) ? $_GET['building'] : 'all';

if ($building === 'all') {
    $sql = "SELECT
            users.id,
            users.first_name,
            users.middle_name,
            users.email,
            tenants.phone_number,
            tenants.user_id,
            tenants.id_no,
            tenants.unit_id,
            tenants.status,
            buildings.building_name AS building_name,
            units.unit_number AS unit_number
        FROM tenants
        INNER JOIN users ON tenants.user_id = users.id
        INNER JOIN buildings ON tenants.building_id = buildings.building_id
        INNER JOIN units ON tenants.unit_id = units.unit_id
        ORDER BY
            CASE WHEN tenants.status = 'active' THEN 0 ELSE 1 END;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
 else {
    $sql = "SELECT users.id, users.first_name, users.middle_name, users.email,
               tenants.phone_number, tenants.user_id, tenants.building_id,
               tenants.id_no, tenants.unit_id, tenants.status
        FROM tenants
        INNER JOIN users ON tenants.user_id = users.id
        WHERE tenants.building_id = :building
        ORDER BY
            CASE WHEN tenants.status = 'active' THEN 0 ELSE 1 END";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['building' => $building]);
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);

?>


