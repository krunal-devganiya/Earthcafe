<?php
session_start();
include "DataBaseConnection.php"; // Database connection

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please Login to upload document.'); window.location.href='login.php';</script>";
    exit;
}


$user_id = $_SESSION['user_id']; // Logged-in user ID
$certificateType = isset($_GET['certificate']) ? $_GET['certificate'] : '';
$documents = [
    "Non-Creamy-Layer-certificate" => ["Ration Card", "Light Bill", "Cast Certificate", "School Leaving Certificate", "Adhar Card (Applicant)", "Aadhar Card (Father)", "Pasport size Photo(applicant)", "Passport size photo(Father)", "Income Certificate"],
    "EBC-certificate" => ["Light Bill", "Ration Card", "School Leaving Certificate", "Adhar Card (Applicant)", "Adhar Card (Father)", "Pasport size Photo(applicant)", "Passport size photo(Father)"],
    "Income-certificate" => ["Passport size Photo", "Adhar card", "Ration Card", "Light Bill", "ITR Return"],
    "Cast-certificate" => ["Passport size Photo(applicant)", "Passport size photo(Father)", "Adhar Card (Applicant)", "Adhar Card (Father)", "School Leaving Certificate (applicant)", "School Leaving Certificate (father)", "ration card"],
    "EWS-certificate" => ["Passport size Photo(applicant)", "Passport size photo(Father)", "Adhar card (applicant)", "adhr card (father)", "School Leaving Certificate (applicant)", "School Leaving Certificate (father)", "income certificate", "ration card", "light bill"],
    "Domicile-certificate" => ["adhar card (applicant)", "adhr card (father)", "light bill", "ration card", "School Leaving Certificate (applicant)", "School Leaving Certificate (father)", "result",],
    "CMSS-scolership" => ["Adhar card", "Passport size photo", "10th marksheet", "12th marksheet", "fee recept", "bank passbook", "principal certificate", "cast certificte", "school living certificte", "admission letter", "e-nirman card"],
    "MYSY-scolership" => ["adhar card", "passport size photo", "12th marksheet", "admission letter", "fee recept", "college certificate", "bank passbook", "income certificte", "ration card"],
    "Digital-gujarat-scolership" => ["passport size photo", "cast certificate", "income certificate", "adhar card", "bank passbook", "fee recept or fee structure", "10th marksheet or after 10th all result", "school living certificate", "icard", "bonoifide", "ration card"],
    "RTE(Right to Education)" => ["adhar card (applicant)", "adhar card (father)", "adhar card (mother)", "birth certificte", "passport size photo (applicant)", "income certificte", "light bill", "cast certificate(father)", "bank passbook (father)", "pancard (father)"],
    "FSSAI-Licence" => ["adhar card (applicant)", "pancard", "passport size photo", "shop photo with banner"],
    "Ration-card" => ["adhar card (all member)", "voting card (all member)", "light bill", "gas bill", "passport size photo"],
    "Passport" => ["adhar card", "pan card", "school living certificate", "10th or 12th marksheet", "light bill"],
    "Pancard" => ["adhar card", "passport size photo"],
    "Driving-Licence" => ["adhar card", "passport size photo", "school living certificate"],
    "VNSGU-Adimission-form" => ["adhar card (applicant)", "adhar card (father)", "10th marksheet", "12th marksheet", "bank passbook", "passport size photo", "cast certificate", "non crimilayer(if applicable)"],
    "NEET-Adimission-form" => ["passport size photo(with white background)", "signature", "cast certificate", "10th marksheet", "12th marksheet", "adhar card"],
    "JEE-Adimission-form" => ["adhar card", "10th result", "10th passing certificate", "cast certificate", "passport size photo (with white bckground)", "signature"]
];
$certificatePrices = [
    "Non-Creamy-Layer-certificate" => 1200,
    "EBC-certificate" => 1300,
    "Income-certificate" => 1150,
    "Cast-certificate" => 1250,
    "EWS-certificate" => 1400,
    "Domicile-certificate" => 1200,
    "CMSS-scolership" => 450,
    "MYSY-scolership" => 400,
    "Digital-gujarat-scolership" => 4500,
    "RTE(Right to Education)" => 200,
    "FSSAI-licence" => 2500,
    "Ration-card" => 1000,
    "Passport" => 2500,
    "Pancard" => 300,
    "Driving-Licence" => 1100,
    "VNSGU-Adimission-form" => 450,
    "NEET-Adimission-form" => 700,
    "JEE-Adimission-form" => 700
];

$documentFees = [
    "Non-Creamy-Layer-certificate" => 700,
    "EBC-certificate" => 800,
    "Income-certificate" => 650,
    "Cast-certificate" => 750,
    "EWS-certificate" => 900,
    "Domicile-certificate" => 600,
    "CMSS-scolership" => 250,
    "MYSY-scolership" => 200,
    "Digital-gujarat-scolership" => 250,
    "RTE(Right to Education)" => 100,
    "FSSAI-licence" => 2000,
    "Ration-card" => 500,
    "Passport" => 1700,
    "Pancard" => 200,
    "Driving-Licence" => 800,
    "VNSGU-Adimission-form" => 250,
    "NEET-Adimission-form" => 500,
    "JEE-Adimission-form" => 500
];

$consultancyFees = [
    "Non-Creamy-Layer-certificate" => 500,
    "EBC-certificate" => 500,
    "Income-certificate" => 500,
    "Cast-certificate" => 500,
    "EWS-certificate" => 500,
    "Domicile-certificate" => 500,
    "CMSS-scolership" => 200,
    "MYSY-scolership" => 200,
    "Digital-gujarat-scolership" => 200,
    "RTE(Right to Education)" => 100,
    "FSSAI-licence" => 500,
    "Ration-card" => 500,
    "Passport" => 800,
    "Pancard" => 100,
    "Driving-Licence" => 300,
    "VNSGU-Adimission-form" => 200,
    "NEET-Adimission-form" => 200,
    "JEE-Adimission-form" => 200
];



$allowed_extensions = ["jpg", "jpeg", "png"];
$max_file_size = 1 * 1024 * 1024; // 1MB

//if (isset($_SESSION['uploaded']) && $_SESSION['uploaded'] === true) {
  //  unset($_SESSION['uploaded']);
    // echo "<script>alert('Documents Request sent successfully!'); window.location.href='index.php';</script>";
//    exit;
//}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Documents</title>
    <link rel="icon" type="image/jpg" href="../earthcafe/img/ashoksthambh.jpg">

    <!-- close button css link -->

    <style>
        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: transparent;
            color: #ffc107;
            padding: 5px 5px;
            border: none;
            cursor: pointer;
            font-size: 35px;
            font-weight: 100;
            border-radius: 10px;
            z-index: 9999;
        }

        .close-btn:hover {
            background: #ffc107;
            color: #fff;
        }
    </style>

    <!-- close btn js link -->
    <script src="../earthcafe/js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        function validateFile(input, sizeElement) {
            let file = input.files[0];
            let uploadBtn = document.getElementById("final_submit");

            if (file) {
                let fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);
                let ext = file.name.split('.').pop().toLowerCase();
                let allowedExtensions = ["jpg", "jpeg", "png","pdf"];

                if (!allowedExtensions.includes(ext)) {
                    alert("Only JPG, JPEG,Pdf and PNG files are allowed!");
                    input.value = ""; 
                    sizeElement.textContent = "";
                    return;
                }

                if (file.size > 1 * 1024 * 1024) {
                    alert("File size exceeds 1MB limit!");
                    input.value = "";
                    sizeElement.textContent = "";
                    return;
                }

                sizeElement.textContent = fileSizeMB + " MB";
                uploadBtn.disabled = false;
            }
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h2>Upload Documents for <?= ucfirst($certificateType) ?> Certificate</h2>

        <?php if ($certificateType && isset($documents[$certificateType])): ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="certificate_type" value="<?= htmlspecialchars($certificateType) ?>">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Document Name</th>
                            <th>Upload File</th>
                            <th>File Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($documents[$certificateType] as $doc): ?>
                            <?php
                            // Expected file name ke liye space hata ke lowercase me convert kare
                            $expectedFileName = strtolower(str_replace(' ', '', $doc));
                            ?>
                            <tr>
                                <td><?= $doc ?></td>
                                <td>
                                    <input type="file" name="document_files[]" class="form-control" accept=".jpg,.jpeg,.png"
                                        onchange="validateFile(this, document.getElementById('size_<?= md5($doc) ?>'), '<?= $expectedFileName ?>')"
                                        required>
                                    <input type="hidden" name="document_names[]" value="<?= $doc ?>">
                                </td>
                                <td id="size_<?= md5($doc) ?>"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
                <button type="submit" name="final_submit" class="btn btn-success mt-3" id="final_submit" disabled>Final
                    Submit</button>
            </form>
        <?php else: ?>
            <p class="text-danger">Invalid Certificate Type!</p>
        <?php endif; ?>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["final_submit"])) {
        $certificateType = $_POST['certificate_type'];
        $_SESSION['certificate_name'] = $certificateType;
        $base_price = $certificatePrices[$certificateType] ?? 0;
        $document_fee = $documentFees[$certificateType] ?? 0;
        $consultancy_fee = $consultancyFees[$certificateType] ?? 0;

        $_SESSION['certificate_price'] = $base_price;
        $_SESSION['document_fees'] = $document_fee;
        $_SESSION['consultancy_fees'] = $consultancy_fee;

        // **Document file ko temporarily store karo session me**
        if (isset($_FILES['document'])) {
            $_SESSION['document'] = $_FILES['document'];
        }
    
        // Payment page par redirect
        header("Location: payment.php");

        // Directory path
        $upload_dir = "uploads/{$user_id}/{$certificateType}/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $allValid = true;
        $uploadedFiles = [];

        foreach ($_FILES["document_files"]["name"] as $key => $document_name) {
            $document_tmp = $_FILES["document_files"]["tmp_name"][$key];
            $document_ext = strtolower(pathinfo($document_name, PATHINFO_EXTENSION));
            $document_label = $_POST["document_names"][$key];

            // ✅ 1. Check if document name is in predefined list
            if (!in_array($document_label, $documents[$certificateType])) {
                echo "<script>alert('Error: Invalid document \"$document_label\". Upload only required documents.');</script>";
                $allValid = false;
                break;
            }

            // ✅ 2. Normalize expected file name
            $expectedFileName = strtolower(str_replace(" ", "", $document_label)) . "." . $document_ext;

            // ✅ 3. Check if uploaded file matches expected file name
            if (strtolower($document_name) !== $expectedFileName) {
                echo "<script>alert('Error: \"$document_label\" document must be named \"$expectedFileName\".');</script>";
                $allValid = false;
                break;
            }

            // ✅ 4. Check if file extension is valid
            if (!in_array($document_ext, $allowed_extensions)) {
                echo "<script>alert('Error: Invalid file format \"$document_name\". Only JPG, JPEG, PNG allowed.');</script>";
                $allValid = false;
                break;
            }

            // ✅ 5. Check if file size is within limit
            if ($_FILES["document_files"]["size"][$key] > $max_file_size) {
                echo "<script>alert('Error: File \"$document_name\" exceeds 1MB size limit!');</script>";
                $allValid = false;
                break;
            }
        }

        if ($allValid) {
            foreach ($_FILES["document_files"]["name"] as $key => $document_name) {
                $document_tmp = $_FILES["document_files"]["tmp_name"][$key];
                $document_ext = strtolower(pathinfo($document_name, PATHINFO_EXTENSION));
                $document_label = $_POST["document_names"][$key];

                $document_path = $upload_dir . time() . "_" . basename($document_name);
                if (move_uploaded_file($document_tmp, $document_path)) {
                    $uploadedFiles[] = [
                        "user_id" => $user_id,
                        "certificate_type" => $certificateType,
                        "document_name" => $document_label,
                        "document_path" => $document_path
                    ];
                }
            }

            $request_id = uniqid();

        
            if (!empty($uploadedFiles)) {
                $_SESSION['req_id']=$request_id;
                $stmt = $conn->prepare("INSERT INTO uploads (user_id, certificate_type, document_name, document_path, request_id) VALUES (?, ?, ?, ?, ?)");
                foreach ($uploadedFiles as $file) {
                    $stmt->bind_param("issss", $file["user_id"], $file["certificate_type"], $file["document_name"], $file["document_path"], $request_id);
                    $stmt->execute();
                }
                $stmt->close();

                $_SESSION['uploaded'] = true;
                echo "<script>window.location.href='payment.php';</script>";
                exit;
            }
        }
    }

    ?>
    <script>
        function validateFile(input, sizeElement, expectedFileName) {
            let file = input.files[0];
            let uploadBtn = document.getElementById("final_submit");

            if (file) {
                let fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);
                let ext = file.name.split('.').pop().toLowerCase();
                let fileNameWithoutExt = file.name.replace(/\.[^/.]+$/, ""); // File ka naam bina extension ke
                let allowedExtensions = ["jpg", "jpeg", "png"];

                // ✅ 1. File format check
                if (!allowedExtensions.includes(ext)) {
                    alert("Only JPG, JPEG, and PNG files are allowed!");
                    input.value = ""; // Reset input field
                    sizeElement.textContent = "";
                    return;
                }

                // ✅ 2. File size check (max 1MB)
                if (file.size > 1 * 1024 * 1024) {
                    alert("File size exceeds 1MB limit!");
                    input.value = ""; // Reset input field
                    sizeElement.textContent = "";
                    return;
                }

                // ✅ 3. File name validation
                if (fileNameWithoutExt.toLowerCase() !== expectedFileName.toLowerCase()) {
                    alert(`document should be named as '${expectedFileName}.jpg'`);
                    input.value = ""; 
                    sizeElement.textContent = "";
                    return;
                }

                // ✅ 4. If all checks pass, update file size display
                sizeElement.textContent = fileSizeMB + " MB";
                uploadBtn.disabled = false;
            }
        }

    </script>
    <ion-icon name="close-outline" class="close-btn" onclick="goHome()"></ion-icon>

    <!-- icon link -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>