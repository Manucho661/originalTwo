
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


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
     <link rel="stylesheet" href="texts.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">






<!-- scripts for data_table -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<style>
  body{
    font-size: 16px;

  }
.app-main {
  position: relative;
  display: flex;
  flex-direction: column;
  grid-area: lte-app-main;
  max-width: 100vw;
  padding-bottom: 0.75rem;
  transition: 0.3s ease-in-out;
  flex-grow: 1;

}
.app-main .app-content-header {
  padding: 1rem 0.5rem;
}
.preview-container {
  /* margin-top: 20px; */
  width: 30px;
  height: 20px;
  border: 2px dashed #ccc;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  background-color: #fff;
}
img {
  max-width: 100%;
  max-height: 100%;
  display: none;
}
.app-main .app-content{

}
#filePreviews{
display: flex;
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
            <!--begin::Brand Image-->
            <img
              src="../../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">
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
        <div id="sidebar"></div> <!-- This is where the sidebar is inserted -->

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

                <h3 class="mb-0 contact_section_header"> <i class="fas fa-comments title-icon"></i></i> In App Messages</h3>
              </div>

              <div class="col-sm-4 d-flex justify-content-end">
                <button   class="btn automated_message">    Automated Messages</button>

              </div>

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>

        <div class="app-content" style="flex-grow: 1;">
          <!--begin::Container-->
          <div class="container-fluid" style="flex-grow: 1; height:100%">

                <!--begin::Row-->
                <!-- Message Container -->

                <div class="row" style="height: 100%;">
                  <div class="col-md-12 message-container">
                      <!-- <div class="container" style="border:1px solid #E2E2E2" > -->
                      <div class="row filter-section" id="filter-section">
                          <div class="col-12 message-container-header-section">
                              <div class="row">
                                  <div class="col-md-8 col-12">
                                      <select id="categoryFilter"  name="building_id" class="categoryFilter form-select">
                                      <option value="">-- Select Building --</option>
                                      <?php foreach ($buildings as $b): ?>
                                        <option value="<?= htmlspecialchars($b['building_id']) ?>">
                                          <?= htmlspecialchars($b['building_name']) ?>
                                        </option>
                                      <?php endforeach; ?>
                                      </select>
                                      <input type="text" class="search-input" placeholder="Search Tenant...">
                                  </div>
                                  <div class="col-md-4 col-12 RecentChatNewText-btns" style="align-items: center;">
                                      <div class="date d-flex date">
                                          <label class="form-label startDate">Start Date</label>
                                          <input type="date" class="form-control" id="endDate" placeholder="end">
                                      </div>
                                      <div class="date d-flex date">
                                          <label class="form-label endDate">End Date</label>
                                          <input type="date" class="form-control" id="endDate" placeholder="end">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <!-- </div> -->
                        <!-- Start Row messages-summmary -->
                         <div class="row" style="display: none;" id="go-back" >
                          <div class="col-md-12 d-flex">
                            <button class="btn go-back mb-1" onclick="myBack()" > <i class="fa-solid fa-arrow-left"></i>  Go Back</button>
                          </div>

                         </div>

                         <!-- end row -->

                         <!-- Start Row -->


                         <!-- End Row -->

                         <!-- start row -->
                         <div class="row align-items-stretch all-messages-summary" id="all-messages-summary">
                          <div id="message-summary" class="col-md-12  message-summary">
                              <div class="message-list p-2" style="display: flex; justify-content: space-between;">
                                  <div class="recent-messages-header">Recent Messages</div>
                                  <div>
                                      <button id="new_text" onclick="opennewtextPopup()" class="btn new-text"><i class="bi bi-plus"></i> New Chat</button>
                                  </div>
                              </div>

                              <div class="table-responsive">
                                  <table class="table table-hover table-summary-messages" style="border-radius: 20px; flex-grow: 1;">
                                      <thead class="">
                                          <tr>
                                              <th>SENT</th>
                                              <th>Title</th>
                                              <th>SENT BY</th>
                                              <th>ACTION</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr class="table-row">
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Request to Vacate Room</td>
                                              <td>
                                                  <div class="sender">Me</div>
                                                  <div class="sender-email"></div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Request to Fix Leaking shower</td>
                                              <td>
                                                  <div class="sender">Christiano Ronaldo</div>
                                                  <div class="sender-email"><i class="fa fa-envelope"></i> Ronald12@gmail.com</div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Humble Request to Pay the Outsanding Rent Balance</td>
                                              <td>
                                                  <div class="sender">Sherly Nabwana</div>
                                                  <div class="sender-email"><i class="fa fa-envelope"></i>Nabwana@gmail.com</div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Humble Request to Pay the Outsanding Rent Balance</td>
                                              <td>
                                                  <div class="sender">Hesbon Wanjiku</div>
                                                  <div class="sender-email"><i class="fa fa-envelope"></i>wa123@gmail.com</div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Humble Request to Pay the Outsanding Rent Balance</td>
                                              <td>
                                                  <div class="sender">Me</div>
                                                  <div class="sender-email"></div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Humble Request to Pay the Outsanding Rent Balance</td>
                                              <td>
                                                  <div class="sender">Sherly Nabwana</div>
                                                  <div class="sender-email"><i class="fa fa-envelope"></i>Nabwana@gmail.com</div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Humble Request to Pay the Outsanding Rent Balance</td>
                                              <td>
                                                  <div class="sender">Hesbon Wanjiku</div>
                                                  <div class="sender-email"><i class="fa fa-envelope"></i>wa123@gmail.com</div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="timestamp">
                                                  <div class="date">13-03-2025</div>
                                                  <div class="time">07:45PM</div>
                                              </td>
                                              <td class="title">Humble Request to Pay the Outsanding Rent Balance</td>
                                              <td>
                                                  <div class="sender">Me</div>
                                                  <div class="sender-email"></div>
                                              </td>
                                              <td>
                                                  <button class="btn btn-primary view"><i class="bi bi-eye"></i> View </button>
                                                  <button class="btn btn-danger delete"><i class="bi bi-trash3"></i> Delete</button>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                        <!-- End Row messages-summmary -->

                      <div class="row h-100 align-items-stretch" id="individual-message-summmary" style="border:1px solid #E2E2E2; padding: 0 !important; display: none; max-height: 95%;">

                            <div id="message-profiles" class="col-md-4  message-profiles" style="height: 100%;" >

                              <div class="topic-profiles-header-section d-flex">
                                <div class="content d-flex">
                                  <div class="individual-details-container">
                                    <div class="content d-flex">
                                      <div class="profile-initials" id="profile-initials">JM</div>

                                      <div class="individual-residence d-flex">
                                        <div class="individual-name body">Emmanuel,</div>
                                        <div  class="initial-topic-separator">|</div>
                                        <div class="residence mt-2">EBENEZER, C12</div>
                                      </div>


                                    </div>


                                  </div>

                                </div>
                              </div>

                              <div class="h-80  other-topics-section">

                                <div class="individual-topic-profiles active d-flex">

                                  <div class="individual-topic-profile-container">

                                    <div class="individual-topic">Rental Arrears</div>

                                    <div class="individual-message mt-2">I will be paying rent from march...</div>

                                  </div>
                                  <div class="d-flex justify-content-end time-count">
                                    <div class="time">3/3/25</div>
                                    <div class="message-count mt-2">6</div>
                                  </div>
                                </div>

                                <div class="individual-topic-profiles d-flex">

                                  <div class="individual-topic-profile-container">
                                    <div class="individual-topic">Request For Marriage</div>
                                    <div class="individual-message mt-2 ">I will not be paying rent this month, i did not receive..</div>
                                  </div>

                                  <div class="d-flex justify-content-end time-count">
                                    <div class="time">3/3/25</div>
                                    <div class="message-count mt-2">3</div>
                                  </div>
                                </div>

                                <div class="individual-topic-profiles d-flex">

                                  <div class="individual-topic-profile-container">
                                    <div class="individual-topic">Request to fix leaking shower</div>
                                    <div class="individual-message mt-2 ">I will not be paying rent this month, i did not receive..</div>
                                  </div>

                                  <div class="d-flex justify-content-end time-count">
                                    <div class="time">3/3/25</div>
                                    <div class="message-count"></div>
                                  </div>
                                </div>

                                <div class="individual-topic-profiles d-flex">

                                  <div class="individual-topic-profile-container">
                                    <div class="individual-topic">Request for deposit refund</div>
                                    <div class="individual-message mt-2 ">I will be paying rent from march...</div>
                                  </div>

                                  <div class="d-flex justify-content-end time-count">
                                    <div class="time">3/3/25</div>
                                    <div class="message-count"></div>
                                  </div>
                                </div>


                              </div>

                            </div>

                            <div id="messageBody" class="col-md-8 message-body" style="padding: 0 !important;">
                              <div class="individual-message-body-header">
                                <div class="individual-details-container">
                                  <div class="content">
                                    <div class="individual-residence d-flex" style="align-items: center;" >
                                      <div class="profile-initials initials-topic" id="profile-initials-initials-topic" ><b>JM</b></div>
                                      <div id="initial-topic-separator" class="initial-topic-separator">|</div>
                                      <div class="individual-topic body">Rental Arrears</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="individual-message-body">
                                <div class="messages" id="messages">
                                  <div class="message incoming">Hello! How are you?</div>
                                  <div class="message outgoing">I'm doing great, thanks!</div>
                                </div>
                               <div class="input-area">
                                  <div class="input-box" id="inputBox" contenteditable="true"></div>
                                  <button class="btn message-send-button" onclick="sendMessage()"><i class="fa fa-paper-plane"></i> </button>
                              </div>

                              </div>
                            </div>
                        </div>
                      </div>
                  <!--end::Row-->

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
          <a href="https://adminlte.io" class="text-decoration-none" style="color: #00192D;" >JENGO PAY</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->





<!-- Overlays -->

<!-- Script source File -->
<script src="text.js"></script>

<!-- PopUp Scripts -->

<!-- new text popup -->
<div class="newtextpopup-overlay" id="newtextPopup">
  <div class="card" style="margin-top: 20px;">
    <div class="card-header new-message-header">
      New Message
      <button class="close-btn" onclick="closenewtextPopup()">×</button>
    </div>
    <div class="card-body new-message-body">
      <form id="newMessageForm" enctype="multipart/form-data">
        <input type="hidden" name="action" value="send_message">
        <input type="hidden" name="conversation_id" value="<!-- populate dynamically -->">
        <input type="hidden" name="sender_id" value="<!-- current user ID -->">

        <div class="field-group">
          <label for="building_name">Building</label>
          <select name="building_id" id="buildingSelect" class="form-control">
            <option value="">-- Select Building --</option>
            <?php foreach ($buildings as $b): ?>
              <option value="<?= htmlspecialchars($b['building_id']) ?>">
                <?= htmlspecialchars($b['building_name']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="field-group">
          <label for="unit_id">Unit</label>
          <select name="unit_id" id="unitSelect" class="form-control">
            <option value="">-- Select Unit --</option>
            <!-- Options to be loaded dynamically -->
          </select>
        </div>

        <div class="field-group">
          <label for="message_text">Message</label>
          <textarea name="message_text" class="form-control" placeholder="Type your message here..."></textarea>
        </div>

        <div class="field-group">
          <label for="message_image">Attach Image</label>
          <input type="file" name="message_image" class="form-control">
        </div>

        <div class="actions d-flex justify-content-end">
          <button type="button" class="btn btn-danger" onclick="closenewtextPopup()">Cancel</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- End NewText popup -->

<!-- PopUp Scripts -->



<!-- !-- create new text -->

<script>
  // Function to handle multiple files selection
  function handleFiles(event) {
    const files = event.target.files;  // Get all selected files
    const previewContainer = document.getElementById('filePreviews');
    previewContainer.innerHTML = '';  // Clear previous previews

    let imageCount = 0; // Keep track of how many images we preview

    Array.from(files).forEach(file => {
      const fileSizeInMB = (file.size / (1024 * 1024)).toFixed(2);  // Convert to MB
      const fileType = file.type;

      // Create a container for each file's preview and size
      const fileContainer = document.createElement('div');
      fileContainer.style.marginBottom = '30px';

      // Display the file size
      const fileSizeElement = document.createElement('p');
      fileSizeElement.textContent = `File size: ${fileSizeInMB} MB`;
      fileContainer.appendChild(fileSizeElement);

      // Preview the file based on type
      if (fileType.startsWith('image/')) {
        if (imageCount >= 3) {
          const warning = document.createElement('p');
          warning.style.color = 'red';
          warning.textContent = 'You can only upload 3 images at a time.';
          previewContainer.appendChild(warning);
          return;
        }

        const img = document.createElement('img');
        img.style.width = '70%';
        img.style.display = 'flex';
        img.src = URL.createObjectURL(file);
        img.onload = function () {
          URL.revokeObjectURL(img.src); // Free memory
        };

        fileContainer.appendChild(img);
        imageCount++;

      } else if (fileType === 'application/pdf') {
        const pdfEmbed = document.createElement('embed');
        pdfEmbed.style.width = '100%';
        pdfEmbed.style.height = '100%';
        pdfEmbed.src = URL.createObjectURL(file);
        fileContainer.appendChild(pdfEmbed);

      } else {
        const fileName = document.createElement('p');
        fileName.textContent = `File: ${file.name}`;
        fileContainer.appendChild(fileName);
      }

      // Append the file container to the previews section
      previewContainer.appendChild(fileContainer);
    });
  }
</script>

<script src="view.js"></script>

<script>
  // Function to open the complaint popup
  function opennewtextPopup() {
    document.getElementById("newtextPopup").style.display = "flex";
  }

  // Function to close the complaint popup
  function closenewtextPopup() {
    document.getElementById("newtextPopup").style.display = "none";
  }

  function toggleShrink() {
            let recipientBox = document.getElementById("recipient");
            let first_field_group = document.getElementById("field-group-first");
            let field_group_third = document.getElementById("field-group-third");
            let field_group_second = document.getElementById("field-group-second");

            if (recipientBox.value === "all") {
              first_field_group.classList.remove("shrink"); // shrink if the option is not all
              field_group_second.style.display= "none";
              field_group_third.style.display= "none";

          } else {
            first_field_group.classList.add("shrink"); // Do not shrink is the option is all
            field_group_second.style.display= "block";
          }

        }


        function toggleShrink1() {
            let recipientBox_units = document.getElementById("recipient-units");

            let field_group_second = document.getElementById("field-group-second");
            let field_group_third = document.getElementById("field-group-third");

            if (recipientBox_units.value === "all") {
              field_group_second.classList.remove("shrink"); // shrink if the option is not all
              field_group_third.style.display= "none";

          } else {
            field_group_second.classList.add("shrink"); // Do not shrink is the option is all
            field_group_third.style.display= "block";
          }

        }
</script>
<!-- end create new text -->

<!-- image preview -->
<script>
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
</script>

<!-- end -->

<script>

  // Major Variables.
  const all_messages_summary =  document.getElementById('all-messages-summary');
  const individual_message_summary = document.getElementById('individual-message-summmary');


  // const   next_text = document.getElementById('respond_btn');
  const   respond_window = document.getElementById('respond');
  const   close_text_overlay = document.getElementById("closeTextWindow");

  next_text.addEventListener('click', ()=>{

     respond_window.style.display= "flex";
     document.querySelector('.app-wrapper').style.opacity = '0.3'; // Reduce opacity of main content
     const now = new Date();
            const formattedTime = now.toLocaleString(); // Format the date and time
            timestamp.textContent = `Sent on: ${formattedTime}`;


  });

  close_text_overlay.addEventListener('click', ()=>{

    respond_window.style.display= "none";
     document.querySelector('.app-wrapper').style.opacity = '1';
     });

</script>



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


                      <!-- SCRIPT FOR MESSAGES -->
    <!-- Begin -->
    <script>
      function sendMessage() {
          const inputBox = document.getElementById("inputBox");
          const messages = document.getElementById("messages");
          const text = inputBox.innerText.trim();
          if (text !== "") {
              const messageDiv = document.createElement("div");
              messageDiv.classList.add("message", "outgoing");
              messageDiv.textContent = text;
              messages.appendChild(messageDiv);
              inputBox.innerText = "";
              messages.scrollTop = messages.scrollHeight;
          }
      }



                              // SHOWING THE CHATBOT.

                              const filter_section = document.getElementById('filter-section');
                              const go_back = document.getElementById('go-back');

                              document.querySelectorAll('.view').forEach(item => {
                    item.addEventListener('click', function () {
                      const all_messages_summary = document.getElementById('all-messages-summary');
                      const individual_message_summary = document.getElementById('individual-message-summmary');

                      const row = this.closest('tr'); // This refers to the clicked button
                      const cells = row.querySelectorAll('td');

                      const secondLast = cells[cells.length - 2];
                      const senderDiv = secondLast.querySelector('.sender');
                      const sender = senderDiv ? senderDiv.textContent.split(' ')[0]  : 'Unknown Sender'; // Safe fallback
                      const thirdLast = cells[cells.length - 3].textContent;
                      console.log("Third Last:", thirdLast);
                      // console.log("Second Last:", secondLast);

                      // Find the `.individual-name.body` and update it (name of the tenant)
                        let targetName = document.querySelector('.individual-name.body');
                        if (targetName) {
                            targetName.textContent = sender;
                        }

                        // Profile Initials
                        let targetName3 = document.getElementById('profile-initials');
                            const words = senderDiv.textContent.trim().split(' ');
                            const firstInitial = words[0] ? words[0][0] : '';
                            const secondInitial = words[1] ? words[1][0] : '';
                            const full_initials = firstInitial + secondInitial || 'Unknown Sender';
                            if (targetName3) {
                            targetName3.textContent = full_initials;
                        }

                        let targetName2 = document.querySelector('.individual-topic.body');
                        if (targetName2 ) {
                            targetName2.textContent = thirdLast;
                        }

                      all_messages_summary.style.display = "none";
                      filter_section.style.display = "none";
                      individual_message_summary.style.display = "flex";
                      go_back.style.display = "flex";


  });
});

          // Back to all messages summary.
          function myBack() {

            const individual_message_summary = document.getElementById('individual-message-summmary').style.display="none";
            const all_messages_summary = document.getElementById('all-messages-summary').style.display="flex";
            const fliter_section = document.getElementById('filter-section').style.display="flex";
            const go_back = document.getElementById('go-back').style.display="none";
                  }


                                            // Hover and active effect

      // Select all message elements
            document.querySelectorAll('.individual-topic-profiles').forEach(item => {
            item.addEventListener('click', () => {
                // Remove 'active' class from all and add to clicked one
                document.querySelectorAll('.individual-topic-profiles').forEach(el => el.classList.remove('active'));
                item.classList.add('active');

                // Get the clicked individual's name
                let clickedName = item.querySelector('.individual-topic').textContent;

                // Random residence names


                // Find the `.individual-topic.body` and update it
                let targetName = document.querySelector('.individual-topic.body');
                if (targetName) {
                    targetName.textContent = clickedName;
                }

                // Find the `.residence` element and update it with a random residence

            });
        });



                            // EFFECT ON SMALLER SCREENS

// const recentChats = document.getElementById("RecentChats");
          const messageProfiles = document.getElementById("message-profiles");
          const messageBody = document.getElementById("messageBody");
          const individualProfiles = document.querySelectorAll(".individual-topic-profiles");
          const profile_initials_initials_topic = document.getElementById("profile-initials-initials-topic");
          const initial_topic_separator = document.getElementById("initial-topic-separator");


// Function to handle resizing
          function updateLayout() {
              if (window.innerWidth > 768) {
                  messageProfiles.style.display = "block";

                  messageBody.style.display = "block";
                  profile_initials_initials_topic.style.display = "none";
                  initial_topic_separator.style.display = "none";
              } else {
                  messageProfiles.style.display = "none";

                  messageBody.style.display = "block";
                  profile_initials_initials_topic.style.display = "flex";
                  initial_topic_separator.style.display = "flex";
              }
          }


// Initial check when the page loads
          updateLayout();

// Listen for window resize events
          window.addEventListener("resize", updateLayout);

// Add click event to recentChats (only for small screens)
          recentChats.addEventListener("click", showMessageProfiles);

  </script>
  <!-- End  -->

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
      function handleFiles(event) {
  const files = event.target.files;
  const preview = document.getElementById('filePreviews');
  preview.innerHTML = '';
  Array.from(files).forEach(file => {
    const div = document.createElement('div');
    div.innerText = `${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
    if (file.type.startsWith('image/')) {
      const img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.style.maxWidth = '100px';
      img.onload = () => URL.revokeObjectURL(img.src); // Clean up
      div.appendChild(img);
    }
    preview.appendChild(div);
  });
}
    </script>


<script>
  // Global variables
let currentConversationId = null;
let currentUserId = 1; // This should be set to the logged-in user's ID

// Initialize the messaging system
function initMessaging() {
    loadConversations();

    // Set up event listeners
    document.getElementById('inputBox').addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    // Set up polling for new messages
    setInterval(pollForNewMessages, 5000);
}

// Load conversations list
function loadConversations() {
    fetch(`messages_api.php?action=get_conversations&user_id=${currentUserId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderConversations(data.conversations);
            } else {
                console.error('Error loading conversations:', data.error);
            }
        });
}

// Render conversations in the sidebar
function renderConversations(conversations) {
    const container = document.querySelector('.h-80.other-topics-section');
    container.innerHTML = '';

    conversations.forEach(conv => {
        const conversationElement = document.createElement('div');
        conversationElement.className = `individual-topic-profiles ${conv.conversation_id === currentConversationId ? 'active' : ''} d-flex`;
        conversationElement.innerHTML = `
            <div class="individual-topic-profile-container">
                <div class="individual-topic">${conv.topic}</div>
                <div class="individual-message mt-2">${conv.last_message || 'No messages yet'}</div>
            </div>
            <div class="d-flex justify-content-end time-count">
                <div class="time">${formatDate(conv.last_message_time)}</div>
                ${conv.unread_count > 0 ? `<div class="message-count mt-2">${conv.unread_count}</div>` : ''}
            </div>
        `;

        conversationElement.addEventListener('click', () => {
            loadConversation(conv.conversation_id);
        });

        container.appendChild(conversationElement);
    });
}

// Load a specific conversation
function loadConversation(conversationId) {
    currentConversationId = conversationId;

    // Show conversation view and hide summary view
    document.getElementById('all-messages-summary').style.display = 'none';
    document.getElementById('individual-message-summmary').style.display = 'flex';
    document.getElementById('go-back').style.display = 'block';

    // Fetch messages
    fetch(`messages_api.php?action=get_messages&conversation_id=${conversationId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderMessages(data.messages);
            } else {
                console.error('Error loading messages:', data.error);
            }
        });

    // Update UI to show active conversation
    document.querySelectorAll('.individual-topic-profiles').forEach(el => {
        el.classList.remove('active');
        if (el.dataset.conversationId === conversationId) {
            el.classList.add('active');
        }
    });
}

// Render messages in the chat area
function renderMessages(messages) {
    const messagesContainer = document.getElementById('messages');
    messagesContainer.innerHTML = '';

    messages.forEach(msg => {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${msg.sender_id === currentUserId ? 'outgoing' : 'incoming'}`;

        let messageContent = msg.message_text || '';
        if (msg.image_path) {
            messageContent += `<br><img src="${msg.image_path}" class="message-image" style="max-width: 200px; max-height: 200px; border-radius: 8px; margin-top: 5px;">`;
        }

        messageDiv.innerHTML = `
            <div class="message-content">${messageContent}</div>
            <div class="message-meta">
                <span class="message-time">${formatTime(msg.created_at)}</span>
                ${msg.sender_id === currentUserId ? '<span class="message-status">✓✓</span>' : ''}
            </div>
        `;

        messagesContainer.appendChild(messageDiv);
    });

    // Scroll to bottom
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

// Send a new message
function sendMessage() {
    const inputBox = document.getElementById('inputBox');
    const messageText = inputBox.innerHTML.trim();

    if (!messageText && !currentFile) return;

    const formData = new FormData();
    formData.append('action', 'send_message');
    formData.append('conversation_id', currentConversationId);
    formData.append('sender_id', currentUserId);
    formData.append('message_text', messageText);

    if (currentFile) {
        formData.append('message_image', currentFile);
    }

    fetch('messages_api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            inputBox.innerHTML = '';
            currentFile = null;
            loadConversation(currentConversationId); // Refresh messages
        } else {
            console.error('Error sending message:', data.error);
        }
    });
}

// Poll for new messages
function pollForNewMessages() {
    if (!currentConversationId) return;

    fetch(`messages_api.php?action=get_messages&conversation_id=${currentConversationId}&last_update=${lastUpdateTime}`)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.messages.length > 0) {
                appendNewMessages(data.messages);
                lastUpdateTime = new Date().toISOString();
            }
        });
}

// Helper functions
function formatDate(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
}

function formatTime(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
}

// Image upload handling
let currentFile = null;
document.getElementById('imageUpload').addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
        currentFile = e.target.files[0];
        // You can show a preview here if needed
    }
});

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initMessaging);
</script>

    <!-- Bootstr
     ap Bundle with Popper -->
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
  </body>
  <!--end::Body-->
</html>
