<?php
foreach ($subcat as $row) {
?>
    <option value="<?= $row['subcat_id'] ?>"><?= $row['subcategory'] ?></option>
<?php
}
?>