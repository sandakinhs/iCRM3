@extends('navbar')
@section('navbar')

<script>
    $(document).ready(
            function() {
                setInterval(function() {
                    var randomnumber = Math.floor(Math.random() * 100);
                    $('#show').load(document.URL +  ' #show');
                }, 3000);
            });
</script>

<div id="show">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10" style="overflow: scroll;">
            <?php



            if ($_SESSION['user_type']=='1'){  //check privilege



                echo '<table class="table table-hover table-condensed table-bordered">

<tr class="info">
  <th><aa>User</aa></th> <th><aa>Table</aa></th> <th><aa>Field ID</aa></th> <th><aa>Action</aa></th> <th><aa>Time</aa></th>
<tr>
';

                foreach ($log_details as $row) {


                    echo "<tr>";
                    if($row->table=='logging attempt'){
                        echo "<td><a1></a1></td>";
                    }else{
                        echo "<td><a1>".$row->user_name."</a1></td>";
                    }
                    echo "<td><a1>".$row->table."</a1></td>";
                    echo "<td><a1>".$row->field_id."</a1></td>";
                    echo "<td><a1>".$row->action."</a1></td>";
                    echo "<td><a1>".$row->time."</a1></td>";
                    echo "<tr>";

                }

            }

            ?>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

    @stop
