@extends('navbar')
@section('navbar')
<?php

unset($_SESSION['groups']);    //unset group session and add value empty to it
unset($_SESSION['group_name_can_edit']);
unset($_SESSION['from']);
$_SESSION['groups'][]="empty";

?>

<html>
<head>
    <title></title>
</head>
<body >

<div class="container">

    <?php //if ($privilege->add_privilege("users") == "1"){  //check privilege
    ?>
    <a href="user/create">Add User</a>
    <?php // } ?>

    <table class="table table-hover table-condensed table-bordered">

        <tr class="info">
            <th ><a1>User ID</a1></th>
            <th><a1>User Name</a1></th>
            <th><a1>First Name</a1></th>
            <th><a1>Last Name</a1></th>
            <th><a1>Email</a1></th>
            <th><a1>Mobile</a1></th>
            <th><a1>Owner</a1></th>
            <th><a1>Created Time</a1></th>
            <th><a1>Modified By</a1></th>
            <!-- <th><small>Modified Time</small></th> -->
            <!-- <th><small>Group</small></th> -->
            <th><a1>User Type</a1></th>
            <th><a1>SIP ID</a1></th> <th><a1>SIP Server</a1></th><th><a1>Agent Type</a1></th>
            <th><a1>SIP Login</a1></th>
            <th><a1>User Status</a1></th>

            <th></th>
        </tr>

        <?php

        foreach ($user_details as $row)
        {

        if($_SESSION['user_type']!='0'){   // check user can viwe this data
        ?>

        <tr>
            <td><a1><?php echo $row->id; ?></a1></td>
            <td><a1><?php echo $row->user_name; ?></a1></td>
            <td><a1><?php echo $row->user_firstname; ?></a1></td>
            <td><a1><?php echo $row->user_lastname; ?></a1></td>
            <td><a1><?php echo $row->user_email; ?></a1></td>
            <td><a1><?php echo $row->user_mobile; ?></a1></td>
            <td><a1><?php echo $row->owner; ?></a1></td>
            <td><a1><?php echo $row->user_created_time; ?></a1></td>
            <td><a1><?php echo $row->modify; ?></a1></td>
            <td><a1><?php if($row->user_is_admin==1){echo "Admin";}elseif($row->user_is_admin==0){echo "User";}else{echo "Supervisor";} ?></a1></td>
            <td><a1><?php echo $row->sipid; ?></a1></td>
            <td><a1><?php echo $row->sipserver; ?></a1></td>
            <td><a1><?php echo $row->agenttype; ?></a1></td>
            <td><a1><?php echo $row->siplogin; ?></a1></td>
            <td><a1><?php if($row->user_status==1){echo "Active";}else{echo "Inactive";} ?></a1></td>

            <td>

                <a href="user/{{$row->id}}/edit" class="glyphicon glyphicon-pencil" ></a>
                <a href="#" onclick="deleted({{ $row->id }})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a>

                </td>
        </tr>

        <?php
        }   // end of if
        }   // end of while
        ?>

    </table>
</div>

<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    function deleted(id){

        var token   = "{{ csrf_token() }}";
        var method  = "DELETE";

        var r = confirm("Confirm Delete!");

        if (r == true) {

            $.ajax({
                type: 'post',
                url: root_url + 'user/' + id,
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