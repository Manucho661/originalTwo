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
  <link rel="stylesheet" href="../../../dist/css/adminlte.css" />
  <!-- <link rel="stylesheet" href="text.css" /> -->
  <!--end::Required Plugin(AdminLTE)-->
  <!-- apexcharts -->

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
    crossorigin="anonymous" />
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
    .app-wrapper {
      background-color: rgba(128, 128, 128, 0.1);

    }

    .modal-backdrop.show {
      opacity: 0.4 !important;
      /* Adjust the value as needed */
    }
  </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-white">
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
              <span class="d-none d-md-inline" style="color: #00192D;"> <b> JENGO PAY </b> </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-bg-primary">
                <img
                  src="../../../dist/assets/img/user2-160x160.jpg"
                  class="rounded-circle shadow"
                  alt="User Image" />
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
      <div> <?php include_once '../includes/sidebar.php'; ?> </div> <!-- This is where the sidebar is inserted -->
      <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
      <section id="perform_inspection_content" class="inspection_content pt-3">
        <div class="container-fluid">
          <div class="card mt-3">
            <div class="card-header" style="background-color:#00192D; color:#FFC107"><b>Perform Inspection</b></div>
            <div class="card-body">
              <div class="card shadow" style="border:1px solid rgba(0,25,45,.2)">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <label><i class="fa fa-home"></i> Unit No: <span id="modal_unit"></span> </label>
                    </div>
                    <div class="col-md-6">
                      <label><i class="fa fa-building"></i> Building: <span id="modal_building_name">Angela's Apartment</span> </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label><i class="fa fa-table"></i> Floor Location: Second Floor</label>
                    </div>
                    <div class="col-md-6">
                      <label><i class="fa fa-bed"></i> Rental Purpose: Residence</label>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="card shadow">
                <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-cogs"></i> <b>Inspect this Unit</b></div>
                <form id="perform_inspection" onsubmit="performInspectionForm(event)" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card shadow" style="border:1px solid rgba(0,25,45,.2);">
                          <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-home"></i> <b>Floor Condition</b></div>
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-wrench" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="floor_condition" id="floorRepair" value="Needs Repair">
                                    <label for="floorRepair"> Needs Repair</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-thumbs-up" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="floor_condition" id="floorGood" value="Good">
                                    <label for="floorGood"> Good</label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="card shadow" id="floorBadDescription" style="display:none;">
                              <div class="card-header" style="background-color:#00192D; color:#FFC107;"><b>Describe the Repair Required</b></div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Describe the State</label>
                                  <textarea name="floor_state" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Attach Photo</label>
                                  <input type="file" class="form-control" name="floor_photo">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card shadow" style="border:1px solid rgba(0,25,45,.2);">
                          <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-table"></i> <b>Window(s) Condition</b></div>
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-wrench" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="window_condition" id="windowNeedsRepair" value="Needs Repair">
                                    <label for="windowNeedsRepair"> Needs Repair</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-thumbs-up" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="window_condition" id="windowGood" value="Good">
                                    <label for="windowGood"> Good</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow" id="windowBadDescription" style="display:none;">
                              <div class="card-header" style="background-color:#00192D; color:#FFC107;"><b>Describe the Repair Required</b></div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Describe the State</label>
                                  <textarea name="window_state" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Attach Photo</label>
                                  <input type="file" class="form-control" name="window_photo">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card shadow" style="border:1px solid rgba(0,25,45,.2);">
                          <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-building"></i> <b>Doors Condition</b></div>
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-thumbs-up" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="door_condition" id="doorGood" value="Good">
                                    <label for="doorGood"> Good</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-wrench" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="door_condition" id="doorBad" value="Needs Repair">
                                    <label for="doorBad"> Needs Repair</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow mt-2" id="doorBadCard" style="display:none;">
                              <div class="card-header" style="background-color:#00192D; color:#FFC107"><b>Provide More Information</b></div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="">Describe the Damage</label>
                                  <textarea name="door_state" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="">Attach Photo</label>
                                  <input type="file" class="form-control" name="door_badphoto">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card shadow" style="border:1px solid rgba(0,25,45,.2);">
                          <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-bank"></i><b> Wall Condition</b></div>
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-wrench" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="wall_condition" id="wallNeedRepair" value="Needs Repair">
                                    <label for="wallNeedRepair"> Needs Repair</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-thumbs-up" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="wall_condition" id="wallGood" value="Good">
                                    <label for="wallGood"> Good</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow mt-2" id="wallNeedsRepairCard" style="display:none;">
                              <div class="card-header" style="background-color:#00192D; color:#FFC107;"><b>More Information</b></div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="">Describe the Repair Needed</label>
                                  <textarea name="wall_state" cols="30" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="">Attach Photo</label>
                                  <input type="file" class="form-control" name="faulty_wall_photo" id="faulty_wall_photo">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card shadow" style="border:1px solid rgba(0,25,45,.2);">
                          <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-bell"></i><b> Bulb Holder(s)</b></div>
                          <div class="card-body">
                            <div class="row text-center">
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-thumbs-up" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="bulb_holder_condition" id="bulbHolderGood" value="Good">
                                    <label for="bulbHolderGood"> Good</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-wrench" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="bulb_holder_condition" id="bulbHolderNeedsRepair" value="Needs Repair">
                                    <label for="bulbHolderNeedsRepair"> Needs Repair</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow" id="bulbHolderCard" style="display:none;">
                              <div class="card-header" style="background-color:#00192D; color: #FFC107;"><b>Describe the Repair Needed</b></div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="">Describe the Fault</label>
                                  <textarea name="bulb_holder_state" id="bulb_holder_desc" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="">Attach Photo</label>
                                  <input type="file" name="bulb_holder_photo" id="bulb_holder_photo" class="form-control">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="card shadow" style="border:1px solid rgba(0,25,45,.2);">
                          <div class="card-header" style="background-color:#00192D; color:#FFC107;"><i class="fa fa-plug"></i> <b>Sockets</b></div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6 text-center">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-thumbs-up" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="socket_condition" id="socketGood" value="Good">
                                    <label for="socketGood"> Good</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 text-center">
                                <div class="card shadow p-3" style="border: 1px solid rgba(0,25,45,.2);">
                                  <i class="fa fa-wrench" style="font-size:30px;"></i>
                                  <div class="icheck-dark d-inline">
                                    <input type="radio" name="socket_condition" id="socketNeedsRepair" value="Needs Repair">
                                    <label for="socketNeedsRepair"> Needs Repair</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card shadow" id="socketFaultyCard" style="border:1px solid rgba(0,25,45,.2); display:none;">
                              <div class="card-header" style="background-color:#00192D; color:#FFC107;"><b>Describe the Fault</b></div>
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Describe the Fault</label>
                                  <textarea name="socket_state" id="fault_socket_description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Attach Photos</label>
                                  <input type="file" name="fault_socket_photo" id="fault_socket_photo" class="form-control">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-right">
                    <input type="hidden" name="inspection_id" id="modal_inspection_id">
                    <!-- JavaScript back button -->
                    <button type="button" class="btn btn-sm mr-2" style="background-color:#FFC107; color:#00192D;" onclick="window.location.href='inspections.php'">
                      <i class="fa fa-arrow-left"></i> Back
                    </button>
                    <button type="submit" class="btn btn-sm next-btn" id="fifththStepNextBtn">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
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
  </div>
  <!--end::App Wrapper-->

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Pre-fill form from URL parameters
      const urlParams = new URLSearchParams(window.location.search);

      if (urlParams.has('unit')) {
        document.getElementById('modal_unit').textContent = decodeURIComponent(urlParams.get('unit'));
      }

      if (urlParams.has('building')) {
        document.getElementById('modal_building_name').textContent = decodeURIComponent(urlParams.get('building'));
      }

      if (urlParams.has('inspection_id')) {
        document.getElementById('modal_inspection_id').value = urlParams.get('inspection_id');
      }

      // Radio button toggle logic
      document.querySelectorAll('input[type="radio"][name$="_condition"]').forEach(radio => {
        radio.addEventListener('change', function() {
          const cardId = this.id.replace('Repair', 'BadDescription')
            .replace('Good', 'BadDescription')
            .replace('Bad', 'BadCard')
            .replace('NeedRepair', 'NeedsRepairCard')
            .replace('NeedsRepair', 'FaultyCard');
          const card = document.getElementById(cardId);
          if (card) {
            card.style.display = this.value === 'Needs Repair' ? 'block' : 'none';
          }
        });
      });

      // Initialize any radio buttons that might be checked by default
      document.querySelectorAll('input[type="radio"][name$="_condition"]:checked').forEach(radio => {
        radio.dispatchEvent(new Event('change'));
      });
    });

    function performInspectionForm(event) {
      event.preventDefault();
      // Your form submission logic here
      console.log("Form submitted");
      // Add your AJAX or form submission code
    }
  </script>

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
</body>
<!--end::Body-->

</html>