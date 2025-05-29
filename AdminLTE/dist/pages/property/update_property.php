<?php
include '../db/connect.php'; // Include your database connection

try {
    // Check if form is submitted
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

        // Collect POST data
        $building_id = $_POST['building_id']; // Get the building ID from the form
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

        // Handle file uploads
        $title_deed_copy = uploadPhoto('title_deed_copy');
        $other_document_copy = uploadPhoto('other_document_copy');

        // Ownership fields (Individual or Entity)
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

        // Other fields
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

        // Update query
        $sql = "UPDATE buildings SET
            building_name = :building_name, county = :county, constituency = :constituency, ward = :ward,
            floor_number = :floor_number, units_number = :units_number, building_type = :building_type,
            water_price = :water_price, electricity_price = :electricity_price, ownership_info = :ownership_info,
            first_name = :first_name, last_name = :last_name, nationality = :nationality, country_code = :country_code,
            kra_pin = :kra_pin, kra_attachment = :kra_attachment, identification_number = :identification_number,
            id_attachment = :id_attachment, email = :email, entity_name = :entity_name, entity_country_code = :entity_country_code,
            entity_email = :entity_email, bs_reg_no = :bs_reg_no, attach_bs_reg_no = :attach_bs_reg_no,
            entity_kra_pin = :entity_kra_pin, entity_attach_kra_copy = :entity_attach_kra_copy,
            entity_representative = :entity_representative, entity_rep_role = :entity_rep_role,
            title_deed_copy = :title_deed_copy, other_document_copy = :other_document_copy,
            borehole_availability = :borehole_availability, solar_availability = :solar_availability,
            solar_brand = :solar_brand, installation_company = :installation_company,
            no_of_panels = :no_of_panels, solar_primary_use = :solar_primary_use, parking_lot = :parking_lot,
            alarm_system = :alarm_system, elevators = :elevators, psds_accessibility = :psds_accessibility,
            cctv = :cctv, insurance_cover = :insurance_cover, insurance_policy = :insurance_policy,
            insurance_provider = :insurance_provider, policy_from_date = :policy_from_date,
            policy_until_date = :policy_until_date
            WHERE building_id = :building_id";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Execute the statement
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
            ':insurance_cover' => $insurance_cover,
            ':insurance_policy' => $insurance_policy,
            ':insurance_provider' => $insurance_provider,
            ':policy_from_date' => $policy_from_date,
            ':policy_until_date' => $policy_until_date,
            ':building_id' => $building_id
        ]);

        // Redirect after successful update
        header("Location: Units.php?success=1");
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
