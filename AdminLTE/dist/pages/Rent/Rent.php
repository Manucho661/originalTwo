<?php
include '../db/connect.php';

// Fetch summary totals for all buildings
$summaryQuery = $pdo->query("
    SELECT
        SUM(amount_collected) AS total_collected,
        SUM(balances) AS total_balances,
        SUM(penalties) AS total_penalties,
        SUM(arrears) AS total_arrears,
        SUM(overpayment) AS total_overpayment
    FROM building_rent_summary
");

$summary = $summaryQuery->fetch(PDO::FETCH_ASSOC);

// Format values for display
$totalCollected = number_format($summary['total_collected'], 2);
$totalBalances = number_format($summary['total_balances'], 2);
$totalPenalties = number_format($summary['total_penalties'], 2);
$totalArrears = number_format($summary['total_arrears'], 2);
$totalOverpayment = number_format($summary['total_overpayment'], 2);


try {
  // Fetch tenant data
  $stmt = $pdo->query("SELECT tenant_name, unit_code, building_name, amount_paid, penalty, arrears, overpayment, penalty_days, payment_date FROM tenant_rent_summary");
  $tenants = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Fetch total sums
  $totalsQuery = $pdo->query("
      SELECT
          SUM(amount_paid) AS total_paid,
          SUM(penalty) AS total_penalty,
          SUM(arrears) AS total_arrears,
          SUM(overpayment) AS total_overpayment
      FROM tenant_rent_summary
  ");
  $totals = $totalsQuery->fetch(PDO::FETCH_ASSOC);

  $totalPaid = number_format((float)$totals['total_paid'], 2);
  $totalPenalty = number_format((float)$totals['total_penalty'], 2);
  $totalArrears = number_format((float)$totals['total_arrears'], 2);
  $totalOverpayment = number_format((float)$totals['total_overpayment'], 2);

} catch (PDOException $e) {
  die("Database error: " . $e->getMessage());
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
    <link rel="stylesheet" href="rent.css">


    <!-- scripts for data_table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- loading out and in progress -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

<style>
 select {
  color:#767676;  /* Dodger Blue, for example */
  /* border-radius: 0px !important; */
}
select:hover {
  color: #000 !important; /* black or any color you want */
}
.app-main{
  align-items: stretch !important;
}
.app-content {
  flex: 1;

   align-items: stretch;
  display: flex;
  flex-direction: column;
}
.container-fluid.app-content{
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: stretch;
}
.container-fluid.app-content .row.details{
  flex: 1;
}
.view{
                                                            height: fit-content;
                                                            padding: 2px 8px;
                                                            font-size: 12px;
                                                            background-color: transparent;
                                                            color: #00192D;
                                                            border: 1px solid #FFC107;
                                                      }

                                                      .view-link{
  color: #00192D;
 }
</style>
</head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper" style="background-color:rgba(128,128,128, 0.1) ;" >
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
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
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
                        src="../../../dist/assets/img/user1-128x128.jpg"
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
                        src="../../../dist/assets/img/user3-128x128.jpg"
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
                  src="../../../dist/assets/img/user2-160x160.jpg"
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
            <img
              src="../../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <!-- <div id="sidebar"></div> -->
        <div > <?php include_once '../includes/sidebar.php'; ?>  </div> <!-- This is where the sidebar is inserted -->

        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->

      <!--begin::App Main-->
      <main id="mainElement" class="app-main fade-out">

        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"></h3></div>
              <div class="col-sm-6">

              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div  class="app-content">

          <div class="container-fluid app-content">
            <!-- First Row -->
            <div class="row">

              <div class="col-sm-8">
                <div class="d-flex">
                  <h3 class="mb-0 contact_section_header"> <i class="fas fa-coins icon"></i> Rental Charges </h3>
                  <h6 class="month" style="color: green;">April-2025</h6>
                </div>
              </div>
              <div class="col-sm-4 home">
                <div class="row float-sm-end">
                     <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#" style="color: #00192D;">  <i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                      </ol>
                </div>

                <div class="row d-flex">
                </div>

              </div>
            </div>

            <!-- End first Row -->


            <!-- START ROW -->
                                           <!-- SUMMARY -->
            <div class="row">
              <h6 class="mb-0 contact_section_header summary mb-2"> </i> Summary</h6>

              <div class="col-sm-12 col-md-3">
                <div class="summary-item collected" style="display: flex; gap: 10px; align-items: center; ">
                  <div class="icon"> <i class="fas fa-coins"></i></div>
                  <div>
                    <div class="label">Collected</div>
                    <div class="value">KSH&nbsp;<?php echo $totalCollected; ?></div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-3">
                <div class="summary-item collected" style="display: flex; gap: 10px;   align-items: center; ">
                  <div class="icon"> <i class="fas fa-coins"></i></div>
                  <div>
                    <div class="label">Penalities</div>
                    <div class="value">KSH&nbsp;<?php echo $totalPenalties; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-3">
                <div class="summary-item collected" style="display: flex; gap: 10px;   align-items: center; ">
                  <div class="icon"> <i class="fas fa-coins"></i></div>
                  <div>
                    <div class="label">Arreas</div>
                    <div class="value">KSH&nbsp;<?php echo $totalArrears; ?></div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-3">
                <div class="summary-item collected" style="display: flex; gap: 10px;   align-items: center; ">
                  <div class="icon"> <i class="fas fa-coins"></i></div>
                  <div>
                    <div class="label">Overpayment</div>
                    <div class="value">KSH&nbsp;<?php echo $totalOverpayment; ?></div>
                  </div>
                </div>
              </div>


            </div>
            <!-- END ROW -->

            <!-- START ROW -->
             <div class="row mt-4 details">
                <div class="row" id="summary-row">


                    <div class="col-md-12 details">
                    <h6 class="mb-0 contact_section_header summary mb-2"> </i> Details</h6>
                      <div class="rent-info">
                          <div class="rent-info filter ">
                            <div class="filter-boxes">

                               <!-- <div class="select-option-container mt-3"> -->
                               <div class="row mt-3">
                                <!-- Building Select -->
                                <div class="col-md-3">
                                  <b><label for="building-select" class="form-label">Select Building</label></b>
                                  <select id="building-select" class="form-control">
                                    <option value="">All Buildings</option>
                                    <?php
                                      $buildings = $pdo->query("SELECT DISTINCT building_name FROM building_rent_summary");
                                      while ($b = $buildings->fetch()):
                                    ?>
                                      <option value="<?= htmlspecialchars($b['building_name']) ?>">
                                        <?= htmlspecialchars($b['building_name']) ?>
                                      </option>
                                    <?php endwhile; ?>
                                  </select>
                                </div>

                                <!-- From Date -->
                                <div class="col-md-3">
                                <b><label for="start-date" class="form-label">From</label></b>
                                  <input type="date" id="start-date" class="form-control">
                                </div>

                                <!-- To Date -->
                                <div class="col-md-3">
                                  <b><label for="end-date" class="form-label">To</label></b>
                                  <input type="date" id="end-date" class="form-control">
                                </div>
                              </div>

<!-- Search Button
<div class="col-md-3 align-self-end">
    <button type="submit" class="btn  w-100">Search</button>
  </div> -->





                              <!-- <div class="select-option-container mt-3">
                                <div class="custom-select">April</div>
                                <div class="select-options mt-1">
                                  <div class="selected" data-value="item1">April</div> -->
                                  <!-- <select name="selected_month" class="form-control mt-3" required>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April" selected>April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                              </select> -->

                                <!-- </div>
                              </div>
                            </div> -->

                            </div>

                            <div class="pdf-excel">
                            <form method="get" action="actions/generate-pdf.php" target="_blank" id="pdf-form">
                            <input type="hidden" name="building" id="pdf-building" value="">
                            <input type="hidden" name="year" id="pdf-year" value="">
                            <input type="hidden" name="month" id="pdf-month" value="">
                            <button id="download-pdf" type="submit" class="pdf">
                              <i class="fas fa-file-pdf" style="color: red;"></i>
                            </button>
                          </form>


                         <!-- <button  class="pdf" ><i class="fas fa-file-pdf" style="color: red;"></i></button> -->
                          <!-- <button class="excel"><i class="fas fa-file-excel" style="color: green;"></i></button> -->
                          <div class="">
                          <div class="pdf-excel">
                          <form method="post" action="export-excel.php">
                            <button type="submit" class="excel">
                              <i class="fas fa-file-excel" style="color: green;"></i>
                            </button>
                          </form>
                        </div>
                                                  </div>
                          </div>
                            <!-- <div class="pdf-excel"> -->

                            <!-- <div class="pdf-excel">
                              <button class="pdf" ><i class="fas fa-file-pdf" style="color: red;"></i></button>
                              <button class="excel"><i class="fas fa-file-excel" style="color: green;"></i></button>
                            </div> -->
                          </div>
                          <?php include '../db/connect.php'; ?>
                          <div class="rentTable section">
                          <table id="rent" class="tableRent" style="font-size: small;">
                          <thead>
                            <tr>
                              <th scope="col">Building</th>
                              <th scope="col">Collected</th>
                              <th scope="col">Balances</th>
                              <th scope="col">Penalties</th>
                              <th scope="col">Arrears</th>
                              <th scope="col">Overpayment</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody id="rent-body">
                            <!-- Data will be loaded here via JavaScript -->
                          </tbody>
                        </table>


                          </div>
                      </div>
                    </div>


             </div>
            <!-- END ROW -->

<!-- Rent Chart Section -->
<div class="d-flex justify-content-center mt-4">
  <div class="p-3 rounded shadow-sm" style="background-color: white; width: 98%; max-width:98%;">
    <b><h6 class="mb-2" style="color: #00192D; font-size: 16px;">📊Rent Collection by Building</h6></b>
    <div style="height: 100%;">
      <canvas id="rentBuildingChart"></canvas>
    </div>
  </div>
</div>

            </div>




         </form>
      </main>
  </div>
</div>
<!-- end -->







<footer class="app-footer">
  <!--begin::To the end-->
  <div class="float-end d-none d-sm-inline">Anything you want</div>
  <!--end::To the end-->
  <!--begin::Copyright-->
  <strong>
    Copyright &copy; 2014-2024&nbsp;
    <a href="https://adminlte.io" class="text-decoration-none" style="color: #00192D;"> JENGO PAY</a>.
  </strong>
  All rights reserved.
  <!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>

<!-- LOADING AND OUT PROGRESS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<!-- EnD LOADING AND OUT PROGRESS -->

<!-- SELECT ELEMENT SCRIPT -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('get_rent_data.php')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.building_name);
            const values = data.map(item => parseFloat(item.amount_collected));

            const ctx = document.getElementById('rentBuildingChart').getContext('2d');

            // Create gradient
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, '#00192D');
            gradient.addColorStop(1, '#00192D');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Amount Collected (KES)',
                        data: values,
                        backgroundColor: gradient,
                        borderRadius: 8,
                        borderWidth: 0,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeOutBounce'
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'KES ' + value.toLocaleString();
                                },
                                color: '#333',
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                }
                            },
                            grid: {
                                color: '#eee'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#333',
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                }
                            },
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#FFC107',
                            titleFont: { weight: 'bold' },
                            callbacks: {
                                label: function(context) {
                                    return 'KES ' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching chart data:', error);
        });
});
</script>


<script>
document.querySelectorAll('.select-option-container').forEach(container => {
    const select = container.querySelector('.custom-select');
    const optionsContainer = container.querySelector('.select-options');
    const options = optionsContainer.querySelectorAll('div');

    // Toggle dropdown on select click
    select.addEventListener('click', () => {
      const isOpen = optionsContainer.style.display === 'block';

      // Close all other dropdowns before opening a new one
      document.querySelectorAll('.select-options').forEach(opt => opt.style.display = 'none');
      document.querySelectorAll('.custom-select').forEach(sel => {
        sel.classList.remove('open');

      });

      // Toggle current dropdown
      optionsContainer.style.display = isOpen ? 'none' : 'block';
      select.classList.toggle('open', !isOpen);
    });

    // Option click handler
    options.forEach(option => {
      option.addEventListener('click', () => {
        select.textContent = option.textContent;
        select.setAttribute('data-value', option.getAttribute('data-value'));

        options.forEach(opt => opt.classList.remove('selected'));
        option.classList.add('selected');

        optionsContainer.style.display = 'none';
        select.classList.remove('open');
      });

      option.addEventListener('mouseenter', () => {
        options.forEach(opt => opt.classList.remove('selected'));
        option.classList.add('selected');
      });

    });
  });

  // Close dropdowns on outside click
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.select-option-container')) {
      document.querySelectorAll('.select-options').forEach(opt => opt.style.display = 'none');
      document.querySelectorAll('.custom-select').forEach(sel => {
        sel.classList.remove('open');
        sel.style.borderRadius = '5px';
      });
    }
  });
</script>


<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
    // Set default dates (current month)
    const today = new Date().toISOString().split('T')[0];
    const firstDay = new Date();
    firstDay.setDate(1);
    const firstDayStr = firstDay.toISOString().split('T')[0];

    document.getElementById('fromDate').value = firstDayStr;
    document.getElementById('toDate').value = today;

    // Get all filter elements
    const filters = {
        building: document.getElementById('building-select'),
        fromDate: document.getElementById('fromDate'),
        toDate: document.getElementById('toDate')
    };

    // Add event listeners
    Object.values(filters).forEach(filter => {
        filter.addEventListener('change', loadRentData);
    });

    // Initial load
    loadRentData();

    async function loadRentData() {
        const params = new URLSearchParams();
        params.append('building', filters.building.value);
        params.append('from_date', filters.fromDate.value);
        params.append('to_date', filters.toDate.value);

        try {
            const response = await fetch('get_rent_data.php?' + params.toString());
            const data = await response.json();

            const tbody = document.getElementById('rent-body');
            tbody.innerHTML = '';

            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.building_name}</td>
                    <td>${formatCurrency(row.amount_collected)}</td>
                    <td>${formatCurrency(row.balances)}</td>
                    <td>${formatCurrency(row.penalties)}</td>
                    <td>${formatCurrency(row.arrears)}</td>
                    <td>${formatCurrency(row.overpayment)}</td>
                    <td>
                        <a href="building-rent.php?building=${encodeURIComponent(row.building_name)}&from_date=${filters.fromDate.value}&to_date=${filters.toDate.value}"
                           class="btn btn-sm btn-info">
                            View
                        </a>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        } catch (error) {
            console.error('Error:', error);
            document.getElementById('rent-body').innerHTML = `
                <tr>
                    <td colspan="7" class="text-center text-danger">
                        Error loading data. Please try again.
                    </td>
                </tr>
            `;
        }
    }

    function formatCurrency(amount) {
        return 'Ksh ' + parseFloat(amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
});
</script> -->

<script>
document.addEventListener("DOMContentLoaded", function () {
    const buildingSelect = document.getElementById("building-select");
    const yearSelect = document.getElementById("year-select");
    const monthSelect = document.getElementById("month-select");

    [buildingSelect, yearSelect, monthSelect].forEach(select => {
        select.addEventListener("change", fetchFilteredData);
    });

    function fetchFilteredData() {
        const building = buildingSelect.value;
        const year = yearSelect.value;
        const month = monthSelect.value;

        const xhr = new XMLHttpRequest();
        '../communications/actions/delete_message.php'
        xhr.open("POST", "../Rent/actions/filter-rent.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (this.status === 200) {
                document.getElementById("rent-body").innerHTML = this.responseText;
            }
        };

        xhr.send(`building=${encodeURIComponent(building)}&year=${year}&month=${month}`);
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const buildingSelect = document.getElementById("building-select");
    const yearSelect = document.getElementById("year-select");
    const monthSelect = document.getElementById("month-select");

    const pdfForm = document.getElementById("pdf-form");
    const pdfBuilding = document.getElementById("pdf-building");
    const pdfYear = document.getElementById("pdf-year");
    const pdfMonth = document.getElementById("pdf-month");

    pdfForm.addEventListener("submit", function () {
        pdfBuilding.value = buildingSelect.value || 'All Buildings';
        pdfYear.value = yearSelect.value;
        pdfMonth.value = monthSelect.value;
    });
});
</script>


 <script>
document.getElementById('download-pdf').addEventListener('click', function () {
  const selected = document.querySelector('.custom-select').textContent.trim();
  const building = encodeURIComponent(selected);

  // Redirect to PDF generator (opens in new tab)
  window.open(`../Rent/actions/generate-pdf.php?building=${building}`, '_blank');
});

 </script>
<!--
 <script>
  document.getElementById("generateReport").addEventListener("click", function () {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      // Title
      doc.setFont("helvetica", "bold");
      doc.setFontSize(18);
      doc.text("Rent Deposit Report", 70, 20);

      doc.setFontSize(12);
      doc.setFont("helvetica", "normal");

      // Report Data
      let y = 40;
      const lineSpacing = 10;
      const reportData = [
          ["Tenant Name:", "John Doe"],
          ["Property:", "Greenview Apartments"],
          ["Amount Collected:", "KSH 30,000"],
          ["Date of Collection:", "2025-01-10"],
          ["Maintenance Costs Deducted:", "KSH 5,000"],
          ["Cleaning Fees:", "KSH 2,000"],
          ["Amount Refunded:", "KSH 23,000"],
          ["Date of Refund:", "2025-02-15"]
      ];

      reportData.forEach(row => {
          doc.text(`${row[0]} ${row[1]}`, 20, y);
          y += lineSpacing;
      });

      // Footer
      doc.setFontSize(10);
      doc.text("Generated by Greenview Apartments Management", 50, y + 10);

      // Save PDF
      doc.save("Rent_Deposit_Report.pdf");
  });
</script> -->
<!-- end download as pdf -->

<script>
document.addEventListener('DOMContentLoaded', function () {
  const selectBox = document.querySelector('.custom-select');
  const optionsBox = document.getElementById('building-options');
  const rentBody = document.getElementById('rent-body');
  const summarySection = document.getElementById('summary-section');

  // Load buildings into dropdown
  fetch('../Rent/actions/get_buildings.php')
    .then(res => res.json())
    .then(data => {
      optionsBox.innerHTML = `<div class="selected" data-value="All Buildings">All Buildings</div>`;
      data.forEach(name => {
        const option = document.createElement('div');
        option.setAttribute('data-value', name);
        option.innerText = name;
        optionsBox.appendChild(option);
      });
    });

  // Handle dropdown click
  optionsBox.addEventListener('click', function (e) {
    if (e.target && e.target.dataset.value) {
      const selectedBuilding = e.target.dataset.value;
      selectBox.textContent = selectedBuilding;
      loadBuildingData(selectedBuilding);
    }
  });

  function loadBuildingData(buildingName) {
    const url = `../Rent/actions/fetch_building_summary.php?building=${encodeURIComponent(buildingName)}`;
    fetch(url)
      .then(res => res.json())
      .then(data => {
        // Render table
        rentBody.innerHTML = '';
        let totalCollected = 0, totalPenalties = 0, totalArrears = 0, totalOverpayment = 0;

        data.forEach(row => {
          totalCollected += parseFloat(row.amount_collected);
          totalPenalties += parseFloat(row.penalties);
          totalArrears += parseFloat(row.arrears);
          totalOverpayment += parseFloat(row.overpayment);

          rentBody.innerHTML += `
            <tr>
              <th>${row.building_name}</th>
              <td class="rent paid">KSH&nbsp;${parseFloat(row.amount_collected).toLocaleString()}</td>
              <td><div class="rent penalit">KSH&nbsp;${parseFloat(row.penalties).toLocaleString()}</div></td>
              <td class="rent collected">KSH&nbsp;${parseFloat(row.arrears).toLocaleString()}</td>
              <td class="rent overpayment">KSH&nbsp;${parseFloat(row.overpayment).toLocaleString()}</td>
              <td>
              <button class="btn view"> <a class="view-link" href="building-rent.html">View</a> </button>
              </td>
            </tr>`;
        });

        // Render summary
        summarySection.innerHTML = `
        <div class="col-sm-12 col-md-3">
          <div class="summary-item collected d-flex align-items-center" style="gap: 10px;">
            <div class="icon"><i class="fas fa-coins"></i></div>
            <div>
              <div class="label">Collected</div>
              <div class="value">KSH&nbsp;${totalCollected.toLocaleString()}</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-3">
          <div class="summary-item penalties d-flex align-items-center" style="gap: 10px;">
            <div class="icon"><i class="fas fa-coins"></i></div>
            <div>
              <div class="label">Penalties</div>
              <div class="value">KSH&nbsp;${totalPenalties.toLocaleString()}</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-3">
          <div class="summary-item arrears d-flex align-items-center" style="gap: 10px;">
            <div class="icon"><i class="fas fa-coins"></i></div>
            <div>
              <div class="label">Arrears</div>
              <div class="value">KSH&nbsp;${totalArrears.toLocaleString()}</div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-3">
          <div class="summary-item overpayment d-flex align-items-center" style="gap: 10px;">
            <div class="icon"><i class="fas fa-coins"></i></div>
            <div>
              <div class="label">Overpayment</div>
              <div class="value">KSH&nbsp;${totalOverpayment.toLocaleString()}</div>
            </div>
          </div>
        </div>`;
      });
  }

  // Initial load
  loadBuildingData('All Buildings');
});
</script>


<!-- <script>
document.querySelectorAll('.select-options div').forEach(option => {
  option.addEventListener('click', function () {
    const selectedMonth = this.getAttribute('data-value');
    document.querySelector('.custom-select').innerText = selectedMonth;

    // Highlight selected
    document.querySelectorAll('.select-options div').forEach(opt => opt.classList.remove('selected'));
    this.classList.add('selected');

    // Fetch filtered rent data
    fetch('fetch-rent.php?month=' + encodeURIComponent(selectedMonth))
      .then(response => response.text())
      .then(data => {
        document.getElementById('rent-body').innerHTML = data;
      });
  });
});
</script> -->

<!--
<script>
        function downloadPDF() {
            // Create a temporary anchor tag
            const link = document.createElement('a');
            link.href = 'download.php'; // This points to your PHP download script
            link.download = ''; // Not required, but helps in some browsers
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script> -->

<!-- create notification -->
<script>
  // Function to open the complaint popup
  function opennotificationPopup() {
    document.getElementById("notificationPopup").style.display = "flex";
  }

  // Function to close the complaint popup
  function closenotificationPopup() {
    document.getElementById("notificationPopup").style.display = "none";
  }
</script>

<script>
  // Function to open the complaint popup
  function openPopup() {
    document.getElementById("complaintPopup").style.display = "flex";
  }

  // Function to close the complaint popup
  function closeunitsPopup() {
    document.getElementById("complaintPopup").style.display = "none";
  }
</script>

    <!-- script for notification overlay -->

    <script>
      function showOverlay() {
        document.getElementById('notificationOverlay').style.display = 'flex';
      }

      function closeOverlay() {
        document.getElementById('notificationOverlay').style.display = 'none';
      }
    </script>


<!-- close overlay -->
<script>
  function closeOverlay() {
    document.querySelector('.overlay').style.display = 'none';
  }
</script>

<script>
// Example list of buildings
const buildings = [
  { name: "All Buildings", value: "all" },
  { name: "Manucho", value: "manucho" },
  { name: "Ebenezer", value: "ebenezer" },
  { name: "Crown Z", value: "crownz" }
];

// Function to display options
function renderOptions(filter = "") {
  const container = document.getElementById('buildingOptions');
  container.innerHTML = ""; // Clear existing

  buildings
    .filter(b => b.name.toLowerCase().includes(filter.toLowerCase()))
    .forEach(b => {
      const div = document.createElement('div');
      div.textContent = b.name;
      div.setAttribute('data-value', b.value);
      div.classList.add('option-item');
      div.onclick = () => {
        document.querySelector('.custom-select').textContent = b.name;
        // Optionally store value somewhere
      };
      container.appendChild(div);
    });
}

// Initial load
renderOptions();

// Add search functionality
document.getElementById('searchInput').addEventListener('input', (e) => {
  renderOptions(e.target.value);
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
<script>

  // JavaScript to handle hover and hide functionality
  const  more= document.getElementById("more");
  const more_icon = document.getElementById("more_icon");
  const more_options = document.getElementById("more_options");

  // Show panel when hovering over the accordion
  more_icon.addEventListener("mouseenter", () => {
    more_options.style.display = "block";
  });

  // Hide panel when moving out of both accordion and panel
   more.addEventListener("mouseleave", () => {
    more_options.style.display = "none";
});


</script>

<!-- End script for data_table -->


<!--Begin sidebar script -->
<!-- <script>
  fetch('../bars/sidebar.html')  // Fetch the file
      .then(response => response.text()) // Convert it to text
      .then(data => {
          document.getElementById('sidebar').innerHTML = data; // Insert it
      })
      .catch(error => console.error('Error loading the file:', error)); // Handle errors
</script> -->
<!-- end sidebar script -->


<script>
document.addEventListener('DOMContentLoaded', function() {
    const buildingSelect = document.getElementById('building-select');
    const startDate = document.getElementById('start-date');
    const endDate = document.getElementById('end-date');
    const rentBody = document.getElementById('rent-body');

    // Set default dates (current month)
    const today = new Date().toISOString().split('T')[0];
    const firstDay = new Date();
    firstDay.setDate(1);
    const firstDayStr = firstDay.toISOString().split('T')[0];

    startDate.value = firstDayStr;
    endDate.value = today;

    // Function to fetch and display filtered data
    function fetchFilteredData() {
        const building = buildingSelect.value;
        const fromDate = startDate.value;
        const toDate = endDate.value;

        // Create URL with query parameters
        let url = 'fetch_rent_data.php?';
        if (building) url += `building=${encodeURIComponent(building)}&`;
        if (fromDate) url += `start_date=${encodeURIComponent(fromDate)}&`;
        if (toDate) url += `end_date=${encodeURIComponent(toDate)}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                updateTable(data);
            })
            .catch(error => {
                console.error('Error:', error);
                rentBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center text-danger">
                            Error loading data: ${error.message}
                        </td>
                    </tr>
                `;
            });
    }

    // Update the table with filtered data
    function updateTable(data) {
        let html = '';
        let totals = {
            collected: 0,
            balances: 0,
            penalties: 0,
            arrears: 0,
            overpayment: 0
        };

        // Build rows for each building
        data.forEach(row => {
            const collected = parseFloat(row.amount_collected) || 0;
            const balances = parseFloat(row.balances) || 0;
            const penalties = parseFloat(row.penalties) || 0;
            const arrears = parseFloat(row.arrears) || 0;
            const overpayment = parseFloat(row.overpayment) || 0;

            totals.collected += collected;
            totals.balances += balances;
            totals.penalties += penalties;
            totals.arrears += arrears;
            totals.overpayment += overpayment;

            html += `
                <tr>
                    <th>${row.building_name}</th>
                    <td class="rent paid">KSH&nbsp;${collected.toFixed(2)}</td>
                    <td class="rent balances">KSH&nbsp;${balances.toFixed(2)}</td>
                    <td><div class="rent penalit">KSH&nbsp;${penalties.toFixed(2)}</div></td>
                    <td class="rent collected">KSH&nbsp;${arrears.toFixed(2)}</td>
                    <td class="rent overpayment">KSH&nbsp;${overpayment.toFixed(2)}</td>
                    <td>
                    <button class="btn view">  <a class="text-white" href="building-rent.php?building=${encodeURIComponent(row.building_name)}&start_date=${startDate.value}&end_date=${endDate.value}">View</a> </button>
                    </td>
                </tr>
            `;
        });

        // Add totals row
        if (data.length > 0) {
            html += `
                <tr style="font-weight: bold; background-color: #f0f0f0;">
                    <td>Total</td>
                    <td class="rent paid">KSH&nbsp;${totals.collected.toFixed(2)}</td>
                    <td class="rent paid">KSH&nbsp;${totals.balances.toFixed(2)}</td>
                    <td><div class="rent penalit">KSH&nbsp;${totals.penalties.toFixed(2)}</div></td>
                    <td class="rent collected">KSH&nbsp;${totals.arrears.toFixed(2)}</td>
                    <td class="rent overpayment">KSH&nbsp;${totals.overpayment.toFixed(2)}</td>
                    <td></td>
                </tr>
            `;
        } else {
            html = `
                <tr>
                    <td colspan="7" class="text-center">No data found for selected filters</td>
                </tr>
            `;
        }

        rentBody.innerHTML = html;
    }

    // Add event listeners
    buildingSelect.addEventListener('change', fetchFilteredData);
    startDate.addEventListener('change', fetchFilteredData);
    endDate.addEventListener('change', fetchFilteredData);

    // Initial load
    fetchFilteredData();
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

    <!--end::Script-->

<!-- Loading out and in script -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Fade in effect on page load
    const mainElement = document.getElementById("mainElement");

    if (mainElement) {
      mainElement.classList.remove("fade-out");
    }

    // Intercept link clicks
    document.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", function (e) {
        const target = this.getAttribute("target");
        const href = this.getAttribute("href");

        if (!target || target === "_self") {
          e.preventDefault();
          NProgress.start();
          mainElement.classList.add("fade-out");

          setTimeout(() => {
            window.location.href = href;
          }, 500);
        }
      });
    });
  });



</script>




<script>
  window.addEventListener('resize', () => {
  console.log("Viewport width:", window.innerWidth);
  console.log("yoyo");
});
</script>

  </body>
  <!--end::Body-->
</html>
