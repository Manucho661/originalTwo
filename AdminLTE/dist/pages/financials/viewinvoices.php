<?php
require_once '../db/connect.php';

// Get the invoice_id from the URL (or request)
$id = $_GET['id'] ?? null;

if ($id) {
    // Query to fetch invoice data with related building and tenant info
    $stmt = $pdo->prepare("
   SELECT
        i.id,
        i.invoice_number,
        b.building_name AS property_name,
        i.tenant,
        i.invoice_date,
        i.taxes,
        i.total
    FROM invoice i
    LEFT JOIN buildings b ON i.building_id = b.building_id
    LEFT JOIN tenants t ON i.tenant = t.id
    ORDER BY i.invoice_date DESC
    ");
    $stmt->execute(['invoice_id' => $invoice_id]);
    $invoice = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($invoice) {
        // Fetch invoice items (assuming they are stored in another table like `invoice_items`)
        $itemStmt = $pdo->prepare("SELECT description, quantity, unit_price, taxes, amount FROM invoice WHERE invoice_id = :invoice_id");
        $itemStmt->execute(['invoice_id' => $invoice_id]);
        $items = $itemStmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Invoice not found!";
    }
} else {
    echo "No invoice ID provided.";
}
?>


<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE | Dashboard v2</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE | Dashboard v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css" />
    <link rel="stylesheet" href="invoices.css">
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      a{
          text-decoration: none;
      }

      body{

          background-color: rgba(128, 128, 128, 0.1);
      }
      .summaryItem{
          font-family: 'Playfair Display', serif; /* Elegant for creative projects */
font-size: 25px;
font-weight: bold;

font-weight: 400; /* Lighter weight for a faint look */
letter-spacing: 1px; /* Slight spacing for an airy feel */
color:gray;

      }
      .summaryItemOne{
          font-family: 'Playfair Display', serif; /* Elegant for creative projects */
font-size: 25px;
font-weight: bold;

font-weight: 400; /* Lighter weight for a faint look */
letter-spacing: 1px; /* Slight spacing for an airy feel */
color: #00192D;

      }
      .custom-btn{
          background-color: #00192D;
  border-color: #00192D;
  color:  #FFC107; /* White background */
      }

  .statement{
      background-color: #FFC107;
      color: #00192D ;

      }

      .profile-card {
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* padding: 20px; */

    margin: 30px auto;
  }
  .profile-picture {
    border-radius: 10px;
    width: 100%;
    height: auto;
    object-fit: cover;
    border: 4px solid #007bff;
  }
  .profile-details h2 {
    /* margin-bottom: 10px; */

  }
  .profile-details p {
    /* /margin: 5px 0; */
    color: #6c757d;
  }
  .profile_details{
      display: flex;

  }
  .profile_picture{
      margin-right: 4%;
  }
  .profile_info .one{
      color: #666;
      font-size: 14px;
      display: block;
      text-align: justify;

  }
  .other_profile_details{
      display: block;
      color: #666;
      font-size: 14px;
      display: block;
      text-align: justify;
  }
  h2, h3 {
            margin: 0;
        }

        table {
             width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f4f4f4;
            text-align: left;
        }

        td:first-child {
            text-align: left;
            padding-left: 10px;
        }

        td:last-child {
            text-align: right;
            padding-right: 10px;
        }
        /* .category {
            font-weight: bold;
            background: #e3f2fd;
            text-align: left;
            margin-left: 2rem;
        } */

        .total {
            font-weight: bold;
            background: #ffeb3b;
        }

        .total-equity {
            font-weight: bold;
            background: #4CAF50;
            color: white;
        }
        /* .statement-container {
            width: 600px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            background: white;
        } */

        .filter-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .filter-container select, .filter-container input {
            padding: 10px;
            margin-right: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .filter-container button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-container button:hover {
            background-color: #0056b3;
        }


  </style>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <!-- <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li> -->
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
              <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="bi bi-search"></i>
              </a>
            </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-chat-text"></i>
                <span class="navbar-badge badge text-bg-danger">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="../../dist/assets/img/user1-128x128.jpg"
                        alt="User Avatar"
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-end fs-7 text-danger"
                          ><i class="bi bi-star-fill"></i
                        ></span>
                      </h3>
                      <p class="fs-7">Call me whenever you can...</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="../../dist/assets/img/user8-128x128.jpg"
                        alt="User Avatar"
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-end fs-7 text-secondary">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </h3>
                      <p class="fs-7">I got your message bro</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!--begin::Message-->
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img
                        src="../../dist/assets/img/user3-128x128.jpg"
                        alt="User Avatar"
                        class="img-size-50 rounded-circle me-3"
                      />
                    </div>
                    <div class="flex-grow-1">
                      <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-end fs-7 text-warning">
                          <i class="bi bi-star-fill"></i>
                        </span>
                      </h3>
                      <p class="fs-7">The subject goes here</p>
                      <p class="fs-7 text-secondary">
                        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                      </p>
                    </div>
                  </div>
                  <!--end::Message-->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
              </div>
            </li>
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-envelope me-2"></i> 4 new messages
                  <span class="float-end text-secondary fs-7">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-people-fill me-2"></i> 8 friend requests
                  <span class="float-end text-secondary fs-7">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                  <span class="float-end text-secondary fs-7">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="../../dist/assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">Alexander Pierce</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="../../dist/assets/img/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2023</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <li class="user-body">
                  <!--begin::Row-->
                  <div class="row">
                    <div class="col-4 text-center"><a href="#">Followers</a></div>
                    <div class="col-4 text-center"><a href="#">Sales</a></div>
                    <div class="col-4 text-center"><a href="#">Friends</a></div>
                  </div>
                  <!--end::Row-->
                </li>
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <!-- <img
              src="../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            /> -->
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light"></span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <!-- <li class="nav-item">
                    <a href="./index.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard</p>
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard </p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="nav-item">
                <a href="./property.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Tenants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./tenantscreening.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Tenant Screening</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./leasy.html" class="nav-link">
                  <i class="nav-icon bi bi-file-earmark-text"></i>
                  <p>Lease Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                   Financial Documents
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./invoices.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Invoices</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./paymentreceipts.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Payment Receipts</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./rentdeposit.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p> Rent Deposit Reports</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./profitandloss.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Profit&Loss Statement</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./balancesheet.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Balance Sheet</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./cashflow.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Cashflow</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="./taxreports.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Tax Reports</p>
                    </a>
                  </li>

                </ul>
              </li>
              <li class="nav-item">
                <a href="./showCommunication.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Maintenance Requests</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./serviceproviders.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Service Providers</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="./rating&reviews.html" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Reviews And Rating</p>
                </a>
              </li>

               <!-- Start Communications part -->
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-pencil-square"></i>
                  <p>
                    Communications
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="communications/texts.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Texts</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="communications/announcements.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Announcements</p>
                    </a>

                  </li>
                </ul>
              </li>


              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-filetype-js"></i>
                  <p>
                   Help
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./docs/javascript/treeview.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Treeview</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="./docs/faq.html" class="nav-link">
                  <i class="nav-icon bi bi-question-circle-fill"></i>
                  <p>FAQ</p>
                </a>
              </li>

            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <div class="container-fluid">
              <div class="button-container">
                  <button class="print-btn d-flex justify-content-end" onclick="print()">
                      <i class="fas fa-print"></i> Print
                  </button>
                  <button class="print-btn d-flex justify-content-end" onclick="generatePDF()">
                      <i class="fas fa-file-pdf"></i> Generate PDF
                  </button>
              </div>
              <hr>
              <div class="invoice-container">
    <!-- From Section (Fixed details) -->
    <div>
        <p>
            From:<br>
            Angela Real Estate, Ltd..<br>
            795 Pinnacle Building
        </p>
        <p>Upperhill, Nairobi Kenya</p>
        <p>Phone: 0712345678</p>
        <p>Email: info@angelarealestate.com </p><br>
    </div>

    <!-- To Section (Dynamic Tenant Information) -->
    <div style="text-align: right;">
        <p>
            To:<br>
            <?= isset($invoice['tenant_name']) ? htmlspecialchars($invoice['tenant_name']) : 'N/A' ?><br>
            Angela Real Estate, Ltd..<br>
            795 Pinnacle Building
        </p>
        <p>Upperhill, Nairobi Kenya</p>
        <p>Phone: <?= isset($invoice['tenant_phone']) ? htmlspecialchars($invoice['tenant_phone']) : 'Phone not available' ?></p>
        <p>Email: <?= isset($invoice['tenant_email']) ? htmlspecialchars($invoice['tenant_email']) : 'Email not available' ?></p>
    </div>
</div>

<br>

<!-- Invoice Info Section (Dynamic) -->
<div class="invoice-info">
    <p><strong>Invoice No:</strong> #<?= isset($invoice['invoice_number']) ? htmlspecialchars($invoice['invoice_number']) : 'N/A' ?></p>
    <p><strong>Invoice Date:</strong> <?= isset($invoice['invoice_date']) ? date('d/m/Y', strtotime($invoice['invoice_date'])) : 'N/A' ?></p>
    <p><strong>Due Date:</strong> <?= isset($invoice['due_date']) ? date('d/m/Y', strtotime($invoice['due_date'])) : 'N/A' ?></p>
</div>

<!-- Invoice Items Table (Dynamic) -->
<table>
    <thead>
        <tr>
            <th>Description</th>
            <th>QTY</th>
            <th>Unit Price</th>
            <th>Taxes</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['description']) ?></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td><?= htmlspecialchars($item['unit_price']) ?></td>
                    <td><?= htmlspecialchars($item['taxes']) ?></td>
                    <td><?= htmlspecialchars($item['amount']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No items found for this invoice.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


              <div class="row">
                  <div class="col-md-12 d-flex justify-content-end">
                      <table style="width: 30%;">
                          <thead>
                              <tr>
                                  <th>Sub-Total</th>
                                  <th>VAT 16%</th>
                                  <th>Zero Rated(VAT)</th>
                                  <th>Total</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Ksh 10,000</td>
                                  <td>Ksh1,500</td>
                                  <td>Ksh0</td>
                                  <td>Ksh11,500</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>

          <div class="row d-flex justify-content-center mt-2 ">
              <p class="mt-6 d-flex justify-content-center" style="width:25%; border-radius: 10px; display: flex; color: white; background: linear-gradient(to right, #FFC107 50%, #00192D 50%); padding: 5px;">
                  <span style="color: #00192D; width: 10%; font-size: 14px; font-weight: 900; flex: 2; padding: 4px; text-align: center;">BT</span>
                  <span style="color: #FFC107; font-weight: 900; font-size: 14px; flex: 2; padding: 4px; text-align: center;">JENGOPAY</span>
              </p>
              <p class="d-flex justify-content-center">Powered By</p>
          </div>
      </div>

                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>



            <script>
                 // Function to view the invoice in the modal
    function viewInvoice() {
      document.getElementById('viewInvoiceNumber').textContent = document.querySelector('[name="invoice_number"]').value;
      document.getElementById('viewInvoiceDate').textContent = document.querySelector('[name="invoice_date"]').value;
      document.getElementById('viewCustomerName').textContent = document.querySelector('[name="tenant_name"]').value;
      document.getElementById('viewCustomerAddress').textContent = document.querySelector('[name="customer_address"]').value;
      document.getElementById('viewCustomerEmail').textContent = document.querySelector('[name="customer_email"]').value;
      document.getElementById('viewPaymentMethod').textContent = document.querySelector('[name="payment_method"]').value;
      document.getElementById('viewShippingOption').textContent = document.querySelector('[name="shipping_option"]').value;
    }
                // Function to delete a row
                function deleteRow(button) {
                  // Find the row to delete
                  var row = button.parentElement.parentElement;
                  row.remove();
                  updateTotalAmount();
                }

                // Function to update the total amount of an item when quantity or price is changed
                function updateTotal(input) {
                  var row = input.parentElement.parentElement;
                  var quantity = row.querySelector('[name="item_quantity[]"]').value;
                  var price = row.querySelector('[name="item_price[]"]').value;
                  var totalCell = row.querySelector('[name="item_total[]"]');
                  totalCell.value = (quantity * price).toFixed(2);

                  updateTotalAmount();
                }

                // Function to calculate the total invoice amount
                function updateTotalAmount() {
                  var totalAmount = 0;
                  var rows = document.querySelectorAll('.items-table tbody tr');
                  rows.forEach(function(row) {
                    var total = parseFloat(row.querySelector('[name="item_total[]"]').value) || 0;
                    totalAmount += total;
                  });
                  document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
                }
              </script>



    <!--end::App Wrapper-->
    <!--begin::Script-->


    <script>
      // Function to generate the PDF and enable download
      function generatePDF() {
          // Get content from the textarea
          const content = document.getElementById('pdfContent').value;

          // Create a new jsPDF instance
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF();

          // Add text to the PDF (content from the textarea)
          doc.text(content, 10, 10);

          // Download the PDF (using the content from the textarea as the name)
          doc.save('invoices-pdf.pdf');
      }
  </script>


    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script>
        // Initialize DataTable
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
        $(document).ready(function () {
            $('#myTableOne').DataTable();
        });
        $(document).ready(function () {
            $('#myTableThree').DataTable();
        });
        $(document).ready(function () {
            $('#myTableFour').DataTable();
        });
     </script>
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>
    <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      /* apexcharts
       * -------
       * Here we will create a few charts using apexcharts
       */

      //-----------------------
      // - MONTHLY SALES CHART -
      //-----------------------

      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          height: 180,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#sales-chart'),
        sales_chart_options,
      );
      sales_chart.render();

      //---------------------------
      // - END MONTHLY SALES CHART -
      //---------------------------

      function createSparklineChart(selector, data) {
        const options = {
          series: [{ data }],
          chart: {
            type: 'line',
            width: 150,
            height: 30,
            sparkline: {
              enabled: true,
            },
          },
          colors: ['var(--bs-primary)'],
          stroke: {
            width: 2,
          },
          tooltip: {
            fixed: {
              enabled: false,
            },
            x: {
              show: false,
            },
            y: {
              title: {
                formatter: function (seriesName) {
                  return '';
                },
              },
            },
            marker: {
              show: false,
            },
          },
        };

        const chart = new ApexCharts(document.querySelector(selector), options);
        chart.render();
      }

      const table_sparkline_1_data = [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54];
      const table_sparkline_2_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44];
      const table_sparkline_3_data = [15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64];
      const table_sparkline_4_data = [30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64];
      const table_sparkline_5_data = [20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64];
      const table_sparkline_6_data = [5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44];
      const table_sparkline_7_data = [12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74];

      createSparklineChart('#table-sparkline-1', table_sparkline_1_data);
      createSparklineChart('#table-sparkline-2', table_sparkline_2_data);
      createSparklineChart('#table-sparkline-3', table_sparkline_3_data);
      createSparklineChart('#table-sparkline-4', table_sparkline_4_data);
      createSparklineChart('#table-sparkline-5', table_sparkline_5_data);
      createSparklineChart('#table-sparkline-6', table_sparkline_6_data);
      createSparklineChart('#table-sparkline-7', table_sparkline_7_data);

      //-------------
      // - PIE CHART -
      //-------------

      const pie_chart_options = {
        series: [700, 500, 400, 600, 300, 100],
        chart: {
          type: 'donut',
        },
        labels: ['Chrome', 'Edge', 'FireFox', 'Safari', 'Opera', 'IE'],
        dataLabels: {
          enabled: false,
        },
        colors: ['#0d6efd', '#20c997', '#ffc107', '#d63384', '#6f42c1', '#adb5bd'],
      };

      const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
      pie_chart.render();

      //-----------------
      // - END PIE CHART -
      //-----------------
    </script>

<script>
  document.getElementById("exportButton").addEventListener("click", function() {
    // Example data (can be your table data or an array of objects)
    const data = [
      { Name: "John", Age: 30, City: "New York" },
      { Name: "Jane", Age: 25, City: "London" },
      { Name: "Mark", Age: 35, City: "Paris" }
    ];

    // Convert data to a worksheet
    const ws = XLSX.utils.json_to_sheet(data);

    // Create a new workbook and append the worksheet
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    // Export the workbook as an Excel file
    XLSX.writeFile(wb, "ExportedData.xlsx");
  });
</script>
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
