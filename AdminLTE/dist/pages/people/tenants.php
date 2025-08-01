
<?php
 include '../db/connect.php';
?>

<?php
  // Fetch tenants with their user details
  $sql = "SELECT
              users.id,
              users.first_name,
              users.email,
              tenants.phone_number,
              tenants.user_id,
              tenants.building_id,
              tenants.id_no,
              tenants.unit_id,
              tenants.status,
              buildings.building_name AS building_name
          FROM tenants
          INNER JOIN users ON tenants.user_id = users.id
          INNER JOIN buildings ON tenants.building_id = buildings.building_id";

  $stmt = $pdo->query($sql);
  $tenantsy = $stmt->fetchAll();


 // Tenants Count
            $count = count($tenantsy);
            $activeTenantsCount  = 0;
            $inactiveTenantsCount = 0;

            foreach ($tenantsy as $tenant) {
                if (strtolower($tenant['status']) === 'active') {
                    $activeTenantsCount++;
                } else {
                    $inactiveTenantsCount++;
                }
            }


            // Fetch building names from the `buildings` table
  try {
    $stmt = $pdo->query("SELECT DISTINCT building_id, building_name FROM buildings ORDER BY building_name ASC");
    $buildings = $stmt->fetchAll();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }

?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tenants</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE | Dashboard v2" />
    <meta name="author" content="ColorlibHQ"/>

    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />

    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />

    <!-- loading out and in progress -->
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




    <!--begin::Third Party Plugin(Multple seclection)-->

      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--end::Third Party Plugin(Mutiple selection)-->




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


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

   <link rel="stylesheet" href="tenants.css">
     <!-- scripts for data_table -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

    <style>
      body{
        overflow: auto;
      }
.app-content{
  flex: 1;
  align-items: stretch;
  display: flex;
  flex-direction: column;
}
.app-content .container-fluid{
  flex: 1;
  align-items: stretch;
  display: flex;
  flex-direction: column;
}
.container-fluid .row.details{
  flex: 1;
  align-items: stretch;
  display: flex;
  flex-direction: column;
}
.col-md-12.details{
  flex: 1;
  align-items: stretch;
  display: flex;
  flex-direction: column;
}
.details-container{
  flex: 1;
  align-items: stretch;
  display: flex;
  flex-direction: column;
}
#building_name{
width: 100%;
}

.menu-group .menu-header .arrow {
  color: #FFC107 !important;
}
    </style>
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper"style="background-color:rgba(128,128,128, 0.1);" >

      <!--begin::Header-->
      <?php include_once '../includes/header.php'?>
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
            <span class="brand-text fw-light">
              <a href="index3.html" class="brand-link">
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
        <!-- <div id="sidebar"></div> -->
        <div > <?php include_once '../includes/sidebar.php'; ?>  </div> <!-- This is where the sidebar is inserted -->

        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
                                                            <!-- MAIN -->
      <!--begin::App Main-->
      <main class="app-main" id="mainElement">

      <section id="tenant-form" class="tenant-form">
                <div class="container">

                    <form id="form_for_tenant" enctype="multipart/form-data" onsubmit="submitTenantForm(event)">
                        <!-- Main Tenant Information Entries -->
                        <div class="card shadow" id="mainTenantCard">
                            <div class="card-header" style="background-color:#00192D; color:#FFC107;">
                                <b>Main Tenant Registration Process</b>
                            </div>
                            <div class="card-body">
                                <div class="media-body">
                                    <!-- Indicators Section Start Here -->
                                    <div class="row mt-2" style="justify-content:center; align-items:center;">
                                        <!-- Step One Personal Information Section -->
                                        <div class="col-md-2 text-center">
                                            <b class="shadow" style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:14px; padding-right:14px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;" id="stepOneIndicatorNo">1</b>
                                            <p class="mt-2" id="stepOneIndicatorText" style="font-size:14px; font-weight:bold;">Personal Information</p>
                                        </div>
                                        <!-- Step Two Occupants Information Details -->
                                        <div class="col-md-2 text-center">
                                            <b class="shadow" style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:14px; padding-right:14px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;" id="stepTwoIndicatorNo">2</b>
                                            <p class="mt-2" id="stepTwoIndicatorText" style="font-size:14px; font-weight:bold;">Occupants &amp; Unit</p>
                                        </div>
                                        <!-- Step Three Pets Ownership Information -->
                                        <div class="col-md-2 text-center">
                                            <b class="shadow" style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:14px; padding-right:14px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;" id="stepThreeIndicatorNo">3</b>
                                            <p class="mt-2" id="stepThreeIndicatorText" style="font-size:14px; font-weight:bold;">Pets Information</p>
                                        </div>
                                        <!-- Step 4 Source of Income Information -->
                                        <div class="col-md-2 text-center">
                                            <b class="shadow" style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:14px; padding-right:14px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;" id="stepFourIndicatorNo">4</b>
                                            <p class="mt-2" id="stepFourIndicatorText" style="font-size:14px; font-weight:bold;">Source of Income</p>
                                        </div>
                                        <!-- Step Five Copy of Agreement Copy Upload  -->
                                        <div class="col-md-2 text-center">
                                            <b class="shadow" style="background-color:#00192D; color:#FFC107; border-radius:35px; padding-left:14px; padding-right:14px; padding-bottom:7px; padding-top:7px; font-size:1.5rem;" id="stepFiveIndicatorNo">5</b>
                                            <p class="mt-2" id="stepFiveIndicatorText" style="font-size:14px; font-weight:bold;">Rental Agreement Copy</p>
                                        </div>
                                    </div>
                                    <!-- Indicators Section End Here -->
                                    <!-- Section One Personal Information -->
                                    <div class="card" id="sectionOnePersonalInfo">
                                        <div class="card-header" style="background-color:#00192D; color:#FFC107;"><b>Personal Information</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>First Name</label> <sup class="text-danger"><b>*</b></sup>
                                                    <input type="text" class="form-control" name="tenant_f_name" id="tenant_f_name" placeholder="First Name">
                                                    <b class="text-danger" id="tenant_f_nameError"></b>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Middle Name</label> <sup class="text-danger"><b>*</b></sup>
                                                    <input type="text" class="form-control" name="tenant_m_name" id="tenant_m_name" placeholder="Middle Name">
                                                    <b class="text-danger" id="tenant_m_nameError"></b>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Last Name</label> <sup class="text-danger"><b>*</b></sup>
                                                    <input type="text" class="form-control" name="tenant_l_name" id="tenant_l_name" placeholder="last name">
                                                    <b class="text-danger" id="tenant_l_nameError"></b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Main Contact Phone</label> <sup class="text-danger"><b>*</b></sup>
                                                        <input type="tel" class="form-control" name="tenant_m_contact" id="tenant_m_contact" placeholder="Main Contact Phone">
                                                    </div>
                                                    <b class="text-danger" id="tenant_m_contactError"></b>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alt Contact Phone</label> <sup class="text-danger"><b>*</b></sup>
                                                        <input type="tel" class="form-control" name="tenant_a_contact" id="tenant_a_contact" placeholder="Alternative Contact Phone">
                                                    </div>
                                                    <b class="text-danger" id="tenant_a_contactError"></b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label> <sup class="text-danger"><b>*</b></sup>
                                                        <input type="email" class="form-control" name="tenant_email" id="tenant_email" placeholder="email" >
                                                        <small id="emailError" class="text-danger" style="display:none;">Please enter a valid email address.</small>

                                                      </div>
                                                    <b class="text-danger" id="tenant_emailError"></b>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Identification No.</label> <sup class="text-danger"><b>*</b></sup>
                                                        <input type="text" class="form-control" name="tenant_id_no" id="tenant_id_no" placeholder="Identification Number" maxlength="8" inputmode="numeric"
                                                        pattern="\d*"
                                                        oninput="this.value = this.value.replace(/\D/g, '')">
                                                    </div>
                                                    <b class="text-danger" id="tenant_id_noError"></b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Upload a Copy of Identification</label>
                                                        <input type="file" class="form-control" name="tenant_id_copy" id="tenant_id_copy">
                                                    </div>
                                                    <b class="text-danger" id="tenant_id_copyError"></b>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">KRA PIN</label>
                                                        <input type="text" class="form-control" name="kra_pin" id="kra_pin"  placeholder="Enter KRA PIN (e.g. A123456789B)"
                                                        title="Format: A123456789B"
                                                        oninput="validateKraPin()" >
                                                        <small id="kraPinError" style="color:red; display:none;">Please enter a valid KRA PIN (Format: A123456789B)</small>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">KRA PIN Copy</label>
                                                        <input type="file" class="form-control" name="kra_pin_copy" id="kra_pin_copy" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="button" class="btn btn-sm next-btn" id="firstStepNextBtn">Next Step</button>
                                        </div>
                                    </div>
                                    <!-- Section Two Occupants Information -->
                                    <div class="card" id="sectionTwoOccpantsInfo" style="display:none;">
                                        <div class="card-header" style="background-color:#00192D; color:#FFC107;"><b>Occupation Information</b></div>
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-md-3">
                                                    <label>Building</label> <sup class="text-danger"><b>*</b></sup>
                                                    <br>
                                                    <select class="form-control" name="building_name" id="building_name">
                                                    <option value="">-- Select Building --</option>
                                                    <?php foreach ($buildings as $building): ?>
                                                        <option value="<?= htmlspecialchars($building['building_id']) ?>">
                                                            <?= htmlspecialchars($building['building_name']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                    <!-- <select class="form-control" name="building_name" id="building_name" > -->
                                                      <!-- <option value="Crown Z">Crown Z</option>
                                                      <option value="Manucho">Manucho</option>
                                                      <option value="Pink House">Pink House</option>
                                                      <option value="White House">White House</option> -->
                                                    <!-- </select> -->
                                                    <b class="text-danger" id="building_nameError"></b>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Unit Type
                                                    </label> <sup class="text-danger"><b>*</b></sup>
                                                    <br>
                                                    <select class="form-control" name="unit_type" id="unit_type" >
                                                      <option value="Residential">Residential</option>
                                                      <option value="Commercial">Commercial</option>

                                                    </select>
                                                    <b class="text-danger" id="unit_nameError"></b>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Floor Number</label> <sup class="text-danger"><b>*</b></sup>
                                                    <input type="number" class="form-control" name="floor_number" id="Floor Number" placeholder="5">
                                                    <b class="text-danger" id="floor_number_nameError"></b>
                                                </div>
                                                <div class="col-md-3">
    <label>Unit</label> <sup class="text-danger"><b>*</b></sup>
    <br>
    <select class="form-control" name="unit_name" id="unit_name" required>
        <option value="">-- Select Unit --</option>
    </select>
    <b class="text-danger" id="unit_nameError"></b>
</div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="button" class="btn btn-danger btn-sm back-btn" id="secondStepPreviousBtn">Back</button>
                                            <button type="button" class="btn btn-sm next-btn" id="secondStepNextBtn">Next Step</button>
                                        </div>
                                    </div>

                                    <!-- Section Three Pets Ownership Information -->
                                    <div class="card" id="sectionThreePetsInfo" style="display:none;">
                                        <div class="card-header" style="background-color:#00192D; color:#FFC206;"><b>Pets Ownership Information</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="form-group"><label>Do you have Pets?</label></div>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch" >

                                                            <input type="radio" class="custom-control-input" value="Yes" name="haspets" id="customSwitchPetYes">
                                                            <input type="hidden" name="petsData" id="petsDataInput">
                                                            <label class="custom-control-label" for="customSwitchPetYes">Yes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="radio" class="custom-control-input" value="No" name="haspets" id="customNoPets" onclick="hideToSpecifyPets();">
                                                            <label class="custom-control-label" for="customNoPets">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" id="specifyPetsCard" style="display:none;">
                                                <div class="card-header" style="background-color:#00192D; color:#FFC206;"><b>Please Specify Pets you Own</b></div>
                                                <div class="card-body">
                                                    <div id="petContainer"></div>
                                                    <br>
                                                    <div class="d-flex justify-content-between">
                                                      <button type="button" class="btn add_pet mb-3" onclick="addPetBlock()">+ Add Pet</button>
                                                      <!-- <button type="button" class="btn save mb-3" onclick="savePets()">Save </button> -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="button" class="btn btn-danger btn-sm back-btn" id="thirdStepPreviousBtn">Back</button>
                                            <button type="button" class="btn btn-sm next-btn" id="thirdStepNextBtn">Next Step</button>
                                        </div>
                                    </div>
                                    <!-- Section Four Source of Income Information -->
                                    <div class="card" id="sectionFourIncomeSourceInfo" style="display:none;">
                                        <div class="card-header"><b>Source of Income Information</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <label>What is your Main Source of Income?</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="radio" class="custom-control-input" id="employmentSelectionOption" value="Employment" name="income_source">
                                                            <label class="custom-control-label" for="employmentSelectionOption">Employment</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="radio" class="custom-control-input" id="business" value="Business" name="income_source">
                                                            <label class="custom-control-label" for="business">Business</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-switch">
                                                            <input type="radio" class="custom-control-input" id="empBus" value="Employment and Business" name="income_source">
                                                            <label class="custom-control-label" for="empBus">Employment &amp; Business</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card" id="employmentCard" style="display:none;">
                                                        <div class="card-header" style="background-color:#00192D; color:#FFC206;"><b>Specify your Job</b></div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Employer?</label>
                                                                <input type="text" class="form-control" name="tenant_workplace">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Specify your Job Title</label>
                                                                <input type="text" class="form-control" name="tenant_jobtitle">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Employer Contact</label>
                                                                <input type="text" class="form-control" name="employer_contact">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="card" id="businessCard" style="display:none;">
                                                        <div class="card-header" style="background-color:#00192D; color:#FFC206;"><b>Specify your Job</b></div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>What kind of business do you do?</label>
                                                                <input type="text" class="form-control" name="business_kind">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>State the Location of Your Business</label>
                                                                <input type="text" class="form-control" name="tenant_jobtitlel">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Enter the Business KRA PIN</label>
                                                                <input type="text" class="form-control" name="employer_contact">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="card" id="empBusCard" style="display:none;">
                                                        <div class="card-header" style="background-color:#00192D; color:#FFC206;"><b>Specify your Job & Business</b></div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>What kind of business do you do?</label>
                                                                <input type="text" class="form-control" name="business_kind">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>State the Location of Your Business</label>
                                                                <input type="text" class="form-control" name="tenant_jobtitlel">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Enter the Business KRA PIN</label>
                                                                <input type="text" class="form-control" name="employer_contact">
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="form-group">
                                                                <label>Employer?</label>
                                                                <input type="text" class="form-control" name="tenantw_workplace">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Specify your Job Title</label>
                                                                <input type="text" class="form-control" name="tenant_jobtitlel">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Employer Contact</label>
                                                                <input type="text" class="form-control" name="employer_contact">
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="button" class="btn btn-danger btn-sm back-btn" id="fourthStepPreviousBtn">Back</button>
                                            <button type="button" class="btn btn-sm next-btn" id="fourthStepNextBtn">Next Step</button>
                                        </div>
                                    </div>
                                    <!-- Section Five Rental Agreement Copy Information -->
                                    <div class="card" id="sectionFiveRentalAgreementInfo" style="display:none;">
                                        <div class="card-header" style="background-color:#00192D; color:#FFC206;"><b>Rental Agreement Copy</b></div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="">Upload a Copy of Signed Agreement</label>
                                                <input type="file" class="form-control" id="agreementAttachmentCopy" name="agreemeny_copy">
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="button" class="btn btn-danger btn-sm back-btn" id="fifththStepPreviousBtn">Back</button>
                                            <button type="submit" class="btn btn-sm next-btn" id="fifththStepNextBtn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>


        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-8">

                <h3 class="mb-0 contact_section_header">  <i class="fas fa-user-tie icon"></i> Tenants</h3>


                </div>


              <div class="col-sm-4 d-flex justify-content-end">
                  <div class="vacate">
                     <!-- <button class="vacate-tenant rounded" style="height: fit-content;"  onclick="openPopup()" > ADD TENANT</button>  -->
                     <button class="vacate-tenant rounded" style="height: fit-content;"  onclick="tenant_form()" > ADD TENANT</button>

                  </div>
              </div>

            </div>
            <!--end::Row-->

                                              <!-- SUMMARY -->
            <!-- Start Row-->
            <div class="row">
              <div class="col-md-12">

                <h6 class="mb-0 contact_section_header summary mb-2"> </i> Summary</h6>

                <div class="row">

                  <div class="col-md-3">

                    <div class="summary-card p-2">
                        <div ><i class="fas fa-user-tie summary-card_icon"></i> <span class="summary-card_label" > Total,</span> </div>
                        <div class="summary-card_value"><b> <?= $count ?> </b></div>
                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="summary-card p-2">
                        <div ><i class="fas fa-user-tie summary-card_icon"></i> <span class="summary-card_label" > Active,</span> </div>
                        <div class="summary-card_value active"><b> <?= $activeTenantsCount ?> </b></div>
                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="summary-card p-2">
                        <div ><i class="fas fa-user-tie summary-card_icon"></i> <span class="summary-card_label" > Inactive,</span> </div>
                        <div class="summary-card_value inactive"><b> <?= $inactiveTenantsCount ?> </b></div>
                    </div>

                  </div>

                  <div class="col-md-3">

                    <div class="summary-card p-2">
                        <div ><i class="fas fa-user-tie summary-card_icon"></i> <span class="summary-card_label" > New Applicants,</span> </div>
                        <div class="summary-card_value"><b> 20,000</b></div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- End row -->
          </div>
          <!--end::Container-fluid-->
        </div>

                                                      <!-- CONTENT  -->
        <div class="app-content mt-4">
          <!--begin::Container-->
          <div class="container-fluid">

            <h6 class="mb-0 contact_section_header summary mb-2"> </i> Details</h6>
            <!--begin::Row-->
            <div class="row details">
              <!-- Start col -->
              <div class="col-md-12 details">
                <div class="details-container bg-white p-2 rounded">
                  <h3 class="details-container_header text-start"> <span id="displayed_building">All Tenants</span>  &nbsp;	|&nbsp;	 <span style="color:#FFC107"> <span id="enteries">3</span>  enteries</span></h3>
                  <div class="table-responsive">
                    <div id="top-bar" class="filter-pdf-excel mb-2">
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
                      <!-- Shift Tenant Button -->
                      <div class="d-flex">
                        <button id="add_provider_btn" class="btn shift-tenant rounded" style="height: fit-content;" data-bs-toggle="modal" data-bs-target="#shiftTenantModal">
                          Shift Tenant
                        </button>
                        <div id="custom-buttons"></div>
                      </div>
                    </div>
                    <table class="table table-hover" id="users-table">
                        <thead class="thead bg-gradient" >
                            <tr>

                              <th>Full Name</th>
                              <th>ID</th>
                              <th>RESIDENCE + UNIT</th>
                              <th>CONTACT</th>
                              <th>STATUS</th>
                              <th>ACTIONS</th>

                            </tr>
                          </thead>

                          <tbody>


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


                                              <!-- OVERLAYS -->

<!-- Shift Tenant Modal -->
<div class="modal fade" id="shiftTenantModal" tabindex="-1" aria-labelledby="shiftTenantModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color:white; color: #00192D; border-radius: 16px; border: 3px solid #00192D; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);">

      <!-- Header with Biccount Colors -->
      <div class="modal-header" style="background-color: #00192D;">
        <h5 class="modal-title" id="shiftTenantModalLabel" style="color: #FFC107; font-weight: bold;">🚚 Shift Tenant</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body pt-4 pb-2 px-4">
        <form id="shiftTenantForm">

          <div class="mb-3">
            <label for="tenantSelect" class="form-label" style="color: #00192D; font-weight: 500;">Select Tenant</label>
            <select class="form-select" id="tenantSelect" name="tenant" style="background-color: #f9f9f9; color: #00192D; border-radius: 8px;">
              <option selected disabled>Choose a tenant</option>
              <!-- Populate dynamically -->
            </select>
          </div>

          <div class="mb-3">
            <label for="buildingSelect" class="form-label" style="color: #00192D; font-weight: 500;">Select Building</label>
            <select class="form-select" id="buildingSelect" name="building" style="background-color: #f9f9f9; color: #00192D; border-radius: 8px;">
              <option selected disabled>Choose a building</option>
              <!-- Populate dynamically -->
            </select>
          </div>

          <div class="mb-3">
            <label for="unitSelect" class="form-label" style="color: #00192D; font-weight: 500;">Select Unit</label>
            <select class="form-select" id="unitSelect" name="unit" style="background-color: #f9f9f9; color: #00192D; border-radius: 8px;">
              <option selected disabled>Choose a unit</option>
              <!-- Populate dynamically -->
            </select>
          </div>

        </form>
      </div>

      <!-- Footer -->
      <div class="modal-footer" style="border-top: 1px solid #FFC107; padding: 1rem 1.5rem;">
        <button type="button" class="btn" data-bs-dismiss="modal"
          style="background-color: #00192D; color: white; border-radius: 20px; padding: 8px 20px; font-weight: 500;">
          Cancel
        </button>
        <button type="submit" form="shiftTenantForm" class="btn"
          style="background-color: #FFC107; color: #00192D; border-radius: 20px; padding: 8px 20px; font-weight: 500;">
          Confirm Shift
        </button>
      </div>

    </div>
  </div>
</div>






    <!--Begin Jquery plugin-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- End Jquery plugin-->

    <!-- Begin select2 plugin-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- End select2 plugin-->

    <script>
      $(document).ready(function() {
        $('.select2').select2();

      });
    </script>

          <script src="tenants.js"></script>


                                           <!-- PLUGINS -->

            <!-- LOADING AND OUT PROGRESS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
            <!-- EnD LOADING AND OUT PROGRESS -->





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




    <!-- Script for datatable -->
    <script>

            document.addEventListener("DOMContentLoaded", function() {


        });
    </script>


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


    <!-- Select2 JS -->


    <!-- OPEN TENANT PAGE -->
    <script>
      function goToDetails(userId) {
        window.location.href = `../people/tenant-profile.php?id=${userId}`;
      }
    </script>



    </script>



  </script>


  <script>
$(document).ready(function() {
    // When building or unit type changes
    $('#building_name, #unit_type').change(function() {
        updateUnitDropdown();
    });

    // When unit number input changes
    $('#unit_number').on('input', function() {
        updateUnitDropdown();
    });

    // When unit is selected from dropdown
    $('#unit_name').change(function() {
        var unitId = $(this).val();
        if (unitId) {
            fetchUnitDetails(unitId);
        } else {
            $('#rent_amount').val('');
        }
    });

    function updateUnitDropdown() {
        var buildingId = $('#building_name').val();
        var unitType = $('#unit_type').val();
        var unitNumber = $('#unit_number').val();

        // Only proceed if both building and type are selected
        if (!buildingId || !unitType) {
            $('#unit_name').empty().append('<option value="">-- Select Building and Unit Type First --</option>');
            return;
        }

        $.ajax({
            url: 'fetch_units.php',
            type: 'POST',
            dataType: 'json',
            data: {
                building_id: buildingId,
                unit_type: unitType,
                unit_number: unitNumber
            },
            success: function(response) {
                populateUnitDropdown(response);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching units:", error);
                $('#unit_name').empty().append('<option value="">Error loading units</option>');
            }
        });
    }

    function populateUnitDropdown(units) {
        var $dropdown = $('#unit_name');
        $dropdown.empty().append('<option value="">-- Select Unit --</option>');

        if (units && units.length > 0) {
            $.each(units, function(index, unit) {
                // Create display text with building name and unit number
                var displayText = unit.building_name + ' - ' + unit.unit_number;

                $dropdown.append(
                    $('<option>', {
                        value: unit.unit_id,
                        text: displayText,
                        'data-building': unit.building_id,
                        'data-type': unit.unit_type,
                        'data-rent': unit.rent_amount // Add rent amount to data attribute
                    })
                );
            });
        } else {
            $dropdown.append('<option value="">No units found</option>');
        }
    }

    function fetchUnitDetails(unitId) {
        $.ajax({
            url: 'fetch_unit_details.php',
            type: 'POST',
            dataType: 'json',
            data: {
                unit_id: unitId
            },
            success: function(response) {
                if (response && response.rent_amount) {
                    $('#rent_amount').val(response.rent_amount);
                } else {
                    $('#rent_amount').val('');
                    console.error("No rent amount found for this unit");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching unit details:", error);
                $('#rent_amount').val('');
            }
        });
    }
});
</script>


<!-- <script>
  <script>
$(document).ready(function() {
    // When building or unit type changes
    $('#building_name, #unit_type').change(function() {
        updateUnitDropdown();
    });

    // When unit number input changes
    $('#unit_number').on('input', function() {
        updateUnitDropdown();
    });

    function updateUnitDropdown() {
        var buildingId = $('#building_name').val();
        var unitType = $('#unit_type').val();
        var unitNumber = $('#unit_number').val();

        // Only proceed if both building and type are selected
        if (!buildingId || !unitType) {
            $('#unit_name').empty().append('<option value="">-- Select Building and Unit Type First --</option>');
            return;
        }

        $.ajax({
            url: 'fetch_units.php',
            type: 'POST',
            dataType: 'json',
            data: {
                building_id: buildingId,
                unit_type: unitType,
                unit_number: unitNumber
            },
            success: function(response) {
                populateUnitDropdown(response);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching units:", error);
                $('#unit_name').empty().append('<option value="">Error loading units</option>');
            }
        });
    }

    function populateUnitDropdown(units) {
        var $dropdown = $('#unit_name');
        $dropdown.empty().append('<option value="">-- Select Unit --</option>');

        if (units && units.length > 0) {
            $.each(units, function(index, unit) {
                $dropdown.append(
                    $('<option>', {
                        value: unit.unit_id,
                        text: unit.unit_number,
                        'data-building': unit.building_id,
                        'data-type': unit.unit_type
                    })
                );
            });
        } else {
            $dropdown.append('<option value="">No units found</option>');
        }
    }
});
</script> -->


  <script>
$(document).ready(function(){
        var tenant_f_nameError = '';
        var tenant_m_nameError = '';
        var tenant_l_nameError = '';
        var tenant_m_contactError = '';
        var tenant_a_contactError = '';
        var tenant_emailError = '';
        var tenant_id_noError = '';
        var tenant_id_copyError = '';

        var tenant_f_name = '';
        var tenant_m_name = '';
        var tenant_l_name = '';
        var tenant_m_contact = '';
        var tenant_a_contact = '';
        var tenant_email = '';
        var tenant_id_no = '';
        var tenant_id_copy = '';

        $("#firstStepNextBtn").click(function(e) {
            e.preventDefault();
            alert('Hi');
            if($("#tenant_f_name").val() == '') {
                $("#tenant_f_nameError").html('First Name Required');
                $("#tenant_f_name").css('background-color','#FFDBDB');
                return false;

            } else if ($("#tenant_m_name").val() == '') {
                $("#tenant_m_nameError").html('Middle Name Required');
                $("#tenant_m_name").css('background-color','#FFDBDB');
                return false;
            } else if ($("#tenant_l_name").val() == '') {
                $("#tenant_l_nameError").html('Last Name Required');
                $("#tenant_l_name").css('background-color','#FFDBDB');
                return false;

            } else if ($("#tenant_m_name").val() == $("#tenant_f_name").val()) {
                $("#tenant_m_nameError").html('Middle & First Name can\'t the Same');
                $("#tenant_m_name").css('background-color','#FFDBDB');
                return false;

            } else if ($("#tenant_m_contact").val() == '') {
                $("#tenant_m_contactError").html('Contact Information Required');
                $("#tenant_m_contact").css('background-color','#FFDBDB');
                return false;

            } else if ($("#tenant_a_contact") .val() == $("#tenant_m_contact").val()) {
                $("#tenant_a_contactError").html('Contacts can\'t be the Same');
                $("#tenant_a_contact").css('background-color','#FFDBDB');
                return false;
            } else if ($("#tenant_email").val() == '') {
                $("#tenant_emailError").html('Email Required');
                $("#tenant_email").css('background-color','#FFDBDB');
                return false;

            } else if ($("#tenant_id_no").val() == '') {
                $("#tenant_id_noError").html('Identification No. Required');
                $("#tenant_id_no").css('background-color','#FFDBDB');
                return false;
            } else if ($("#tenant_id_no").val() == $("#tenant_a_contact").val()) {
                $("#tenant_id_noError").html('Identification & Contact No. can\'t be the Same');
                $("#tenant_id_no").css('background-color','#FFDBDB');
                return false;

            } else if ($("#tenant_id_copy").val() == '') {
                $("#tenant_id_copyError").html('Identification Copy Required');
                $("#tenant_id_copy").css('background-color','#FFDBDB');
                return false;

            } else {
                $("#sectionTwoOccpantsInfo").show();
                $("#sectionOnePersonalInfo").hide();
                $("#stepOneIndicatorNo").html('<i class="fa fa-check"></i>');
                $("#stepOneIndicatorNo").css('background-color', '#FFC107');
                $("#stepOneIndicatorNo").css('color', '#00192D');
                $("#stepOneIndicatorText").html('Done');

                //Change the Field's Properties
                $("#tenant_f_nameError").html('');
                $("#tenant_f_name").css('border','1px solid #379E1B');
                $("#tenant_f_name").css('background-color','rgb(55, 158, 27, .3)');
            }
        });
        $('#secondStepPreviousBtn').click(function(e){
            e.preventDefault();
            $("#sectionTwoOccpantsInfo").hide();
            $("#sectionOnePersonalInfo").show();
            $("#stepOneIndicatorNo").html('1');
            $("#stepOneIndicatorNo").css('background-color', '#00192D');
            $("#stepOneIndicatorNo").css('color', '#FFC107');
            $("#stepOneIndicatorText").html('Personal Information');
        });
        $("#secondStepNextBtn").click(function(e){
            e.preventDefault();
            alert ('Validation Pending. I\'ll get back to this');

            $("#sectionThreePetsInfo").show();
            $("#sectionTwoOccpantsInfo").hide();

            $("#stepTwoIndicatorNo").html('<i class="fa fa-check"></i>');
            $("#stepTwoIndicatorNo").css('background-color', '#FFC107');
            $("#stepTwoIndicatorNo").css('color', '#00192D');
            $("#stepTwoIndicatorText").html('Done');

        });
        $("#thirdStepPreviousBtn").click(function(e){
            e.preventDefault();

            $("#sectionTwoOccpantsInfo").show();
            $("#sectionThreePetsInfo").hide();

            $("#stepTwoIndicatorNo").html('2');
            $("#stepTwoIndicatorNo").css('background-color', '#00192D');
            $("#stepTwoIndicatorNo").css('color', '#FFC107');
            $("#stepTwoIndicatorText").html('Occupants Information');
        });
        $("#thirdStepNextBtn").click(function(e){
            e.preventDefault();

            $("#sectionFourIncomeSourceInfo").show();
            $("#sectionThreePetsInfo").hide();

            $("#stepThreeIndicatorNo").html('<i class="fa fa-check"></i>');
            $("#stepThreeIndicatorNo").css('background-color', '#FFC107');
            $("#stepThreeIndicatorNo").css('color', '#00192D');
            $("#stepThreeIndicatorText").html('Done');
        });
        $("#fourthStepPreviousBtn").click(function(e){
            e.preventDefault();

            $("#sectionFourIncomeSourceInfo").hide();
            $("#sectionThreePetsInfo").show();

            $("#stepThreeIndicatorNo").html('3');
            $("#stepThreeIndicatorNo").css('background-color', '#00192D');
            $("#stepThreeIndicatorNo").css('color', '#FFC107');
            $("#stepThreeIndicatorText").html('Pets Information');

        });
        $("#fourthStepNextBtn").click(function(e){
            e.preventDefault();

            $("#sectionFiveRentalAgreementInfo").show();
            $("#sectionFourIncomeSourceInfo").hide();

            $("#stepFourIndicatorNo").html('<i class="fa fa-check"></i>');
            $("#stepFourIndicatorNo").css('background-color', '#FFC107');
            $("#stepFourIndicatorNo").css('color', '#00192D');
            $("#stepFourIndicatorText").html('Done');
        });
        $("#fifththStepPreviousBtn").click(function(e){
            e.preventDefault();

            $("#sectionFiveRentalAgreementInfo").hide();
            $("#sectionFourIncomeSourceInfo").show();

            $("#stepFourIndicatorNo").html('4');
            $("#stepFourIndicatorNo").css('background-color', '#00192D');
            $("#stepFourIndicatorNo").css('color', '#FFC107');
            $("#stepFourIndicatorText").html('Source of Income');
        });
    });

            </script>
<!-- //Event Listener to Specify if the Tenant Owns Pets -->

<script>
  $(document).ready(function() {
    // Show pets card when "Yes" is selected
    document.getElementById('customSwitchPetYes').addEventListener('change', function(){
      document.getElementById('specifyPetsCard').style.display = 'block';
      console.log('fired');
    });

    // Initialize select2
    $('.select2').select2();

    // Call the noPets function to bind the event
    noPets();
  });

  // Define the noPets function properly
   function noPets() {
    const noPet = document.getElementById('customNoPets');
    if (noPet) {
      noPet.addEventListener('change', function () {
        console.log('No radio changed');
        document.getElementById('specifyPetsCard').style.display = 'none';
        const pets = document.getElementById('petsDataInput').value = 'no_pet';
        const petInputs = specifyPetsCard.querySelectorAll('select, input');
          petInputs.forEach(el => {
          el.disabled = true;
          el.required = false;
          el.value = ''; // Optional: clear input values
        });

        console.log('Pets value set:', pets);
      });
    } else {
      console.warn('No radio not found');
    }
  }
</script>



</script>

<script>
//Event Listener to Specify Employment Information
document.getElementById('employmentSelectionOption').addEventListener('change', function() {
        document.getElementById('employmentCard').style.display='block';
        document.getElementById('businessCard').style.display='none';
        document.getElementById('empBusCard').style.display='none';
        document.getElementById('empBusCard').style.display='none';

    });

    document.getElementById('business').addEventListener('change', function() {
        document.getElementById('employmentCard').style.display='none';
        document.getElementById('businessCard').style.display='block';
        document.getElementById('empBusCard').style.display='none';
    });

    document.getElementById('empBus').addEventListener('change', function() {
        document.getElementById('employmentCard').style.display='none';
        document.getElementById('businessCard').style.display='none';
        document.getElementById('empBusCard').style.display='block';
    });


</script>



<script>

  //TENANT STATUS
      // Run this after fetch/AJAX renders the rows
document.querySelectorAll('button.status').forEach(button => {
  const status = button.getAttribute('data-status')?.toLowerCase();

  button.classList.remove('active', 'inactive');

  if (status === 'active') {
    button.classList.add('active');
  } else if (status === 'inactive') {
    button.classList.add('inactive');
  }
});
</script>


<!-- validateKraPin -->
<script>
    function validateKraPin() {
      const kraPinInput = document.getElementById("kra_pin");
      const kraPinError = document.getElementById("kraPinError");
      const kraPattern = /^A\d{9}[A-Z]$/i;

      if (!kraPattern.test(kraPinInput.value.trim())) {
        kraPinError.style.display = "block";
        kraPinInput.setCustomValidity("Invalid KRA PIN format");
      } else {
        kraPinError.style.display = "none";
        kraPinInput.setCustomValidity("");
      }
    }
    </script>

<script>
  document.getElementById('tenant_email').addEventListener('input', function() {
    var email = this.value;
    var emailError = document.getElementById('emailError');

    // Simple email pattern to check the format
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if (!emailPattern.test(email)) {
        emailError.style.display = 'block';
    } else {
        emailError.style.display = 'none';
    }
});

</script>

<script>
  document.querySelectorAll('.select-options div').forEach(option => {
  option.addEventListener('click', () => {
    const value = option.getAttribute('data-value');
    document.getElementById('building_name_display').textContent = value;
    document.getElementById('building_name').value = value;
  });
});

</script>

<!-- pets control script -->
<script>
window.onload = () => addPetBlock();

  function addPetBlock() {
    const container = document.getElementById('petContainer');

    const card = document.createElement('div');
    card.className = 'card p-3 mb-2';

    card.innerHTML = `
      <div class="row mb-2 g-3 align-items-end">
        <div class="col-md-4">
          <label class="form-label">Pet Type</label>
          <select class="form-select" name="petType[]" required>
            <option value="">-- Select Pet --</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Rabbit">Rabbit</option>
            <option value="Parrot">Parrot</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Weight (kg)</label>
          <input type="number" class="form-control" name="petWeight[]" required min="0" step="0.1">
        </div>
        <div class="col-md-4">
          <label class="form-label">License Number</label>
          <input type="text" class="form-control" name="petLicense[]" required>
        </div>
        <div class="col-md-1 text-end">
          <button type="button" class="btn btn-danger" onclick="this.closest('.card').remove()">×</button>
        </div>
      </div>
    `;

    container.appendChild(card);

    // Reattach event listeners to new inputs after appending the card
    attachInputListeners();
  }

  // Handle submission
  function savePets() {
    const types = Array.from(document.getElementsByName('petType[]')).map(el => el.value);
    const weights = Array.from(document.getElementsByName('petWeight[]')).map(el => el.value);
    const licenses = Array.from(document.getElementsByName('petLicense[]')).map(el => el.value);

    const pets = types.map((type, index) => ({
      type,
      weight: weights[index],
      license: licenses[index]
    }));

    document.getElementById('petsDataInput').value = JSON.stringify(pets);
    console.log('Live Pets Data:', pets);
  }

  // Attach input event listeners
  function attachInputListeners() {
    const allInputs = [
      ...document.getElementsByName('petType[]'),
      ...document.getElementsByName('petWeight[]'),
      ...document.getElementsByName('petLicense[]')
    ];

    allInputs.forEach(input => {
      input.removeEventListener('input', savePets); // Remove old listeners
      input.addEventListener('input', savePets); // Attach the new listener
    });
  }

  // Attach input event listeners on page load and whenever a new pet block is added
  document.addEventListener('DOMContentLoaded', () => {
    attachInputListeners(); // Attach event listeners on page load
  });

</script>


</script>
  </body>
</html>

