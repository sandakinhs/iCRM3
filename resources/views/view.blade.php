

<?php
/**
 * Created by PhpStorm.
 * User: Sandakin
 * Date: 11/23/2015
 * Time: 1:42 PM
 */

        foreach ($data as $row)
            {
                echo $row->id;
                echo $row->contact_firstname;
                echo '<br>';
            }

echo $data->setPath('test1')->render();


        ?>