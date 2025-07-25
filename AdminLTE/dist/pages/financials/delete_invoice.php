<?php
require_once '../db/connect.php';

header('Content-Type: application/json');

if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Invoice ID not provided']);
    exit;
}

$invoiceId = $_POST['id'];

try {
    // First check if invoice exists and is deletable (draft or cancelled)
    $stmt = $pdo->prepare("SELECT status FROM invoice WHERE id = ?");
    $stmt->execute([$invoiceId]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$invoice) {
        echo json_encode(['success' => false, 'message' => 'Invoice not found']);
        exit;
    }

    if ($invoice['status'] !== 'draft' && $invoice['status'] !== 'cancelled') {
        echo json_encode(['success' => false, 'message' => 'Only draft or cancelled invoices can be deleted']);
        exit;
    }

    // Delete the invoice
    $stmt = $pdo->prepare("DELETE FROM invoice WHERE id = ?");
    $stmt->execute([$invoiceId]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>