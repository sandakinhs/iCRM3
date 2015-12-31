@extends('navbar')
@section('navbar')

<!DOCTYPE html>
<html>
<head>

    <title></title>
</head>
<body>


<form class="form-horizontal" id="form2" name="loginform" method="post" action="../group">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Add Group</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>Group Name:</a></td><td> <a1><input type="text" id="group_name" name="group_name" required></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="group_description" name="group_description" ></a1> </td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                    </table>
                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Privilege</aa>
                    </legend>

                    <table>
                        <tr>
                            <td> <a1>Call Log</a1> </td>
                            <td>&nbsp</td>
                            <td> <a1>View: <input type="checkbox" name="calllog_view" id="calllog_view" value="0"></a1> &nbsp</td>
                            <td> <a1>Add: <input type="checkbox" name="calllog_add" id="calllog_add" value="4" disabled="disabled"></a1> &nbsp</td>
                            <td> <a1>Edit: <input type="checkbox" name="calllog_edit" id="calllog_edit" value="2" disabled="disabled"></a1> &nbsp</td>
                            <td> <a1>Delete: <input type="checkbox" name="calllog_delete" id="calllog_delete" value="1" disabled="disabled"></a1> &nbsp</td>
                        </tr>
                        <tr>
                            <td> <a1>Contact</td><td>&nbsp</td>
                            <td> <a1>View: <input type="checkbox" name="contact_view" id="contact_view" value=""></a1> </td>
                            <td> <a1>Add: <input type="checkbox" name="contact_add" id="contact_add" value="4" disabled="disabled"></a1> </td>
                            <td> <a1>Edit: <input type="checkbox" name="contact_edit" id="contact_edit" value="2" disabled="disabled"></a1> </td>
                            <td> <a1>Delete: <input type="checkbox" name="contact_delete" id="contact_delete" value="1" disabled="disabled"></a1> </td>
                        </tr>
                        <tr>
                            <td> <a1>Account</a1> </td><td>&nbsp</td>
                            <td> <a1>View: <input type="checkbox" name="account_view" id="account_view" value=""></a1> </td>
                            <td> <a1>Add: <input type="checkbox" name="account_add" id="account_add" value="4" disabled="disabled"></a1> </td>
                            <td> <a1>Edit: <input type="checkbox" name="account_edit" id="account_edit" value="2" disabled="disabled"></a1> </td>
                            <td> <a1>Delete: <input type="checkbox" name="account_delete" id="account_delete" value="1" disabled="disabled"></a1> </td>
                        </tr>
                        <tr>
                            <td><a1>Sales</a1></td><td>&nbsp</td>
                            <td><a1>View: <input type="checkbox" name="sales_view"  id="sales_view" value=""></a1></td>
                            <td><a1>Add: <input type="checkbox" name="sales_add" id="sales_add" value="4" disabled="disabled"></a1></td>
                            <td><a1>Edit: <input type="checkbox" name="sales_edit" id="sales_edit" value="2" disabled="disabled"></a1></td>
                            <td><a1>Delete: <input type="checkbox" name="sales_delete" id="sales_delete" value="1" disabled="disabled"></a1></td>
                        </tr>
                        <tr>
                            <td><a1>Ticket</a1></td><td>&nbsp</td>
                            <td><a1>View: <input type="checkbox" name="ticket_view"  id="ticket_view" value=""></a1></td>
                            <td><a1>Add: <input type="checkbox" name="ticket_add" id="ticket_add" value="4" disabled="disabled"></a1></td>
                            <td><a1>Edit: <input type="checkbox" name="ticket_edit" id="ticket_edit" value="2" disabled="disabled"></a1></td>
                            <td><a1>Delete: <input type="checkbox" name="ticket_delete" id="ticket_delete" value="1" disabled="disabled"></a1></td>
                        </tr>
                        <!-- <tr>
                          <td> <a1>User</td><td>&nbsp</td>
                          <td> <a1>View: <input type="checkbox" name="user_view" id="user_view" value=""></a1> </td>
                          <td> <a1>Add: <input type="checkbox" name="user_add" id="user_add" value="4" disabled="disabled"></a1> </td>
                          <td> <a1>Edit: <input type="checkbox" name="user_edit" id="user_edit" value="2" disabled="disabled"></a1> </td>
                          <td> <a1>Delete: <input type="checkbox" name="user_delete" id="user_delete" value="1" disabled="disabled"></a1> </td>
                        </tr> -->
                        <!--  <tr>
                           <td>Group</td><td>&nbsp</td>
                           <td>View: <input type="checkbox" name="group_view"  id="group_view" value=""></td>
                           <td>Add: <input type="checkbox" name="group_add" id="group_add" value="4" disabled="disabled"></td>
                           <td>Edit: <input type="checkbox" name="group_edit" id="group_edit" value="2" disabled="disabled"></td>
                           <td>Delete: <input type="checkbox" name="group_delete" id="group_delete" value="1" disabled="disabled"></td>
                         </tr> -->
                    </table>

                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Existing Groups</aa>
                    </legend>

                    <table class="table table-hover table-condensed ">
                        <tr class="info">
                            <!-- <th><a1>Group ID</a1></th> -->
                            <th><a1>Name</a1></th>
                            <th><a1>Owner</a1></th>
                            <th><a1>Created Time</a1></th>
                            <th><a1>Modified By</a1></th>
                            <th><a1>Modified Time</a1></th>
                            <th><a1>Description</a1></th>
                            <!-- <th></th> -->
                        </tr>

                        <?php

                        foreach ($groups_details as $row)
                        {
                        ?>

                        <tr>

                            <td><a1><?php echo $row->group_name; ?></a1></td>
                            <td><a1><?php echo $row->owner; ?></a1></td>
                            <td><a1><?php echo $row->group_created_time; ?></a1></td>
                            <td><a1><?php echo $row->modi; ?></a1></td>
                            <td><a1><?php echo $row->group_modified_time; ?></a1></td>
                            <td><a1><?php echo $row->group_description; ?></a1></td>

                        </tr>
                        <?php
                        }
                        ?>

                    </table>

                </fieldset>

                <a1><input type="submit" name="Submit" > <button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=group&action=view&alert=';">Cancel</button></a1>
            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/group.js") }}"></script>

</form>

@stop