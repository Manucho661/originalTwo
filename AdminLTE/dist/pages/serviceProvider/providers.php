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
    <link rel="stylesheet" href="text.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="providers.css">

<!-- scripts for data_table -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <style>
      body{
        font-size: 16px;
      }
      .preview-container {
        margin-top: 20px;
        width: 200px;
        height: 100px;
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
    .category-number {
  display: flex;
  gap: 20px;
}

.category, .number {
  display: block; /* Ensures elements respect the gap */
}
.category-number{
  color: rgb(41, 41, 41);
  /* color: gray; */
  font-size: 14px;
  font-weight: 400px;
}
.number{
  color: #00192D;;
  font-weight: 600;
}
.iHjPfu {
    margin: 0px;
    padding: 0px;
    background: transparent;
    max-width: 100%;
    transition: 0.3s ease-out;
    color: #FFC107;
}.hQYLxw {
    display: inline-block;
    vertical-align: middle;
    overflow: hidden;
}
.summary-item {
  /* box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); x-offset, y-offset, blur-radius, color */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border: 1px solid transparent;
  background-color: white;

}
.summary-item:hover{
  border-color: #FFC107;
  cursor: pointer;
  color: white;
  background-color:#FFC107;

}
.categories-section{
  font-weight: 600;
  font-size: 16px;
  color: #FFC107;
}
.card-header.providers{
  display: flex;
  justify-content: start;
  gap: 15px;
}
.category-header-section{
margin-right: 15px;
display: flex;
}
.mainTitle{
  font-weight: 400px;
  font-size: 14px;
}
#star-rating {
    color:#FFC107 ;
}
#more_options{
  background-color: #00192D;
  color: #f1f1f1;
}
#more_options a{
color: #f1f1f1;
}
    </style>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper" style="background-color:rgba(128,128,128, 0.1) ;">
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
                  src="../17.jpg"
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
        <!-- <div id="sidebar"></div> This is where the sidebar is inserted -->
        <div > <?php include_once '../includes/sidebar1.php'; ?>  </div> <!-- This is where the sidebar is inserted -->

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
            <div class="row  " >
              <div class="col-sm-8">

                <h3 class="mb-0 contact_section_header"> <i class="fas fa-user-tie icon" style="color:#FFC107"></i> Service Providers</h3>
              </div>

              <!-- <div class="col-sm-4 d-flex justify-content-end">
                <button   class="btn new-category" onclick="openCategoryPopup()">    New Category</button>

              </div> -->

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="categories-section">Explore Providers By Category</div>
           <!-- start Row -->
<div class="row">
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Plumbers,</div>
        <div class="number">43</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Land Scapers,</div>
        <div class="number">34</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Masons,</div>
        <div class="number">74</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Electricians,</div>
        <div class="number">34</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
</div>

<!-- End Row -->

<!-- Start Row -->
<div class="row mt-2">
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Gas Suppliers,</div>
        <div class="number">10</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Butcher,</div>
        <div class="number">49</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Mama Mbogo,</div>
        <div class="number">79</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
  <div class="col-6 col-md-3 mb-2">
    <div class="summary-item d-flex justify-content-between bg-white">
      <div class="category-number" style="display: flex; gap: 5px; align-items: center;">
        <div class="category">Others,</div>
        <div class="number">50</div>
      </div>
      <div>
        <svg viewBox="0 0 24 24" height="100%" width="24" aria-hidden="true" focusable="false" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hQYLxw Icon__StyledIcon-sc-1yzzdph-0 iHjPfu"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
      </div>
    </div>
  </div>
</div>


            <!-- End Row -->

            <!-- Info boxes -->
            <div class="row first mb-2 mt-2 ">

                <div class="col-md-12">


                </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!--begin::Row-->

            <!--end::Row-->
            <!--begin::Row-->
            <div class="row second">
              <!-- Start col -->
              <div class="col-md-12" >
                    <div class="card second_col ">
                        <div class="card-header providers" style="padding: 10px !important;">
                          <div class="category-header-section">

                            <select id="categoryFilter" class="categoryFilter">
                              <option value="">-- Select Category--</option>
                              <option value="technology">All</option>
                              <option value="health">Plumbers</option>
                              <option value="business">Masons</option>
                              <option value="education">Mama Mboga</option>
                            </select>

                          </div>
                          <div style="display:flex; gap:15px">
                              <div><input type="text" class="search-input" placeholder="Search provider..."></div>
                              <!-- <div> <button class="btn" style="color: white; font-size: small;" onclick="openProviderPopup()">  <i class="fas fa-plus icon"></i>
                                <b> Add Provider </b></button>
                              </div> -->

                          </div>

                        </div>
                        <div class="card-body" style="padding: 0 !important;">
                          <div style="overflow-x: auto;">
                            <table class="table table-hover table-summary-messages">
                              <thead class="mb-2" style="position: sticky;">
                                <tr>
                                  <th>Provider Name</th>
                                  <th>Location</th>
                                  <th>Services</th>
                                  <th>Ratings</th>
                                  <th>ACTION</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>John Doe
                                    <!-- Rating Section (stars) -->
                                    <div class="stars">
                                      <span class="star" data-value="1">&#9733;</span>
                                      <span class="star" data-value="2">&#9733;</span>
                                      <span class="star" data-value="3">&#9733;</span>
                                      <span class="star" data-value="4">&#9733;</span>
                                      <span class="star" data-value="5">&#9733;</span>
                                    </div>
                                  </td>
                                  <td>ruiru</td>
                                  <td style="color: #FFC107;"> <i class="fas fa-wrench"></i>Plumbing</td>
                                  <td>5 <i class="fa fa-star " id="star-rating"></i>(5)</td>
                                  <td id="more">
                                    <div id="more_icon">
                                      <button class="btn btn-primary view"> <i class="fas fa-sms"></i> Text </button>
                                      <button class="btn btn-primary view">  <i class="fas fa-envelope"></i>   email </button>
                                      <button class="action-btn">⋮</button>
                                    </div>
                                    <br>
                                    <div id="more_options">
                                      <a href="../serviceProvider/individualProviderProfile.html">View</a>
                                      <a href="#">Edit</a>
                                      <a href="#">Delete</a>
                                      <a href="#">Others</a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>John Doe
                                    <!-- Rating Section (stars) -->
                                    <div class="stars">
                                      <span class="star" data-value="1">&#9733;</span>
                                      <span class="star" data-value="2">&#9733;</span>
                                      <span class="star" data-value="3">&#9733;</span>
                                      <span class="star" data-value="4">&#9733;</span>
                                      <span class="star" data-value="5">&#9733;</span>
                                    </div>
                                  </td>
                                  <td>0756752987</td>
                                  <td style="color: #FFC107;"><i class="fas fa-fire"></i> Gas Supply</td>
                                  <td>5 <i class="fa fa-star " id="star-rating"></i>(4)</td>
                                  <td id="more">
                                    <div id="more_icon">
                                      <button class="btn btn-primary view">  <i class="fas fa-sms"></i>   Text </button>
                                      <button class="btn btn-primary view">  <i class="fas fa-envelope"></i>   Text </button>
                                      <button class="action-btn">⋮</button>
                                    </div>
                                    <br>
                                    <div id="more_options">
                                      <a href="../serviceProvider/individualProviderProfile.html">View</a>
                                      <a href="#">Edit</a>
                                      <a href="#">Delete</a>
                                      <a href="#">Others</a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>John Doe
                                    <!-- Rating Section (stars) -->
                                    <div class="stars">
                                      <span class="star" data-value="1">&#9733;</span>
                                      <span class="star" data-value="2">&#9733;</span>
                                      <span class="star" data-value="3">&#9733;</span>
                                      <span class="star" data-value="4">&#9733;</span>
                                      <span class="star" data-value="5">&#9733;</span>
                                    </div>
                                  </td>
                                  <td>0756752987</td>
                                  <td style="color: #FFC107;"><i class="fas fa-drumstick-bite"></i>Butcher</td>
                                  <td>5 <i class="fa fa-star " id="star-rating"></i>(2)</td>
                                  <td id="more">
                                    <div id="more_icon">
                                      <button class="btn btn-primary view"> <i class="fas fa-sms"></i>  Text </button>
                                      <button class="btn btn-primary view"><i class="fas fa-envelope"></i> Email </button>
                                      <button class="action-btn">⋮</button>
                                    </div>
                                    <br>
                                    <div id="more_options">
                                      <a href="../serviceProvider/individualProviderProfile.html">View</a>
                                      <a href="#">Edit</a>
                                      <a href="#">Delete</a>
                                      <a href="#">Others</a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>John Doe
                                    <!-- Rating Section (stars) -->
                                    <div class="stars">
                                      <span class="star" data-value="1">&#9733;</span>
                                      <span class="star" data-value="2">&#9733;</span>
                                      <span class="star" data-value="3">&#9733;</span>
                                      <span class="star" data-value="4">&#9733;</span>
                                      <span class="star" data-value="5">&#9733;</span>
                                    </div>
                                  </td>
                                  <td>0756752987</td>
                                  <td style="color: #FFC107;"> <i class="fas fa-bolt"></i>  Electrician</td>
                                  <td>5 <i class="fa fa-star " id="star-rating"></i>(1)</td>
                                  <td id="more">
                                    <div id="more_icon">
                                      <button class="btn btn-primary view"><i class="fas fa-sms"></i>  View </button>
                                      <button class="btn btn-primary view"><i class="fas fa-envelope"></i> Email </button>
                                      <button class="action-btn">⋮</button>
                                    </div>
                                    <br>
                                    <div id="more_options">
                                      <a href="../serviceProvider/individualProviderProfile.html">View</a>
                                      <a href="#">Edit</a>
                                      <a href="#">Delete</a>
                                      <a href="#">Others</a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>John Doe
                                    <!-- Rating Section (stars) -->
                                    <div class="stars">
                                      <span class="star" data-value="1">&#9733;</span>
                                      <span class="star" data-value="2">&#9733;</span>
                                      <span class="star" data-value="3">&#9733;</span>
                                      <span class="star" data-value="4">&#9733;</span>
                                      <span class="star" data-value="5">&#9733;</span>
                                    </div>
                                  </td>
                                  <td>0756752987</td>
                                  <td style="color: #FFC107;"><i class="fas fa-wrench"></i> Kelvin@gmail.com</td>
                                  <td>5 <i class="fa fa-star " id="star-rating"></i>(3)</td>
                                  <td id="more">
                                    <div id="more_icon">
                                      <button class="btn btn-primary view"><i class="fas fa-sms"></i> View </button>
                                      <button class="btn btn-primary view"><i class="fas fa-envelope"></i> Email </button>
                                      <button class="action-btn">⋮</button>
                                    </div>
                                    <br>
                                    <div id="more_options">
                                      <a href="../serviceProvider/individualProviderProfile.html">View</a>
                                      <a href="#">Edit</a>
                                      <a href="#">Delete</a>
                                      <a href="#">Others</a>
                                    </div>
                                  </td>
                                </tr>
                                <!-- Add more rows as needed -->
                              </tbody>
                            </table>
                          </div>
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

<!-- new Category popup -->
<div class="categoryPopup-overlay" id="CategoryPopup">

  <div  class="card" style="margin-top: 20px;">
    <div class="card-header new-category-header">
      New Category
      <button class="close-btn bg-body-secondary" onclick="closeCategoryPopup()">×</button>
    </div>
    <div class="card-body new-message-body">

      <!-- <div class="field-group">
        <label for="subject new-message">Service Provider</label>
        <input type="number" id="number" class="category-number" placeholder="Enter number..." />
      </div> -->


      <div class="field-group">
        <label for="subject new-message">Category</label>
        <input type="text" id="category-text" class="category-text" placeholder="Enter Category..." />
      </div>
      <div class="actions d-flex justify-content-end">

        <button class="save-btn btn mt-2">save</button>
      </div>

    </div>

  </div>

</div>


<!-- End Category popup -->

<!-- Provider popup -->
<div class="Providerpopup-overlay" id="ProviderPopup">
  <div class="Providerpopup-content">
    <button class="close-btn text-secondary" onclick="closeProviderPopup()">×</button>
    <h2 style="color: #00192D;">Add Provider</h2>
    <form class="provider-form">

      <label for="property">Category:</label>
      <select id="property" required>
        <option value="">Select Category</option>
        <option value="High">Plumbing</option>
        <option value="Moderate">Electrician</option>
        <option value="Low">Landscaping</option>
      </select>


        <label for="name"> Name</label>
        <input type="text" id="text" name="text" required>
        <label for="name">Phone</label>
        <input type="text" id="name" name="name" required>
        <label for="name">Email</label>
        <input type="text" id="number" name="number" required>
        <div id="field-group-first" class="field-group first">
          <label for="recipient" style="color: black;">
            Type of provider
            <i class="fas fa-mouse-pointer title-icon" style="transform: rotate(110deg);"></i>

          </label>
          <select id="recipient" onchange="toggleShrink()" class="recipient">
            <option value="select">Select Provider</option>
            <option value="freelancers">Freelancers</option>
            <option value="company">Company</option>
          </select>
        </div>

        <!-- Freelancer details, shown only when "Freelancers" is selected -->
        <div id="freelancer-details" class="field-group second" style="display:none">
          <label for="name">Preferred B/S Name</label>
        <input type="text" id="text" name="text" required>

          <label for="recipient">Kra Pin(Optional)</label>
          <input type="text" id="number" name="kra_pin" required>

        </div>

        <!-- Company details, shown only when "Company" is selected -->
        <div id="company-details" class="field-group second" style="display:none">
          <label for="recipient">Company Registration Number</label>
          <input type="text" id="company-number" name="company_registration_number" required>

          <label for="recipient">Company Kra Pin</label>
          <input type="text" id="company-kra-pin" name="company_kra_pin" required>

          <label for="recipient">Company Business Licence</label>
          <input type="text" id="company-licence" name="company_business_licence" required>

          <label for="name">Preferred B/S Name</label>
          <input type="text" id="text" name="text" required>

          <label for="file">Attachment</label>
          <input type="file">
        </div>


        <label for="location">Location</label>
        <input type="text" id="location" name="location" required>
        <label for="communication">Preferred Mode Of Communication</label>
        <select id="communication" required>
          <option value="communication">Select Category</option>
          <option value="call">Call</option>
          <option value="messages">Messages</option>
          <option value="email">Email</option>
        </select>

        <input type="file" id="imageUpload" accept="image/*">
        <div class="preview-container">
            <img id="imagePreview" alt="Image Preview">
        </div>

<br>

      <button type="submit" class="submit-btn" style="background-color: #00192D; color: #f1f1f1;">SUBMIT</button><br>
    </form>
  </div>
</div>
<!-- End Provider popup -->

<!-- End view announcement -->
<!-- end overlay card. -->

    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
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


<!-- Overlay scripts -->
 <!-- Category script -->
<script>
  // Function to open the category popup
  function openCategoryPopup(){
    document.getElementById("CategoryPopup").style.display = "flex";
  }

  // Function to close the category popup
  function closeCategoryPopup() {
    document.getElementById("CategoryPopup").style.display = "none";
  }
</script>
<!-- end Category overlay -->

 <!-- Provider script -->
 <script>
  // Function to open the provider popup
  function openProviderPopup(){
    document.getElementById("ProviderPopup").style.display = "flex";
  }

  // Function to close the provider popup
  function closeProviderPopup() {
    document.getElementById("ProviderPopup").style.display = "none";
  }
</script>
<!-- end Provider overlay -->

<script>
  function toggleShrink() {
    const recipient = document.getElementById('recipient').value;

    // Hide both freelancer and company details initially
    document.getElementById('freelancer-details').style.display = 'none';
    document.getElementById('company-details').style.display = 'none';

    // Show the respective section based on the selected provider
    if (recipient === 'freelancers') {
      document.getElementById('freelancer-details').style.display = 'block';  // Show freelancer fields
    } else if (recipient === 'company') {
      document.getElementById('company-details').style.display = 'block';  // Show company fields
    }
  }
</script>



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

 <script src="#">
  // Get the stars and form elements
  const stars = document.querySelectorAll('.star');
  const reviewForm = document.getElementById('review-form');
  const reviewTextarea = document.getElementById('review');
  const reviewsList = document.getElementById('reviews-list');
  let ratingValue = 0;

  // Handle the star rating
  stars.forEach(star => {
    star.addEventListener('click', () => {
      ratingValue = parseInt(star.getAttribute('data-value'));

      // Clear previously selected stars
      stars.forEach(s => s.classList.remove('selected'));

      // Select the stars up to the clicked one
      for (let i = 0; i < ratingValue; i++) {
        stars[i].classList.add('selected');
      }
    });

    // Highlight stars on hover
    star.addEventListener('mouseover', () => {
      const hoverValue = parseInt(star.getAttribute('data-value'));
      stars.forEach((s, index) => {
        s.classList.toggle('selected', index < hoverValue);
      });
    });

    // Reset star highlight when mouse leaves
    star.addEventListener('mouseout', () => {
      stars.forEach(s => s.classList.remove('selected'));
      for (let i = 0; i < ratingValue; i++) {
        stars[i].classList.add('selected');
      }
    });
  });

  // Handle the review form submission
  reviewForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const reviewText = reviewTextarea.value.trim();
    if (ratingValue === 0 || reviewText === '') {
      alert('Please provide both a rating and a review!');
      return;
    }

    const newReview = document.createElement('div');
    newReview.classList.add('review-item');

    newReview.innerHTML = `
      <strong>Rating: ${ratingValue} ★</strong>
      <p>${reviewText}</p>
    `;

    reviewsList.appendChild(newReview);

    // Clear the form after submission
    reviewTextarea.value = '';
    ratingValue = 0;
    stars.forEach(star => star.classList.remove('selected'));
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

<!-- script for occordion -->
<script>

        // JavaScript to handle hover and hide functionality
        const filterContainer = document.getElementById("filter-container");
        const accordion = document.getElementById("filter");
        const panel = document.getElementById("panel");

        // Show panel when hovering over the accordion
        accordion.addEventListener("mouseenter", () => {
            panel.style.display = "block";
        });

        // Hide panel when moving out of both accordion and panel
         filterContainer.addEventListener("mouseleave", () => {
             panel.style.display = "none";
      });


</script>
<!-- End for Occordion script -->

<!-- script for popups  -->
<script>
const display_add_provider = document.getElementById('add_provider');
const  display_add_provider_btn= document.getElementById('add_provider_btn');
const close_add_provider_container = document.getElementById('close_btn');
display_add_provider_btn.addEventListener('click', ()=>{
  display_add_provider.style.display = "flex";
})
close_add_provider_container.addEventListener('click', ()=>{
  display_add_provider.style.display = "none";
})
</script>


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


    <!-- Begin script for datatable -->
    <script>

       $(document).ready(function() {
        $('#maintenance').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "lengthMenu": [5, 10, 25, 60],
            "language": {
                "search": "Filter records:",
                "lengthMenu": "Show _MENU_ entries"
            }
        });
    });

    </script>
            <script>

                $(document).ready(function() {
                $('#vendor_distribution1').DataTable({
                    // "paging": true,
                    // "searching": true,
                    // "info": true,
                    // "lengthMenu": [5, 10, 25, 60],
                    // "language": {
                    //     "search": "Filter records:",
                    //     "lengthMenu": "Show _MENU_ entries"
                    // }
                });
            });

            </script>


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
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../../dist/js/adminlte.js"></script>
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
