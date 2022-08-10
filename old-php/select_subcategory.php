<?php

include 'db_connect.php';
 
echo '<option value="">Select Category</option>';
if (!empty($_POST["company_category"])) {

    $company_category = $_POST["company_category"];


    $catResult = mysqli_query($conn, "SELECT * FROM `company_subcategory` WHERE `category_id`='".$company_category."'   ");
    while ($sag = mysqli_fetch_array($catResult)) 
    {
        ?>  
        <option value="<?php echo $sag["subcat_id"]; ?>"><?= $sag["subcategory"]; ?></option>
        <?php
    }
}
?>