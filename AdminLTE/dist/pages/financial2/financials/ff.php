<?php
require_once '../db/connect.php';

// Check if invoice ID is provided
if (!isset($_GET['id'])) {
    header('Location: invoices.php');
    exit;
}

$invoiceId = (int)$_GET['id'];

// Fetch invoice data
$stmt = $pdo->prepare("SELECT * FROM invoice WHERE id = ?");
$stmt->execute([$invoiceId]);
$invoiceData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoiceData) {
    header('Location: invoices.php');
    exit;
}

// Format dates for HTML input
$invoiceData['invoice_date'] = $invoiceData['invoice_date'] == '0000-00-00' ? '' : $invoiceData['invoice_date'];
$invoiceData['due_date'] = $invoiceData['due_date'] == '0000-00-00' ? '' : $invoiceData['due_date'];

// Fetch buildings and account items
$buildings = $pdo->query("SELECT * FROM buildings")->fetchAll();
// $accountItem s = $pdo->query("SELECT * FROM account_items")->fetchAll();
?>

<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php if (isset($successMessage)) echo "<div class='alert alert-success'>$successMessage</div>"; ?>
    <?php if (isset($errorMessage)) echo "<div class='alert alert-danger'>$errorMessage</div>"; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE | Dashboard v2</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE | Dashboard v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!-- LINKS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css"/>
    <link rel="stylesheet" href="invoices.css">
    <!-- <link rel="stylesheet" href="text.css" /> -->
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="expenses.css">
    <!-- scripts for data_table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- Pdf pluggin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<!-- Add these to your head or before closing body -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Tailwind CSS  -->
    <style>

          a {
            text-decoration: none;
            color: inherit;
        }

        .pay-btn {
    margin-top: 6px;
    padding: 4px 10px;
    font-size: 12px;
    font-weight: 600;
    background-color: #FFC107;
    color: #00192D;
    border: none;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}
.pay-btn:hover {
    background-color: #e6ae00;
    color: white;
}

        ul {
            list-style: none;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #2a5bd7;
            color: white;
            border: 1px solid #2a5bd7;
        }

        .btn-primary:hover {
            background-color: #1e4bc4;
            border-color: #1e4bc4;
        }

        .btn-outline {
            background-color: transparent;
            color: #2a5bd7;
            border: 1px solid #2a5bd7;
        }

        .btn-outline:hover {
            background-color: #f0f5ff;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #2a5bd7;
        }

        .logo span {
            color: #ff6b00;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #4a5568;
        }

        /* Sidebar Navigation */
        .app-container {
            display: flex;
            min-height: calc(100vh - 66px);
        }



        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f5f7fa;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 24px;
            color: #1a365d;
        }

        .page-actions {
            display: flex;
            gap: 10px;
        }

        /* Invoice List */
        .invoice-list-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .invoice-list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .invoice-list-title {
            font-weight: 600;
            color: #1a365d;
        }

        .invoice-list-filters {
            display: flex;
            gap: 15px;
        }

        .filter-dropdown {
            position: relative;
        }

        .filter-btn {
            background-color: transparent;
            border: 1px solid #e2e8f0;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            color: #4a5568;
        }

        .filter-btn:hover {
            background-color: #f8fafc;
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            min-width: 200px;
            z-index: 10;
            display: none;
        }

        .filter-dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu ul {
            padding: 10px 0;
        }

        .dropdown-menu li {
            padding: 8px 15px;
            cursor: pointer;
        }

        .dropdown-menu li:hover {
            background-color: #f8fafc;
        }

        .invoice-list {
            padding: 0;
        }

        .invoice-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            transition: background-color 0.2s ease;
        }

        .invoice-item:hover {
            background-color: #f8fafc;
        }

        .invoice-checkbox {
            margin-right: 15px;
        }

        .invoice-number {
            width: 120px;
            font-weight: 600;
            color: #2a5bd7;
        }

        .invoice-customer {
            flex: 1;
            color: #4a5568;
        }

        .invoice-date {
            width: 100px;
            color: #718096;
            font-size: 14px;
        }

        .invoice-amount {
            width: 100px;
            font-weight: 600;
            text-align: right;
        }

        .invoice-status {
            width: 100px;
            text-align: center;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-paid {
            background-color: #e6fffa;
            color: #38b2ac;
        }

        .status-pending {
            background-color: #fffaf0;
            color: #dd6b20;
        }

        .status-overdue {
            background-color: #fff5f5;
            color: #f56565;
        }

        .invoice-actions {
            width: 80px;
            display: flex;
            justify-content: flex-end;
        }

        .action-btn {
            background: none;
            border: none;
            color: #718096;
            cursor: pointer;
            padding: 5px;
        }

        .action-btn:hover {
            color: #2a5bd7;
        }

        /* Create Invoice Page */
        .invoice-form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            color: #1a365d;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a5568;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #2a5bd7;
        }

        .form-control-sm {
            padding: 6px 8px;
            font-size: 13px;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .items-table th {
            text-align: left;
            padding: 10px;
            background-color: #f8fafc;
            color: #718096;
            font-weight: 500;
            font-size: 13px;
        }

        .items-table td {
            padding: 12px 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .item-row input {
            width: 100%;
            border: 1px solid #e2e8f0;
            padding: 8px;
            border-radius: 4px;
        }

        .item-row input:focus {
            outline: none;
            border-color: #2a5bd7;
        }

        .item-name {
            width: 40%;
        }

        .item-qty, .item-rate, .item-amount {
            width: 15%;
        }

        .item-actions {
            width: 15%;
            text-align: center;
        }

        .remove-item {
            color: #f56565;
            cursor: pointer;
        }

        .add-item-btn {
            background-color: transparent;
            border: none;
            color: #2a5bd7;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px;
        }

        /* Summary Section */
        .summary-row {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .summary-label {
            width: 150px;
            text-align: right;
            padding-right: 20px;
            color: #718096;
        }

        .summary-value {
            width: 150px;
            text-align: right;
            font-weight: 500;
        }

        .total-row {
            border-top: 1px solid #e2e8f0;
            padding-top: 15px;
            margin-top: 15px;
            font-size: 16px;
        }

        .total-value {
            color: #2a5bd7;
            font-weight: 600;
        }

        .invoice-header .over-flow {
    font-weight: bold;
}
.invoice-header {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
}

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .action-left {
            display: flex;
            gap: 10px;
        }

        .action-right {
            display: flex;
            gap: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .app-container {
                flex-direction: column;
            }


            .invoice-item {
                flex-wrap: wrap;
                gap: 10px;
            }

            .invoice-number, .invoice-customer, .invoice-date, .invoice-amount, .invoice-status, .invoice-actions {
                width: auto;
                flex: 1 1 100px;
            }

            .form-row {
                flex-direction: column;
                gap: 10px;
            }

            .items-table th, .items-table td {
                padding: 8px 5px;
            }
        }



        #invoicePreviewPanel {
  position: fixed;
  top: 0;
  right: -100%;
  width: 400px;
  height: 100vh;
  background: #fff;
  box-shadow: -2px 0 8px rgba(0,0,0,0.3);
  transition: right 0.3s ease-in-out;
  z-index: 9999;
}

#invoicePreviewPanel.active {
  right: 0;
}

.preview-content {
  padding: 20px;
  overflow-y: auto;
  height: 100%;
}

.close-btn {
  position: absolute;
  right: 10px;
  top: 10px;
  font-size: 24px;
  background: none;
  border: none;
  cursor: pointer;
}
.filter-dropdown {
    position: relative;
    display: inline-block;
}

.filter-btn {
    padding: 8px 12px;
    cursor: pointer;
    border: 1px solid #ccc;
    background-color: #fff;
    display: flex;
    align-items: center;
    gap: 6px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    display: none;
    background-color: white;
    border: 1px solid #ddd;
    z-index: 100;
    min-width: 120px;
}

.dropdown-menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.dropdown-menu ul li {
    padding: 10px;
    cursor: pointer;
}

.dropdown-menu ul li:hover {
    background-color: #f0f0f0;
}

.filter-dropdown.open .dropdown-menu {
    display: block;
}

.searchable-item-container {
  position: relative;
  width: 100%;
}

.searchable-item-input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
  box-sizing: border-box;
}

.searchable-item-dropdown {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  min-width: 250px; /* Ensure enough width for content */
  max-height: 300px; /* Increased to show more items */
  overflow-y: auto;
  background: white;
  border: 1px solid #ddd;
  border-top: none;
  border-radius: 0 0 4px 4px;
  z-index: 1000;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.searchable-item-group {
  padding: 5px 0;
}

.searchable-item-option {
  padding: 8px 15px;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
  white-space: nowrap; /* Prevent text wrapping */
  overflow: hidden;
  text-overflow: ellipsis;
}

.searchable-item-option:hover {
  background-color: #f5f5f5;
}

.account-code {
  font-weight: bold;
  margin-right: 10px;
  color: #555;
  min-width: 60px; /* Ensure code column has consistent width */
}

.account-name {
  flex-grow: 1;
  text-overflow: ellipsis;
  overflow: hidden;
}
.payment-status-badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    min-width: 60px;
    text-align: center;
    border: 1px solid #FFC107; /* Border color for all payment statuses */
}

.badge-payment-paid {
    background-color: #e6f7ee;
    color: #00192D; /* Dark blue text */
}

.badge-payment-partial {
    background-color: #fff8e6;
    color: #00192D; /* Dark blue text */
    border-color: #FFC107; /* Yellow border */
}

.badge-payment-unpaid {
    background-color: #ffebee;
    color: #00192D; /* Dark blue text */
    border-color: #FFC107; /* Yellow border */
}

/* Status Badges (existing) */
.status-badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    min-width: 60px;
    text-align: center;
}

.badge-sent {
    background-color: #e3f2fd;
    color: #1565c0;
}

.badge-paid {
    background-color: #e8f5e9;
    color: #2e7d32;
}

.badge-overdue {
    background-color: #ffebee;
    color: #c62828;
}

.badge-cancelled {
    background-color: #efebe9;
    color: #4e342e;
}

.badge-draft {
    background-color: #e0e0e0;
    color: #424242;
}
.invoice-menu button {
    display: block;
    width: 100%;
    padding: 6px 12px;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
}
.invoice-menu button:hover {
    background-color: #f1f1f1;
}
.hidden {
    display: none;
}

      </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <?php include_once '../includes/header.php' ?>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.html" class="brand-link">

                    <!--begin::Brand Text-->
                    <span class="brand-text font-weight-light"><b class="p-2"
                            style="background-color:#FFC107; border:2px solid #FFC107; border-top-left-radius:5px; font-weight:bold; color:#00192D;">BT</b><b
                            class="p-2"
                            style=" border-bottom-right-radius:5px; font-weight:bold; border:2px solid #FFC107; color: #FFC107;">JENGOPAY</b></span>
                </a>
                </span>
                <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->
            <!--begin::Sidebar Wrapper-->
            <div> <?php include_once '../includes/sidebar1.php'; ?> </div> <!-- This is where the sidebar is inserted -->
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--MAIN MODALS -->
            <!-- add new inspection modal-->

            

<div class="page-container">
        <div class="main-content">
            <div id="create-invoice-view">
                <input type="hidden" id="invoice-id" name="invoice_id" value="<?= $invoiceData['id'] ?>">

                <div class="page-header">
                    <h1 class="page-title">Edit Invoice</h1>
                    <div class="page-actions">
                        <button class="btn btn-outline" id="cancel-invoice-btn" style="color: #FFC107; background-color:#00192D;">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button id="saveDraftBtn" class="btn btn-outline" style="color: #FFC107; background-color:#00192D;" type="button">
                            <i class="fas fa-save"></i> Save Draft
                        </button>
                        <button class="btn btn-primary" id="preview-invoice-btn" style="color: #FFC107; background-color:#00192D;">
                            <i class="fas fa-eye"></i> Preview
                        </button>
                    </div>
                </div>

                <!-- Sliding Preview Panel -->
                <div id="invoicePreviewPanel">
                    <div class="preview-content">
                        <button id="closePreview" class="close-btn">&times;</button>
                        <h3>Invoice Preview</h3>
                        <div id="previewContent">
                            <!-- Populated by JS -->
                        </div>
                    </div>
                </div>

                <div class="invoice-form-container">
                    <!-- Customer Section -->
                    <div class="form-section">
                        <h3 class="section-title">Tenant Details</h3>
                        <form method="POST" action="update_draft.php">
                            <input type="hidden" name="invoice_id" value="<?= $invoiceData['id'] ?>">
                            
                            <div class="form-row">
                                <!-- Invoice # input -->
                                <div class="form-group">
                                    <label for="invoice-number">Invoice #</label>
                                    <input type="text"
                                           id="invoice-number"
                                           value="<?= htmlspecialchars($invoiceData['invoice_number']) ?>"
                                           class="form-control"
                                           readonly>
                                    <input type="hidden"
                                           name="invoice_number"
                                           value="<?= htmlspecialchars($invoiceData['invoice_number']) ?>">
                                </div>

                                <!-- Building selector -->
                                <div class="form-group">
                                    <label for="building">Building</label>
                                    <select id="building" name="building_id" class="form-control" required>
                                        <option value="">Select a Building</option>
                                        <?php foreach ($buildings as $b): ?>
                                            <option value="<?= $b['building_id'] ?>"
                                                <?= ($invoiceData['building_id'] == $b['building_id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($b['building_name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Tenant selector -->
                                <div class="form-group">
                                    <label for="customer">Tenant</label>
                                    <select id="customer"
                                           name="tenant"
                                           class="form-control"
                                           required>
                                        <option value="">Select a Tenant</option>
                                        <?php 
                                        // Fetch the specific tenant
                                        $tenantStmt = $pdo->prepare("SELECT id, first_name, middle_name FROM users WHERE id = ?");
                                        $tenantStmt->execute([$invoiceData['tenant']]);
                                        $tenant = $tenantStmt->fetch();
                                        if ($tenant): ?>
                                            <option value="<?= $tenant['id'] ?>" selected>
                                                <?= htmlspecialchars($tenant['first_name'] . ' ' . $tenant['middle_name']) ?>
                                            </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="invoice-date">Invoice Date</label>
                                    <input type="date"
                                           id="invoice-date"
                                           name="invoice_date"
                                           value="<?= $invoiceData['invoice_date'] ?>"
                                           class="form-control"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label for="due-date">Due Date</label>
                                    <input type="date"
                                           id="due-date"
                                           name="due_date"
                                           value="<?= $invoiceData['due_date'] ?>"
                                           class="form-control"
                                           required>
                                </div>
                            </div>

                            <!-- Items Section -->
                            <div class="form-section">
                                <h3 class="section-title">Items</h3>
                                <table class="items-table">
                                    <thead>
                                        <tr>
                                            <th>Item (Service)</th>
                                            <th>Description</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Taxes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="account_item[]" class="select-account searchable-select" required>
                                                    <option value="" disabled>Select Account Item</option>
                                                    <?php foreach ($accountItems as $item): ?>
                                                        <option value="<?= htmlspecialchars($item['account_code']) ?>"
                                                            <?= ($invoiceData['account_item'] == $item['account_code']) ? 'selected' : '' ?>>
                                                            <?= htmlspecialchars($item['account_name']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <textarea name="description[]" rows="1" required><?= htmlspecialchars($invoiceData['description']) ?></textarea>
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="quantity[]" 
                                                       class="form-control quantity" 
                                                       value="<?= htmlspecialchars($invoiceData['quantity']) ?>" 
                                                       required>
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="unit_price[]" 
                                                       class="form-control unit-price" 
                                                       value="<?= htmlspecialchars($invoiceData['unit_price']) ?>" 
                                                       required>
                                            </td>
                                            <td>
                                                <select name="taxes[]" class="form-select vat-option" required>
                                                    <option value="" disabled>Select Option</option>
                                                    <option value="inclusive" <?= ($invoiceData['taxes'] == 'inclusive') ? 'selected' : '' ?>>VAT 16% Inclusive</option>
                                                    <option value="exclusive" <?= ($invoiceData['taxes'] == 'exclusive') ? 'selected' : '' ?>>VAT 16% Exclusive</option>
                                                    <option value="zero" <?= ($invoiceData['taxes'] == 'zero') ? 'selected' : '' ?>>Zero Rated</option>
                                                    <option value="exempted" <?= ($invoiceData['taxes'] == 'exempted') ? 'selected' : '' ?>>Exempted</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" 
                                                       name="total[]" 
                                                       class="form-control total" 
                                                       value="<?= htmlspecialchars($invoiceData['total']) ?>" 
                                                       readonly 
                                                       style="display:none;">
                                                <button type="button" class="btn btn-sm btn-danger delete-btn" onclick="deleteRow(this)" title="Delete">
                                                    <i class="fa fa-trash" style="font-size: 12px;"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="add-btn" onclick="addRow()">
                                    <i class="fa fa-plus"></i> ADD MORE
                                </button>
                            </div>

                            <!-- Notes -->
                            <div class="form-section">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="notes">Notes(Optional)</label>
                                        <textarea id="notes" name="notes" class="form-control" rows="3"><?= htmlspecialchars($invoiceData['notes']) ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <div class="action-left">
                                    <button class="btn btn-outline">
                                        <i class="fas fa-paperclip"></i> Attach File
                                    </button>
                                </div>
                                <div class="action-right">
                                    <button type="submit" style="background-color: #00192D; color: #FFC107; padding: 8px 16px; border: none; border-radius: 4px;">
                                        <i class="fas fa-envelope"></i>
                                        Update Invoice
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Initialize select2 if used
        if ($.fn.select2) {
            $('.searchable-select').select2();
        }
        
        // Handle building change to load tenants
        $('#building').change(function() {
            const buildingId = $(this).val();
            if (buildingId) {
                loadTenants(buildingId);
            }
        });
        
        // Load tenants for the selected building if already set
        <?php if ($invoiceData['building_id']): ?>
            loadTenants(<?= $invoiceData['building_id'] ?>);
        <?php endif; ?>
        
        // Calculate totals when values change
        $(document).on('input', '.quantity, .unit-price', function() {
            const row = $(this).closest('tr');
            const qty = parseFloat(row.find('.quantity').val()) || 0;
            const price = parseFloat(row.find('.unit-price').val()) || 0;
            const total = qty * price;
            row.find('.total').val(total.toFixed(2));
        });
        
        // Cancel button
        $('#cancel-invoice-btn').click(function() {
            if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
                window.location.href = 'invoices.php';
            }
        });
    });

    // Function to load tenants
    function loadTenants(buildingId) {
        $.ajax({
            url: 'get_tenants.php',
            type: 'GET',
            data: { building_id: buildingId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const $select = $('#customer');
                    $select.empty().append('<option value="">Select a Tenant</option>');
                    
                    response.tenants.forEach(tenant => {
                        $select.append(
                            `<option value="${tenant.id}">${tenant.first_name} ${tenant.middle_name}</option>`
                        );
                    });
                    
                    // Select the tenant that was previously selected
                    $select.val(<?= $invoiceData['tenant'] ?>);
                }
            },
            error: function(xhr) {
                console.error('Error loading tenants:', xhr.responseText);
            }
        });
    }

    // Function to add new row
    function addRow() {
        const newRow = `
            <tr>
                <td>
                    <select name="account_item[]" class="select-account searchable-select" required>
                        <option value="" disabled selected>Select Account Item</option>
                        <?php foreach ($accountItems as $item): ?>
                            <option value="<?= htmlspecialchars($item['account_code']) ?>">
                                <?= htmlspecialchars($item['account_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td><textarea name="description[]" rows="1" placeholder="Description" required></textarea></td>
                <td><input type="number" name="quantity[]" class="form-control quantity" placeholder="1" required></td>
                <td><input type="number" name="unit_price[]" class="form-control unit-price" placeholder="123" required></td>
                <td>
                    <select name="taxes[]" class="form-select vat-option" required>
                        <option value="" disabled selected>Select Option</option>
                        <option value="inclusive">VAT 16% Inclusive</option>
                        <option value="exclusive">VAT 16% Exclusive</option>
                        <option value="zero">Zero Rated</option>
                        <option value="exempted">Exempted</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="total[]" class="form-control total" placeholder="0" readonly style="display:none;">
                    <button type="button" class="btn btn-sm btn-danger delete-btn" onclick="deleteRow(this)" title="Delete">
                        <i class="fa fa-trash" style="font-size: 12px;"></i>
                    </button>
                </td>
            </tr>`;
        $('.items-table tbody').append(newRow);
        
        // Reinitialize select2 if used
        if ($.fn.select2) {
            $('.select-account').select2();
        }
    }

    // Function to delete row
    function deleteRow(btn) {
        if ($('.items-table tbody tr').length > 1) {
            $(btn).closest('tr').remove();
        } else {
            alert('You must have at least one item');
        }
    }
    </script>

 

    <!-- pdf download plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</body>
<!--end::Body-->

</html>
