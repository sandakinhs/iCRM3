@extends('navbar')
@section('navbar')

<div class="container">

    <a href="item/create">Add Item</a>

    <table class="table table-hover table-condensed table-bordered">

        <tr class="info">
            <th ><a1>Name</a1a1></th>
            <th><a1>Code</a1></th>
            <th><a1>Description</a1></th>
            <th><a1>Owner</a1></th>
            <th><a1>Created Time</a1></th>
            <th><a1>Modified By</a1></th>
            <th><a1>Modified Time</a1></th>
            <th><a1>Category</a1></th>
            <th><a1>UOF</a1></th>
            <th><a1>Unit Price</a1></th>
            <th><a1>Tax</a1></th>
            <th></th>
        </tr>

        <?php

        foreach ($item_details as $row )
        {

        ?>

        <tr>
            <td><a1><?php echo $row->name; ?></a1></td>
            <td><a1><?php echo $row->code; ?></a1></td>
            <td><a1><?php echo $row->description; ?></a1></td>
            <td><a1><?php echo $row->owner_name; ?></a1></td>
            <td><a1><?php echo $row->created_time; ?></a1></td>
            <td><a1><?php echo $row->modi; ?></a1></td>
            <td><a1><?php echo $row->modified_time; ?></a1></td>
            <td><a1><?php echo $row->category_name; ?></a1></td>
            <td><a1><?php echo $row->uof; ?></a1></td>
            <td><a1><?php echo $row->unit_price; ?></a1></td>
            <td><a1><?php echo $row->tax_name; ?></a1></td>
            <td>
                <a href="item/{{ $row->id }}/edit " class="glyphicon glyphicon-pencil" ></a>
                <a href="#" onclick="deleted({{ $row->id }})" class="glyphicon glyphicon-remove-circle" style="color:red" ></a>

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
                url: root_url + 'item/' + id,
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