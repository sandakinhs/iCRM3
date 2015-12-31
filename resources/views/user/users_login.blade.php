@extends('navbar')
@section('navbar')

<?php

//if ($_SESSION['user_type']=='1'){  //check privilege

?>
<script>
    $(document).ready(
            function() {
                setInterval(function() {
                    var randomnumber = Math.floor(Math.random() * 100);
                    // $("#show").html();
                    $('#show').load(document.URL +  ' #show');
                }, 3000);
            });
</script>

<div id="show">

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="overflow: scroll;">
            <?php

            echo '<table class="table table-hover table-condensed table-bordered">

<tr class="info">
  <th><aa>Name</aa></th> <th><aa>Login Time</aa></th> <th><aa>IP</aa></th> <th><aa></aa></th>
<tr>
';

            foreach ( $users_details as $row ) {

                echo "<tr>";
                echo "<td><a1>".$row->user_name."</a1></td>";
                echo "<td><a1>".$row->user_login_time."</a1></td>";
                echo "<td><a1>".$row->ip."</a1></td>";
                echo "<td><a href='logout.php?user=".$row->user_id."'>Logout</a></td>";
                echo "<tr>";

            }
            ?>
        </div>
        <div class="col-sm-1"></div>
    </div>

</div>

<?php

//}

?>

<script src="user.js"></script>

    @stop