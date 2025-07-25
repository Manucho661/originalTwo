<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE | Dashboard v2</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE | Dashboard v2"/>
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

   <link rel="stylesheet" href="plumbing.css">
<!-- scripts for data_table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <style>
      body{
        font-size: 16px;
        background-color: #FFC107 !important;
      }
      .app-wrapper{
        background-color: rgba(128,128,128, 0.1);
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
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-8">
                <h3 class="mb-0 contact_section_header">  <i class="fas fa-user icon"></i> Maintenance Requests/Plumbing</h3>
                    <div class="row mt-2  ">
                      <div class="col-md-12 ">
                        <div class="row Summary mt-6" >
                          <!-- Summary -->

                            <div class="col-md-12 ">
                              <div class="summary-section text-center p-2 row">
                              <div class="col-6 col-md-3 summary-item total">
                                  <i class="fas fa-calculator"></i>
                                  <div class="label">Total <b class="value" >100</b>  </div>

                              </div>
                              <div class="col-6 col-md-3 summary-item completed">
                                  <i class="fa-solid fa-circle-check"></i>
                                  <div class="label">Completed <b class="value">30</b></div>

                              </div>
                              <div class="col-6 col-md-3 summary-item in-progress">
                                  <i class="fas fa-spinner fa-spin"></i>
                                  <div class="label">In Progress <b class="value">20</b></div>

                              </div>

                          </div>


                                                             <!-- <span class="value text-center"> <b>100 </b> </span> -->
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
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->

            <!-- /.row -->

            <!-- begin row -->
             <div class="row mb-2">
              <div>
                <div class="card">
                  <div class="card-header">
                    <a class="btn btn-link add-expense-btn" data-bs-toggle="collapse" href="#addExpense" aria-expanded="false" aria-controls="addExpenseAccordion" style="color: #00192D; font-weight:bold; text-decoration: none;">
                      <span id="toggleIcon">+</span> Add Payment
                    </a>
                  </div>
                  <div class="card-body collapse" id="addExpense">
                    <div class="card">
                      <div class="card-header" style="background: linear-gradient(to right, #00192D, #003D5B, #00788D);"  >
                        <h6 class="text-white">Add Payment Details</h6>
                      </div>
                      <div class="card-body">
                        <div class="form-container">
                          <form action="">
                            <div class="row g-3">
                              <!-- No -->
                              <div class="col-md-4">
                                  <label class="form-label"><b>Request ID</b></label>
                                  <input type="number" class="form-control" placeholder="123" >
                              </div>
                              <!-- Expense of the Month -->
                              <div class="col-md-4">
                                <label class="form-label"><b>Invoice NO</b></label>
                                <input type="number" class="form-control" placeholder="123">
                              </div>

                              <!-- Cheque No -->
                              <div class="col-md-4">
                                <label class="form-label"><b>Cheque No</b></label>
                                <input type="number" class="form-control" placeholder="000001" >
                            </div>


                            <div class="row g-3 mt-2">
                            <div class="col-md-6">
                              <label class="form-label"><b>Description</b></label>
                              <input type="text" class="form-control" placeholder="Enter">
                          </div>

                              <!-- Year -->
                              <div class="col-md-6">
                                  <label class="form-label"><b>Amount</b></label>
                                  <input type="number" class="form-control" placeholder="2000">
                              </div>
                          </div>

                          <div class="row g-3 mt-2">

                              <div class="col-md-6">
                                <label class="form-label"> <b>Payment Method</b> </label>
                                <select class="form-select">

                                <option selected disabled>Payment</option>
                                <option>Cash</option>
                                <option>Bank</option>
                                <option>M-pesa</option>
                            </select>
                              </div>

                              <div class="col-md-6">
                                <label class="form-label"><b>Entry Date</b></label>
                                <input type="date" class="form-control">
                              </div>
                          </div>
                          </div>
                          </form>
                          </div>
                          </div>
                          </form>


                          <!-- Expense Table -->


                          <div class="row g-3 mt-2">
                              <div class="col-6">

                              </div>
                              <div class="col-6 mt-2 d-flex justify-content-end">
                                  <button type="submit" class="btn btn-custom btn-sm" style="height: fit-content;"> Submit</button>
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


            <!-- End row -->

            <br>
            <!-- <hr> -->

            <!--begin::Row-->
              <!-- Start col -->
              <div class="row">
              <div class="col-md-12">
                <div class="card Content">
                    <div class="card-header">
                      <b>All Appliance Requests</b>
                    </div>
                    <div class="card-body" style="overflow: auto;">
                      <div class="container">
                        <table id="maintenance" class="table table-striped" >
                          <thead>
                            <tr>
                              <th>REQUESTDATE</th>
                              <th>ID</th>
                              <th>CATEGORY</th>
                              <th>PAYMENT</th>
                              <th>PROVIDER</th>
                              <th>Priority</th>
                              <th>STATUS</th>
                              <th>ACTIONS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>11-10-2025</td>
                              <td>23423</td>
                              <td>Broken handle</td>
                              <td><button class="payment pending" id="example" data-bs-toggle="modal" data-bs-target="#leaseModal"> <i class="fa fa-exclamation-circle"></i>
                              PENDING</button></td>
                              <!-- <td><button onclick="toggleOverlay()">Paid</button></td> -->
                              <td>Kitu Moto</td>
                              <td>low</td>
                              <td><button class="status completed"><i class="fa fa-check-circle"></i> COMPLETED </button>  </td>

                              <td>
                                <button  onclick="openassignPopup()"  class="btn btn-sm" style="background-color: #193042; color:#fff;" data-toggle="modal" data-target="#assignPlumberModal" title="Assign this Task to a Plumbing Service Providersingle_units.php"><i class="fa fa-wrench"></i>
                                </button>
                                <button onclick="openplummbingdetailsPopup()" class="btn btn-sm" style="background-color: #0C5662; color:#fff;" data-toggle="modal" data-target="#plumbingIssueModal" title="Get Full Report about this Repair Work"><i class="fa fa-file"></i></button>

                              </td>
                            </tr>
                            <tr>
                              <td>11-10-2025</td>
                            <td>12432</td>



                              <td>Leaking roof</td>
                              <td><button  class=" payment paid" id="example"> <i class="fa fa-check-circle"></i>  PAID</button></td>
                              <td>Not Assigned </td>
                              <td>High</td>

                              <td > <button class="status incomplete" ><i class="fa fa-times-circle"></i> INCOMPLETE </button> </td>

                              <td><button onclick=" openassignPopup()" class="btn btn-sm" style="background-color: #193042; color:#fff;" data-toggle="modal" data-target="#assignPlumberModal" title="Assign this Task to a Plumbing Service Providersingle_units.php"><i class="fa fa-wrench"></i>
                              </button>
                              <button onclick="openplummbingdetailsPopup()" class="btn btn-sm" style="background-color: #0C5662; color:#fff;" data-toggle="modal" data-target="#plumbingIssueModal" title="Get Full Report about this Repair Work"><i class="fa fa-file"></i></button>

                                </td>
                            </tr>
                            <tr>
                              <td>11-10-2025</td>
                            <td>12432</td>



                              <td>Leaking roof</td>
                              <td><button  class=" payment paid" id="example"> <i class="fa fa-check-circle"></i>  PAID</button></td>
                              <td>Not Assigned </td>
                              <td>High</td>

                              <td > <button class="status incomplete" ><i class="fa fa-times-circle"></i> INCOMPLETE </button> </td>

                              <td><button onclick=" openassignPopup()" class="btn btn-sm" style="background-color: #193042; color:#fff;" data-toggle="modal" data-target="#assignPlumberModal" title="Assign this Task to a Plumbing Service Providersingle_units.php"><i class="fa fa-wrench"></i>
                              </button>
                              <button class="btn btn-sm" style="background-color: #0C5662; color:#fff;" data-toggle="modal" data-target="#plumbingIssueModal" title="Get Full Report about this Repair Work"><i class="fa fa-file"></i></button>

                                </td>
                            </tr>
                            <tr>
                              <td>11-10-2025</td>
                            <td>12432</td>



                              <td>Leaking roof</td>
                              <td><button  class=" payment paid" id="example"> <i class="fa fa-check-circle"></i>  PAID</button></td>
                              <td>Not Assigned </td>
                              <td>High</td>

                              <td > <button class="status incomplete" ><i class="fa fa-times-circle"></i> INCOMPLETE </button> </td>

                              <td><button onclick=" openassignPopup()" class="btn btn-sm" style="background-color: #193042; color:#fff;" data-toggle="modal" data-target="#assignPlumberModal" title="Assign this Task to a Plumbing Service Providersingle_units.php"><i class="fa fa-wrench"></i>
                              </button>
                              <button class="btn btn-sm" style="background-color: #0C5662; color:#fff;" data-toggle="modal" data-target="#plumbingIssueModal" title="Get Full Report about this Repair Work"><i class="fa fa-file"></i></button>

                                </td>
                            </tr>
                            <tr>
                              <td>11-10-2025</td>
                            <td>12432</td>



                              <td>Leaking roof</td>
                              <td><button  class=" payment paid" id="example"> <i class="fa fa-check-circle"></i>  PAID</button></td>
                              <td>Not Assigned </td>
                              <td>High</td>

                              <td > <button class="status incomplete" ><i class="fa fa-times-circle"></i> INCOMPLETE </button> </td>

                              <td><button onclick=" openassignPopup()" class="btn btn-sm" style="background-color: #193042; color:#fff;" data-toggle="modal" data-target="#assignPlumberModal" title="Assign this Task to a Plumbing Service Providersingle_units.php"><i class="fa fa-wrench"></i>
                              </button>
                              <button class="btn btn-sm" style="background-color: #0C5662; color:#fff;" data-toggle="modal" data-target="#plumbingIssueModal" title="Get Full Report about this Repair Work"><i class="fa fa-file"></i></button>

                                </td>
                            </tr>
                            <tr>
                              <td>11-10-2025</td>
                            <td>12432</td>



                              <td>Leaking roof</td>
                              <td><button  class=" payment paid" id="example"> <i class="fa fa-check-circle"></i>  PAID</button></td>
                              <td>Not Assigned </td>
                              <td>High</td>

                              <td > <button class="status incomplete" ><i class="fa fa-times-circle"></i> INCOMPLETE </button> </td>

                              <td><button onclick=" openassignPopup()" class="btn btn-sm" style="background-color: #193042; color:#fff;" data-toggle="modal" data-target="#assignPlumberModal" title="Assign this Task to a Plumbing Service Providersingle_units.php"><i class="fa fa-wrench"></i>
                              </button>
                              <button class="btn btn-sm" style="background-color: #0C5662; color:#fff;" data-toggle="modal" data-target="#plumbingIssueModal" title="Get Full Report about this Repair Work"><i class="fa fa-file"></i></button>

                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                          </tbody>

                        </table>
                      </div>



                    </div>




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

<!-- create Announcement -->





 <!-- Start View announcement -->
 <div class="view_announcement" id="view_announcement">
  <div class="card content">
   <div class="card-header view_announcement bg-secondary text-white">
       <h5 class="mb-0">Rent Payments</h5>
       <div id="close-overlay-btn" class="close-btn" > <b> &times;</b> </div>

   </div>
   <div class="card-body">
       <p class="card-text">
           All Rent Payments should be made before 24/01/17. Anyone who feels that they might not
           be able to complete their dues on 24/01/17 should communicate to management before the due date.
           Else, you face an eviction risk if you fail to pay your dues before the said date without a reasonable reason</p>

           <p class="timestamp" id="timestamp"></p> <!-- Timestamp -->


       <div class="Recipients border-top border-gray "> <p><strong>Recipients|</strong> All Employees</p>  </div>

   </div>
   <div class="card-footer view_announcement d-flex">
       <button class="btn btn-danger btn-sm">Delete</button>
       <button class="btn btn-secondary btn-sm">Resend</button>
   </div>
 </div>
 </div>




  <!-- assign task popup -->
  <div class="assignpopup-overlay" id="assignPopup">
    <div class="assignpopup-content wide-form">
        <button id="close-btn" class="text-secondary" onclick="closeassignPopup()">×</button>
        <h2 class="assign-title">Assign Task</h2>
        <form class="wide-form">
            <div class="form-group">
                <label for="name">Requested By</label>
                <input type="text" id="name" name="name" placeholder="Martin Wambua" disabled>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="0712345678" required disabled>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="martin@gmail.com" required disabled>
            </div>

            <div class="form-group">
                <label for="house_number">House No:</label>
                <input type="number" id="house_number" name="house_number" placeholder="001" required disabled>
            </div>

            <div class="form-group">
                <label for="requested_to">Requested To:</label>
                <input type="text" id="requested_to" name="requested_to" placeholder="Biccount Technologies" required disabled>
            </div>

            <div class="form-group">
                <label for="building">Building:</label>
                <input type="text" id="building" name="building" placeholder="Crown Z Towers" required disabled>
            </div>

            <div class="form-group">
                <label for="plumbing_issue">Plumbing Issue:</label>
                <select id="plumbing_issue" required disabled>
                    <option>Leaking Pipe</option>
                    <option>Faucet Issue</option>
                    <option>Showerhead Issue</option>
                    <option>Toilet Unclogging</option>
                    <option>Sewage and Septic Tank Issues</option>
                    <option>Installations</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" placeholder="Leaking Pipe in the sink near the kitchen" rows="2" required disabled></textarea>
            </div>

            <div class="form-group">
                <label for="urgency_level">Urgency Level:</label>
                <select id="urgency_level" required disabled>
                    <option>Immediate Attention Needed</option>
                    <option>Urgent within 24 hours</option>
                    <option>Next Available Appointment</option>
                </select>
            </div>

            <div class="form-group">
              <label for="urgency_level">Assign Provider:</label>
              <select id="urgency_level" required>
                  <option>Plumbing Anga</option>
                  <option>Urgaa Electricals</option>
                  <option>Next Plumbers</option>
              </select>
          </div>

            <div class="switch-container">
              <label class="switch">
                  <input type="checkbox" id="authSwitch" onchange="toggleAuthorization()">
                  <span class="slider"></span>
              </label>
              <span>Authorize Service</span>
          </div>

          <p id="authorizationText" class="authorization-text">
              I authorize the plumbing service provider to inspect and perform the requested services.
              Depending on the extent of the required service, I understand that additional charges may
              apply based on the final assessment.
          </p>



            <button type="submit" class="submit-btn">SUBMIT</button>
        </form>
    </div>
</div>
<!-- end -->

<!--  Detailed Information About Plumbing popup -->
<div class="plumbingdetails-overlay" id="plumbingdetailsPopup">
  <div class="plumbingdetails-content wide-form">
      <button id="close-btn" class="text-secondary" onclick="closeplumbingdetailsPopup()">×</button>
      <h2 class="assign-title">Detailed Information About Plumbing</h2>
      <form >
        <div class="row ">

          <div class="col-md-6">
            <b><label for="request_date">Requested By:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="Martin Wambua" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Phone Number:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="0714254565" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Email:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="matty@gmail.com" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">House No:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="011A" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Request Date:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="11-10-2025" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Building:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="Crown Z Towers" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Plumbing Issue:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="leaking pipe" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Description:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="11-10-2025" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Urgency Level:</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="Immediate Attention Needed" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="request_date">Service Provider</label></b>
            <input type="text" id="request_date" name="request_date" placeholder="Next Plumbers" required disabled>
          </div>
          <div class="col-md-6">
            <b><label for="category">Category:</label></b>
            <input type="text" id="category" name="category" placeholder="Broken handle" required disabled>
          </div>

          <div class="col-md-6">
            <b><label for="id">ID:</label></b>
            <input type="text" id="id" name="id" placeholder="001" required disabled>
          </div>

          <div class="col-md-6">
            <b><label for="payment_status">Payment:</label></b>
            <input type="text" id="payment_status" name="payment_status" placeholder="!pending" required disabled>
        </div>

        <div class="col-md-6">
          <b><label for="provider">Provider</label></b>
          <input type="text" id="provider" name="provider" placeholder="Kitu Moto" required disabled>
      </div>
      <div class="col-md-6">
       <b><label for="priority">Priority</label></b>
        <input type="text" id="priority" name="priority" placeholder="low" required disabled>
    </div>
    <div class="col-md-6">
      <b><label for="status">Status</label></b>
      <input type="text" id="status" name="status" placeholder="Completed" required disabled>
  </div>
      </form>
  </div>
</div>
<!-- Detailed Information About Plumbing end -->

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
<script>
  function toggleAuthorization() {
      const authorizationText = document.getElementById("authorizationText");
      const switchBtn = document.getElementById("authSwitch");

      if (switchBtn.checked) {
          authorizationText.style.display = "block";
      } else {
          authorizationText.style.display = "none";
      }
  }
  </script>

<script>
  // Function to open the complaint popup
  function openplummbingdetailsPopup() {
    document.getElementById("plumbingdetailsPopup").style.display = "flex";
  }

  // Function to close the complaint popup
  function closeplumbingdetailsPopup() {
    document.getElementById("plumbingdetailsPopup").style.display = "none";
  }
</script>

<script>
  // Function to open the complaint popup
  function openassignPopup() {
    document.getElementById("assignPopup").style.display = "flex";
  }

  // Function to close the complaint popup
  function closeassignPopup() {
    document.getElementById("assignPopup").style.display = "none";
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
    <!-- OPTIONAL SCRIPTS -->
    <!-- apexcharts -->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>


    <!--end::Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  </body>
  <!--end::Body-->
</html>
