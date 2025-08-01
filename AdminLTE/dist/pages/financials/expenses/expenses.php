<?php
require_once '../../db/connect.php';
include_once 'actions/getSuppliers.php';
$expenses = [];
$monthlyTotals = array_fill(1, 12, 0);

// === ✅ AJAX: Return Expense Details for Modal Popup ===
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['view_id'])) {
    header('Content-Type: application/json');

    try {
        $stmt = $pdo->prepare("SELECT * FROM expenses WHERE id = ?");
        $stmt->execute([$_GET['view_id']]);
        $expense = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($expense) {
            echo json_encode(['success' => true, 'data' => $expense]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Expense not found']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'DB error: ' . $e->getMessage()]);
    }
    exit;
}

// === ✅ AJAX: Return Monthly Totals ===
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['get_totals'])) {
    $stmt = $pdo->query("SELECT MONTH(date) as month, SUM(total) as total FROM expenses GROUP BY MONTH(date)");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $monthlyTotals[(int)$row['month']] = (float)$row['total'];
    }
    echo json_encode($monthlyTotals);
    exit;
}

// === ✅ AJAX: Handle Expense Submission ===


// === ✅ Normal Page Load ===
try {
    // Fetch all expenses and include the paid amount (if any)
    $stmt = $pdo->query("
        SELECT
            expenses.*,
            expense_payments.amount_paid AS amount_paid
        FROM expenses
        LEFT JOIN expense_payments
        ON expenses.id = expense_payments.expense_id
        ORDER BY expenses.created_at DESC
    ");

    $expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // For summary section
    $expenseItemsNumber = count($expenses);
    $totalAmount = 0;
    foreach ($expenses as $exp) {
        $totalAmount += $exp['total'];
    }
    $stmt = $pdo->query("
    SELECT
        SUM(CASE WHEN status = 'paid' THEN total ELSE 0 END) AS total_paid,
        SUM(CASE WHEN status = 'unpaid' THEN total ELSE 0 END) AS total_unpaid,
        SUM(CASE WHEN status = 'partially paid' THEN total ELSE 0 END) AS partially_paid
    FROM expenses
");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $totalPaid = $row['total_paid'] ?? 0;
    $totalUnpaid = $row['total_unpaid'] ?? 0;
    $totalPartiallyPaid = $row['partially_paid'] ?? 0;

    $pending = $totalUnpaid + $totalPartiallyPaid;

    // Monthly totals (no changes here)
    $stmt = $pdo->query("SELECT MONTH(expense_date) as month, SUM(total) as total FROM expenses GROUP BY MONTH(expense_date)");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $monthlyTotals[(int)$row['month']] = (float)$row['total'];
    }
} catch (PDOException $e) {
    $errorMessage = "❌ Failed to fetch expenses: " . $e->getMessage();
}

// Include expense accounts
require_once 'actions/getExpenseAccounts.php';

// get buildings
try {
    $buildings = $pdo->prepare("SELECT * FROM buildings");
    $buildings->execute();
    $buildings = $buildings->fetchAll(PDO::FETCH_ASSOC);

    if (empty($buildings)) {
        echo "<p style='color:red;'>No buildings found in database.</p>";
    }
} catch (PDOException $e) {
    $errorMessage = "❌ Failed to fetch buildings: " . $e->getMessage();
    $buildings = []; // default to empty array if error occurs
}
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
    <link rel="stylesheet" href="../../../../dist/css/adminlte.css" />
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Pdf pluggin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <!--Tailwind CSS  -->
    <style>
        .app-wrapper {
            background-color: rgba(128, 128, 128, 0.1);
        }

        .modal-backdrop.show {
            opacity: 0.4 !important;
            /* Adjust the value as needed */
        }

        .diagonal-paid-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            /* Centered and rotated */
            background-color: rgba(0, 128, 0, 0.2);
            /* Light green with transparency */
            color: green;
            font-weight: bold;
            font-size: 24px;
            padding: 15px 40px;
            border: 2px solid green;
            border-radius: 8px;
            text-transform: uppercase;
            pointer-events: none;
            z-index: 10;
            white-space: nowrap;
        }

        .diagonal-unpaid-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            /* Centered and rotated */
            background-color: rgba(255, 0, 0, 0.2);
            /* Red with transparency for "UNPAID" */
            color: #ff4d4d;
            /* Softer red text color */
            font-weight: bold;
            font-size: 24px;
            padding: 15px 40px;
            border: 2px solid red;
            border-radius: 8px;
            text-transform: uppercase;
            pointer-events: none;
            z-index: 10;
            white-space: nowrap;
        }

        .diagonal-partially-paid-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            /* Centered and rotated */
            background-color: rgba(255, 165, 0, 0.2);
            /* Amber background with opacity */
            color: #ff9900;
            /* Amber or gold text */
            font-weight: bold;
            font-size: 24px;
            padding: 15px 40px;
            border: 2px solid #ff9900;
            /* Amber border */
            border-radius: 8px;
            text-transform: uppercase;
            pointer-events: none;
            z-index: 10;
            white-space: nowrap;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-dark" style="">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/OriginalTwo/AdminLTE/dist/pages/includes/header.php'; ?>
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
            <div> <?php include $_SERVER['DOCUMENT_ROOT'] . '/OriginalTwo/AdminLTE/dist/pages/includes/sidebar.php'; ?> </div> <!-- This is where the sidebar is inserted -->
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-8">
                            <h3 class="mb-0 contact_section_header"> 💰 &nbsp; Expenses</h3>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row g-3 mb-4">
                        <p class="text-muted">Manage your expenses</p>
                        <div class="col-md-3">
                            <div class="custom-select-wrapper">
                                <div class="custom-select shadow-sm" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
                                    Filter By Building
                                </div>
                                <div class="select-options" id="select-options" role="listbox">
                                    <div role="option" data-value="option1">Manucho</div>
                                    <div role="option" data-value="option2">Silver Spoon</div>
                                    <div role="option" data-value="option3">Ebenezer</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-select-wrapper">
                                <div class="custom-select shadow-sm" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
                                    Filter By Items
                                </div>
                                <div class="select-options" role="listbox">
                                    <div role="option" data-value="option1">Garbage</div>
                                    <div role="option" data-value="option2">Electricity</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-select-wrapper">
                                <div class="custom-select shadow-sm" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
                                    Filter By Status
                                </div>
                                <div class="select-options" role="listbox">
                                    <div role="option" data-value="option1">Paid</div>
                                    <div role="option" data-value="option2">Pending</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control filter-shadow ">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2">
                        <h6 class="mb-0 contact_section_header summary mb-2"></i> <b>Summary</b></h6>
                        <div class="col-md-3">
                            <div class="summary-info-card shadow-sm bg-white p-3 rounded">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-box icon"></i>
                                    <div>
                                        <div class="summary-info-card-label">Total Expenses</div>
                                        <b id="items" class="summary-info-card-value"><?php echo $expenseItemsNumber ?> Pieces</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Phone Card -->
                        <div class="col-md-3">
                            <div class="summary-info-card shadow-sm bg-white p-3 rounded">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-calendar-alt icon"></i>
                                    <div>
                                        <div class="summary-info-card-label">This Month</div>
                                        <b id="duration" class="summary-info-card-value"> KSH <?php echo $totalAmount ?>.00 </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ID Card -->
                        <div class="col-md-3">
                            <div class="summary-info-card shadow-sm bg-white p-3 rounded">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-check-circle icon"></i>
                                    <div>
                                        <div class="summary-info-card-label">Paid</div>
                                        <b id="paid" class="summary-info-card-value"> KSH <?php echo $totalPaid ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="summary-info-card shadow-sm bg-white p-3 rounded">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-hourglass-half icon"></i>
                                    <div>
                                        <div class="summary-info-card-label">Pending </div>
                                        <b id="pending" class="summary-info-card-value">KSH <?php echo $pending ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-4" >
                            <div class="card shadow-sm">
                                <div class="bg-white p-1 rounded-2 border-0">
                                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #e9ecef;">
                                        <a class="text-white fw-bold text-decoration-none text-dark" data-bs-toggle="collapse" href="#addExpense" role="button" aria-expanded="false" aria-controls="addExpense" onclick="toggleIcon(this)">
                                            <span id="toggleIcon">➕</span> Click Here to Add an Expense
                                        </a>
                                    </div>
                                </div>
                                <!-- ✅ Fixed & Complete Expense Form -->
                                <div class="collapse" id="addExpense">
                                    <div class="card-body border-top border-2">
                                        <div class="alert mb-4" style="background-color: #FFF3CD; color: #856404; border: 1px solid #FFE8A1;">
                                            <i class="fas fa-exclamation-circle mr-2"></i> Please fill out all fields carefully to avoid delays.
                                        </div>
                                        <div class="card mb-3 shadow-sm border-0">
                                            <div class="card-body">
                                                <form method="POST" id="expenseForm">
                                                    <div class="row g-3">
                                                        <div class="col-md-3">
                                                            <div class="custom-select-wrapper">
                                                                <label class="form-label fw-bold">Building</label>
                                                                <div class="custom-select shadow-sm" tabindex="0" role="button" aria-haspopup="listbox" aria-expanded="false">
                                                                    Select Building
                                                                </div>
                                                                <div class="select-options" id="select-options" role="listbox">
                                                                    <?php foreach ($buildings as $building): ?>
                                                                        <div role="option" data-value="<?= htmlspecialchars($building['building_id']) ?>">
                                                                            <?= htmlspecialchars($building['building_name']) ?>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                    <input type="hidden" class="custom-hidden-input" name="building_id">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold">Date&nbsp;:</label>
                                                            <input type="date" id="dateInput" class="form-control rounded-1 shadow-none" name="date" placeholder="">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold">Expense No</label>
                                                            <input type="text" name="expense_no" class="form-control rounded-1 shadow-none" placeholder="KRA000100039628">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label fw-bold">Supplier</label>
                                                            <div class="combo-box">
                                                                <input type="text" class="form-control rounded-1 shadow-none combo-input" placeholder="Search or select...">
                                                                <button class="combo-button">▼</button>
                                                                <ul class="combo-options">       
                                                                    <?php foreach ($suppliers as $supplier): ?>
                                                                        <li class="combo-option" data-value="<?= htmlspecialchars($supplier['id']) ?>">
                                                                        <?= htmlspecialchars($supplier['supplier_name']) ?>
                                                                       </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                                <input type="hidden" class="supplier-hidden-input" name="supplier">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Hidden total -->
                                                    <div class="row no-wrap mt-2">
                                                        <div class="text-muted mt-4 mb-4">Add the Spend items in the fields below</div>
                                                        <div class="col-md-12 rounded-2" id="itemsContainer">
                                                            <div class="row item-row g-3 mb-5 p-2" style="background-color: #f5f5f5; overflow:auto; white-space:nowrap;">
                                                                <!-- ITEM(SERVICE) -->
                                                                <div class="col-md-2">
                                                                    <label class="form-label fw-bold">ITEM(SERVICE)</label>
                                                                    <select class="form-select shadow-none rounded-1" name="item_account_code[]" style="width: 100%;">
                                                                        <option value="" disabled selected>Select</option>
                                                                        <?php foreach ($items as $item): ?>
                                                                            <option value="<?= htmlspecialchars($item['account_code']) ?>">
                                                                                <?= htmlspecialchars($item['account_name']) ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <!-- Description -->
                                                                <div class="col-md-2">
                                                                    <label class="form-label fw-bold">Description</label>
                                                                    <input type="text" class="form-control description rounded-1 shadow-none" placeholder="Electricity" name="description[]" required />
                                                                </div>

                                                                <!-- Quantity -->
                                                                <div class="col-md-1">
                                                                    <label class="form-label fw-bold">Qty</label>
                                                                    <input type="number" class="form-control qty rounded-1 shadow-none" placeholder="1" name="qty[]" required />
                                                                </div>

                                                                <!-- Unit Price & Taxes -->
                                                                <div class="col-md-3 d-flex align-items-stretch">
                                                                    <div class="unitPrice me-2 flex-grow-1">
                                                                        <label class="form-label fw-bold">Unit Price</label>
                                                                        <input type="number" class="form-control unit-price rounded-1 shadow-none" placeholder="123" name="unit_price[]" required />
                                                                    </div>
                                                                    <div class="taxes flex-grow-1">
                                                                        <label class="form-label fw-bold">Taxes</label>
                                                                        <select class="form-select rounded-1 shadow-none ellipsis-select" name="taxes[]" required>
                                                                            <option value="" selected disabled>Select--</option>
                                                                            <option value="inclusive">VAT 16% Inclusive</option>
                                                                            <option value="exclusive">VAT 16% Exclusive</option>
                                                                            <option value="zero">Zero Rated</option>
                                                                            <option value="exempt">Exempted</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <!-- Discount -->
                                                                <div class="col-md-2">
                                                                    <label class="form-label fw-bold">Discount(KSH)</label>
                                                                    <input type="number" class="form-control discount shadow-none rounded-1 mb-1" name="discount[]" placeholder="Ksh 0.00" required>
                                                                </div>

                                                                <!-- Total & Delete -->
                                                                <div class="col-md-2 d-flex align-items-stretch">
                                                                    <div class="flex-grow-1 me-2">
                                                                        <label class="form-label fw-bold">Total (KSH)</label>
                                                                        <input type="text" class="form-control item-total shadow-none rounded-1 mb-1" placeholder="Ksh 0.00" name="item_total[]" required readonly />
                                                                    </div>
                                                                    <div class="d-flex align-items-end">
                                                                        <label class="form-label fw-bold invisible">X</label>
                                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editPersonalInfoModal">
                                                                            <i class="fas fa-trash text-white"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Spend items table -->
                                                    <div class="row mt-4 ">
                                                        <div class="col-md-12 d-flex justify-content-end">

                                                            <div class="d-flex justify-content-end">

                                                                <div class="d-flex flex-column align-items-end">

                                                                    <div class="d-flex justify-content-end w-100 mb-2">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong>Untaxed Amount:</strong></label>
                                                                        <input type="text" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="subTotal" name="" value="Ksh 10,500">
                                                                        <input type="hidden" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="subTotalhidden" name="untaxedAmount" value="Ksh 10,500">
                                                                    </div>

                                                                    <div class="d-flex justify-content-end w-100 mb-2" id="vatAmountInclusiveContainer" style="display:none !important;">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong id="taxLabel">VAT 16% (Inclusive):</strong></label>
                                                                        <input type="text" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="vatAmountInclusive" value="Ksh 1,500">
                                                                    </div>

                                                                    <div class="d-flex justify-content-end w-100 mb-2" id="vatAmountExclusiveContainer" style="display: none !important;">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong id="taxLabel">VAT 16% (Exlusive):</strong></label>
                                                                        <input type="text" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="vatAmountExclusive" value="Ksh 1,500">
                                                                    </div>

                                                                    <div class="d-flex justify-content-end w-100 mb-2" id="vatAmountContainer" style="display: none;">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong id="taxLabel">VAT 16% :</strong></label>
                                                                        <input type="text" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="vatAmountTotal" value="Ksh 0.00">
                                                                        <input type="hidden" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="vatAmountTotalHidden" name="totalTax" value="Ksh 0.00">
                                                                    </div>

                                                                    <div class="d-flex justify-content-end w-100 mb-2" id="zeroRated&ExmptedContainer" style="display: none;">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong id="taxLabel">VAT 0%:</strong></label>
                                                                        <input type="text" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="zeroRated&Exmpted" value="Ksh 0.00">
                                                                    </div>

                                                                    <div class="d-flex justify-content-end w-100 mb-2" id="grandDiscountContainer">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong>Discount:</strong></label>
                                                                        <input type="text" readonly class="form-control w-50 ps-3 rounded-1 shadow-none" id="grandDiscount" value="Ksh 0:00">
                                                                    </div>

                                                                    <div class="d-flex justify-content-end w-100 mt-3 pt-2 border-top border-warning">
                                                                        <label class="me-2 border-end pe-3 text-end w-50"><strong>Total Amount Due:</strong></label>
                                                                        <input type="hidden" name="total" id="grandTotalNumber" value="0.00" />
                                                                        <input type="text" readonly class="form-control-plaintext w-50 ps-3 fw-bold" id="grandTotal" value="Ksh 12,000">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-12 d-flex justify-content-between">
                                                            <button type="button" class="btn btn-outline-warning text-dark shadow-none" onclick="addRow()">➕ Add More</button>
                                                            <button type="submit" class="btn btn-secondary shadow-none">✕ Close</button>
                                                            <button type="submit" class="btn btn-outline-warning text-dark shadow-none">✅ Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /raw -->
                    <div class="row mt-2 mb-5">
                        <h6 class="mb-0 contact_section_header summary mb-2"></i> <b>Details</b></h6>
                        <div class="col-md-12">
                            <div class="details-container bg-white p-2 rounded Content shadow-sm">
                                <h3 class="details-container_header text-start"> <span id="displayed_building">All Expenses</span> &nbsp; |&nbsp; <span style="color:#FFC107"> <span id="enteries">3</span> enteries</span></h3>
                                <div class="table-responsive" style="overflow-x: auto;">
                                    <div id="top-bar" class="filter-pdf-excel mb-2">
                                        <div class="d-flex" style="gap: 10px;">
                                            <div id="custom-search">
                                                <input type="text" id="searchInput" placeholder="Search Expense...">
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <div id="custom-buttons"></div>
                                        </div>
                                    </div>
                                    <table id="repaireExpenses" style="width: 100%; min-width: 600px;">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Supplier</th>
                                                <th>Expense No</th>
                                                <th>Totals <span style="text-transform: lowercase;">Vs</span> paid</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($expenses as $exp): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars(date('d M Y', strtotime($exp['created_at']))) ?></td>
                                                    <td><?= htmlspecialchars($exp['supplier']) ?></td>
                                                    <td>
                                                        <div style="color:#28a745;"><?= htmlspecialchars($exp['expense_no']) ?></div>
                                                    </td>
                                                    <td style="background-color: #f8f9fa; padding: 0.75rem; border-radius: 8px;">
                                                        <div style="font-weight: 600; color: #00192D; font-size: 1rem;">
                                                            KSH <?= number_format($exp['total'], 2) ?>
                                                        </div>
                                                        <div class="paid_amount" style="color: #007B8A; font-size: 0.9rem; margin-top: 4px;">
                                                            KSH <?= number_format($exp['amount_paid'] ?? 0, 2) ?>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        $status = strtolower($exp['status']);
                                                        $statusLabel = '';

                                                        if ($status === 'paid') {
                                                            $statusLabel = '<span style="background-color: #28a745; color: white; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">Paid</span>';
                                                        } elseif ($status === 'unpaid') {
                                                            $statusLabel = '<span style="background-color: #FFC107; color: #00192D; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">Unpaid</span>';
                                                        } elseif ($status === 'partially paid') {
                                                            $statusLabel = '<span style="background-color: #17a2b8; color: white; padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">Partially Paid</span>';
                                                        } else {
                                                            $statusLabel = '<span class="text-muted">' . htmlspecialchars($exp['status']) . '</span>';
                                                        }

                                                        echo $statusLabel;
                                                        ?>

                                                        <?php if ($status === 'unpaid' || $status === 'partially paid'): ?>
                                                            <br>
                                                            <button
                                                                class="btn btn-sm d-inline-flex align-items-center gap-1 mt-2"
                                                                style="background-color: #00192D; color: #FFC107; border: none; border-radius: 8px; padding: 6px 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); font-weight: 500;"
                                                                onclick="payExpense(<?= htmlspecialchars(json_encode($exp['id']), ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars(json_encode($exp['total']), ENT_QUOTES, 'UTF-8') ?>)">
                                                                <i class="bi bi-credit-card-fill"></i>
                                                                Pay
                                                            </button>
                                                        <?php endif; ?>
                                                    </td>


                                                    <td>
                                                        <button
                                                            class="btn btn-sm d-flex align-items-center gap-1 px-3 py-2"
                                                            style="background-color: #00192D; color: white; border: none; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); font-weight: 500;"
                                                            onclick="openExpenseModal(<?= $exp['id'] ?>)">
                                                            <i class="bi bi-eye-fill"></i> View
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- payment modal -->
                                    <div class="modal fade" id="payExpenseModal" tabindex="-1" aria-labelledby="payExpenseLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="border-radius: 12px; border: 1px solid #00192D;">
                                                <div class="modal-header" style="background-color: #00192D; color: white;">
                                                    <h5 class="modal-title" id="payExpenseLabel">Pay Expense</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form id="payExpenseForm">
                                                        <!-- id -->
                                                        <input type="hidden" name="expense_id" id="expenseId">
                                                        <!-- total amount -->
                                                        <input type="hidden" name="expected_amount" id="expectedAmount">

                                                        <div class="mb-3">
                                                            <label for="amount" class="form-label">Amount to Pay(KSH)</label>
                                                            <input type="number" class="form-control shadow-none rounded-1" id="amountToPay" style="font-weight: 600;" name="amountToPay" value="1200" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="paymentDate" class="form-label shadow-none ">Payment Date</label>
                                                            <input type="date" class="form-control shadow-none rounded-1" id="paymentDate" name="payment_date" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="paymentMethod" class="form-label">Payment Method</label>
                                                            <select class="form-select shadow-none rounded-1" id="paymentMethod" name="payment_method" required>
                                                                <option value="cash">Cash</option>
                                                                <option value="mpesa">M-Pesa</option>
                                                                <option value="bank">Bank Transfer</option>
                                                                <option value="card">Card</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="reference" class="form-label">Reference / Memo</label>
                                                            <input type="text" class="form-control shadow-none rounded-1" id="reference" name="reference">
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" form="payExpenseForm" class="btn" style="background-color: #FFC107; color: #00192D;">
                                                        <i class="bi bi-credit-card"></i> Confirm Payment
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- View Expense Modal -->
                                    <div class="modal fade" id="expenseModal" tabindex="-1" aria-labelledby="expenseModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content expense bg-light">
                                                <div class="d-flex justify-content-between align-items-center p-2" style="background-color: #EAF0F4; border-bottom: 1px solid #CCC; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;">
                                                    <button class="btn btn-sm me-2" style="background-color: #00192D; color: #FFC107;" title="Download PDF">
                                                        <i class="bi bi-download"></i>
                                                    </button>
                                                    <button class="btn btn-sm me-2" style="background-color: #00192D; color: #FFC107;" title="Print">
                                                        <i class="bi bi-printer"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm" style="background-color: #FFC107; color: #00192D;" data-bs-dismiss="modal" title="Close">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </div>

                                                <div class="modal-body bg-light" id="expenseModalBody">

                                                    <!-- 🔒 DO NOT TOUCH CARD BELOW -->
                                                    <div class="expense-card">
                                                        <!-- Header -->
                                                        <div class="d-flex justify-content-between align-items-start mb-3 position-relative" style="overflow: hidden;">
                                                            <div>
                                                                <img id="expenseLogo" src="expenseLogo6.png" alt="JengoPay Logo" class="expense-logo">
                                                            </div>

                                                            <!-- Diagonal PAID Label centered in the container -->
                                                            <!-- <div class="diagonal-paid-label">PAID</div> -->
                                                            <div class="diagonal-unpaid-label" id="expenseModalPaymentStatus">UNPAID</div>
                                                            <div class="text-end" style="background-color: #f0f0f0; padding: 10px; border-radius: 8px;">
                                                                <strong>Silver Spoon Towers</strong><br>
                                                                50303 Nairobi, Kenya<br>
                                                                silver@gmail.com<br>
                                                                +254 700 123456
                                                            </div>
                                                        </div>


                                                        <!-- expense Info -->
                                                        <div class="d-flex justify-content-between">
                                                            <h6 class="mb-0" id="expenseModalSupplierName">Josephat Koech</h6>
                                                            <div class="text-end">
                                                                <h3 id="expenseModalInvoiceNo"> INV001</h3><br>
                                                            </div>
                                                        </div>

                                                        <div class="mb-1 rounded-2 d-flex justify-content-between align-items-center"
                                                            style="border: 1px solid #FFC107; padding: 4px 8px; background-color: #FFF4CC;">
                                                            <div class="d-flex flex-column expense-date m-0">
                                                                <span class="m-0"><b>Expense Date</b></span>
                                                                <p class="m-0">24/6/2025</p>
                                                            </div>
                                                            <div class="d-flex flex-column due-date m-0">
                                                                <span class="m-0"><b>Due Date</b></span>
                                                                <p class="m-0">24/6/2025</p>
                                                            </div>
                                                            <div></div>
                                                        </div>

                                                        <!-- Items Table -->
                                                        <div class="table-responsive ">
                                                            <table class="table table-striped table-bordered rounded-2 table-sm thick-bordered-table">
                                                                <thead class="table">
                                                                    <tr class="custom-th">
                                                                        <th>Description</th>
                                                                        <th class="text-end">Qty</th>
                                                                        <th class="text-end">Unit Price</th>
                                                                        <th class="text-end">Taxes</th>
                                                                        <th class="text-end">Discount</th>
                                                                        <th class="text-end">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="expenseItemsTableBody">
                                                                    <tr>
                                                                        <td>Web Design</td>
                                                                        <td class="text-end">1</td>
                                                                        <td class="text-end">KES 25,000</td>
                                                                        <td class="text-end">Inclusive</td>
                                                                        <td class="text-end">KES 25,000</td>
                                                                        <td class="text-end">KES 25,000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hosting (1 year)</td>
                                                                        <td class="text-end">1</td>
                                                                        <td class="text-end">KES 5,000</td>
                                                                        <td class="text-end">Exclusive</td>
                                                                        <td class="text-end">KES 25,000</td>
                                                                        <td class="text-end">KES 5,000</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <!-- Totals and Terms -->
                                                        <div class="row">
                                                            <div class="col-6 terms-box">
                                                                <strong>Note:</strong><br>
                                                                This Expense Note Belongs to.<br>
                                                                Silver Spoon Towers
                                                            </div>
                                                            <div class="col-6">
                                                                <table class="table table-borderless table-sm text-end mb-0">
                                                                    <tr>
                                                                        <th>Untaxed Amount:</th>
                                                                        <td>
                                                                            <div id="expenseModalUntaxedAmount">KES 30,000</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>VAT (16%):</th>
                                                                        <td>
                                                                            <div id="expenseModalTaxAmount">KES 4,800</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Total Amount:</th>
                                                                        <td><strong id="expenseModalTotalAmount">KES 34,800</strong></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="text-center small text-muted" style="border-top: 1px solid #e0e0e0; padding-top: 10px;">
                                                            Thank you for your business!
                                                        </div>
                                                    </div>
                                                    <!-- 🔚 END CARD -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="row graph">
                        <div class="col-md-12">
                            <div class="bg-white p-2 shadow rounded-2">
                                <?php
                                // Group expenses by month and sum totals
                                $monthlyTotals = [];
                                try {
                                    $stmt = $pdo->query("SELECT MONTH(expense_date) AS month, SUM(total) AS total FROM expenses GROUP BY MONTH(expense_date)");
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $monthNum = (int)$row['month'];
                                        $monthlyTotals[$monthNum] = (float)$row['total'];
                                    }
                                } catch (PDOException $e) {
                                    $monthlyTotals = [];
                                }
                                ?>
                                <!-- Line Chart: Expenses vs Months -->
                                <h6 class="fw-bold text-center">📊 Monthly Expense Trends</h6>
                                <canvas id="monthlyExpenseChart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none" style="color: #00192D;">JENGO PAY</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->


        <!-- Modals -->
        <!-- Previous year date warning -->
        <div class="modal fade" id="fyWarningModal" tabindex="-1" aria-labelledby="fyWarningLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #F8FAFC; border: 1px solid #193A4D;">
                    <div class="modal-header" style="background-color: #193A4D; color: white;">
                        <h5 class="modal-title" id="fyWarningLabel">⚠ Previous Financial Year</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="color: #193A4D;">
                        You’ve selected a date from the previous financial year.<br>
                        Are you sure you want to continue?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color: #FFC107; color: #193A4D;" id="confirmFY">Yes, continue</button>
                        <button type="button" class="btn btn-light" id="cancelFY" data-bs-dismiss="modal">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--end::App Wrapper-->

    <!-- Main Js File -->
    <script src="../../../../dist/js/adminlte.js"></script>
    <script src="expenses.js"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <!-- pdf download plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <!-- J  A V A S C R I PT -->
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
        crossorigin="anonymous">
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>
    <!-- links for dataTaable buttons -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <!--end::OverlayScrollbars Configure-->

    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
        src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
        crossorigin="anonymous"></script>

    <!--end::Script-->
    <!-- dataTable control -->
    <!-- DATE TABLES -->
    </script>
    <script>
        $(document).ready(function() {
            const table = $('#repaireExpenses').DataTable({
                dom: 'Brtip', // ⬅ Changed to include Buttons in DOM
                order: [], // ⬅ disables automatic ordering by DataTables
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Excel',
                        exportOptions: {
                            columns: ':not(:last-child)' // ⬅ Exclude last column
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':not(:last-child)' // ⬅ Exclude last column
                        },
                        customize: function(doc) {
                            // Center table
                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');

                            // Optional: center-align the entire table
                            doc.styles.tableHeader.alignment = 'center';
                            doc.styles.tableBodyEven.alignment = 'center';
                            doc.styles.tableBodyOdd.alignment = 'center';

                            const body = doc.content[1].table.body;
                            for (let i = 1; i < body.length; i++) { // start from 1 to skip header
                                if (body[i][4]) {
                                    body[i][4].color = 'blue'; // set email column to blue
                                }
                            }
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        exportOptions: {
                            columns: ':not(:last-child)' // ⬅ Exclude last column from print
                        }
                    }
                ]
            });
            // Append buttons to your div
            table.buttons().container().appendTo('#custom-buttons');
            // Custom search
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>

    <!-- date display only Previos dates -->
    <script>
        const dateInput = document.getElementById('dateInput');
        let tempDate = null;

        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('max', today);

        const fyModalElement = document.getElementById('fyWarningModal');
        const fyModal = new bootstrap.Modal(fyModalElement);

        dateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const now = new Date();

            // Financial year: Calendar year (Jan 1 – Dec 31)
            const yearStart = new Date(now.getFullYear(), 0, 1); // January 1
            const yearEnd = new Date(now.getFullYear(), 11, 31); // December 31

            // Check if selected date is outside current calendar year
            if (selectedDate < yearStart || selectedDate > yearEnd) {
                tempDate = this.value;
                fyModal.show();
            }
        });

        // "No, cancel" button
        document.getElementById('cancelFY').addEventListener('click', function() {
            dateInput.value = ""; // Clear input
            tempDate = null;
            fyModal.hide(); // Hide modal manually
        });

        // "Yes, continue" button
        document.getElementById('confirmFY').addEventListener('click', function() {
            fyModal.hide(); // Simply hide modal, keep selected date
        });
    </script>



    <script>
        function toggleIcon(anchor) {
            console.log('yoyo');
            const icon = anchor.querySelector('#toggleIcon');
            const isExpanded = anchor.getAttribute('aria-expanded') === 'true';
            icon.textContent = isExpanded ? '➕' : '✖';
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            row.remove();
        }

        function addRow() {
            // You'll need to implement dynamic row cloning if required.
            alert('Add row functionality goes here');
        }
    </script>

    <!-- Chart Section -->
    <!-- <canvas id="monthlyExpenseChart" height="100"></canvas> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let expenseChart;

        function updateExpenseChart() {
            fetch('expense2.php?get_totals=1')
                .then(res => res.json())
                .then(monthlyTotals => {
                    expenseChart.data.datasets[0].data = [
                        monthlyTotals[1], monthlyTotals[2], monthlyTotals[3], monthlyTotals[4],
                        monthlyTotals[5], monthlyTotals[6], monthlyTotals[7], monthlyTotals[8],
                        monthlyTotals[9], monthlyTotals[10], monthlyTotals[11], monthlyTotals[12]
                    ];
                    expenseChart.update();
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('monthlyExpenseChart').getContext('2d');
            expenseChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "KSH Expenses",
                        data: [
                            <?= $monthlyTotals[1] ?? 0 ?>, <?= $monthlyTotals[2] ?? 0 ?>,
                            <?= $monthlyTotals[3] ?? 0 ?>, <?= $monthlyTotals[4] ?? 0 ?>,
                            <?= $monthlyTotals[5] ?? 0 ?>, <?= $monthlyTotals[6] ?? 0 ?>,
                            <?= $monthlyTotals[7] ?? 0 ?>, <?= $monthlyTotals[8] ?? 0 ?>,
                            <?= $monthlyTotals[9] ?? 0 ?>, <?= $monthlyTotals[10] ?? 0 ?>,
                            <?= $monthlyTotals[11] ?? 0 ?>, <?= $monthlyTotals[12] ?? 0 ?>
                        ],
                        backgroundColor: "rgba(0, 25, 45, 0.2)",
                        borderColor: "#00192D",
                        tension: 0.3,
                        fill: true,
                        pointBackgroundColor: "#FFC107",
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: value => 'KSH ' + value.toLocaleString()
                            }
                        }
                    }
                }
            });
        });
    </script>
    <!-- Expense modal -->
    <script>
        function openExpenseModal(expenseId) {
            fetch(`actions/expenses/getExpense.php?id=${expenseId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Failed to fetch data");
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.length) {
                        console.warn("No expense data found.");
                        return;
                    }

                    const expense = data[0]; // Get the first (and likely only) row

                    // Map values to HTML elements
                    document.getElementById('expenseModalSupplierName').textContent = expense.supplier || '—';
                    document.getElementById('expenseModalInvoiceNo').textContent = expense.expense_no || '—';
                    document.getElementById('expenseModalTotalAmount').textContent = `KES ${parseFloat(expense.total || 0).toLocaleString()}`;
                    document.getElementById('expenseModalTaxAmount').textContent = `KES ${parseFloat(expense.total_taxes || 0).toLocaleString()}`;
                    document.getElementById('expenseModalUntaxedAmount').textContent = `KES ${parseFloat(expense.untaxed_amount || 0).toLocaleString()}`;
                    // Payment status

                    const status = expense.status || 'paid'; // Defaulting to 'paid' if status is not available
                    const statusLabelElement = document.getElementById('expenseModalPaymentStatus'); // ID instead of class
                    // Check the status and apply the appropriate class and text
                    if (expense.status === "paid") {
                        statusLabelElement.textContent = "PAID";
                        statusLabelElement.classList.remove("diagonal-unpaid-label"); // Remove the unpaid
                        statusLabelElement.classList.add("diagonal-paid-label");
                    } else if (expense.status === "partially paid") {
                        statusLabelElement.textContent = "PARTIALLY PAID";
                        statusLabelElement.classList.remove("diagonal-unpaid-label"); // Remove the unpaid
                        statusLabelElement.classList.add("diagonal-partially-paid-label");
                    } else {
                        statusLabelElement.textContent = "UNPAID";
                    }
                    console.log(expense.status)
                    const tableBody = document.getElementById('expenseItemsTableBody');
                    tableBody.innerHTML = "";
                    data.forEach((item) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.description || '—'}</td>
                            <td class="text-end">${item.qty || 0}</td>
                            <td class="text-end">KES ${parseFloat(item.unit_price || 0).toLocaleString()}</td>
                            <td class="text-end">${item.taxes || '—'}</td>
                            <td class="text-end">KES ${item.discount || '—'}</td> <!-- Update if you have discount data -->
                            <td class="text-end">KES ${(item.qty * item.unit_price).toLocaleString(undefined, { minimumFractionDigits: 2 })}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                    // Show the modal
                    const expenseModal = new bootstrap.Modal(document.getElementById('expenseModal'));
                    expenseModal.show();
                })
                .catch(error => {
                    console.error("Error loading expense:", error);
                });
        }
    </script>


    <!-- select wrapper -->


    <!-- Scripts -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<!--end::Body-->

</html>