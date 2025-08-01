<?php
 include '../db/connect.php';
?>

<?php
  // Fetch tenants with their user details
  $sql = "SELECT
  inspections.inspection_number,
  inspections.building_name,
  inspections.unit_name,
  inspections.inspection_type,
  inspections.date
FROM inspections";

$stmt = $pdo->query($sql);

// Use fetchAll to get all rows as an array
$inspections = $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];

// Safely count the inspections
$inspectionsCount = is_array($inspections) ? count($inspections) : 0;

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
                                                    <!-- LINKS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css" />
    <!-- <link rel="stylesheet" href="text.css" /> -->
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

   <link rel="stylesheet" href="inspections.css">
     <!-- scripts for data_table -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- Pdf pluggin -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <!--Tailwind CSS  -->
    <style>
      .app-wrapper{
         background-color: rgba(128,128,128, 0.1);

      }
      .modal-backdrop.show {
        opacity: 0.4 !important; /* Adjust the value as needed */
      }

    </style>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper"  >
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-white">
        <!--begin::Container-->
        <div class="container-fluid" >
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
                <!-- <img
                  src="17.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                /> -->
                <span class="d-none d-md-inline" style="color: #00192D;" > <b> JENGO PAY  </b>  </span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="../../../dist/assets/img/user2-160x160.jpg"
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
        <div > <?php include_once '../includes/sidebar.php'; ?>  </div> <!-- This is where the sidebar is inserted -->
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
                      <!--MAIN MODALS -->
        <!-- add new inspection modal-->
        <div class="modal fade" id="newSchedule" tabindex="-1" aria-labelledby="newScheduleLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content shadow">
              <form id="form_new_inspection" onsubmit="submitInspectionForm(event)">
                <div class="modal-header" style="background-color:#00192D;">
                  <h5 class="modal-title" id="newScheduleLabel" style="color:#FFA000 !important">Schedule Inspection</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="inspectionDate" name="date" required>
                    <label for="tenantEmail"><i class="fas fa-envelope me-1"></i> Select Date</label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="buildingSelect" name="building_name"  required>
                      <option value="" selected disabled>Choose...</option>
                      <option value="Manucho">Manucho</option>
                      <option value="Ebenezer">Ebenezer</option>
                    </select>
                    <label for="buildingSelect"><i class="fas fa-building me-1"></i> Select Building</label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="buildingSelect" name="unit_name" required>
                      <option value="" selected disabled>Choose...</option>
                      <option value="C234">C234</option>
                      <option value="B156">B156</option>
                    </select>
                    <label for="buildingSelect"><i class="fas fa-building me-1"></i> Select Unit</label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="buildingSelect" name="inspection_type" required>
                      <option value="" selected disabled>Choose...</option>
                      <option value="Move OUT">Move OUT</option>
                      <option value="Move In">MOVE IN</option>
                    </select>
                    <label for="buildingSelect"><i class="fas fa-building me-1"></i> Inspection Type</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-shift" style="background-color:#00192D; color:#FFC107;">
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>



        <!--begin::App Content Header-->

        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-8">
                <h3 class="mb-0 contact_section_header"> <i class="fas fa-search icon title-icon"></i>&nbsp; INSPECTIONS MANAGEMENT</h3>

              </div>

              <div class="col-sm-4 d-flex justify-content-end">
                <button type="button" class="btn newSchedule" data-bs-toggle="modal" data-bs-target="#newSchedule" style="background-color:#FFC107 !important; color:#00192D;">
                  New Schedule
                </button>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>

        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- BEGIN ROW -->
            <div class="row">
              <div class="container-fluid">
                <div class="row g-3 mb-4">
                  <p class="text-muted">Manage inspections for buildings and tenants</p>
                  <div class="col-md-3">
                    <select class="form-select filter-shadow">
                      <option selected>Filter by Building</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-select filter-shadow ">
                      <option selected>Filter by Tenant</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-select filter-shadow">
                      <option selected>Filter Status</option>
                      <option>Pending</option>
                      <option>Completed</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <input type="date" class="form-control filter-shadow ">
                  </div>
                </div>
                <h6 class="mb-0 contact_section_header summary mb-2"></i> Summary</h6>
                <div class="row mb-2">
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="summary-card mb-2" >
                        <div class="summary-card_icon"> <i class="fas fa-clipboard-check"></i></div>
                      <div>
                        <div class="summary-card_label">Scheduled</div>
                        <div class="summary-card_value" >&nbsp; <?= $inspectionsCount ?> </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="summary-card" >
                      <div class="summary-card_icon"><i class="fas fa-check-circle"></i></div>
                      <div>
                        <div class="summary-card_label">Completed</div>
                        <div class="summary-card_value penalities" >&nbsp;300</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="summary-card">
                      <div class="summary-card_icon"> <i class="fas fa-spinner fa-spin"></i>  </div>
                      <div>
                        <div class="summary-card_label" >In Progress</div>
                        <div class="summary-card_value" >&nbsp;200</div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="summary-card">
                      <div class="summary-card_icon" style="font-weight: bold;"><i class="fas fa-question-circle"></i>    </div>
                      <div>
                        <div class="summary-card_label">Incomplete</div>
                        <div class="summary-card_value">&nbsp;20</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /end row -->
            <!-- Begin Row -->
            <div class="row">
              <div class="col-md-12">
                <h6 class="mb-0 contact_section_header summary mb-2"></i>  Scheduled Inspections</h6>
                <div class="inspection-details-container bg-white p-2">
                  <div id="filter-pdf-excel-section" class="filter-pdf-excel-section mb-2">
                    <div class="d-flex" style="gap: 10px;">
                      <div class="select-option-container">
                        <div class="custom-select">All Buildings</div>
                        <div class="select-options mt-1">
                          <div class="selected" data-value="all">All Buildings</div>
                          <div data-value="Manucho">Manucho</div>
                          <div data-value="Pink House">Pink House</div>
                          <div data-value="White House">White House</div>
                        </div>
                      </div>
                      <div id="custom-search">
                        <input type="text" id="searchInput" placeholder="Search tenant...">
                      </div>
                    </div>
                    <div>
                    </div>
                    <div class="d-flex">
                      <div id="custom-buttons"></div>
                    </div>
                  </div>
                  <div class="entries">Manucho Apartments <span class="entries_label">/5  entries</span>
                  </div>
                  <div class="scheduledInspectionsTbl" style="overflow: auto;">
                    <table id="maintanance" class=" display summary-table">
                      <thead class="mb-2">
                      <tr>
                          <th>Date</th>
                          <th>Inspection Number</th>
                          <th>PROPERTY + UNIT</th>
                          <th>TYPE</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                      </tr>
                      </thead>
                      <tbody id="scheduledInspectionsTableBody">
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
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
          <a href="https://adminlte.io" class="text-decoration-none" style="color: #00192D;" >JENGO PAY</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->


                                           <!-- OVERLAYS(that Covers whole viewport) -->
     
      <!-- Inspection(inspected) Modal -->
      <div class="modal fade" id="inspectionModal" tabindex="-1" aria-labelledby="inspectionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content rounded-2 shadow-lg">
            <div class="modal-header d-flex justify-content-between align-items-center" id="inspectionModalHeader" style="background-color: #00192D !important;">
              <h5 class="modal-title" style="color: #FFA000 !important; margin-left: 5px;" id="inspectionModalLabel">
                Inspection Details - Ebenezer/Unit A12
              </h5>
              <!-- Centered Icon Button -->
              <button type="button" class="btn btn-sm btn-warning mx-auto" id="downloadInspectionBtn" title="Submit Inspection">
                <i class="bi bi-download"></i>
              </button>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
              <table class="table inspection-table table-striped rounded-2">
                <thead class="table-light">
                  <tr>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Photos</th>
                  </tr>
                </thead>
                <tbody  id="inspectionModalTableBody">
                  <tr>
                    <td>Floor</td>
                    <td><span class="status-bad">Needs Repair</span></td>
                    <td>Scratches and water damage near the corner.</td>
                    <td>
                      <img src="https://www.districtfloordepot.com/wp-content/uploads/2022/02/types-of-floor-damage.jpg" class="repair-photo" alt="Floor damage">
                    </td>
                  </tr>
                  <tr>
                    <td>Window</td>
                    <td><span class="status-bad">Needs Repair</span></td>
                    <td>Broken lock on the left window pane.</td>
                    <td>
                      <img src="https://apexwindowwerks.com/wp-content/uploads/2023/03/wood-window-repair-guide.jpg" class="repair-photo" alt="Window issue">
                    </td>
                  </tr>
                  <tr>
                    <td>Door</td>
                    <td><span class="status-good">Good</span></td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>Wall</td>
                    <td><span class="status-bad">Needs Repair</span></td>
                    <td>Peeling paint and minor cracks.</td>
                    <td>
                      <img src="https://images.pexels.com/photos/276267/pexels-photo-276267.jpeg" class="repair-photo" alt="Wall damage">
                    </td>
                  </tr>
                  <tr>
                    <td>Bulb</td>
                    <td><span class="status-good">Good</span></td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>Sockets</td>
                    <td><span class="status-bad">Needs Repair</span></td>
                    <td>One socket in the kitchen is not working.</td>
                    <td>
                      <img src="https://create.vista.com/wp-content/uploads/2021/09/damaged-socket.jpg" class="repair-photo" alt="Socket issue">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="modal-footer d-flex justify-content-between p-2">
              <small class="text-muted">📅 Inspection Date: <strong>2025-05-26</strong></small>
              <button type="button" style="background-color:#FFC107 !important; color:#00192D;" class="btn btn-outline" data-bs-dismiss="modal" id="closeInspectionModal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- cloned pdf modal-->
      <div id="printArea" style="display: none;"></div>


  <!-- Main Js File -->
  <script src="inspections.js"></script>
      <!-- Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

      <!-- J  A V A S C R I PT -->

                                                  <!-- LINKS -->
  <!-- steeper plugin -->
  <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
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
  <script src="../../../dist/js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <!-- links for dataTaable buttons -->
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
  <!--End links for dataTaable buttons -->
  <!-- End links -->
  <!-- DATE TABLES -->
  <script>
    $(document).ready(function () {
      const table = $('#maintanance').DataTable({
        dom: 'Brtip', // ⬅ Changed to include Buttons in DOM
        order: [], // ⬅ disables automatic ordering by DataTables
        buttons: [
          {
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
            customize: function (doc) {
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
      $('#searchInput').on('keyup', function () {
        table.search(this.value).draw();
      });
    });
  </script>
    <!-- Perform an inspection script -->
  <script>
    // display the inspection modal

    //Inspect Single Room and Display FLoor Condition if it is bad
    document.getElementById('floorRepair').addEventListener('change', function(){
                      console.log('yoyo');
        document.getElementById('floorBadDescription').style.display='block';
    });
    //if the floor condition is good no need for description
    document.getElementById('floorGood').addEventListener('change',function(){
        document.getElementById('floorBadDescription').style.display='none';
    });
    //Inspect Single Room if for the Faulty Window
    document.getElementById('windowNeedsRepair').addEventListener('change', function(){
        document.getElementById('windowBadDescription').style.display='block';
    });
    document.getElementById('windowGood').addEventListener('change', function(){
        document.getElementById('windowBadDescription').style.display='none';
    });
    //Inspect Single Room for the Door Condition
    document.getElementById('doorBad').addEventListener('click', function(){
        document.getElementById('doorBadCard').style.display='block';
        doorGood
    });
    //Inspect Single Room for the Door Condition
    document.getElementById('doorGood').addEventListener('click', function(){
        document.getElementById('doorBadCard').style.display='none';
    });
    //Inspect Single Unit for the Wall Condition
    document.getElementById('wallNeedRepair').addEventListener('click', function(){
        document.getElementById('wallNeedsRepairCard').style.display='block';
    });
    document.getElementById('wallGood').addEventListener('click', function(){
        document.getElementById('wallNeedsRepairCard').style.display='none';
    });
    //BUlb Holder Event Listener
    document.getElementById('bulbHolderNeedsRepair').addEventListener('click', function(){
        document.getElementById('bulbHolderCard').style.display='block';
    });
    document.getElementById('bulbHolderGood').addEventListener('click', function(){
        document.getElementById('bulbHolderCard').style.display='none';
    });
    document.getElementById('socketNeedsRepair').addEventListener('click',function(){
        document.getElementById('socketFaultyCard').style.display='block';
    });
    document.getElementById('socketGood').addEventListener('click',function(){
        document.getElementById('socketFaultyCard').style.display='none';
    });
  </script>

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
  <!-- date display only future date -->
   <script>
      const today = new Date().toISOString().split('T')[0];
      document.getElementById("inspectionDate").setAttribute("min", today);
   </script>

   <!-- pdf download plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
      document.getElementById('downloadInspectionBtn').addEventListener('click', () => {
          const modalContent = document.querySelector('#inspectionModal .modal-content').cloneNode(true);
          // remove download button and change styling
          const clonedDownloadBtn = modalContent.querySelector('#downloadInspectionBtn');
          const inspectionModalHeader = modalContent.querySelector('#inspectionModalHeader');
          const closeInspectionModal = modalContent.querySelector('#closeInspectionModal');
          if (clonedDownloadBtn) {
            clonedDownloadBtn.remove(); // completely removes it from the PDF
            inspectionModalHeader.style.backgroundColor="white";
            closeInspectionModal.remove();
          }



          const printArea = document.getElementById('printArea');
          printArea.innerHTML = ''; // clear previous
          printArea.appendChild(modalContent);
          printArea.style.display = 'block'; // make visible

          html2pdf().from(printArea).set({
            margin: 0.5,
            filename: 'inspection.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
          }).save().then(() => {
            printArea.style.display = 'none'; // hide again
          });
        });
    </script>

  </body>
  <!--end::Body-->
</html>
