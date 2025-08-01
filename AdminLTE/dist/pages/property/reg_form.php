<?php
session_start();
// Database connection
$host = "localhost";
$dbname = "bt_jengopay";
$username = "root";
$password = "";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        function uploadPhoto($fileInput, $targetDir = "uploads/") {
            if (!isset($_FILES[$fileInput]) || $_FILES[$fileInput]['error'] !== UPLOAD_ERR_OK) {
                return null;
            }

            $fileName = basename($_FILES[$fileInput]["name"]);
            $targetFile = $targetDir . uniqid() . "_" . $fileName;

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $targetFile)) {
                return $targetFile;
            }

            return null;
        }

        // Collect building data
        $building_name = $_POST['building_name'];
        $county = $_POST['county'];
        $constituency = $_POST['constituency'];
        $ward = $_POST['ward'];
        $floor_number = $_POST['floor_number'];
        $units_number = $_POST['units_number'];
        $building_type = $_POST['building_type'] ?? '';
        $water_price = $_POST['water_price'] ?? '';
        $electricity_price = $_POST['electricity_price'] ?? '';
        $ownership_info = $_POST['ownership_info'];

        $title_deed_copy = uploadPhoto('title_deed_copy');
        $other_document_copy = uploadPhoto('other_document_copy');
        $borehole_availability = $_POST['borehole_availability'] ?? '';
        $solar_availability = $_POST['solar_availability'] ?? '';
        $solar_brand = $_POST['solar_brand'] ?? '';
        $installation_company = $_POST['installation_company'] ?? '';
        $no_of_panels = $_POST['no_of_panels'] ?? '';
        $solar_primary_use = $_POST['solar_primary_use'] ?? '';
        $parking_lot = $_POST['parking_lot'] ?? '';
        $alarm_system = $_POST['alarm_system'] ?? '';
        $elevators = $_POST['elevators'] ?? '';
        $psds_accessibility = $_POST['psds_accessibility'] ?? '';
        $cctv = $_POST['cctv'] ?? '';
        $insurance_cover = $_POST['insurance_cover'] ?? '';
        $insurance_policy = $_POST['insurance_policy'] ?? '';
        $insurance_provider = $_POST['insurance_provider'] ?? '';
        $policy_from_date = $_POST['policy_from_date'] ?? null;
        $policy_until_date = $_POST['policy_until_date'] ?? null;
        $front_view_photo = uploadPhoto('front_view_photo');
        $rear_view_photo = uploadPhoto('rear_view_photo');
        $angle_view_photo = uploadPhoto('angle_view_photo');
        $interior_view_photo = uploadPhoto('interior_view_photo');

        // Ownership fields
        $first_name = $last_name = $nationality = $country_code = $kra_pin = $kra_attachment = $identification_number = $id_attachment = $email = '';
        $entity_name = $entity_country_code = $entity_email = $bs_reg_no = $attach_bs_reg_no = $entity_kra_pin = $entity_attach_kra_copy = $entity_representative = $entity_rep_role = '';

        if ($ownership_info == 'Individual') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $nationality = $_POST['nationality'];
            $country_code = $_POST['country_code'];
            $kra_pin = $_POST['kra_pin'];
            $kra_attachment = uploadPhoto('kra_attachment');
            $identification_number = $_POST['identification_number'];
            $id_attachment = uploadPhoto('id_attachment');
            $email = $_POST['email'];
        } elseif ($ownership_info == 'Entity') {
            $entity_name = $_POST['entity_name'];
            $entity_country_code = $_POST['entity_country_code'];
            $entity_email = $_POST['entity_email'];
            $bs_reg_no = $_POST['bs_reg_no'];
            $attach_bs_reg_no = uploadPhoto('attach_bs_reg_no');
            $entity_kra_pin = $_POST['entity_kra_pin'];
            $entity_attach_kra_copy = uploadPhoto('entity_attach_kra_copy');
            $entity_representative = $_POST['entity_representative'];
            $entity_rep_role = $_POST['entity_rep_role'];
        }

        // Approvals
        $nca_approval = $_POST['nca_approval'] ?? 'No';
        $nca_approval_no = $_POST['nca_approval_no'] ?? '';
        $nca_approval_start_date = $_POST['nca_approval_start_date'] ?? '';
        $nca_approval_end_date = $_POST['nca_approval_end_date'] ?? '';

        $local_gov_approval = $_POST['local_gov_approval'] ?? 'No';
        $local_gov_approval_no = $_POST['local_gov_approval_no'] ?? '';
        $local_gov_approval_date = $_POST['local_gov_approval_date'] ?? '';

        $nema_approval = $_POST['nema_approval'] ?? 'No';
        $nema_approval_no = $_POST['nema_approval_no'] ?? '';
        $nema_approval_date = $_POST['nema_approval_date'] ?? '';

        $building_tax_pin = $_POST['building_tax_pin'] ?? '';

        // SQL Insert
        $sql = "INSERT INTO buildings (
            building_name, county, constituency, ward, floor_number, units_number, building_type, water_price, electricity_price,
            ownership_info,
            first_name, last_name, nationality, country_code, kra_pin, kra_attachment, identification_number, id_attachment, email,
            entity_name, entity_country_code, entity_email, bs_reg_no, attach_bs_reg_no, entity_kra_pin, entity_attach_kra_copy, entity_representative, entity_rep_role,
            title_deed_copy, other_document_copy, borehole_availability, solar_availability, solar_brand,
            installation_company, no_of_panels, solar_primary_use, parking_lot, alarm_system, elevators,
            psds_accessibility, cctv, nca_approval, nca_approval_no, nca_approval_start_date, nca_approval_end_date,
            local_gov_approval, local_gov_approval_no, local_gov_approval_date,
            nema_approval, nema_approval_no, nema_approval_date,
            building_tax_pin, insurance_cover, insurance_policy, insurance_provider,
            policy_from_date, policy_until_date, front_view_photo, rear_view_photo, angle_view_photo, interior_view_photo
        ) VALUES (
            :building_name, :county, :constituency, :ward, :floor_number, :units_number, :building_type, :water_price, :electricity_price,
            :ownership_info,
            :first_name, :last_name, :nationality, :country_code, :kra_pin, :kra_attachment, :identification_number, :id_attachment, :email,
            :entity_name, :entity_country_code, :entity_email, :bs_reg_no, :attach_bs_reg_no, :entity_kra_pin, :entity_attach_kra_copy, :entity_representative, :entity_rep_role,
            :title_deed_copy, :other_document_copy, :borehole_availability, :solar_availability, :solar_brand,
            :installation_company, :no_of_panels, :solar_primary_use, :parking_lot, :alarm_system, :elevators,
            :psds_accessibility, :cctv, :nca_approval, :nca_approval_no, :nca_approval_start_date, :nca_approval_end_date,
            :local_gov_approval, :local_gov_approval_no, :local_gov_approval_date,
            :nema_approval, :nema_approval_no, :nema_approval_date,
            :building_tax_pin, :insurance_cover, :insurance_policy, :insurance_provider,
            :policy_from_date, :policy_until_date, :front_view_photo, :rear_view_photo, :angle_view_photo, :interior_view_photo
        )";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':building_name' => $building_name,
            ':county' => $county,
            ':constituency' => $constituency,
            ':ward' => $ward,
            ':floor_number' => $floor_number,
            ':units_number' => $units_number,
            ':building_type' => $building_type,
            ':water_price' => $water_price,
            ':electricity_price' => $electricity_price,
            ':ownership_info' => $ownership_info,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':nationality' => $nationality,
            ':country_code' => $country_code,
            ':kra_pin' => $kra_pin,
            ':kra_attachment' => $kra_attachment,
            ':identification_number' => $identification_number,
            ':id_attachment' => $id_attachment,
            ':email' => $email,
            ':entity_name' => $entity_name,
            ':entity_country_code' => $entity_country_code,
            ':entity_email' => $entity_email,
            ':bs_reg_no' => $bs_reg_no,
            ':attach_bs_reg_no' => $attach_bs_reg_no,
            ':entity_kra_pin' => $entity_kra_pin,
            ':entity_attach_kra_copy' => $entity_attach_kra_copy,
            ':entity_representative' => $entity_representative,
            ':entity_rep_role' => $entity_rep_role,
            ':title_deed_copy' => $title_deed_copy,
            ':other_document_copy' => $other_document_copy,
            ':borehole_availability' => $borehole_availability,
            ':solar_availability' => $solar_availability,
            ':solar_brand' => $solar_brand,
            ':installation_company' => $installation_company,
            ':no_of_panels' => $no_of_panels,
            ':solar_primary_use' => $solar_primary_use,
            ':parking_lot' => $parking_lot,
            ':alarm_system' => $alarm_system,
            ':elevators' => $elevators,
            ':psds_accessibility' => $psds_accessibility,
            ':cctv' => $cctv,
            ':nca_approval' => $nca_approval,
            ':nca_approval_no' => $nca_approval_no,
            ':nca_approval_start_date' => $nca_approval_start_date,
            ':nca_approval_end_date' => $nca_approval_end_date,
            ':local_gov_approval' => $local_gov_approval,
            ':local_gov_approval_no' => $local_gov_approval_no,
            ':local_gov_approval_date' => $local_gov_approval_date,
            ':nema_approval' => $nema_approval,
            ':nema_approval_no' => $nema_approval_no,
            ':nema_approval_date' => $nema_approval_date,
            ':building_tax_pin' => $building_tax_pin,
            ':insurance_cover' => $insurance_cover,
            ':insurance_policy' => $insurance_policy,
            ':insurance_provider' => $insurance_provider,
            ':policy_from_date' => $policy_from_date,
            ':policy_until_date' => $policy_until_date,
            ':front_view_photo' => $front_view_photo,
            ':rear_view_photo' => $rear_view_photo,
            ':angle_view_photo' => $angle_view_photo,
            ':interior_view_photo' => $interior_view_photo,
        ]);

        // After successful insert
$_SESSION['water_price'] = $water_price;
$_SESSION['electricity_price'] = $electricity_price;

        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit;
        // echo "Building data successfully inserted!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {

  // Fetch buildings regardless of POST
  $stmt = $pdo->query("SELECT * FROM buildings");
  $buildings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error fetching buildings: " . $e->getMessage();
  $buildings = []; // prevent further errors
}

?>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
<script>
    alert("✅ Building added successfully!");
    if (window.history.replaceState) {
        const cleanUrl = window.location.href.split('?')[0];
        window.history.replaceState(null, null, cleanUrl);
    }
</script>
<?php endif; ?>




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

    <link rel="stylesheet" href="styling.css">

    <!-- scripts for data_table -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="announcements.css"> -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

        <style>
          body
          {
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
           <span class="brand-text fw-dark"><a href="index3.html" class="brand-link">
        <!--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
        <span class="brand-text font-weight-light"><b class="p-2"
                style="background-color:#FFC107; border:2px solid #FFC107; border-top-left-radius:5px; font-weight:bold; color:#00192D;">BT</b><b
                class="p-2"
                style=" border-bottom-right-radius:5px; font-weight:bold; border:2px solid #FFC107; color: #FFC107;">JENGOPAY</b></span>
    </a></span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <!-- <div id="sidebar"></div> This is where the header will be inserted -->
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
            <!-- Indicators Section Start Here -->
  <div class="row mt-2" style="justify-content:center; align-items:center;">
    <!-- Step One Introduction Section -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepOneIndicatorNo">1</b>
      <b><p class="mt-2" id="stepOneIndicatorText" style="font-size:13px;">
        Overview
      </p></b>
    </div>
    <!-- Step Two Building Identification Details -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepTwoIndicatorNo">2</b>
     <b> <p class="mt-2" id="stepTwoIndicatorText" style="font-size:13px;">
        Identification</p></b>
    </div>
    <!-- Step Three Ownership Information -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepThreeIndicatorNo">3</b>
      <b><p class="mt-2" id="stepThreeIndicatorText" style="font-size:13px;">
        Ownership
      </p></b>
    </div>
    <!-- Step 4 Utilities and Infrastructure -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepFourIndicatorNo">4</b>
      <b><p class="mt-2" id="stepFourIndicatorText" style="font-size:13px;">
        Utilities
      </p></b>
    </div>
    <!-- Step Five Legal and Regulatory Details -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepFiveIndicatorNo">5</b>
      <b><p class="mt-2" id="stepFiveIndicatorText" style="font-size:13px;">
        Regulations
      </p></b>
    </div>
    <!-- Step Six Insurance and Financial Information -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepSixIndicatorNo">6</b>
      <b><p class="mt-2" id="stepSixIndicatorText" style="font-size:13px;">
        Insurance
      </p></b>
    </div>
    <!-- Step Seven Photographs -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepSevenIndicatorNo">7</b>
      <b><p class="mt-2" id="stepSevenIndicatorText" style="font-size:13px;">
        Photos</p></b>
    </div>
    <!-- Step Eight Confirmation and Submission -->
    <div class="col-md-1 text-center">
      <b class="shadow"
        style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:15px; padding-right:15px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;"
        id="stepEightIndicatorNo">8</b>
      <b><p class="mt-2" id="stepEightIndicatorText" style="font-size:13px;">
        Confirmation
      </p></b>
    </div>
  </div>
  <!-- Section One Overview Starts Here -->
  <div class="card" id="sectionOne">
    <div class="card-header" style="background-color: #00192D;"  >
      <b style="color: #FFC107;">Brief Overview</b>
    </div>
    <div class="card-body text-center p-3">
      <b><p>Welcome to Biccount Property Registration Section. We'll collect
        some
        information regarding your property. This is essential for the
        correct
        record keeping, tracking and decision making for all the
        stakeholders
        including Landlord, Property Managers, Tenants Third Party
        Service
        Provides to mention but a few. Click Next to start the
        Registration
        process.</p></b>
    </div>
    <div class="card-footer text-right">
      <button type="button" class="btn btn-sm next-btn" id="stepOneNextBtn">Next</button>
    </div>
  </div>
  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <!-- Section Two Building Identification Information -->
    <div class="card"   id="sectionTwo">
      <div class="card-header" style="background-color: #00192D;" >
        <b style="color: #FFC107;">Building Identification</b>
      </div>
      <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Building Name</label> <sup class="text-danger"><b>*</b></sup>
                                  <input type="text" class="form-control" id="buildingName" name="building_name"
                                    placeholder="Building Name">
                                </div>
                              </div>
                            </div>
                            <h5 class="text-center" style="font-weight: bold;">Location
                              Information</h5>
                            <div class="row">
  <!-- County -->
  <div class="col-md-4">
    <div class="form-group">
      <label>County</label>
      <select name="county" id="county" onchange="loadConstituency()"
              class="form-control select2 select2-danger"
              data-dropdown-css-class="select2-danger"
              style="width: 100%;">
             <option value="" hidden selected>-- Select Option --</option>
                                    <option>Mombasa</option>
                                    <option>Kwale</option>
                                    <option>Kilifi</option>
                                    <option>Tana River</option>
                                    <option>Lamu</option>
                                    <option>Taita Taveta</option>
                                    <option>Garissa</option>
                                    <option>Wajir</option>
                                    <option>Mandera</option>
                                    <option>Marsabit</option>
                                    <option>Isiolo</option>
                                    <option>Meru</option>
                                    <option>Tharaka-Nithi</option>
                                    <option>Embu</option>
                                    <option>Kitui</option>
                                    <option>Machakos</option>
                                    <option>Makueni</option>
                                    <option>Nyandarua</option>
                                    <option>Nyeri</option>
                                    <option>Kirinyaga</option>
                                    <option>Murang'a</option>
                                    <option>Kiambu</option>
                                    <option>Turkana</option>
                                    <option>West Pokot</option>
                                    <option>Samburu</option>
                                    <option>Trans Nzoia</option>
                                    <option>Uasin Gishu</option>
                                    <option>Elgeyo/Marakwet</option>
                                    <option>Nandi</option>
                                    <option>Baringo</option>
                                    <option>Laikipia</option>
                                    <option>Nakuru</option>
                                    <option>Narok</option>
                                    <option>Kajiado</option>
                                    <option>Kericho</option>
                                    <option>Bomet</option>
                                    <option>Kakamega</option>
                                    <option>Vihiga</option>
                                    <option>Bungoma</option>
                                    <option>Busia</option>
                                    <option>Siaya</option>
                                    <option>Kisumu</option>
                                    <option>Homa Bay</option>
                                    <option>Migori</option>
                                    <option>Kisii</option>
                                    <option>Nyamira</option>
                                    <option>Nairobi</option>

                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Constituency</label>
                                  <select name="constituency" id="constituency" onchange="loadWard()" class="form-control" required>
                                    <option value="" selected hidden>-- Choose
                                      Constituency
                                      --</option>
                                    <!-- <option value="Nairobi">Westlands</option>
                                    <option value="Kisumu">Starehe</option>
                                    <option value="Vihiga">Embakasi</option> -->
                                  </select>
                                  <b class="errorMessages" id="constituencyError"></b>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Ward</label>
                                  <select name="ward" id="ward"    class="form-control">
                                    <option value="" selected hidden>-- Choose Ward
                                      --
                                    </option>
                                    <!-- <option value="Nairobi">Kangemi</option>
                                    <option value="Kisumu">Kiambu</option>
                                    <option value="Vihiga">Pipeline</option> -->
                                  </select>
                                  <b class="errorMessages" id="wardError"></b>
                                </div>
                              </div>
                            </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label >Number of Floors</label>
            <input
              type="text"
              name="floor_number"
              class="form-control"
              id="floorNumber"
              placeholder="Number of Floors"
              required
              pattern="^\d+$"
              title="Please enter a valid number for the number of floors."
              oninput="validateFloorNumber()"
            />
            <small id="floorNumberError" style="color:red; display:none;">Please enter a valid number for the number of floors.</small>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
            <label>Number of Units</label>
            <input
              type="text"
              class="form-control"
              id="unitsnumber"
              name="units_number"
              placeholder="Number of Units"
              required
              pattern="^\d+$"
              title="Please enter a valid number for the number of units."
              oninput="validateUnitsNumber()"
            />
            <small id="unitsNumberError" style="color:red; display:none;">Please enter a valid number for the number of units.</small>
            </div>
          </div>


          <div class="col-md-4">
            <label>Building Type</label>
            <select name="building_type" id="buildingType" class="form-control">
              <option value="" selected hidden>--Select Building
                Type--</option>
              <option value="Residential">Residential</option>
              <option value="Commercial">Commercial</option>
              <option value="Commercial">Commercial</option>
              <option value="Industrial">Industrial</option>
              <option value="Industrial">Industrial</option>
              <option value="Mixed-Use">Mixed-Use</option>
            </select>
          </div>

          <div class="row">
          <div class="col-md-4">
          <label>Select Water Unit Price</label>
            <select name="water_price" id="water_price" class="form-control">
              <option value="" selected hidden>--Select Water Unit Price--</option>
              <option value="200">Ksh 200</option>
              <option value="150">Ksh 150</option>
              <option value="100">Ksh 100</option>
              <option value="50">Ksh 50</option>
            </select>
          </div>
          <div class="col-md-8">
          <label>Select Electricity Unit Price</label>
            <select name="electricity_price" id="electricity_price" class="form-control">
              <option value="" selected hidden>--Select Water Unit Price--</option>
              <option value="1000">Ksh 1000</option>
              <option value="500">Ksh 500</option>
              <option value="200">Ksh 200</option>
              <option value="100">Ksh 100</option>
              <option value="50">Ksh 50</option>
            </select>
          </div>
          </div>


        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepTwoBackBtn">Back</button>
        <button type="button" class="btn btn-sm next-btn" id="stepTwoNextBtn">Next</button>
      </div>
    </div>
    <!-- Section Three Ownership Information -->
    <div class="card" id="sectionThree">
      <div class="card-header" style="background-color: #00192D;" >
        <b style="color:#FFC107" >Ownership Information</b>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Building Owned By</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="ownership_info" id="showIndividualOwnerRadio"
                      onclick="showIndividualOwner();" value="Individual">
                    <label for="showIndividualOwnerRadio"> Individual
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="ownership_info" id="showEntityOwnerRadio"
                      onclick="showEntityOwner();" value="Entity" value="Individual">
                    <label for="showEntityOwnerRadio"> Entity
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div id="individualInfoDiv" style="display: none;">
              <div class="card">
                <div class="card-header"><b>Enter Individual's
                    Information</b></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" id="firstName"
                          placeholder="First Name"  pattern="[A-Za-z]+"
                        title="Only letters allowed"

                        oninput="validateFirstName()">
                      <small id="firstNameError" style="color:red; display:none;">Only letters allowed</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="lastName"
                          placeholder="Last Name"  pattern="[A-Za-z]+"
                        title="Only letters allowed" oninput="validateLastName()">
                      <small id="lastNameError" style="color:red; display:none;">Only letters allowed</small>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nationality</label>
                    <input type="text" name="nationality" class="form-control" id="nationality"
                      placeholder="Nationality">
                  </div>

                  <div class="form-group">
                  <label>Phone Number</label>
                  <div style="display: flex; gap: 5px;">
                  <select name="country_code" id="countryCode" class="form-control" style="max-width: 100px;" onchange="updatePhoneValidation()">
                  <option value="+254"
                          data-pattern="^(\+254|254|0)(7\d{8}|1\d{8})$"
                          data-placeholder="0712345678 or 0111111158"
                          data-maxlength="10">🇰🇪 +254 (Kenya)</option>
                  <option value="+255"
                          data-pattern="^(\+255|0)(6|7)\d{8}$"
                          data-placeholder="0712345678"
                          data-maxlength="10">🇹🇿 +255 (Tanzania)</option>
                  <option value="+256"
                          data-pattern="^(\+256|0)7\d{8}$"
                          data-placeholder="0701234567"
                          data-maxlength="10">🇺🇬 +256 (Uganda)</option>
                </select>
                      <input type="text"
                      name="entity_phone"
                      class="form-control"
                      id="phoneNumber"
                      placeholder=""
                      maxlength="10"
                      title="Enter a valid phone number"

                     >
                  </div>
                  <small id="phoneNumberError" style="color:red; display:none;">Invalid phone number format</small>
                  <!-- <small id="phoneNumberExists" style="color:red; display:none;">Phone number not found</small> -->
                </div>

                  <div class="form-group">
                  <label >KRA PIN</label>
                <input
                  type="text"
                  name="kra_pin"
                  class="form-control"
                  id="kra_pin"
                  placeholder="KRA PIN (e.g. A123456789K)"
                  pattern="^[A-Z]{1}\d{9}[A-Z]{1}$"
                  title="KRA PIN must be in the format A123456789K"
                  oninput="validateKraPin()"
                />
                <small id="kraPinError" style="color:red; display:none;">Format: A123456789K (1 letter, 9 digits, 1 letter)</small>
                  </div>
                  <div class="form-group">
                    <label>Attach KRA Copy</label>
                    <input type="file" name="kra_attachment" class="form-control" id="kra_attachment"
                      placeholder="Attach Kra pin">
                  </div>
                 <div class="form-group">
                    <label>Identification Number</label>
                    <input type="text" name="identification_number" class="form-control" id="identification_number" maxlength="10"
                      placeholder="Identification Number" inputmode="numeric"
                                                        pattern="\d*"
                                                        oninput="this.value = this.value.replace(/\D/g, '')">
                  </div>
                  <div class="form-group">
                    <label>Attach ID Copy</label>
                    <input type="file" name="id_attachment" class="form-control" id="id_attachment"
                      placeholder="Attach ID pin">
                  </div>
                  <div class="form-group">
                  <label>Email</label>
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="ownerEmail"
                    placeholder="Enter a valid email (e.g. name@example.com)"
                    title="Enter a valid email address"
                 oninput="validateEmail()"
                    >
                  <small id="emailError" style="color:red; display:none;">Please enter a valid email address.</small>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button type="button" class="btn btn-sm"
                    style="background-color: #cc0001; color:#fff;"
                    id="individualCloseBtn">Save & Close</button>
                </div>
              </div>
            </div>
            <div id="entityInfoDiv" style="display: none;">
              <div class="card">
                <div class="card-header"><b>Enter Entity's
                    Information</b></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                      <label>Entity
                          Name</label>
                        <input type="text" name="entity_name" class="form-control" id="entityName"
                          placeholder="Entity Name">
                      </div>
                    </div>
                    <div class="form-group">
                    <label>Phone Number</label>
                    <div style="display: flex; gap: 5px;">
                      <select name="entity_country_code" id="entityCountryCode" class="form-control" style="max-width: 100px;" onchange="updatePhoneValidation()">
                      <option value="+254"
                          data-pattern="^(\+254|254|0)(7\d{8}|1\d{8})$"
                          data-placeholder="0712345678 or 0111111158"
                          data-maxlength="10">🇰🇪 +254 (Kenya)</option>
                  <option value="+255"
                          data-pattern="^(\+255|0)(6|7)\d{8}$"
                          data-placeholder="0712345678"
                          data-maxlength="10">🇹🇿 +255 (Tanzania)</option>
                  <option value="+256"
                          data-pattern="^(\+256|0)7\d{8}$"
                          data-placeholder="0701234567"
                          data-maxlength="10">🇺🇬 +256 (Uganda)</option>
                      </select>

                      <input type="text"
                            name="entity_phone"
                            class="form-control"
                            id="entity_phoneNumber"
                            placeholder=""
                            maxlength="10"
                            title="Enter a valid phone number"
                            >
                    </div>

                    <small id="phoneNumberError" style="color:red; display:none;">Invalid phone number format</small>
                    <small id="phoneNumberExists" style="color:red; display:none;">Phone number not found</small>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>Official Email</label>
                    <input type="text"  name="entity_email" class="form-control" id="entityEmail"
                      placeholder="Entity Email"  oninput="validateEntityEmail()">
                  </div>
                  <div class="form-group">
                    <label>Business Registration Number</label>
                    <input type="text" name="bs_reg_no" class="form-control" id="bs_reg_no"
                      placeholder="Business Registration Number">
                  </div>

                  <div class="form-group">
                    <label>Attach Business Registration Number Copy</label>
                    <input type="file" name="attach_bs_reg_no" class="form-control" id="attach_bs_reg_no"
                      placeholder="Attach Business Registration Number Copy">
                  </div>
                  <div class="form-group">
                    <label>Kra pin</label>
                    <input type="text" name="entity_kra_pin" class="form-control" id="entity_kra_pin"
                      placeholder="Kra pin">
                  </div>
                  <div class="form-group">
                    <label>Attach Kra Copy</label>
                    <input type="file" name="entity_attach_kra_copy" class="form-control" id="attach_kra_copy"
                      placeholder="Attach Kra Copy">
                  </div>
                  <div class="form-group">
                    <label>Entity
                      Representative</label>
                    <input type="text" name="entity_representative" class="form-control" id="entityRepresentative"
                      placeholder="Entity Representative">
                  </div>

                  <div class="form-group">
                    <label>Role</label>
                    <select name="entity_rep_role" id="entityRepRole" class="form-control">
                      <option value="" selected hidden>
                        --Select Role --</option>
                      <option value="CEO">CEO</option>
                      <option value="Treasury">Treasury
                      </option>
                      <option value="Board Member">Board
                        Member</option>
                      <option value="Signatory">Signatory
                      </option>
                      <option value="Founder">Founder
                      </option>
                      <option value="Co-Founder">
                        Co-Founder</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-sm" id="entityCloseDivBtn"
                    style="background-color: #cc0001; color:#fff">Save & Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label>Title Deed Copy</label>
                  <input type="file" onchange="handleFiles(event)" name="title_deed_copy"  class="form-control" id="titleDeedCopy">

                  <!-- Section to display selected files' previews and sizes -->
                  <div id="filePreviews"></div>

                </div>
                <div class="col-md-6">
                <label>Other Legal Document</label>
                <input type="file" class="form-control" id="otherDocumentCopy" name="other_document_copy" accept=".pdf, image/*">
                <div id="preview_other_document" style="margin-top: 10px;"></div>
              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepThreeBackBtn">Back</button>
        <button type="button" class="btn btn-sm next-btn" id="stepThreeNextBtn">Next</button>
      </div>
    </div>
    <!-- Section Four Utilities and Infrastructure -->
    <div class="card" id="sectionFour">
      <div class="card-header" style="background-color: #00192D;" ><b style="color:#FFC107;" >Utilities and Infrastructure</b></div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Is there a Borehole?</label>
              <select name="borehole_availability" id="boreHoleVailability" class="form-control">
                <option value="" selected hidden>-- Select Option --</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Do you Have Solar System?</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="solar_availability" id="solarAvailabilityYes"
                      onclick="specifySolarProvider();" value="Yes">
                    <label for="solarAvailabilityYes"> Yes
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="solar_availability" id="solarAvailabilityNo"
                      onclick="hideSolarProvider();" value="No">
                    <label for="solarAvailabilityNo"> No
                    </label>
                  </div>
                </div>
              </div>
              <div class="card mt-2" id="specifySolarPrivider" style="display: none;">
                <div class="card-header"><b>Please Specify</b></div>
                <div class="card-body">
                  <div class="form-group">
                  <label>Solar Panel Brand</label>
                  <input
                    type="text"
                    name="solar_brand"
                    class="form-control"
                    id="solarBrand"
                    placeholder="Solar Brand (letters only)"
                    pattern="^[A-Za-z\s]+$"
                    title="Only letters and spaces are allowed"

                    oninput="validateSolarBrand()"
                  />
                  <small id="solarBrandError" style="color:red; display:none;">
                    Only letters and spaces are allowed.
                  </small>
                  </div>
                  <div class="form-group">
                  <label >Installation Company</label>
                  <input
                    type="text"
                    name="installation_company"
                    class="form-control"
                    id="installationCompany"
                    placeholder="Installation Company (letters only)"
                    pattern="^[A-Za-z\s]+$"
                    title="Only letters and spaces are allowed"

                    oninput="validateInstallationCompany()"
                  />
                  <small id="installationCompanyError" style="color:red; display:none;">
                    Only letters and spaces are allowed.
                  </small>

                  </div>
                  <div class="form-group">
                   <label >Number of Panels</label>
                  <input
                    type="text"
                    name="no_of_panels"
                    class="form-control"
                    id="noOfPanels"
                    placeholder="Enter number of panels"
                    pattern="^\d+$"
                    title="Only numbers are allowed"
                    oninput="validateNoOfPanels()"
                  />
                  <small id="noOfPanelsError" style="color:red; display:none;">
                    Only numeric values are allowed.
                  </small>
                  </div>
                  <div class="form-group">
                    <label>Primary Use</label>
                    <select name="solar_primary_use" id="solarPrimaryUse" class="form-control">
                      <option value="" selected hidden>-- Select Option --</option>
                      <option value="Lighting">Lighting</option>
                      <option value="Water Heating">Water Heating</option>
                      <option value="Power Backup">Power Backup</option>
                      <option value="Multi-Purpose">Multi-Purpose</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-sm" type="button"
                    style="background-color: #cc0001; color:#fff;"
                    id="closeSolarProviderBtn">Save & Close</button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Is there Parking Lot?</label>
              <select name="parking_lot" id="parkingLot" class="form-control">
                <option value="" selected hidden>-- Select Option --</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Is there Alarm Security System?</label>
              <select name="alarm_system" id="alarmSystem" class="form-control">
                <option value="" selected hidden>-- Select Option --</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Is there Elevator(s)?</label>
              <select name="elevators" id="elevators" class="form-control">
                <option value="" selected hidden>-- Select Option --</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Is there PSD's Accessibility?</label>
              <select name="psds_accessibility" id="psds" class="form-control">
                <option value="" selected hidden>-- Select Option --</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label>Is there CCTV?</label>
              <select name="cctv" id="cctv" class="form-control">
                <option value="" selected hidden>-- Select Option --</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepFourBackBtn">Back</button>
        <button type="button" class="btn btn-sm next-btn" id="stepFourNextBtn">Next</button>
      </div>
    </div>
    <!-- Section Five Legal and Regulatory Details -->
    <div class="card" id="sectionFive">
      <div class="card-header" style="background-color: #00192D;" ><b style="color:#FFC107;" > Legal and Regulatory Details</b></div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Do you have NCA Approval</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="nca_approval" onclick="attachNcaApproval();"
                      value="Yes" id="showNcaContents">
                    <label for="showNcaContents"> Yes
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="nca_approval" onclick="closeAttachNcaApproval();"
                      value="No" id="noNcaContent">
                    <label for="noNcaContent"> No
                    </label>
                  </div>

                </div>
              </div>
            </div>
            <div class="card" id="ncaApprivalCard" style="display:none;">
              <div class="card-header"><b>Construction Approval</b></div>
              <div class="card-body">
                <div class="form-group">
                <label>Approval Number</label>
                <input
                  type="text"
                  name="nca_approval_no"
                  class="form-control"
                  id="approvalNo"
                  placeholder="Approval Number"
                  title="Format must be  92177/B/0325"
                />

                <small id="approvalNoError" style="color:red; display:none;">
                  Format must be 92177/B/0325
                </small>
                </div>
                <div class="form-group">
                <label>Start Date</label>
                <input
                  type="date"
                  name="nca_approval_start_date"
                  class="form-control"
                  id="approvalStartDate"
                  max="<?php echo date('Y-m-d'); ?>"
                />
                <small id="approvalStartDateError" style="color:red; display:none;">
                  Start date cannot be in the future.
                </small>
                </div>
                <div class="form-group">
                <label>End Date</label>
                <input
                  type="date"
                  name="nca_approval_end_date"
                  class="form-control"
                  id="approvalEndDate"
                  max="<?php echo date('Y-m-d'); ?>"
                />
                <small id="approvalEndDateError" style="color:red; display:none;">
                  End date cannot be in the future or before the start date.
                </small>
                </div>
                <div class="formm-control">
                  <label>NCA Approval Copy</label>
                  <input type="file" name="nca_approval_copy" class="form-control" id="ncaApprovalCopy">
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-sm" id="closeNcaApprovalBtn" type="button"
                  style="background-color: #cc0001; color:#fff;">Save & Close</button>
              </div>
            </div>
            <div class="form-group">
              <label>Do You a Local Government Approval</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="local_gov_approval"
                      onclick="showLocalGovernmentApproval();" value="Yes" id="localGovApproval">
                    <label for="localGovApproval"> Yes
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="local_gov_approval"
                      onclick="hideLocalGovernmentApproval();" value="No" id="noLocalGov">
                    <label for="noLocalGov"> No
                    </label>
                  </div>
                </div>
              </div>
              <div class="card" id="localGovSpecifications" style="display: none;">
                <div class="card-header"><b>Local Government Approval Details</b></div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Approval Number</label>
                    <input type="text" name="local_gov_approval_no" class="form-control" id="localGovApprovalNo">
                  </div>
                  <div class="form-group">
                    <label>Approval Date</label>
                    <input type="date" name="local_gov_approval_date" class="form-control" id="localGovApprovalDate">
                  </div>
                  <div class="form-group">
                    <label>Approval Copy</label>
                    <input type="file" class="form-control" id="localGovApprovalCopy">
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-sm" id="closeLocalGovSpecifications" type="button"
                    style="background-color: #cc0001; color:#fff;">Save & Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Do you have NEMA Approval</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="nema_approval" onclick="nemaApprovalShow();"
                      id="nemaApprovalYes" value="Yes">
                    <label for="nemaApprovalYes"> Yes
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                    <input type="radio" name="nema_approval" onclick="nemaApprovalHide();"
                      id="nemaApprovalNo" value="No">
                    <label for="nemaApprovalNo"> No
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="card" id="nemaApprovalSpecify" style="display: none;">
              <div class="card-header"><b>NEMA Approval Specifications</b></div>
              <div class="card-body">
                <div class="form-group">
                <label>Approval Number</label>
                <input
                  type="text"
                  name="nema_approval_no"
                  class="form-control"
                  id="nemaApprovalNumber"
                  placeholder="Approval Number (e.g. NEMA/WM/DA/1081)"
                  pattern="^NEMA\/EIA\/PS\/\d{4}$"
                  title="Format: NEMA/WM/DA/1081"

                  oninput="validateNemaApproval()"
                />
                <small id="nemaApprovalError" style="color:red; display:none;">
                  Format must be NEMA/WM/DA/1081
                </small>
                </div>
                <div class="form-group">
                <label>Approval Date</label>
                <input
                  type="date"
                  name="nema_approval_date"
                  class="form-control"
                  id="nemaApprovalDate"

                />
                <small id="nemaDateError" style="color:red; display:none;">Date cannot be in the future.</small>

                </div>
                <div class="form-group">
                  <label>Approval Copy</label>
                  <input type="file"  class="form-control" id="nemaApprovalCopy">
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-sm" id="closeNemaApproval" type="button"
                  style="background-color: #cc0001; color:#fff;">Save & Close</button>
              </div>
            </div>
            <div class="form-group">
            <label >TAX PIN for the Building(Optional)</label>
                <input
                  type="text"
                  name="building_tax_pin"
                  class="form-control"
                  id="buildingTaxPin"
                  placeholder="TAX PIN for the Building (e.g. P123456789B)"
                  pattern="^P\d{9}B$"
                  title="TAX PIN must be in the format P123456789B"
                  oninput="validateTaxPin()"
                />
                <small id="taxPinError" style="color:red; display:none;">Format: P123456789B (1 letter, 9 digits, 1 letter)</small>

            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepFiveBackBtn">Back</button>
        <button type="button" class="btn btn-sm next-btn" id="stepFiveNextBtn">Next</button>
      </div>
    </div>
    <!-- Section Six Insurance Information -->
    <div class="card" id="sectionSix">
      <div class="card-header" style="background-color: #00192D;" ><b style="color:#FFC107;" >Insurance and Financial Information</b></div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Do your Building have Insurance Cover?</label>
              <div class="row">
                <div class="col-md-6">
                  <div class="icheck-dark d-inline">
                   <input type="radio" name="insurance_cover" id="yesInsurance"
  onclick="handleInsuranceSelection('Yes');" value="Yes">
<label for="yesInsurance"> Yes</label>
                  </div>

                </div>
                <div class="col-md-6">
                <div class="icheck-dark d-inline">
                    <input type="radio" name="insurance_cover" id="noInsurance"
  onclick="handleInsuranceSelection('No');" value="No">
<label for="noInsurance"> No</label>
                  </div>


                </div>
              </div>
              <div class="card mt-2" id="specifyInsuranceCoverInfoCard" style="display: none;">
                <div class="card-header"><b>Insurance Cover Details</b></div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Specify Insurance Policy</label>
                    <input type="text" name="insurance_policy" class="form-control" id="insurance_policy"
                      placeholder="Insurance Policy">
                  </div>
                  <div class="form-group">
                    <label>Insurance Policy Provider</label>
                    <input type="text" class="form-control" name="insurance_provider" id="insurance_provider"
                      placeholder="Insurance Policy Provider">
                  </div>
                  <div class="form-group">
                    <label>Covered From</label>
                    <input type="date" class="form-control"  name="policy_from_date"  id="policy_from_date">
                  </div>
                  <div class="form-group">
                    <label>Covered Until</label>
                    <input type="date" name="policy_until_date" class="form-control" id="policy_until_date">
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-sm" id="closeInsuranceInfoBtn"
                    style="background-color: #cc0001; color:#fff">Save & Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepSixBackBtn">Back</button>
        <button type="button" class="btn btn-sm next-btn" id="stepSixNextBtn">Next</button>
      </div>
    </div>
    <!-- Section Seven Photos -->
    <div class="card" id="sectionSeven">
      <div class="card-header" style="background-color: #00192D;" ><b style="color:#FFC107;" >Photographs and Documentations</b></div>
      <div class="card-body">
      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Front View</label>
          <input type="file" class="form-control" name="front_view_photo" id="front_view_photo" accept="image/*">
          <img id="preview_front_view" src="#" alt="Front View Preview" style="max-width: 25%; max-height:25%; margin-top: 10px; display: none;">
        </div>

        <div class="form-group">
          <label>Rear View</label>
          <input type="file" class="form-control" name="rear_view_photo" id="rear_view_photo" accept="image/*">
          <img id="preview_rear_view" src="#" alt="Rear View Preview" style="max-width: 25%; max-height:25%; margin-top: 10px; display: none;">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Angle View</label>
          <input type="file" class="form-control" name="angle_view_photo" id="angle_view_photo" accept="image/*">
          <img id="preview_angle_view" src="#" alt="Angle View Preview" style="max-width: 25%; max-height:25%; margin-top: 10px; display: none;">
        </div>

        <div class="form-group">
          <label>Interior</label>
          <input type="file" class="form-control" name="interior_view_photo" id="interior_view_photo" accept="image/*">
          <img id="preview_interior_view" src="#" alt="Interior View Preview" style="max-width: 25%; max-height:25%; margin-top: 10px; display: none;">
        </div>
      </div>
    </div>
    </div>

      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepSevenBackBtn">Back</button>
        <button type="button" class="btn btn-sm next-btn" id="stepSevenNextBtn">Next</button>
      </div>
    </div>
    <!-- Section Eight Confirmation -->
    <div class="card" id="sectionEight">
      <div class="card-header" style="background-color: #00192D;" ><b style="color:#FFC107;" >Confirmation</b></div>
      <div class="card-body text-center">
        <input type="checkbox" required> I here by confirm that all the
        information filled in this form is accurare. I therefore issue my
        consent to Biccount Technologies to go ahead and register my rental
        property for further property management services that I will be
        receiving.
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-danger btn-sm back-btn"
          id="stepEightBackBtn">Back</button>
        <button type="submit" class="btn btn-sm next-btn" id="stepEightNextBtn">Submit</button>
      </div>
    </div>
  </form>


      <!-- Specify Solar Avilability DOM -->

<!-- registered buildings -->

      <hr>
      <!--begin::Row-->
<div class="row">
<div class="col-md-12">
<div class="card mb-4">
 <div class="card-header" style="background-color: #00192D;" >
   <h5 class="card-title text-warning" style="font-size: 20px; font-weight: bold;">Registered Buildings</h5>
   <div class="card-tools">
     <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
       <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
       <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
     </button>
     <div class="btn-group">
       <button type="button" class="btn btn-tool dropdown-toggle" data-bs-toggle="dropdown">
         <i class="bi bi-wrench"></i>
       </button>
       <div class="dropdown-menu dropdown-menu-end" role="menu">
         <a href="#" class="dropdown-item">Action</a>
         <a href="#" class="dropdown-item">Another action</a>
         <a href="#" class="dropdown-item">Something else here</a>
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
   <div class="row">
     <table id="myTableOne" class="display table table-striped table-hover" style="width: 100%; font-size: 16px;">
       <thead class="table">
         <tr>
           <th>Property</th>
           <th >Location</th>
           <th >Tenant</th>
           <th >Ownership Information</th>
           <th >Building Type</th>
           <th >Action</th>
         </tr>
       </thead>
       <tbody>
       <?php foreach ($buildings as $building): ?>
    <tr onclick="window.open('Units.php?building_id=<?= $building['building_id'] ?>', '_blank')">
    <td><?= htmlspecialchars($building['building_name'])?></td>
    <td><?= htmlspecialchars($building['county'])?></td>
    <td>Patrick Musila</td> <!-- Replace with dynamic tenant if needed -->
    <td><?=htmlspecialchars($building['ownership_info'])?></td> <!-- Manager goes here -->
    <td><?= htmlspecialchars($building['building_type']) ?></td>
    <td>
      <button class="btn btn-sm" style="background-color: #193042; color:#FFC107; margin-right: 2px;" data-toggle="modal" data-target="#assignPlumberModal" title="View">
        <i class="fas fa-eye">VIEW</i>
      </button>
      <button onclick="handleDelete(event, <?= $building['building_id'] ?>, 'building')"
        class="btn btn-sm"
        style="background-color: red; color: white;">
    <i class="fa fa-trash" data-toggle="tooltip" title="Delete Building" style="font-size: 12px;"></i>
   </button>


    </td>
  </tr>
<?php endforeach; ?>
       </tbody>
     </table>

                    <!--end::Row-->
                  </div>
                  <!-- ./card-body -->
                  <!-- <div class="card-footer"> -->
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


             <!-- units popup -->



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
$(document).ready((function(){$("#stepOneNextBtn").click((function(e){e.preventDefault(),$("#sectionTwo").show(),$("#sectionOne").hide(),$("#stepOneIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepOneIndicatorNo").css("background-color","#FFC107"),$("#stepOneIndicatorNo").css("color","#00192D"),$("#stepOneIndicatorText").html("Done")})),$("#stepTwoBackBtn").click((function(e){e.preventDefault(),$("#sectionTwo").hide(),$("#sectionOne").show(),$("#stepOneIndicatorNo").html("1"),$("#stepOneIndicatorNo").css("background-color","#00192D"),$("#stepOneIndicatorNo").css("color","#FFC107"),$("#stepOneIndicatorText").html("Overview")})),$("#stepTwoNextBtn").click((function(e){e.preventDefault(),$("#sectionTwo").hide(),$("#sectionThree").show(),$("#stepTwoIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepTwoIndicatorNo").css("background-color","#FFC107"),$("#stepTwoIndicatorNo").css("color","#00192D"),$("#stepTwoIndicatorText").html("Done")})),$("#stepThreeBackBtn").click((function(e){e.preventDefault(),$("#sectionTwo").show(),$("#sectionThree").hide(),$("#stepTwoIndicatorNo").html("2"),$("#stepTwoIndicatorNo").css("background-color","#00192D"),$("#stepTwoIndicatorNo").css("color","#FFC107"),$("#stepTwoIndicatorText").html("Identification")})),$("#stepThreeNextBtn").click((function(e){e.preventDefault(),$("#sectionThree").hide(),$("#sectionFour").show(),$("#stepThreeIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepThreeIndicatorNo").css("background-color","#FFC107"),$("#stepThreeIndicatorNo").css("color","#00192D"),$("#stepThreeIndicatorText").html("Done")})),$("#stepFourBackBtn").click((function(e){e.preventDefault(),$("#sectionThree").show(),$("#sectionFour").hide(),$("#stepThreeIndicatorNo").html("3"),$("#stepThreeIndicatorNo").css("background-color","#00192D"),$("#stepThreeIndicatorNo").css("color","#FFC107"),$("#stepThreeIndicatorText").html("Ownership")})),$("#stepFourNextBtn").click((function(e){e.preventDefault(),$("#sectionFour").hide(),$("#sectionFive").show(),$("#stepFourIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepFourIndicatorNo").css("background-color","#FFC107"),$("#stepFourIndicatorNo").css("color","#00192D"),$("#stepFourIndicatorText").html("Done")})),$("#stepFiveBackBtn").click((function(e){e.preventDefault(),$("#sectionFour").show(),$("#sectionFive").hide(),$("#stepFourIndicatorNo").html("4"),$("#stepFourIndicatorNo").css("background-color","#00192D"),$("#stepFourIndicatorNo").css("color","#FFC107"),$("#stepFourIndicatorText").html("Utilities")})),$("#stepFiveNextBtn").click((function(e){e.preventDefault(),$("#sectionFive").hide(),$("#sectionSix").show(),$("#stepFiveIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepFiveIndicatorNo").css("background-color","#FFC107"),$("#stepFiveIndicatorNo").css("color","#00192D"),$("#stepFiveIndicatorText").html("Done")})),$("#stepSixBackBtn").click((function(e){e.preventDefault(),$("#sectionFive").show(),$("#sectionSix").hide(),$("#stepFiveIndicatorNo").html("5"),$("#stepFiveIndicatorNo").css("background-color","#00192D"),$("#stepFiveIndicatorNo").css("color","#FFC107"),$("#stepFiveIndicatorText").html("Regulations")})),$("#stepSixNextBtn").click((function(e){e.preventDefault(),$("#sectionSix").hide(),$("#sectionSeven").show(),$("#stepSixIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepSixIndicatorNo").css("background-color","#FFC107"),$("#stepSixIndicatorNo").css("color","#00192D"),$("#stepSixIndicatorText").html("Done")})),$("#stepSevenBackBtn").click((function(e){e.preventDefault(),$("#sectionSix").show(),$("#sectionSeven").hide(),$("#stepSixIndicatorNo").html("6"),$("#stepSixIndicatorNo").css("background-color","#00192D"),$("#stepSixIndicatorNo").css("color","#FFC107"),$("#stepSixIndicatorText").html("Insurance")})),$("#stepSevenNextBtn").click((function(e){e.preventDefault(),$("#sectionSeven").hide(),$("#sectionEight").show(),$("#stepSevenIndicatorNo").html('<i class="fa fa-check"><i>'),$("#stepSevenIndicatorNo").css("background-color","#FFC107"),$("#stepSevenIndicatorNo").css("color","#00192D"),$("#stepSevenIndicatorText").html("Done")})),$("#stepEightBackBtn").click((function(e){e.preventDefault(),$("#sectionSeven").show(),$("#sectionEight").hide(),$("#stepSevenIndicatorNo").html("7"),$("#stepSevenIndicatorNo").css("background-color","#00192D"),$("#stepSevenIndicatorNo").css("color","#FFC107"),$("#stepSevenIndicatorText").html("Photos")}))}));
  // </script>
  <!-- <script>
    function validateFirstName(name) {
  const regex = /^[A-Za-z]+$/;
  return regex.test(name);
}
  </script> -->
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

<script
  src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
  integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
  crossorigin="anonymous"
></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  const input = document.getElementById('firstName');
  const errorMsg = document.getElementById('firstNameError');

  if (input && errorMsg) {
    input.addEventListener('input', validateFirstName);
  }
});

function validateFirstName() {
  const input = document.getElementById('firstName');
  const errorMsg = document.getElementById('firstNameError');
  const regex = /^[A-Za-z]+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only letters allowed');
  }
}

</script>

<script>
function validateLastName() {
  const input = document.getElementById('lastName');
  const errorMsg = document.getElementById('lastNameError');
  const regex = /^[A-Za-z]+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only letters allowed');
  }
}
</script>

<!-- <script>
function updatePhoneValidation() {
  const selectedOption = document.querySelector('#countryCode option:checked');
  const pattern = selectedOption.getAttribute('data-pattern');
  const placeholder = selectedOption.getAttribute('data-placeholder');
  const maxlength = selectedOption.getAttribute('data-maxlength');

  const phoneInput = document.getElementById('phoneNumber');
  phoneInput.setAttribute('pattern', pattern);
  phoneInput.setAttribute('placeholder', placeholder);
  phoneInput.setAttribute('maxlength', maxlength);

  // Re-validate on change
  validatePhoneNumber();
}

function validatePhoneNumber() {
  const phoneInput = document.getElementById('phoneNumber');
  const pattern = new RegExp(phoneInput.getAttribute('pattern'));
  const errorLabel = document.getElementById('phoneNumberError');

  if (!pattern.test(phoneInput.value)) {
    errorLabel.style.display = 'inline';
  } else {
    errorLabel.style.display = 'none';
  }
}

// Initialize on page load
window.onload = updatePhoneValidation;
</script> -->


<script>
function validateKraPin() {
  const input = document.getElementById('kra_pin');
  const errorMsg = document.getElementById('kraPinError');
  const regex = /^[A-Z]{1}\d{9}[A-Z]{1}$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Format: A123456789K');
  }
}
</script>

<script>
function validateEmail() {
  const input = document.getElementById('ownerEmail');
  const errorMsg = document.getElementById('emailError');
  const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Please enter a valid email address.');
  }
}
</script>

<script>
function validateEntityName() {
  const input = document.getElementById('entityName');
  const errorMsg = document.getElementById('entityNameError');
  const regex = /^[A-Za-z\s]+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only letters and spaces are allowed.');
  }
}
</script>

<script>
function validateEntityPhone() {
  const input = document.getElementById('entityPhone');
  const errorMsg = document.getElementById('entityPhoneError');
  const regex = /^07\d{8}$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Phone must start with 07 and be 10 digits');
  }
}
</script>

<script>
function validateEntityEmail() {
  const input = document.getElementById('entityEmail');
  const errorMsg = document.getElementById('entityEmailError');
  const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Please enter a valid email address.');
  }
}
</script>


<script>
function validateEntityRepresentative() {
  const input = document.getElementById('entityRepresentative');
  const errorMsg = document.getElementById('entityRepresentativeError');
  const regex = /^[A-Za-z\s]+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only letters and spaces are allowed.');
  }
}
</script>

<script>
function validateSolarBrand() {
  const input = document.getElementById('solarBrand');
  const errorMsg = document.getElementById('solarBrandError');
  const regex = /^[A-Za-z\s]+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only letters and spaces are allowed.');
  }
}
</script>

<script>
function validateInstallationCompany() {
  const input = document.getElementById('installationCompany');
  const errorMsg = document.getElementById('installationCompanyError');
  const regex = /^[A-Za-z\s]+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only letters and spaces are allowed.');
  }
}
</script>

<script>
function validateNoOfPanels() {
  const input = document.getElementById('noOfPanels');
  const errorMsg = document.getElementById('noOfPanelsError');
  const regex = /^\d+$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Only numeric values are allowed.');
  }
}
</script>


<script>
function validateApprovalDate() {
  const input = document.getElementById('approvalDate');
  const errorMsg = document.getElementById('approvalDateError');
  const today = new Date().toISOString().split('T')[0];

  if (input.value && input.value > today) {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Approval date cannot be in the future.');
  } else {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  }
}

document.getElementById('approvalDate').addEventListener('input', validateApprovalDate);
</script>

<script>
function validateNemaApproval() {
  const input = document.getElementById('nemaApprovalNumber');
  const errorMsg = document.getElementById('nemaApprovalError');
  const regex = /^NEMA\/WM\/DA\/\d{4}$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Format must be NEMA/WM/DA/1081');
  }
}
</script>

<script>
function restrictFutureDate() {
  const dateInput = document.getElementById('nemaApprovalDate');
  const errorMsg = document.getElementById('nemaDateError');
  const today = new Date().toISOString().split('T')[0];

  dateInput.setAttribute('max', today);

  dateInput.addEventListener('change', () => {
    if (dateInput.value > today) {
      errorMsg.style.display = 'block';
      dateInput.setCustomValidity("Date cannot be in the future.");
    } else {
      errorMsg.style.display = 'none';
      dateInput.setCustomValidity('');
    }
  });
}

document.addEventListener('DOMContentLoaded', restrictFutureDate);
</script>


<script>
function validateTaxPin() {
  const input = document.getElementById('buildingTaxPin');
  const errorMsg = document.getElementById('taxPinError');
  const regex = /^P\d{9}B$/;

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('TAX PIN must be in the format P123456789B (1 letter, 9 digits, 1 letter)');
  }
}
</script>

<script>
function validateFloorNumber() {
  const input = document.getElementById('floorNumber');
  const errorMsg = document.getElementById('floorNumberError');
  const regex = /^\d+$/;  // Ensures only numbers are allowed

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Please enter a valid number for the number of floors.');
  }
}
</script>

<script>
function validateUnitsNumber() {
  const input = document.getElementById('unitsnumber');
  const errorMsg = document.getElementById('unitsNumberError');
  const regex = /^\d+$/;  // Ensures only numbers are allowed

  if (input.value === '' || regex.test(input.value)) {
    errorMsg.style.display = 'none';
    input.setCustomValidity('');
  } else {
    errorMsg.style.display = 'block';
    input.setCustomValidity('Please enter a valid number for the number of units.');
  }
}
</script>

<!-- <script>
  function checkPhoneNumberExists() {
  const phone = document.getElementById("phoneNumber").value;
  const existsError = document.getElementById("phoneNumberExistsError");

  if (phone.length === 10) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "check_phone_exists.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        if (xhr.responseText.trim() === "exists") {
          existsError.style.display = "block";
        } else {
          existsError.style.display = "none";
        }
      }
    };
    xhr.send("phone=" + encodeURIComponent(phone));
  }}
</script> -->

<script>

//Step by Step Building Registration and Validations DOM -->
$(document).ready(function() {

$("#stepOneNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionTwo").show();
    $("#sectionOne").hide();

    $("#stepOneIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepOneIndicatorNo").css('background-color', '#FFC107');
    $("#stepOneIndicatorNo").css('color', '#00192D');
    $("#stepOneIndicatorText").html('Done');
});

$("#stepTwoBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionTwo").hide();
    $("#sectionOne").show();

    $("#stepOneIndicatorNo").html('1');
    $("#stepOneIndicatorNo").css('background-color', '#00192D');
    $("#stepOneIndicatorNo").css('color', '#FFC107');
    $("#stepOneIndicatorText").html('Overview');
});

$("#stepTwoNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionTwo").hide();
    $("#sectionThree").show();

    $("#stepTwoIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepTwoIndicatorNo").css('background-color', '#FFC107');
    $("#stepTwoIndicatorNo").css('color', '#00192D');
    $("#stepTwoIndicatorText").html('Done');
});

$("#stepThreeBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionTwo").show();
    $("#sectionThree").hide();

    $("#stepTwoIndicatorNo").html('2');
    $("#stepTwoIndicatorNo").css('background-color', '#00192D');
    $("#stepTwoIndicatorNo").css('color', '#FFC107');
    $("#stepTwoIndicatorText").html('Identification');
});

$("#stepThreeNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionThree").hide();
    $("#sectionFour").show();

    $("#stepThreeIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepThreeIndicatorNo").css('background-color', '#FFC107');
    $("#stepThreeIndicatorNo").css('color', '#00192D');
    $("#stepThreeIndicatorText").html('Done');
});

$("#stepFourBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionThree").show();
    $("#sectionFour").hide();

    $("#stepThreeIndicatorNo").html('3');
    $("#stepThreeIndicatorNo").css('background-color', '#00192D');
    $("#stepThreeIndicatorNo").css('color', '#FFC107');
    $("#stepThreeIndicatorText").html('Ownership');
});

$("#stepFourNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionFour").hide();
    $("#sectionFive").show();

    $("#stepFourIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepFourIndicatorNo").css('background-color', '#FFC107');
    $("#stepFourIndicatorNo").css('color', '#00192D');
    $("#stepFourIndicatorText").html('Done');
});

$("#stepFiveBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionFour").show();
    $("#sectionFive").hide();

    $("#stepFourIndicatorNo").html('4');
    $("#stepFourIndicatorNo").css('background-color', '#00192D');
    $("#stepFourIndicatorNo").css('color', '#FFC107');
    $("#stepFourIndicatorText").html('Utilities');
});

$("#stepFiveNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionFive").hide();
    $("#sectionSix").show();

    $("#stepFiveIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepFiveIndicatorNo").css('background-color', '#FFC107');
    $("#stepFiveIndicatorNo").css('color', '#00192D');
    $("#stepFiveIndicatorText").html('Done');
});

$("#stepSixBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionFive").show();
    $("#sectionSix").hide();

    $("#stepFiveIndicatorNo").html('5');
    $("#stepFiveIndicatorNo").css('background-color', '#00192D');
    $("#stepFiveIndicatorNo").css('color', '#FFC107');
    $("#stepFiveIndicatorText").html('Regulations');
});

$("#stepSixNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionSix").hide();
    $("#sectionSeven").show();

    $("#stepSixIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepSixIndicatorNo").css('background-color', '#FFC107');
    $("#stepSixIndicatorNo").css('color', '#00192D');
    $("#stepSixIndicatorText").html('Done');
});

$("#stepSevenBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionSix").show();
    $("#sectionSeven").hide();

    $("#stepSixIndicatorNo").html('6');
    $("#stepSixIndicatorNo").css('background-color', '#00192D');
    $("#stepSixIndicatorNo").css('color', '#FFC107');
    $("#stepSixIndicatorText").html('Insurance');
});

$("#stepSevenNextBtn").click(function(e) {
    e.preventDefault();
    $("#sectionSeven").hide();
    $("#sectionEight").show();

    $("#stepSevenIndicatorNo").html('<i class="fa fa-check"><i>');
    $("#stepSevenIndicatorNo").css('background-color', '#FFC107');
    $("#stepSevenIndicatorNo").css('color', '#00192D');
    $("#stepSevenIndicatorText").html('Done');
});

$("#stepEightBackBtn").click(function(e) {
    e.preventDefault();
    $("#sectionSeven").show();
    $("#sectionEight").hide();

    $("#stepSevenIndicatorNo").html('7');
    $("#stepSevenIndicatorNo").css('background-color', '#00192D');
    $("#stepSevenIndicatorNo").css('color', '#FFC107');
    $("#stepSevenIndicatorText").html('Photos');
});

});
</script>

<!-- <script>
  function updatePhoneValidation() {
    const select = document.getElementById('entitycountryCode');
    const input = document.getElementById('entityphoneNumber');
    const selected = select.options[select.selectedIndex];

    const pattern = selected.dataset.pattern;
    const placeholder = selected.dataset.placeholder;
    const maxLength = selected.dataset.maxlength;

    input.setAttribute('pattern', pattern);
    input.setAttribute('maxlength', maxLength);
    input.setAttribute('placeholder', placeholder);
  }

  function validatePhoneNumber() {
    const input = document.getElementById('entityphoneNumber');
    const pattern = new RegExp(input.getAttribute('pattern'));
    const errorMsg = document.getElementById('phoneNumberError');

    if (input.value === '' || pattern.test(input.value)) {
      errorMsg.style.display = 'none';
      input.setCustomValidity('');
    } else {
      errorMsg.style.display = 'inline';
      input.setCustomValidity('Invalid phone number format');
    }
  }

  function checkPhoneNumberExists() {
    // Placeholder function – implement your backend check here if needed
    const exists = false; // simulate result
    const existMsg = document.getElementById('phoneNumberExists');
    existMsg.style.display = exists ? 'inline' : 'none';
  }

  // Initialize on load
  document.addEventListener('DOMContentLoaded', updatePhoneValidation);
</script> -->

<script>
function validateEmailFormat() {
  const emailInput = document.getElementById('entityEmail');
  const errorFormat = document.getElementById('emailFormatError');
  const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (emailInput.value === '' || pattern.test(emailInput.value)) {
    errorFormat.style.display = 'none';
    emailInput.setCustomValidity('');
  } else {
    errorFormat.style.display = 'inline';
    emailInput.setCustomValidity('Invalid email format');
  }
}

function checkEmailExists() {
  const email = document.getElementById('entityEmail').value;
  const errorExists = document.getElementById('emailExistsError');

  if (email === '') return;

  fetch('check_email.php?email=' + encodeURIComponent(email))
    .then(response => response.json())
    .then(data => {
      if (data.exists) {
        errorExists.style.display = 'inline';
        document.getElementById('entityEmail').setCustomValidity('Email already exists');
      } else {
        errorExists.style.display = 'none';
        document.getElementById('entityEmail').setCustomValidity('');
      }
    })
    .catch(err => {
      console.error('Error checking email:', err);
    });
}
</script>
<script>
function validateEmail() {
  const emailInput = document.getElementById("ownerEmail");
  const emailError = document.getElementById("emailError");
  const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

  if (!emailPattern.test(emailInput.value)) {
    emailError.style.display = "block";
    emailInput.setCustomValidity("Invalid email address");
  } else {
    emailError.style.display = "none";
    emailInput.setCustomValidity("");
  }
}
</script>

<script>
function validateEntityEmail() {
  const emailInput = document.getElementById("entityEmail");
  const emailError = document.getElementById("entityEmailError");
  const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;

  if (!emailPattern.test(emailInput.value)) {
    emailError.style.display = "block";
    emailInput.setCustomValidity("Invalid email address");
  } else {
    emailError.style.display = "none";
    emailInput.setCustomValidity("");
  }
}
</script>

<script>
function previewImage(inputId, imgId) {
  const input = document.getElementById(inputId);
  const img = document.getElementById(imgId);

  input.addEventListener('change', function () {
    const file = input.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        img.src = e.target.result;
        img.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      img.style.display = 'none';
    }
  });
}

// Initialize previews for each field
previewImage('front_view_photo', 'preview_front_view');
previewImage('rear_view_photo', 'preview_rear_view');
previewImage('angle_view_photo', 'preview_angle_view');
previewImage('interior_view_photo', 'preview_interior_view');
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    const form = document.querySelector('form');

    // Add submit event listener
    form.addEventListener('submit', function(e) {
        if (!validateForm()) {
            e.preventDefault(); // Prevent form submission if validation fails
        }
    });

    // Function to validate the entire form
    function validateForm() {
        let isValid = true;
        let errorMessage = "Please fill in the following required fields:\n";

        // Section Two: Building Identification Information
        if (!document.getElementById('buildingName').value) {
            errorMessage += "- Building Name\n";
            isValid = false;
        }
        if (!document.getElementById('county').value) {
            errorMessage += "- County\n";
            isValid = false;
        }
        if (!document.getElementById('constituency').value) {
            errorMessage += "- Constituency\n";
            isValid = false;
        }
        if (!document.getElementById('ward').value) {
            errorMessage += "- Ward\n";
            isValid = false;
        }
        if (!document.getElementById('floorNumber').value) {
            errorMessage += "- Number of Floors\n";
            isValid = false;
        }
        if (!document.getElementById('unitsnumber').value) {
            errorMessage += "- Number of Units\n";
            isValid = false;
        }
        if (!document.getElementById('buildingType').value) {
            errorMessage += "- Building Type\n";
            isValid = false;
        }

        // Section Three: Ownership Information
        const ownershipRadio = document.querySelector('input[name="ownership_info"]:checked');
        if (!ownershipRadio) {
            errorMessage += "- Building Owned By (Individual/Entity)\n";
            isValid = false;
        } else {
            if (ownershipRadio.value === "Individual") {
                if (!document.getElementById('firstName').value) {
                    errorMessage += "- First Name (Individual Owner)\n";
                    isValid = false;
                }
                if (!document.getElementById('lastName').value) {
                    errorMessage += "- Last Name (Individual Owner)\n";
                    isValid = false;
                }
                if (!document.getElementById('phoneNumber').value) {
                    errorMessage += "- Phone Number (Individual Owner)\n";
                    isValid = false;
                }
            } else if (ownershipRadio.value === "Entity") {
                if (!document.getElementById('entityName').value) {
                    errorMessage += "- Entity Name\n";
                    isValid = false;
                }
                if (!document.getElementById('entity_phoneNumber').value) {
                    errorMessage += "- Entity Phone Number\n";
                    isValid = false;
                }
            }
        }

        // Section Five: Legal and Regulatory Details
        const ncaApproval = document.querySelector('input[name="nca_approval"]:checked');
        if (ncaApproval && ncaApproval.value === "Yes") {
            if (!document.getElementById('approvalNo').value) {
                errorMessage += "- NCA Approval Number\n";
                isValid = false;
            }
        }

        const nemaApproval = document.querySelector('input[name="nema_approval"]:checked');
        if (nemaApproval && nemaApproval.value === "Yes") {
            if (!document.getElementById('nemaApprovalNumber').value) {
                errorMessage += "- NEMA Approval Number\n";
                isValid = false;
            }
        }

        // Section Eight: Confirmation
        if (!document.querySelector('#sectionEight input[type="checkbox"]:checked')) {
            errorMessage += "- Confirmation Checkbox\n";
            isValid = false;
        }

        // If form is not valid, show alert with missing fields
        if (!isValid) {
            alert(errorMessage);

            // Scroll to the first invalid field
            const firstInvalidField = document.querySelector(
                '#buildingName:invalid, ' +
                '#county:invalid, ' +
                '#constituency:invalid, ' +
                '#ward:invalid, ' +
                '#floorNumber:invalid, ' +
                '#unitsnumber:invalid, ' +
                '#buildingType:invalid, ' +
                '#firstName:invalid, ' +
                '#lastName:invalid, ' +
                '#phoneNumber:invalid, ' +
                '#entityName:invalid, ' +
                '#entity_phoneNumber:invalid, ' +
                '#approvalNo:invalid, ' +
                '#nemaApprovalNumber:invalid'
            );

            if (firstInvalidField) {
                firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalidField.focus();
            }
        }

        return isValid;
    }

    // Add real-time validation for each section as users navigate
    const nextButtons = document.querySelectorAll('.next-btn');
    nextButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentSection = this.closest('.card');
            const nextSection = currentSection.nextElementSibling;

            if (validateCurrentSection(currentSection)) {
                currentSection.style.display = 'none';
                nextSection.style.display = 'block';
                nextSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Back buttons functionality
    const backButtons = document.querySelectorAll('.back-btn');
    backButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentSection = this.closest('.card');
            const prevSection = currentSection.previousElementSibling;

            currentSection.style.display = 'none';
            prevSection.style.display = 'block';
            prevSection.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // Function to validate current section
    function validateCurrentSection(section) {
        let isValid = true;
        let errorMessage = "Please fill in the following required fields:\n";

        // Section Two validation
        if (section.id === 'sectionTwo') {
            if (!document.getElementById('buildingName').value) {
                errorMessage += "- Building Name\n";
                isValid = false;
            }
            if (!document.getElementById('county').value) {
                errorMessage += "- County\n";
                isValid = false;
            }
            if (!document.getElementById('constituency').value) {
                errorMessage += "- Constituency\n";
                isValid = false;
            }
            if (!document.getElementById('ward').value) {
                errorMessage += "- Ward\n";
                isValid = false;
            }
            if (!document.getElementById('floorNumber').value) {
                errorMessage += "- Number of Floors\n";
                isValid = false;
            }
            if (!document.getElementById('unitsnumber').value) {
                errorMessage += "- Number of Units\n";
                isValid = false;
            }
            if (!document.getElementById('buildingType').value) {
                errorMessage += "- Building Type\n";
                isValid = false;
            }
        }

        // Section Three validation
        if (section.id === 'sectionThree') {
            const ownershipRadio = document.querySelector('input[name="ownership_info"]:checked');
            if (!ownershipRadio) {
                errorMessage += "- Building Owned By (Individual/Entity)\n";
                isValid = false;
            } else {
                if (ownershipRadio.value === "Individual") {
                    if (!document.getElementById('firstName').value) {
                        errorMessage += "- First Name (Individual Owner)\n";
                        isValid = false;
                    }
                    if (!document.getElementById('lastName').value) {
                        errorMessage += "- Last Name (Individual Owner)\n";
                        isValid = false;
                    }
                    if (!document.getElementById('phoneNumber').value) {
                        errorMessage += "- Phone Number (Individual Owner)\n";
                        isValid = false;
                    }
                } else if (ownershipRadio.value === "Entity") {
                    if (!document.getElementById('entityName').value) {
                        errorMessage += "- Entity Name\n";
                        isValid = false;
                    }
                    if (!document.getElementById('entity_phoneNumber').value) {
                        errorMessage += "- Entity Phone Number\n";
                        isValid = false;
                    }
                }
            }
        }

         // Section Four validation (Utilities and Infrastructure)
    if (section.id === 'sectionFour') {
        if (!document.getElementById('boreHoleVailability').value) {
            errorMessage += "- Borehole Availability\n";
            isValid = false;
        }

        const solarAvailability = document.querySelector('input[name="solar_availability"]:checked');
        if (!solarAvailability) {
            errorMessage += "- Solar System Availability\n";
            isValid = false;
        } else if (solarAvailability.value === "Yes") {
            if (!document.getElementById('solarBrand').value) {
                errorMessage += "- Solar Panel Brand\n";
                isValid = false;
            }
            if (!document.getElementById('installationCompany').value) {
                errorMessage += "- Installation Company\n";
                isValid = false;
            }
            if (!document.getElementById('noOfPanels').value) {
                errorMessage += "- Number of Panels\n";
                isValid = false;
            }
            if (!document.getElementById('solarPrimaryUse').value) {
                errorMessage += "- Solar Primary Use\n";
                isValid = false;
            }
        }

        if (!document.getElementById('parkingLot').value) {
            errorMessage += "- Parking Lot Availability\n";
            isValid = false;
        }
        if (!document.getElementById('alarmSystem').value) {
            errorMessage += "- Alarm Security System\n";
            isValid = false;
        }
        if (!document.getElementById('elevators').value) {
            errorMessage += "- Elevator Availability\n";
            isValid = false;
        }
        if (!document.getElementById('psds').value) {
            errorMessage += "- PSD's Accessibility\n";
            isValid = false;
        }
        if (!document.getElementById('cctv').value) {
            errorMessage += "- CCTV Availability\n";
            isValid = false;
        }
    }

   // Section Five validation (Legal and Regulatory Details)
if (section.id === 'sectionFive') {
    // NCA Approval
    const ncaApproval = document.querySelector('input[name="nca_approval"]:checked');
    if (!ncaApproval) {
        errorMessage += "- NCA Approval (Yes/No)\n";
        isValid = false;
    } else if (ncaApproval.value === "Yes") {
        if (!document.getElementById('approvalNo').value) {
            errorMessage += "- NCA Approval Number\n";
            isValid = false;
        }
        if (!document.getElementById('approvalStartDate').value) {
            errorMessage += "- NCA Approval Start Date\n";
            isValid = false;
        }
        if (!document.getElementById('approvalEndDate').value) {
            errorMessage += "- NCA Approval End Date\n";
            isValid = false;
        }
    }

    // Local Government Approval
    const localGovApproval = document.querySelector('input[name="local_gov_approval"]:checked');
    if (!localGovApproval) {
        errorMessage += "- Local Government Approval (Yes/No)\n";
        isValid = false;
    } else if (localGovApproval.value === "Yes") {
        if (!document.getElementById('localGovApprovalNo').value) {
            errorMessage += "- Local Government Approval Number\n";
            isValid = false;
        }
        if (!document.getElementById('localGovApprovalDate').value) {
            errorMessage += "- Local Government Approval Date\n";
            isValid = false;
        }
    }

    // NEMA Approval
    const nemaApproval = document.querySelector('input[name="nema_approval"]:checked');
    if (!nemaApproval) {
        errorMessage += "- NEMA Approval (Yes/No)\n";
        isValid = false;
    } else if (nemaApproval.value === "Yes") {
        if (!document.getElementById('nemaApprovalNumber').value) {
            errorMessage += "- NEMA Approval Number\n";
            isValid = false;
        }
        if (!document.getElementById('nemaApprovalDate').value) {
            errorMessage += "- NEMA Approval Date\n";
            isValid = false;
        }
    }
}




    // Section Six validation (Insurance Information)
    if (section.id === 'sectionSix') {
        const insuranceCover = document.querySelector('input[name="insurance_cover"]:checked');
        if (!insuranceCover) {
            errorMessage += "- Insurance Cover\n";
            isValid = false;
        } else if (insuranceCover.value === "Yes") {
            if (!document.getElementById('insurance_policy').value) {
                errorMessage += "- Insurance Policy\n";
                isValid = false;
            }
            if (!document.getElementById('insurance_provider').value) {
                errorMessage += "- Insurance Provider\n";
                isValid = false;
            }
            if (!document.getElementById('policy_from_date').value) {
                errorMessage += "- Policy Start Date\n";
                isValid = false;
            }
            if (!document.getElementById('policy_until_date').value) {
                errorMessage += "- Policy End Date\n";
                isValid = false;
            }
        }
    }

// Section Seven validation (Photos)
if (section.id === 'sectionSeven') {
        if (!document.getElementById('front_view_photo').files.length) {
            errorMessage += "- Front View Photo\n";
            isValid = false;
        }
        if (!document.getElementById('rear_view_photo').files.length) {
            errorMessage += "- Rear View Photo\n";
            isValid = false;
        }
        if (!document.getElementById('angle_view_photo').files.length) {
            errorMessage += "- Angle View Photo\n";
            isValid = false;
        }
        if (!document.getElementById('interior_view_photo').files.length) {
            errorMessage += "- Interior Photo\n";
            isValid = false;
        }
    }


       // Section Eight validation (Confirmation)
       if (section.id === 'sectionEight') {
        if (!document.querySelector('#sectionEight input[type="checkbox"]:checked')) {
            errorMessage += "- Confirmation Checkbox\n";
            isValid = false;
        }
    }

        // Show error message if validation fails
        if (!isValid) {
            alert(errorMessage);

            // Highlight the first invalid field
            const invalidFields = section.querySelectorAll('input:invalid, select:invalid');
            if (invalidFields.length > 0) {
                invalidFields[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                invalidFields[0].focus();
            }
        }

        return isValid;
    }
});
</script>

<script>
document.getElementById('otherDocumentCopy').addEventListener('change', function () {
  const file = this.files[0];
  const preview = document.getElementById('preview_other_document');
  preview.innerHTML = ''; // Clear previous preview

  if (file) {
    const fileType = file.type;
    const reader = new FileReader();

    reader.onload = function (e) {
      if (fileType.startsWith('image/')) {
        // Image preview
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.maxWidth = '100%';
        preview.appendChild(img);
      } else if (fileType === 'application/pdf') {
        // PDF preview
        const embed = document.createElement('embed');
        embed.src = e.target.result;
        embed.type = 'application/pdf';
        embed.width = '100%';
        embed.height = '400px';
        preview.appendChild(embed);
      } else {
        preview.textContent = 'File preview not supported.';
      }
    };

    reader.readAsDataURL(file);
  }
});
</script>


<script>
  function handleInsuranceSelection(value) {
    const insuranceCard = document.getElementById("specifyInsuranceCoverInfoCard");

    if (value === "Yes") {
      insuranceCard.style.display = "block";
    } else {
      insuranceCard.style.display = "none";

      // Optional: clear fields when "No" is selected
      document.getElementById("insurance_policy").value = "";
      document.getElementById("insurance_provider").value = "";
      document.getElementById("policy_from_date").value = "";
      document.getElementById("policy_until_date").value = "";
    }
  }
</script>



<script src="registration.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="prop.js"></script>

<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
 <script src="../../../dist/js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
 <!--end::OverlayScrollbars Configure-->
 <!-- OPTIONAL SCRIPTS -->
<!-- apexcharts -->
    <end::Script-->
  </body>
  <!--end::Body-->
</html>