@extends('navbar')
@section('navbar')


        <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10" style="overflow: scroll;">

        <?php //if ($privilege->add_privilege("users") == "1"){    //check privilege
        ?>
        <a href="group/create">Add Group</a>
        <?php // } ?>

        <table class="table table-hover table-condensed table-bordered">
            <tr class="info">
                <th><a1>Group ID</a1></th>
                <th><a1>Name</a1></th>
                <th><a1>Owner</a1></th>
                <th><a1>Created Time</a1></th>
                <th><a1>Modified By</a1></th>
                <th><a1>Modified Time</a1></th>
                <th><a1>Description</a1></th>
                <th></th>
            </tr>

            <?php

            foreach ($groups_details as $row)
            {
            ?>

            <tr>
                <td><a1><?php echo $row->group_id; ?></a1></td>
                <td><a1><?php echo $row->group_name; ?></a1></td>
                <td><a1><?php echo $row->owner; ?></a1></td>
                <td><a1><?php echo $row->group_created_time; ?></a1></td>
                <td><a1><?php echo $row->modi; ?></a1></td>
                <td><a1><?php echo $row->group_modified_time; ?></a1></td>
                <td><a1><?php echo $row->group_description; ?></a1></td>
                <td>
                    <a href="group/{{$row->group_id}}/edit" class="glyphicon glyphicon-pencil" ></a>
                    <a href="#" onclick="deleted({{ $row->group_id }})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a>
                </td>
            </tr>
            <?php
            }
            ?>

        </table>

    </div>
    <div class="col-sm-1"></div>
</div>

</body>
</html>

<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    function deleted(id){

        var token   = "{{ csrf_token() }}";
        var method  = "DELETE";

        var r = confirm("Confirm Delete!");

        if (r == true) {

            $.ajax({
                type: 'post',
                url: root_url + 'group/' + id,
                data: {"_token": token, "_method": method},

                success: function () {

                    alert('Delete Successful');
                    location.reload();

                },
                error: function (xhr, textStatus, error) {
                    alert(error);
                }
            });

        }
    }
</script>

@stop
