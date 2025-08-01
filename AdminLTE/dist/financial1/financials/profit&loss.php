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
    <link rel="stylesheet" href="balancesheet.css">

    <!-- scripts for data_table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <!-- Include XLSX and FileSaver.js for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

         <!-- Include jsPDF library (latest version) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Include jsPDF autoTable plugin (latest compatible version with jsPDF 2.5.1) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

    <!-- Include jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Include jsPDF autoTable plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <style>
      body{
        font-size: 16px;
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
                <img
                  src="17.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">  <b>JENGO PAY</b>  </span>
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
        <div> <?php include_once '../includes/sidebar.php'; ?> </div> <!-- This is where the sidebar is inserted -->

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
                        <h3 class="mb-0 contact_section_header"> <i class="fas fa-file-invoice-dollar" style=" color:#FFC107;"></i>  Profit & Loss</h3>
                        <div class="row Summary mt-6" >
                          <!-- Summary -->
                          <div class="col-md-12 ">

                            <div class="summary-section text-center p-2 row g-3">
                              <div class="col-6 col-md-4 ">
                                <div class="summary-item assets">

                                    <div class="label "> <i class="fas fa-calculator"></i>  INCOME   </div>
                                    <div class="value"> <b> KSH 10,000</b> </div>
                                </div>

                              </div>

                              <div class="col-6 col-md-4 ">
                                <div class="summary-item liabilities">


                                 <div class="label"> <i class="fas fa-calculator"></i>EXPENSES</div>
                                 <div class="value"> <b>KSH 50,000</b></div>
                                </div>
                              </div>
                              <div class="col-6 col-md-4 ">
                                <div class="summary-item equity">

                                    <div class="label"> <i class="fas fa-calculator"></i> NET PROFIT</div>

                                    <div class="value"> KSH 500,000</div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

              </div>

              <div class="col-sm-4">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#" style="color: #00192D;">  <i class="bi bi-house"></i> Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>

            </div>
            <!--end::Row-->

            <!-- /end row -->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->

            <!-- /.row -->
            <!--begin::Row-->
            <div class="row first mb-2 mt-2 rounded-circle">


              <!-- /.col -->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row table_buttons mb-2">
              <div class="col-md-6 col-12">
                  <div class="filter-container d-flex flex-wrap">
                      <div class="mr-2 mb-2">
                          <label for="categoryFilter" class="filter-label">Property</label>
                          <br>
                          <select id="categoryFilter">
                              <option value="">-- Select --</option>
                              <option value="technology">All</option>
                              <option value="health">Manucho</option>
                              <option value="business">Ebenezer</option>
                              <option value="education">Crown Z</option>
                          </select>
                      </div>

                      <div class="mr-2 mb-2">
                          <label for="filterDate" class="filter-label">Start Date</label>
                          <br>
                          <input type="date" id="filterDate" />
                      </div>

                      <div class="mr-2 mb-2" style="padding: 10px;">
                          <label for="filterDate" class="filter-label">End Date</label>
                          <br>
                          <input type="date" id="filterDate"/>
                      </div>
                  </div>
              </div>

              <div class="col-md-6 col-12 d-flex justify-content-end" style="position: relative; min-height: 60px;">
                  <div style="position: absolute; bottom: 0; right: 0;">
                      <button class="pdf_button" style="height: fit-content; padding: 4px;" id="downloadBtn">
                          <i class="fas fa-file-pdf" style="font-size: 30px; padding: 50x; color: white"></i>
                      </button>
                      <button class="excel_button" style="height: fit-content; padding: 4px;" onclick="exportToExcel()">
                          <i class="fas fa-file-excel" style="font-size: 30px; color: white"></i>
                      </button>
                  </div>
              </div>
          </div>


            <!--end::Row-->

           <!--begin::Row-->
            <div class="row">
              <!-- Start col -->
               <div class="container balancesheet">
                <div>
                   <h3 class=" text-start  balancesheet-header">December 31, 2024</h3>
                  <div class="table-responsive">
                    <table id="myTable" style="width: 100%;">
                        <thead style="background-color: rgba(128, 128, 128, 0.2); color: black;" >
                            <tr>
                                <th style="font-size: 16px;">Description</th>
                                <th style="font-size: 16px;">Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                          <!-- <tr class="category"><td> <b style="font-size: 16px;">Income</b></td></tr> -->
                          <tr class="category"><td> <b>Income</b></td></tr>
                          <tr><td>Rental Income</td><td>Ksh50,000</tr>
                            <tr><td>Maintenance Fees Collected</td><td>Ksh 2500</td></tr>
                            <tr><td>Late Payment Fees</td><td>Ksh 10,000</td></tr>
                            <tr><td>Utility Charges</td><td>Ksh 1500</td></tr>
                            <tr><td>Management Fees</td><td>Ksh 2000</td></tr>
                            <tr><td>Other Income</td><td>Ksh 5000</td></tr>
                            <tr class="category"><td> <b>Total Income</b></td><td> <b>Ksh71,000</b></td></tr>
                            <tr class="category"><td> <b>Expenses</b></td></tr>
                            <tr><td>MRI Deductions</td><td> Ksh 20,000</td></tr>
                            <tr><td>Maintenance and Repairs</td><td>Ksh 3500</td></tr>
                            <tr><td>Staff Salaries</td><td>Ksh 2,900</td></tr>
                            <tr><td>Utilities</td><td>Ksh 1200</td></tr>
                            <tr><td>Marketing Costs</td><td>Ksh 2500</td></tr>
                            <tr><td>Legal Fees</td><td>Ksh 2300</td></tr>
                            <tr><td>Depreciation</td><td>Ksh 1000</td></tr>
                            <tr><td>Loan Interest</td><td>Ksh 5000</td></tr>
                            <tr><td>Miscellaneous Expenses</td><td>Ksh 4500</td></tr>
                            <tr class="category"><td> <b>Total Expenses</b> </td><td> <b>Ksh 38,400</b></td></tr>
                            <tr class="category"><td> <b>Net Profit</b> </td><td> <b>Ksh 32,600</b></td></tr>
                        </tbody>


                    </table>
                  </div>
                </div>
              <!-- /.col -->
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


  <!-- Lease Modal -->
<div class="modal fadey" id="leaseyModal" tabindex="-1" aria-labelledby="leaseyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="leaseyModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-wrapper">
              <h1 class="text-warning">Assign Task</h1>
              <form id="taskForm">
                <div class="input-group">
                  <label for="taskName">Task About To Be Assigned:</label>
                  <input type="text" id="taskName" name="taskName" placeholder="Enter task name" style="border-radius: 10px; width: 100%;"   required>
              </div>

                  <div class="input-group">
                      <label for="serviceProvider">Select A Category For The Task</label>
                  <label for="taskName"></label>
                      <select id="serviceProvider" name="serviceProvider" style="border-radius: 10px;"  required>
                          <option value="" id="taskName" disabled selected>Select A Category </option>
                          <option value="John">Electrical</option>
                          <option value="Jane">Plumbing</option>
                          <option value="Mike">Cleaning</option>
                      </select>
                  </div>
                  <div class="input-group">
                    <label for="serviceProvider">Select Service Provider:</label>
                    <select id="serviceProvider" name="serviceProvider" style="border-radius: 10px;" required>
                        <option value="" id="taskName"  disabled selected>Select Provider</option>
                        <option value="John">John </option>
                        <option value="Jane">Jane </option>
                        <option value="Mike">Mike </option>
                    </select>
                </div>


                  <button type="submit" class="submit-btn" style="border-radius: 10px; background-color: #00192D; width: 50%; margin-left: 6rem;" >Assign</button>
              </form>
          </div>

          <!-- <div id="assignedTasks">
              <h2>Assigned Tasks</h2>
              <ul id="taskList"></ul>
          </div> -->
      </div>


      </div>
    </div>
  </div>
</div>

  <!-- Lease Modal -->
  <div class="modal fade" id="leaseModal" tabindex="-1" aria-labelledby="leaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="leaseModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="beasy">
             <!-- Landlord Information Section -->
      <!-- Service Provider Information Section -->
      <div class="form-section">
        <h3 class="text-warning">Landlord Information</h3>
         <a href="#"><p>Martin White</p></a>
        <!-- <label for="landlordName">Landlord Name(Martin White)</label> -->
        <!-- <input type="text" id="landlordName" name="landlordName" placeholder="Enter your full name" required> -->

        <h3 class="text-warning">Select Service Providers Information</h3>
        <label for="paymentMethod">Choose:</label>
        <select id="paymentMethod" name="paymentMethod" required>
          <option value="bank_transfer">ABX Electricals</option>
          <option value="bank_transfer">Sunsine Plumbers</option>
          <option value="bank_transfer">Favored Technologies</option>
        </select>
        <h3 class="text-warning">Payment Details</h3>
        <label for="amount">Payment Amount (KSH)</label>
        <input type="text" id="landlordName" name="landlordName" placeholder="Enter Amount" required>

        <label for="paymentMethod">Payment Method</label>
        <select id="paymentMethod" name="paymentMethod" required>
          <option value="mpesa_transfer" class="bossy">MPESA</option>
          <option value="mpesa_transfer" class="bossy">Bank</option>
          <option value="mpesa_transfer" class="bossy">Global Pay</option>
          <option value="mpesa_transfer" class="bossy">Cash</option>

        </select>
         <!-- Submit Button -->
         <button type="submit" class="bossy"> MAKE PAYMENT</button>
      </div>



      <!-- Payment Details Section
      <div class="form-section">
        <h3>Payment Details</h3>
        <label for="amount">Payment Amount (KSH)</label>
        <input type="number" id="amount" name="amount" placeholder="Enter the amount to pay" min="1" required>

        <label for="paymentMethod">Payment Method</label>
        <select id="paymentMethod" name="paymentMethod" required>
          <option value="mpesa_transfer" class="bossy">MPESA</option>
        </select>
      </div> -->

          </form>
        </div>
      </div>
    </div>
  </div>

<!-- End view announcement -->
<!-- end overlay card. -->

    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->



<!-- Overlay scripts -->
 <!-- View announcements script -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


 <script>
  const   more_announcement = document.getElementById('more_announcement_btn');
  const   view_announcement = document.getElementById('view_announcement');
  const   close_overlay = document.getElementById("close-overlay-btn");

  more_announcement.addEventListener('click', ()=>{

     view_announcement.style.display= "flex";
     document.querySelector('.app-wrapper').style.opacity = '0.3'; // Reduce opacity of main content
     const now = new Date();
            const formattedTime = now.toLocaleString(); // Format the date and time
            timestamp.textContent = `Sent on: ${formattedTime}`;


  });

     close_overlay.addEventListener('click', ()=>{

     view_announcement.style.display= "none";
     document.querySelector('.app-wrapper').style.opacity = '1';


     });
 </script>

 <!-- End view announcement script -->

<script>
  function compare() {
    let date1 = new Date(document.getElementById("date1").value);
    let date2 = new Date(document.getElementById("date2").value);
    let resultDiv = document.getElementById("result");

    if (!date1 || !date2 || isNaN(date1) || isNaN(date2)) {
        resultDiv.innerHTML = "<p style='color:red;'>Please select both dates.</p>";
        resultDiv.classList.add("show");
        return;
    }

    let message = "";

    if (date1 > date2) {
        message = `The first date (<strong>${date1.toDateString()}</strong>) is later than the second date (<strong>${date2.toDateString()}</strong>).`;
    } else if (date1 < date2) {
        message = `The first date (<strong>${date1.toDateString()}</strong>) is earlier than the second date (<strong>${date2.toDateString()}</strong>).`;
    } else {
        message = `Both dates are the same (<strong>${date1.toDateString()}</strong>).`;
    }

    resultDiv.innerHTML = `<p>${message}</p>`;
    resultDiv.classList.add("show");
}

</script>


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
            let table = $('#maintenanc').DataTable({
                lengthChange: false, // Removes "Show [X] entries"
                dom: 't<"bottom"p>', // Removes default search bar & keeps only table + pagination
            });

            // Link custom search box to DataTables search
            $('#searchInput').on('keyup', function () {
                table.search(this.value).draw();
            });
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



<!--
  Add expense scripts.

-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        const addRowButton = document.getElementById("addRow");
        const tableBody = document.querySelector("tbody");

        function createNewRow() {
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>
                    <select class="form-select">
                        <option selected disabled>Expense</option>
                        <option>Rent</option>
                        <option>Water</option>
                        <option>Internet</option>
                        <option>Taxes</option>
                        <option>Salaries</option>
                        <option>Others</option>
                    </select>
                </td>
                <td><textarea class="form-control" rows="2" placeholder="Enter details"></textarea></td>
                <td><input type="text" class="form-control" placeholder="123"></td>
                <td><input type="number" class="form-control" placeholder="1"></td>
                <td><input type="number" class="form-control" placeholder="123"></td>
                <td><button type="button" class="btn btn-danger remove-row">Delete</button></td>
            `;

            newRow.querySelector(".remove-row").addEventListener("click", function () {
                newRow.remove();
                checkIfTableEmpty();
            });

            return newRow;
        }

        function checkIfTableEmpty() {
            if (tableBody.children.length === 0) {
                tableBody.appendChild(createNewRow()); // Add default row if empty
            }
        }

        addRowButton.addEventListener("click", function () {
            tableBody.appendChild(createNewRow());
        });

        // Initialize the first row in case user removes all
        checkIfTableEmpty();
    });
</script>


<!-- BalanceTable scripts -->

<script>
  function exportToPDF() {
          const { jsPDF } = window.jspdf;
          let doc = new jsPDF();

          doc.text("PROFIT&LOSS/DHABITI PROPERTIES ", 10, 10);  // Title

          let table = document.getElementById("myTable");
          let rows = [];

          for (let i = 0; i < table.rows.length; i++) {
              let row = [];
              for (let j = 0; j < table.rows[i].cells.length; j++) {
                  row.push(table.rows[i].cells[j].innerText);
              }
              rows.push(row);
          }
          doc.autoTable({
              head: [rows[0]],  // Table Headers
              body: rows.slice(1),  // Table Data
          });
          doc.save("profit&loss_data.pdf");
      }
      function exportToExcel() {
          let table = document.getElementById("myTable");
          let workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
          let excelFile = XLSX.write(workbook, {bookType: 'xlsx', type: 'array'});
          let blob = new Blob([excelFile], {type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'});
          saveAs(blob, "profit&loss_data.xlsx");
      }
  </script>

<script>
  document.getElementById('downloadBtn').addEventListener('click', function () {
     const { jsPDF } = window.jspdf;
     const doc = new jsPDF();

     // Check if autoTable is available
     if (typeof doc.autoTable !== 'function') {
         console.error("Error: autoTable plugin is not properly loaded.");
         alert("Error: autoTable plugin is not available.");
         return;
     }

     const table = document.getElementById("myTable");
     const rows = table.querySelectorAll("tbody tr");

     const data = [];
     let boldRows = [];
     let sectionHeaders = [];

     rows.forEach((row, rowIndex) => {
         const rowData = [];
         row.querySelectorAll("td").forEach((cell) => {
             rowData.push(cell.innerText.trim()); // Trim to remove extra spaces
         });

         const firstCellText = rowData[0]?.toLowerCase() || "";

         // Mark category headers (e.g., Income, Expenses, Net Profit) as bold
         if (row.classList.contains("category")) {
             sectionHeaders.push(rowIndex);
             rowData[0] = `${rowData[0]}`; // Wrap in <b> tags for bold
         }

         data.push(rowData);
     });

     doc.setFontSize(14);
     doc.setFont("helvetica", "bold");
     doc.text("Ebenezer Apartment,", 105, 6, { align: "center" });


     doc.setFontSize(14); // Adjust font size for title
     doc.setFont("helvetica", "bold"); // Set font style to bold
     doc.text("Profit and Loss Statement", 105, 10, { align: "center" }); // Center the title


     doc.setFontSize(12);
     doc.setFont("helvetica", "bold");
     doc.text("From 1 January 2024 to December 31, 2024", 105, 14, { align: "center" });

     doc.autoTable({
         startY: 20, // Moves the table down to create space for headers
         head: [['Description', 'Amount']],
         body: data,

         headStyles: {
             fillColor: [0, 25, 45], // Dark Blue (#00192D)
             textColor: [255, 255, 255], // White text
             fontStyle: 'bold'
         },

         didParseCell: function (data) {
             if (data.section === 'body') {
                 const rowIndex = data.row.index;
                 const colIndex = data.column.index;

                 // Apply bold to section headers (e.g., Income, Expenses, Net Profit)
                 if (sectionHeaders.includes(rowIndex)) {
                     data.cell.styles.fontSize = 12;
                     data.cell.styles.fontStyle = 'bold';
                 }
             }
         }
     });

     // Trigger the download of the PDF with the filename 'profit_loss_statement.pdf'
     doc.save('profit_loss_statement.pdf');
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



    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>


    <!-- DataTable Script -->

    <script>
      $(document).ready(function() {
          var table = $('#balanceSheet').DataTable({
              "lengthChange": false,
              "dom": 'Bfrtip',
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              "initComplete": function() {
                  // Move the buttons to the first .col-md-6
                  table.buttons().container().appendTo('#balanceSheet_wrapper .col-md-6:eq(0)');

                  // Move the search box to the second .col-md-6
                  $('#balanceSheet_filter').appendTo('#balanceSheet_wrapper .col-md-6:eq(1)');
              }
          });
      });
      </script>


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



      //-----------------
      // - END PIE CHART -
      //-----------------
    </script>

    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
