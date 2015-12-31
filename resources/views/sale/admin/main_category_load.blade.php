<?php

?>

<a>
    &nbsp Main Category :<select id="main_category" name="main_category">
        <?php

        foreach ($main_category as $row) {
            echo '<option value=" '.$row->id.' ">'.$row->name.'</option>';
        }
        ?>
    </select>
</a>