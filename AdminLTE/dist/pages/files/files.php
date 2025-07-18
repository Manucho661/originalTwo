<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE | Dashboard v2</title>
    <!--begin::Primary Meta Tags-->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->

    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
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
    <link rel="stylesheet" href="files.css">


    <!-- scripts for data_table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="announcements.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="preview.js"></script>
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
            <img
              src="../../dist/assets/img/AdminLTELogo.png"
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
      <main class="app-main">
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
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card shadow-lg" style="width: 100%; max-width: 18rem; border-radius: 15px; background: #f9f9f9;">
                  <div class="card-body">
                    <h5 class="card-title d-flex align-items-center">
                      <i class="fas fa-file mr-2" style="font-size: 1.5rem;"></i>
                      <span>All Files</span>
                    </h5>
                    <br>
                    <span id="used-text" style="font-size: 14px; color: #333;">Used Space: 150.00 MB</span><br>
                    <span id="remaining-text" style="font-size: 14px; color: #333;">Remaining: 50.00 GB</span>
                    <div class="progress mt-3" style="height: 20px; border-radius: 10px; background-color: #e0e0e0;">
                      <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 75%; background-color: #d39e00; border-radius: 10px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card shadow-lg" style="width: 100%; max-width: 18rem; border-radius: 15px; background: #f9f9f9;">
                  <div class="card-body">
                    <h5 class="card-title d-flex align-items-center">
                      <i class="fas fa-file mr-2" style="font-size: 1.5rem;"></i>
                      <span>Images</span>
                    </h5>
                    <br>
                    <span id="used-text" style="font-size: 14px; color: #333;">Used Space: 150.00 MB</span><br>
                    <span id="remaining-text" style="font-size: 14px; color: #333;">Remaining: 50.00GB</span>
                    <div class="progress mt-3" style="height: 20px; border-radius: 10px; background-color: #e0e0e0;">
                      <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 75%; background-color: #d39e00; border-radius: 10px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="card shadow-lg" style="width: 100%; max-width: 18rem; border-radius: 15px; background: #f9f9f9;">
                  <div class="card-body">
                    <h5 class="card-title d-flex align-items-center">
                      <i class="fas fa-file mr-2" style="font-size: 1.5rem;"></i>
                      <span>Docs</span>
                    </h5>
                    <br>
                    <span id="used-text" style="font-size: 14px; color: #333;">Used Space: 150.00 MB</span><br>
                    <span id="remaining-text" style="font-size: 14px; color: #333;">Remaining: 50.00GB</span>
                    <div class="progress mt-3" style="height: 20px; border-radius: 10px; background-color: #e0e0e0;">
                      <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 75%; background-color: #d39e00; border-radius: 10px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<br>


<div class="justify-content-end d-flex" >
    <button onclick="openfilePopup()" class="edit-btn">
    <i class="fas fa-plus"></i>
    Add File</button>
  </div>
              <div class="col-md-12 message-container"><br>
                      <div class="row">
                        <div class="col-md-4">
                    <!-- <label for="property">Property:</label> -->
                    <select id="property" name="property" required style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; margin-bottom:5px;">
                      <option value="" disabled selected>Select Building</option>
                      <option value="High">Manucho</option>
                      <option value="Moderate">Ben 10</option>
                      <option value="Low">Alpha</option>
                    </select>
</div>
<div class="col-md-4">
  <!-- <label for="property">All Categories:</label> -->
  <select id="property" name="property" required style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; margin-bottom:5px;">
    <option value="" disabled selected>All Categories</option>
    <option value="High">Maintenance Images</option>
    <option value="High">Leases</option>
    <option value="High">Documentations</option>
    <option value="High">Profile Pictures</option>
    <option value="Moderate">Identification Numbers(ID)</option>
    <option value="Low">Title Deeds</option>
    <option value="Low">Tenant Agreements</option>
  </select>
</div>

<div class="col-md-4">
  <label for="search" class="filter-label">

  <input type="text" class="search-input" placeholder="Search..." style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; margin-bottom:5px;">
</div>



<br>
<!-- <hr> -->
                    <!-- Start Row messages-summmary -->

                  <div class="row align-items-stretch" style="border:1px solid #E2E2E2; padding: 0 !important;">

                    <div id="message-summary" class="col-md-12  message-summary">
                      <div class="message-list p-2" style="display: flex; justify-content: space-between;">
                        <div class="recent-messages-header">Recent Files</div>
                       <div>
                       </div>
                      </div>

                      <table class="table table-hover table-summary-messages" style="border-radius: 20px;">
                          <thead class="">
                              <tr>
                                <th scope="col">Select File</th>
                                <th>Type</th>
                                <th>Tenant</th>
                                <th>Unit</th>
                                  <th>Title</th>
                                  <!-- <th>Category</th> -->
                                  <th>
                                    <i class="fas fa-arrow-up" style="font-size: 1rem; color: black;"></i>
                                   Size</th>
                                  <th>
                                    <i class="fas fa-arrow-up" style="font-size: 1rem; color: black;"></i>
                                    Date</th>
                                  <th>ACTION</th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr class="table-row">
                              <td><label>
                                <input type="checkbox" name="file" value="file"/>
                              </label>
                              </td>
                              <td>pdf</td>
                              <td>Paul</td>
                              <td>A12</td>
                              <td>
                                Lease Agreement
                              </td>
                              <td>42.37MB</td>
                              <td>May24,2024</td>
                              <!-- <td>Leases</td> -->
                              <td>
                                <div id="more_icon">&#x2026;</div>
                                <br>
                                <div id="more_options" style="color: #00192D;">
                                  <a class="content" id="showPopup">View</a>
                                  <a href="#">Download</a>
                                  <a href="#">Delete</a>
                                </div>
                              </td>
                              </tr>


                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>jpg</td>
                                <td>Erastus</td>
                                <td>A13</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Applicant File</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>png</td>
                                <td>maina</td>
                                <td>A14</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May25,2024</td>
                                <!-- <td>Shared Reports</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>pdf</td>
                                <td>Aaron</td>
                                <td>A15</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Shared Reports</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>jpg</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>

                                <td>May24,2024</td>
                                <!-- <td>Applicant File</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>png</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>pdf</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>jpg</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>

                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>png</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>pdf</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>jpg</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <tr class="table-row">
                                <td><label>
                                  <input type="checkbox" name="file" value="file"/>
                                </label>
                                </td>
                                <td>pdf</td>
                                <td>Peter</td>
                                <td>A16</td>
                                <td>
                                  Lease Agreement
                                </td>
                                <td>42.37MB</td>
                                <td>May24,2024</td>
                                <!-- <td>Leases</td> -->
                                <td>
                                  <div id="more_icon">&#x2026;</div>
                                  <br>
                                  <div id="more_options" style="color: #00192D;">
                                    <a href="#">View</a>
                                    <a href="#">Download</a>
                                    <a href="#">Delete</a>
                                  </div>
                                </td>
                              </tr>
                          </tbody>
                      </table>


                  <div class="card-footer">

                  </div>

                </div>
              </div>
            </div>


            <div class="filepopup-overlay"  id="complaintPopup">
              <div class="filepopup-content">
                <button class="close-btn text-secondary" onclick="closefilePopup()">×</button>
                <form class="tenant-form ">
                  <h2 class="text-start addTenantHeader">Add File</h2>

                  <b><label for="property">Property:</label></b>
                    <select id="property" name="property" required style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                      <option value="" disabled selected>Select Property</option>
                      <option value="High">Manucho</option>
                      <option value="Moderate">Ben 10</option>
                      <option value="Low">Alpha</option>
                    </select>

                    <b><label for="unit">Unit:</label></b>
                    <select id="property" name="property" required style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 4px; font-size: 16px;">
                      <option value="" disabled selected>Select Unit</option>
                      <option value="High">A11</option>
                      <option value="Moderate">A12</option>
                      <option value="Low">A13</option>
                    </select>

                    <b><label for="name">Tenant:</label></b>
                    <input type="text" id="name" name="name" required>


                    <b><label for="unit">Title:</label></b>
                    <input type="text" id="title" name="title" required>


                      <!-- File input for multiple file types -->
                        <input type="file" id="fileInput" onchange="handleFiles(event)" class="form-control" multiple>

                        <!-- Section to display selected files' previews and sizes -->
                        <div id="filePreviews"></div>



                  <button type="submit" class="submit-btn" style="background-color: #00192D; color: #f1f1f1;">SUBMIT</button>
                </form>
              </div>

</div>
             <!-- Side Popup -->
<div id="sidePopup" class="side-popup">
  <button id="closePopup" class="close-btn">×</button>
  <b><p>SUMMARY</p></b>
  <hr>
  <b>TITLE</b>
  <p>Lease document</p>
  <b>DESCRIPTION</b>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste fugit, doloribus maiores in sit amet architecto dignissimos nam officiis aspernatur cum ad soluta sapiente eius odio sunt quasi ex est.</p>
  <b>SIZE</b>
  <p>42.37MB</p>
  <b>TYPE</b>
  <p>Pdf</p>
  <b>FILE LOCATION</b>
  <p>C:\Assets\sample-lease.pdf</p>
  <!-- <div id="more_icon">&#x2026;</div>
  <br>
  <div id="more_options" style="color: #00192D;">
      <a href="#">Download</a>
      <a href="#">Delete</a>
  </div> -->

   <!-- PDF viewer container -->
   <div class="pdf-container">
    <canvas id="pdfViewer"></canvas>
    <button class="view-button">VIEW</button></div>

<br>
<!-- end -->


<!-- units popup -->
<!-- <div class="units-overlay" id="complaintPopup">
  <div class="units-content wide-form">
      <button class="close-btn" onclick="closeunitsPopup()">×</button>
      <h2 class="assign-title">Detailed Rent Information</h2>
      <form class="wide-form">
        <div class="form-group">
          <div class="row g-3">

            <div class="col-md-6">
              <label for="property">Property:</label>
              <input type="text" id="property " name="property" placeholder="Manucho Apartments" required disabled>
            </div>

            <div class="col-md-6">
            <label for="tenant">Tenant:</label>
            <input type="text" id="tenant " name="tenant" placeholder="FRED MBURU" required disabled>
          </div>

          <div class="col-md-6">
            <label for="unit">Unit</label>
            <input type="text" id="unit" name="unit"  placeholder="B11" disabled>
    </div>


          <div class="col-md-6">
            <label for="text">Amount Paid:</label>
            <input type="text" id="amount" name="amount" placeholder="Ksh 10000" required disabled>
          </div>

          <div class="col-md-6">
            <label for="payment_date">Payment Date</label>
            <input type="text" id="date" name="date" placeholder="11-03-2025" required disabled>
        </div>

        <div class="col-md-6">
            <label for="rent_overdue">Rent Overdue</label>
            <input type="text" id="rent_overdue" name="rent_overdue"  placeholder="Ksh0" disabled>
    </div>

    <div class="col-md-6">
      <label for="days_overdue">Days Overdue</label>
      <input type="text" id="days_overdue" name="days_overdue" placeholder="0" disabled>
</div>


      </form>
  </div>
</div> -->
<!-- end -->


<script>// Get the elements
  const showPopupButton = document.getElementById('showPopup');
  const closePopupButton = document.getElementById('closePopup');
  const sidePopup = document.getElementById('sidePopup');

  // Show the side popup
  showPopupButton.addEventListener('click', () => {
    sidePopup.style.right = '0'; // Slide it in from the side
  });

  // Close the side popup
  closePopupButton.addEventListener('click', () => {
    sidePopup.style.right = '-300px'; // Slide it back offscreen
  });
  </script>

  <script src="view.js"></script>

<!-- <script>
  document.getElementById('imageUpload').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              const preview = document.getElementById('imagePreview');
              preview.src = e.target.result;
              preview.style.display = 'block';
          }
          reader.readAsDataURL(file);
      }
  });
</s> -->


<script>
  $(document).ready(function() {
      $('#rent').DataTable({
          "lengthChange": false,
          "dom": 'Bfrtip',
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      });
  });
</script>

<!--
        <div class="overlaying" id="overlaying">
          <div class="invoicing-container">
          <div class="receipt-container" id="receipt">
            <button class="close-btn" onclick="closeOverlay()">×</button>
            <h2>Payment Receipt</h2>
            <p> Nairobi,  KENYA</p>
            <p><strong>Date:</strong> <span id="date"></span></p>

            <table>
              <td>Manucho Apartments</td>
              <td>John</td>
              <th>A11</th>
              <td>KSH80,000</td>
              <td>KSH80,000</td>
              <td>MPESA</td>
              <td>TBM34KGNJ8</td>
              <td>10-12-2025</td>
              <td>KSH0</td>
            </table>
        </div>

        <button class="print-btn" onclick="printReceipt()">Print Receipt</button>
     -->


    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->

    <script>
      // Function to open the complaint popup
      function openfilePopup() {
        document.getElementById("complaintPopup").style.display = "flex";
      }

      // Function to close the complaint popup
      function closefilePopup() {
        document.getElementById("complaintPopup").style.display = "none";
      }
    </script>

    <script>// Get the elements
      const showPopupButton = document.getElementById('showPopup');
      const closePopupButton = document.getElementById('closePopup');
      const sidePopup = document.getElementById('sidePopup');

      // Show the side popup
      showPopupButton.addEventListener('click', () => {
        sidePopup.style.right = '0'; // Slide it in from the side
      });

      // Close the side popup
      closePopupButton.addEventListener('click', () => {
        sidePopup.style.right = '-300px'; // Slide it back offscreen
      });
      </script>

 <!-- dowload as pdf -->
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
</script>
<!-- end download as pdf -->


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
  // Example values for storage space
  let totalSpace = 100; // Total space in GB
  let usedSpace = 60;   // Used space in GB

  function updateStorageBar(used, total) {
    let usedPercentage = (used / total) * 100; // Calculate percentage of space used
    let remainingSpace = total - used;

    // Update the width of the used space bar
    document.getElementById("used-space").style.width = `${usedPercentage}%`;

    // Update the text displaying used and remaining space
    document.getElementById("used-text").textContent = `Used: ${used} GB`;
    document.getElementById("remaining-text").textContent = `Remaining: ${remainingSpace} GB`;
  }

  // Call function to update the storage space display
  updateStorageBar(usedSpace, totalSpace);
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


<!-- Begin script for datatable
<script>
  $(document).ready(function() {
   $('#rent').DataTable({
       "paging": true,
       "searching": true,
       "info": true,
       "lengthMenu": [5, 10, 25, 50],
       "language": {
           "search": "Filter records:",
           "lengthMenu": "Show _MENU_ entries"
       }
   });
}); -->

<!-- <script>
$(document).ready(function() {
   $('#agreements').DataTable({
       "paging": true,
       "searching": true,
       "info": true,
       "lengthMenu": [5, 10, 25, 50],
       "language": {
           "filter": "Search ",
           "lengthMenu": "Show _MENU_ entries"
       }
   });
});

</script> -->



<script>
  document.getElementById("more_icon").addEventListener("click", function(event) {
      let options = document.getElementById("more_options");
      options.style.display = options.style.display === "block" ? "none" : "block";
      event.stopPropagation();
  });

  document.addEventListener("click", function() {
      document.getElementById("more_options").style.display = "none";
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
