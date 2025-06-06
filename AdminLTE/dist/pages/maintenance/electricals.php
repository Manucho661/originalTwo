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

   <link rel="stylesheet" href="electricals.css">
<!-- scripts for data_table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <style>
      body{
        background-color: #FFC107 !important;
      }
      .app-wrapper{
        background-color: rgba(128,128,128, 0.1);
      }

      
    .dropdown-menu {
      min-width: 120px;
      background-color: #132E45	;
      color: #FFA000 !important;
    }
    .dropdown-menu li{
     color: #FFA000 !important;
    }
    .more-btn {
      background-color: #132E45;
      color: white;
      margin-left: 2px;
      margin-right: 2px;
      border: none;
    }
    .more-btn:hover {
      background-color: #00192D;
      color: white;
    }
  </style>
    </style>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper" style="height: 100 vh; " >
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body" style="height: 90%; " >
        <!--begin::Container-->
        <div class="container-fluid"  style="height: 100%; "  >
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
                        src="../../../dist/assets/img/user8-128x128.jpg"
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
                <span class="d-none d-md-inline">  <b>JENGO PAY</b>  </span>
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
        <div id="sidebar"></div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main" style=" height:100%;" >
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid" >
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-8">
                <h3 class="mb-0 "> 🛠 <span class="contact_section_header">Maintenance Requests/Electricals</span> </h3>     
              </div>
              <div class="col-sm-4">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#" style="color: #00192D;">  <i class="bi bi-house"></i> Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div> 
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="row g-3 mb-4">
                  <p class="text-muted">Manage maintenance requests for tenants</p>
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
            <!-- begin row -->

            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="summary-card mb-2" >
                    <div class="summary-card_icon"> <i class="fas fa-clipboard-check"></i></div>
                  <div>
                    <div class="summary-card_label">Scheduled</div>
                    <div class="summary-card_value" >200 </div>
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
            <!--begin::Row-->
            <div class="row">
              
              <h6 class="mb-0 contact_section_header summary mb-2"></i> Requests</h6>
              
              <div class="col-md-12">
                <div class="Table-section bg-white p-2 rounded-2">
                  <div class="table-section-header">
                    <div class="entries">
                      <h6 class="mb-0 contact_section_header summary mb-2 p-2 rounded-top" style="background-color: #00192D; color:#FFA000;"> <span class="text-white">Manucho |</span>  5 entries</h6>
                    </div>
                    <div class="search-pdf-excel d-flex justify-content-between">
                      <div id="custom-search">
                          <input type="text" id="searchInput" placeholder="Search request...">
                      </div>
                      <div id="custom-buttons"></div>
                    </div>
                  </div>
                  
                  <table id="requests-table" class=" display summary-table" >
                    <thead class="mb-2">
                      <tr>
                          <th>REQUEST Date</th>
                          <th>Request ID</th>
                          <th>PROPERTY + UNIT</th>
                          <th>CATEGORY + DESCRIPTION </th>
                          <th>PROVIDER</th>
                          <th>PRIORITY</th>             
                          <th>STATUS</th>
                          <th>PAYMENT</th>
                          <th>ACTIONS</th>
                      </tr>
                    </thead>
                    <tbody id="maintenanceRequestsTableBody">
                      
                    </tbody>
                  </table>
                </div> 
              </div>
               <!-- Record Payment Modal -->
              <div class="modal fade" id="recordPaymentModal" tabindex="-1" aria-labelledby="recordPaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content rounded-4 shadow-sm">
                    <div class="modal-header bg-primary text-white rounded-top" style="background-color: #00192D !important;" >
                      <h5 class="modal-title" id="recordPaymentModalLabel" style="color:#FFA000 !important; margin-left:5px;" id="inspectionModalLabel" >
                        <i class="fas fa-money-check-alt me-2"></i> Record Payment
                      </h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form id="recordPaymentForm" onsubmit="addRequestPayment(event)" enctype="multipart/form-data" >
                      <div class="modal-body">
                        <div class="row g-3">

                          <!-- Amount Paid -->
                          <div class="col-md-6 form-floating">
                            <input type="number" class="form-control" id="amountPaid" name="amountPaid" placeholder="Amount Paid" required>
                            <label for="amountPaid"><i class="fas fa-coins me-2" style="color:#FFA000 ! important" ></i>Amount Paid</label>
                          </div>

                          <!-- Payment Method -->
                          <div class="col-md-6 form-floating">
                            <select class="form-select" name="paymentMethod" id="paymentMethod" required>
                              <option value="" selected disabled>Select Method</option>
                              <option>Cash</option>
                              <option>M-Pesa</option>
                              <option>Bank Transfer</option>
                              <option>Cheque</option>
                            </select>
                            <label for="paymentMethod"><i class="fas fa-wallet me-2" style="color:#FFA000 ! important"></i>Payment Method</label>
                          </div>

                          <!-- Date Paid -->
                          <div class="col-md-6 form-floating">
                            <input type="date" class="form-control" id="datePaid" name="datePaid" placeholder="Date Paid" required>
                            <label for="datePaid"><i class="fas fa-calendar-day me-2" style="color:#FFA000 ! important"></i>Date Paid</label>
                          </div>

                          <!-- Service Provider -->
                          <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" id="serviceProvider" name="serviceProvider" placeholder="Service Provider" required>
                            <label for="serviceProvider"><i class="fas fa-user-tie me-2" style="color:#FFA000 ! important"></i>Service Provider</label>
                          </div>

                          <!-- Cheque Number -->
                          <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" name="chequeNumber" id="chequeNumber" placeholder="Cheque Number">
                            <label for="chequeNumber"><i class="fas fa-receipt me-2" style="color:#FFA000 ! important" ></i>Cheque Number</label>
                          </div>

                          <!-- Invoice Number -->
                          <div class="col-md-6 form-floating">
                            <input type="text" class="form-control" name="invoiceNumber" id="invoiceNumber" placeholder="Invoice Number">
                            <label for="invoiceNumber"><i class="fas fa-file-invoice me-2"style="color:#FFA000 ! important" ></i>Invoice Number</label>
                          </div>

                          <!-- Notes -->
                          <div class="col-12 form-floating">
                            <textarea class="form-control" id="paymentNotes" name="paymentNotes" placeholder="Notes" style="height: 100px;"></textarea>
                            <label for="paymentNotes"><i class="fas fa-comment-dots me-2" style="color:#FFA000 ! important"></i>Payment Notes</label>
                          </div>

                          <!-- Upload Receipt (Optional) -->
                          <div class="col-12">
                            <label for="uploadReceipt" class="form-label fw-bold" style="color:#FFA000 ! important"><i class="fas fa-upload me-2"></i>Upload Receipt (optional)</label>
                            <input class="form-control" type="file" name="uploadReceipt" id="uploadReceipt" accept="image/*,application/pdf">
                          </div>

                        </div>
                      </div>
                      
                      <div class="modal-footer">
                        <input type="hidden" name="request_id" id="modal_request_id">
                        <input type="hidden" name="form_type" value="addPaymentForm">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn" style="background-color:#00192D; color:#FFA000;"><i class="fas fa-save me-1"></i> Save Payment</button>
                      </div>
                    </form>
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
          <a href="https://adminlte.io" class="text-decoration-none" style="color: #00192D;"> JENGO PAY</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->




<!-- Overlay Cards -->
<!-- Overlay scripts -->
<!-- main js file -->
<script src="maintenance.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 </script>

 <!-- End view announcement script -->

 <script>
  // Function to toggle the visibility of the overlay
  function toggleOverlay() {
    var overlay = document.getElementById('overlay');
    // If overlay is hidden, show it
    if (overlay.style.display === "none" || overlay.style.display === "") {
      overlay.style.display = "flex";
    } else {
      overlay.style.display = "none";
    }
  }
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



<!-- more options -->
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
    <!-- Begin script for datatable -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let table = $('#maintanance').DataTable({
                lengthChange: false, // Removes "Show [X] entries"
                dom: 't<"bottom"p>', // Removes default search bar & keeps only table + pagination
            });

            // Link custom search box to DataTables search
            $('#searchInput').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
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
$(document).ready(function() {
    var table = $('#maintenance').DataTable({
        "lengthChange": false,
        "dom": 'Bfrtip',
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "initComplete": function() {
            // Move the buttons to the first .col-md-6
            table.buttons().container().appendTo('#maintenance_wrapper .col-md-6:eq(0)');

            // Move the search box to the second .col-md-6
            $('#maintenance_filter').appendTo('#maintenance_wrapper .col-md-6:eq(1)');
        }
    });
});


</script>

<script>

  </script>

    </script>
    <!-- End script for data_table -->

<!--Begin sidebar script -->
<script>
  fetch('../bars/sidebar.html')  // Fetch the file
      .then(response => response.text()) // Convert it to text
      .then(data => {
          document.getElementById('sidebar').innerHTML = data; // Insert it
      })
      .catch(error => console.error('Error loading the file:', error)); // Handle errors
</script>
<!-- end sidebar script -->



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
    <!--end::OverlayScrollbars Configure-->
    
    <!-- DataTable Script -->
     

    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
