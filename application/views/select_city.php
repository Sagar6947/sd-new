<?php
    foreach ($city as $row) {
    ?>
        <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
    <?php
    }
    ?> 