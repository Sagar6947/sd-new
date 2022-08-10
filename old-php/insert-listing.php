<?php

include 'db_connect.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: {$hostname}login.php");
}

if (isset($_POST['submit_listing'])) {


    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    // $company_type = mysqli_real_escape_string($conn, $_POST['company_type']);
    // $web_company_name = preg_replace('/\s+/', '-', trim(preg_replace('/[^a-zA-Z0-9- ]/s', ' ', (strtolower($_POST['web_company_name'])))));

    $company_tagline = mysqli_real_escape_string($conn, $_POST['company_tagline']);

    $company_state = mysqli_real_escape_string($conn, $_POST['company_state']);

    $company_city = mysqli_real_escape_string($conn, $_POST['company_city']);



    $company_category = mysqli_real_escape_string($conn, $_POST['company_category']);
    $company_subcategory = mysqli_real_escape_string($conn, $_POST['company_subcategory']);

    $company_address = mysqli_real_escape_string($conn, $_POST['company_address']);
    $company_pincode = mysqli_real_escape_string($conn, $_POST['pin_code']);
    $company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
    $company_contact = mysqli_real_escape_string($conn, $_POST['company_contact']);
    // $company_website = mysqli_real_escape_string($conn, $_POST['company_website']);
    $company_website_url = mysqli_real_escape_string($conn, $_POST['company_website_url']);
    $company_facebook = mysqli_real_escape_string($conn, $_POST['company_facebook']);
    $company_twitter = mysqli_real_escape_string($conn, $_POST['company_twitter']);
    $company_instagram = mysqli_real_escape_string($conn, $_POST['company_instagram']);
    $company_telegram = mysqli_real_escape_string($conn, $_POST['company_telegram']);
    $company_person = mysqli_real_escape_string($conn, $_POST['company_person']);
    $company_designation = mysqli_real_escape_string($conn, $_POST['company_designation']);

    $company_linkedin = mysqli_real_escape_string($conn, $_POST['company_linkedin']);
    // $company_about = mysqli_real_escape_string($conn, $_POST['company_about']);

    $company_password = "SD" . rand(50000, 1000);
    $file = $_FILES['company_logo']['name'];
    $tmpfile = $_FILES['company_logo']['tmp_name'];
    $folder = date("dmyhis") . $file;
    move_uploaded_file($tmpfile, 'listing-images/' . $folder);


    $file2 = $_FILES['company_banner']['name'];
    $tmpfile = $_FILES['company_banner']['tmp_name'];
    $folder2 = date("dmyhis") . $file2;
    move_uploaded_file($tmpfile, 'listing-images/' . $folder2);

    $insert = "INSERT INTO `company` (`company_name`, `company_person`,`company_designation`, `company_category`, `company_subcategory`,  `company_tagline`, `company_address`, `company_email`, `company_website_url`, `company_contact`, `company_logo`, `company_banner`,  `company_facebook`, `company_twitter`, `company_instagram`,`company_telegram`,  `company_linkedin`, `company_city`, `company_state`)
		VALUES ('$company_name',  '$company_person','$company_designation','$company_category','$company_subcategory', '$company_tagline', '$company_address', '$company_email', '$company_website_url', '$company_contact', '$folder', '$folder2', '$company_facebook', '$company_twitter', '$company_instagram', '$company_telegram', '$company_linkedin', '$company_city','$company_state')";


    $add_list = mysqli_query($conn, $insert) or die("Query Fail");

    if ($add_list) {
?>
        <script>
            alert('Company Added Successfully');
        </script>
    <?php
        header("Location: {$hostname}dashboard.php");
    } else {
    ?>
        <script>
            alert('Something Went Wrong');
        </script>
<?php
    }
}
?>