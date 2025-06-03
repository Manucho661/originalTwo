<?php
require 'vendor/autoload.php'; // adjust path if needed
include '../db/connect.php';

use Dompdf\Dompdf;

// Fetch data from DB
$stmt = $pdo->query("SELECT * FROM building_rent_summary");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Start output buffering to capture HTML
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table { border-collapse: collapse; width: 100%; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h3>Building Rent Summary</h3>
    <table>
        <thead>
            <tr>
                <th>Building</th>
                <th>Collected</th>
                <th>Penalties</th>
                <th>Arrears</th>
                <th>Overpayment</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['building_name']) ?></td>
                    <td>$ <?= number_format($row['amount_collected'], 2) ?></td>
                    <td>$ <?= number_format($row['penalties'], 2) ?></td>
                    <td>$ <?= number_format($row['arrears'], 2) ?></td>
                    <td>$ <?= number_format($row['overpayment'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$html = ob_get_clean();

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("rent-summary.pdf", ["Attachment" => true]); // true = force download
exit;
