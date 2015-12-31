@extends('navbar')
@section('navbar')
<div class="container">

    <a href="ticket_category/create">Add Category</a>

    <table class="table table-hover table-condensed table-bordered">

        <tr class="info">
            <th ><a1>Category</a1></th>
            <th><a1>Description</a1></th>
            <th><a1>Owner</a1></th>
            <th><a1>Created Time</a1></th>
            <th><a1>Modified By</a1></th>
            <th><a1>Modified Time</a1></th>
            <th></th>
        </tr>

        <?phpinjec


        foreach ($ticket_detail as $row )
        {

        ?>

        <tr>
            <td><a1><?php echo $row->category; ?></a1></td>
            <td><a1><?php echo $row->description; ?></a1></td>
            <td><a1><?php echo $row->owner; ?></a1></td>
            <td><a1><?php echo $row->created_time; ?></a1></td>
            <td><a1><?php echo $row->modified_by; ?></a1></td>
            <td><a1><?php echo $row->modified_time; ?></a1></td>
            <td>
                <a href="ticket_category/{{ $row->id }}/edit" class="glyphicon glyphicon-pencil" ></a>
                <a href="#" onclick="deleted({{$row->id}})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a>
            </td>
        </tr>

        <?php
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
                    url: root_url + 'ticket_category/' + id,
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