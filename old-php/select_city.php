<?php

include 'db_connect.php';
 
echo '<option value="">Select City</option>';
if (!empty($_POST["state"])) {

    $state = $_POST["state"];


    $stateResult = mysqli_query($conn, "SELECT * FROM `tbl_cities` WHERE `state_id`='".$state."'   ");
    while ($mus = mysqli_fetch_array($stateResult)) 
    {
        ?>
        <option value="<?php echo $mus["name"]; ?>"><?= $mus["name"]; ?></option>
        <?php
    }
}
?>