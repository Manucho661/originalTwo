<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BT JENGOPAY |</title>
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

    <!-- scripts for data_table -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="announcements.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>

       a{
          text-decoration: none;
      }
      body{
        font-size: 16px;
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
  #myPieChart {
      width: 360px;
      height: 310px;
      display: block;
      margin: auto; /* Center it */
  }

  .chat-container {
            width: 400px;
            height: 500px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 10px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            cursor: pointer;
            display: none; /* Initially hidden */
        }

        .chat-box {
            flex-grow: 1;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #fafafa;
        }

        .message {
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            max-width: 80%;
        }

        .bot-message {
            background-color: #e0f7fa;
            align-self: flex-start;
        }

        .user-message {
            background-color: #c8e6c9;
            align-self: flex-end;
        }

        input {
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;

            border: 1px solid #ccc;
            border-radius: 5px;
            /* background-color: #00796b; */
            color: white;
            cursor: pointer;
        }
       #iden{
            padding: 10px;
            width: 10%;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color:red;
            color: white;
            cursor: pointer;
}
        button:hover{
        background-color: #00192D;
       }

        /* Style for the icon that triggers chatbox visibility */
        .chat-icon {
            position: sticky;
            width: 50px;
            height: 50px;
            background-color: #00192D;
            border-radius: 50%;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }

        /* Smaller Close button inside chat container */
        .close-btn {
            position: absolute;
            top: 10px;
            margin-right: 0px;
            right: 0px;
            font-size: 16px; /* Smaller font size */
            padding: 5px;  /* Smaller padding */
            cursor: pointer;
            color: #777;
            background: none;
            border: none;
        }
        #close{
        background-color: red;
        }

        .dropdown {
            /* position: relative; */
            top: 20px;  /* Moves 20px down */
            left: 80px; /* Moves 30px to the right */
        }
        .dropdown-btn {
            background-color:#00192D;
            color:#FFC107;
            padding: 4px 12px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 200px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            /* z-index: 1; */
            right: 0; /* Ensures dropdown aligns to the right */
        }

        .dropdown-content a {
            color: black;
            padding: 10px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display:grid;
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
            <!-- <img
              src="../../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            /> -->
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
           <span class="brand-text fw-dark">
            <a href="index3.html" class="brand-link">
            <!--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
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
        <!-- <div id="sidebar"></div> This is where the header will be inserted -->
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
                <!-- <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol> -->
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
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="fas fa-home"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">PROPERTIES</span>
                    <span class="info-box-number">
                      15
                      <small></small>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-danger shadow-sm">
                    <i class="fas fa-wrench icon"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Repairs</span>
                    <span class="info-box-number">70</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <!-- fix for small devices only -->
              <!-- <div class="clearfix hidden-md-up"></div> -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="fas fa-user"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Tenants</span>
                    <span class="info-box-number">760</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-warning shadow-sm">
                    <i class="bi bi-people-fill"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">ACTIVE TENANTS</span>
                    <span class="info-box-number">2,000</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title text-warning">Properties</h5>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <div class="btn-group">
                        <button
                          type="button"
                          class="btn btn-tool dropdown-toggle"
                          data-bs-toggle="dropdown"
                        >
                          <i class="bi bi-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" role="menu">
                          <a href="#" class="dropdown-item">Action</a>
                          <a href="#" class="dropdown-item">Another action</a>
                          <a href="#" class="dropdown-item"> Something else here </a>
                          <a class="dropdown-divider"></a>
                          <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                      <table id="myTableOne" class="display" style="">
                        <thead>
                          <tr>
                            <th>Property Name</th>
                            <th>Units</th>
                            <th>Location</th>
                            <th>No of Tenants</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Manucho Apartments</td>
                            <td>80</td>
                            <td>Kisumu</td>
                            <td>60</td>
                          </tr>
                          <tr>
                            <td>Ethical Apartments</td>
                            <td>69</td>
                            <td>Rongai</td>
                            <td>65</td>
                          </tr>
                          <!-- Add more rows as needed -->
                        </tbody>

                      </table>


                      <!-- /.col -->
                    </div>
                    <!--end::Row-->
                  </div>
                  <!-- ./card-body -->
                  <div class="card-footer">
                    <!--begin::Row-->
                    <div class="row">

                    </div>
                    <!--end::Row-->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row">
              <!-- Start col -->
              <div class="col-md-12">
                <!--begin::Row-->
                <div class="row g-4 mb-4">
                  <div class="col-md-12">
                    <!-- DIRECT CHAT -->
                    <div class="card direct-chat direct-chat-warning">
                      <div class="card-header">
                        <h3 class="card-title text-warning">Communication</h3>
                        <div class="card-tools">
                          <span title="3 New Messages" class="badge text-bg-warning"> 3 </span>
                          <button
                            type="button"
                            class="btn btn-tool"
                            data-lte-toggle="card-collapse"
                          >
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                          </button>
                          <button
                            type="button"
                            class="btn btn-tool"
                            title="Contacts"
                            data-lte-toggle="chat-pane"
                          >
                            <i class="bi bi-chat-text-fill"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                            <i class="bi bi-x-lg"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                          <!-- Message. Default to the start -->
                          <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-start">Landlord</span>
                              <span class="direct-chat-timestamp float-end"> 23 Jan 2:00 pm </span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img
                              class="direct-chat-img"
                              src="assets/img/user1-128x128.jpg"
                              alt="message user image"
                            />
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                              Is this template really for free? That's unbelievable!
                            </div>
                            <!-- /.direct-chat-text -->
                          </div>
                          <!-- /.direct-chat-msg -->
                          <!-- Message to the end -->
                          <div class="direct-chat-msg end">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-end"> Sarah Bullock </span>
                              <span class="direct-chat-timestamp float-start">
                                23 Jan 2:05 pm
                              </span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img
                              class="direct-chat-img"
                              src="assets/img/user3-128x128.jpg"
                              alt="message user image"
                            />
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">You better believe it!</div>
                            <!-- /.direct-chat-text -->
                          </div>
                          <!-- /.direct-chat-msg -->
                          <!-- Message. Default to the start -->
                          <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-start"> Alexander Pierce </span>
                              <span class="direct-chat-timestamp float-end"> 23 Jan 5:37 pm </span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img
                              class="direct-chat-img"
                              src="assets/img/user1-128x128.jpg"
                              alt="message user image"
                            />
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                              Working with AdminLTE on a great new app! Wanna join?
                            </div>
                            <!-- /.direct-chat-text -->
                          </div>
                          <!-- /.direct-chat-msg -->
                          <!-- Message to the end -->
                          <div class="direct-chat-msg end">
                            <div class="direct-chat-infos clearfix">
                              <span class="direct-chat-name float-end"> Sarah Bullock </span>
                              <span class="direct-chat-timestamp float-start">
                                23 Jan 6:10 pm
                              </span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <img
                              class="direct-chat-img"
                              src="../../dist/assets/img/user3-128x128.jpg"
                              alt="message user image"
                            />
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">I would love to.</div>
                            <!-- /.direct-chat-text -->
                          </div>
                          <!-- /.direct-chat-msg -->
                        </div>
                        <!-- /.direct-chat-messages-->
                        <!-- Contacts are loaded here -->

                            <!-- End Contact Item -->
                          </ul>
                          <!-- /.contacts-list -->
                        </div>
                        <!-- /.direct-chat-pane -->
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.direct-chat -->
                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
                </div>
                <!--end::Row-->

                <!-- /.card -->
              </div>
              <!-- /.col -->

            </div>
            <!--end::Row-->


            <div class="row g-4 mb-8">
              <!-- First Card -->
              <div class="col-md-6">
                <!--begin::Row-->
                <div class="row g-4 mb-4">
                  <div class="col-md-12">
                    <!-- DIRECT CHAT -->
                    <div class="cardi">
                      <div class="card-headering" style="background-color:#FFC107; /* RGB */;">
                        <b><h3 class="card-title">RentalTrends</h3><br></b>
                        <button style="margin-top:0rem" class="dropdown-btn">Apartment
                          <i class="nav-arrow bi bi-chevron-right"></i>
                        </button>
                        <div class="dropdown">
                          <div class="dropdown-content">
                              <a href="#">Crown Z Towers</a>
                              <a href="#">Manucho Apartments</a>
                              <a href="#">The mansion Apartments</a>
                              <a href="#">Besty Apartments</a>
                              <a href="#">Bitam Apartments</a>
                              <a href="#">Besy Apartments</a>
                              <a href="#">Biram Apartments</a>
                              <a href="#">Blessed Apartments</a>


                          </div>
                      </div>
                       <!-- <b><p>Click The Rectangle To Know Per Apartment</p></b>  -->
                      </div>

                      <div class="card-body">

                        <canvas id="rentalTrends" width="300" height="205"></canvas>
                      </div>

                    </div>


                    <!-- /.direct-chat -->
                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
                </div>
                <!--end::Row-->
                <!--begin::Latest Order Widget-->

                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <!-- Info Boxes Style 2 -->
                <div class="card">

                  <div class="card-header" style="background-color:#FFC107; /* RGB */;">
                    <h3 class="card-title">Occupancy Status</h3>
                  </div>

                  <div class="card-body">

                    <!--begin::Row-->
                    <div class="row">
                      <canvas id="myPieChart" width="200" height="200"></canvas>
                      <!-- /.col -->
                    </div>
                    <!--end::Row-->
                  </div>

                  </div>


                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row--> <!-- Begin Mantainance row -->

            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title text-warning">Maintenance Requests</h5>

                    </h5></a>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                      <div class="btn-group">
                        <button
                          type="button"
                          class="btn btn-tool dropdown-toggle"
                          data-bs-toggle="dropdown"
                        >
                          <i class="bi bi-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" role="menu">
                          <a href="#" class="dropdown-item">Action</a>
                          <a href="#" class="dropdown-item">Another action</a>
                          <a href="#" class="dropdown-item"> Something else here </a>
                          <a class="dropdown-divider"></a>
                          <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                      </div>
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--begin::Row-->
                    <table id="myTableThree" class="display" style="">
                      <thead>
                          <tr>

                              <th>Residence</th>
                              <th>Request</th>
                              <th>Status</th>

                          </tr>
                      </thead>
                      <tbody>
                          <tr>

                              <td>Manucho Apartments</td>
                              <td>Leaking Repair</td>
                              <td><span class="badge text-bg-success">!Completed </span></td>
                          </tr>
                          <tr>

                              <td>Manucho Apartments</td>
                              <td>Water Sink Repair</td>
                              <td><span class="badge text-bg-danger">!Pending</span></td>
                          </tr>
                          <tr>

                            <td>Many Apartments</td>
                            <td>Balcony Painting</td>
                            <td><span class="badge text-bg-warning"> !Work In Progress </span></td>
                        </tr>
                          <!-- Add more rows as needed -->
                      </tbody>
                  </table>




                    <!--end::Row-->
                  </div>
                  <!-- ./card-body -->
                  <div class="card-footer">
                    <!--begin::Row-->

                      <!-- /.col -->

                    <!--end::Row-->
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- End mantainance row -->



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
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->



    <script>



        $(document).ready(function () {
            $('#myTableOne').DataTable();
        });
        $(document).ready(function () {
            $('#myTableThree').DataTable();
        });
        $(document).ready(function () {
            $('#myTableFour').DataTable();
        });


        $(document).ready(function() {
   $('#myTable').DataTable({
       "paging": true,
       "searching": true,
       "info": true,
       "lengthMenu": [5, 10, 25, 50],
       "language": {
           "search": "Filter records:",
           "lengthMenu": "Show _MENU_ entries"
       }
   });
});

</script>


<!-- Sidebar script -->
<!-- <script>
  fetch('../bars/sidebar.html')  // Fetch the file
      .then(response => response.text()) // Convert it to text
      .then(data => {
          document.getElementById('sidebar').innerHTML = data; // Insert it
      })
      .catch(error => console.error('Error loading the file:', error)); // Handle errors
</script> -->

<!-- End sidebar script -->

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


<script>
  const cty = document.getElementById('rentalTrends').getContext('2d');

  new Chart(cty, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label: 'CROWN Z TOWERS',
          data: [35,'000', 30,'000', 32,'000', 30,'000', 33,'000', 35,'000', 34,'000', 33,'000', 34,'000', 35,'000', 34,'000', 35,'000'],
          borderColor: 'cyan',
          backgroundColor: 'transparent',
          tension: 0.4
        },
        {
          label: 'Manucho Apartments',
          data: [32,'000', 33,'000', 38,'000', 34,'000', 33,'000', 34,'000', 38,'000', 36,'000', 37,'000', 32,'000', 31,'000', 34,'000'],
          borderColor: 'green',
          backgroundColor: 'transparent',
          tension: 0.4
        },
        {
          label: 'The Mansion Apartments',
          data:[31,'000', 32,'000', 39,'000', 35,'000', 32,'000', 33,'000', 39,'000', 37,'000', 39,'000', 31,'000', 32,'000', 34,'000'],
          borderColor: 'black',
          backgroundColor: 'transparent',
          tension: 0.4
        },
        {
          label: 'Bsty Apartments',
          data: [34,'000', 39,'000', 34,'000', 32,'000', 34,'000', 36,'000', 38,'000', 37,'000', 34,'000', 33,'000', 32,'000', 31,'000'],
          borderColor: 'red',
          backgroundColor: 'transparent',
          tension: 0.4
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top'
        },

      },
      scales: {
        y: {
          beginAtZero: false
        }
      }
    }
  });
</script>

<script>
  const ctx = document.getElementById('myPieChart').getContext('2d');

  const myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['Occupied','Vacant', 'Vacant Soon'],
          datasets: [{
              data: [30, 50, 20],
              backgroundColor: ['#28a745', '#ffc107', '#dc3545']
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
          onClick: function(event, elements) {
              if (elements.length > 0) {
                  let index = elements[0].index;
                  let label = this.data.labels[index];
                  // let links = { "Approved": "approved.html", "Pending": "pending.html", "Rejected": "rejected.html" };
                  let links = { "Occupied": "occupied.html", "Vacant": "vacant.html", "Vacant Soon": "vacantsoon.html"};
                  if (links[label]) window.location.href = links[label];
              }
          }
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
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
