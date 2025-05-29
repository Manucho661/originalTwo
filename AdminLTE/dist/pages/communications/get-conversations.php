<?php
include '../db/connect.php';

$building_id = $_GET['building_id'] ?? null;

if (!$building_id) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("
    SELECT
        c.thread_id,
        c.title,
        c.tenant,
        c.created_at,
        c.building_name,
        c.message,
        (
            SELECT content
            FROM messages
            WHERE thread_id = c.thread_id
            ORDER BY timestamp DESC
            LIMIT 1
        ) AS last_message,
        (
            SELECT timestamp
            FROM messages
            WHERE thread_id = c.thread_id
            ORDER BY timestamp DESC
            LIMIT 1
        ) AS last_time,
        (
            SELECT COUNT(*)
            FROM messages
            WHERE thread_id = c.thread_id AND is_read = 0
        ) AS unread_count,
        (
            SELECT file_path
            FROM message_files
            WHERE thread_id = c.thread_id
            LIMIT 1
        ) AS preview_file
    FROM communication c
    WHERE c.building_id = ?
    ORDER BY last_time DESC
");

$stmt->execute([$building_id]);
$communications = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($communications);
?>
