<a1>
    <select name="assignedto1" id="assignedto1"  >

        @foreach($group_members as $row1)

        <?php

        if(isset($_SESSION['contact_assign'])){ ?>    <!-- check session contact assign set or not -->
        <option value=" {{ $row1->id }}" <?php if($_SESSION['contact_assign']==$row1->id){ echo 'selected="selected"'; } ?> ><?php echo $row1->user_name;  ?></option>
        <?php

        }else{

        ?>
        <option value="<?php  echo $row1->id; ?>" <?php if($_SESSION['user_id']==$row1->id ){ echo 'selected="selected"'; } ?> ><?php echo $row1->user_name;  ?></option>
        <?php
        }
        ?>

        @endforeach
    </select>
</a1>



