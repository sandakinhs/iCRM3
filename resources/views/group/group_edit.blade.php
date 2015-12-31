@extends('navbar')
@section('navbar')

<?php
//if ($privilege->edit_privilege_one("groups",$_GET['gid'])=="1"){   //check privilege



?>


<body>

<?php

foreach($group_detail as $row){


?>

<form class="form-horizontal" id="form2" name="loginform" method="post" action="../{{$row->group_id}}">

    <input type="hidden" id="_method" name="_method" value="PATCH">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Edit Group</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <input type="hidden" class="form-control" id="group_id" name="group_id" value="<?php echo $row->group_id; ?>" readonly="readonly">

                    <table>
                        <tr>
                            <td><a>Group Name:</a></td><td> <a1><input type="text" id="group_name" name="group_name"  value="<?php echo $row->group_name; ?>" required></a1> </td>
                            <td><a>&nbsp Description:</a></td><td> <a1><input type="text" id="group_description" name="group_description" value="<?php echo $row->group_description; ?>" ></a1> </td>
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
                            <td> <a1>View: <input type="checkbox" name="calllog_view" id="calllog_view" value="" <?php if ($row->call_log>0){echo "checked"; } ?> ></a1> &nbsp</td>
                            <td> <a1>Add: <input type="checkbox" name="calllog_add" id="calllog_add" value="4" <?php if ($row->call_log>3 && $row->call_log<8){echo "checked"; } ?>  disabled="disabled"></a1> &nbsp</td>
                            <td> <a1>Edit: <input type="checkbox" name="calllog_edit" id="calllog_edit" value="2" <?php if ($row->call_log==2 || $row->call_log==3 || $row->call_log==6 || $row->call_log==7 ){echo "checked"; } ?>  disabled="disabled"></a1> &nbsp</td>
                            <td> <a1>Delete: <input type="checkbox" name="calllog_delete" id="calllog_delete" value="1" <?php if ($row->call_log%2==1){echo "checked"; } ?> disabled="disabled"></a1> &nbsp</td>
                        </tr>
                        <tr>
                            <td> <a1>Contact</td><td>&nbsp</td>
                            <td> <a1>View: <input type="checkbox" name="contact_view" id="contact_view" value="" <?php if ($row->contact>0){echo "checked"; } ?>></a1> </td>
                            <td> <a1>Add: <input type="checkbox" name="contact_add" id="contact_add" value="4" <?php if ($row->contact>3 && $row->contact<8 ){echo "checked"; } ?> disabled="disabled"></a1> </td>
                            <td> <a1>Edit: <input type="checkbox" name="contact_edit" id="contact_edit" value="2" <?php if ($row->contact==2 || $row->contact==3 || $row->contact==6 || $row->contact==7 ){echo "checked"; } ?> disabled="disabled"></a1> </td>
                            <td> <a1>Delete: <input type="checkbox" name="contact_delete" id="contact_delete" value="1" <?php if ($row->contact%2==1){echo "checked"; } ?> disabled="disabled"></a1> </td>
                        </tr>
                        <tr>
                            <td> <a1>Account</a1></td><td>&nbsp</td>
                            <td> <a1>View: <input type="checkbox" name="account_view" id="account_view" value="" <?php if ($row->account>0){echo "checked"; } ?> ></a1> </td>
                            <td> <a1>Add: <input type="checkbox" name="account_add" id="account_add" value="4" <?php if ($row->account>3 && $row->account<8){echo "checked"; } ?> disabled="disabled"></a1> </td>
                            <td> <a1>Edit: <input type="checkbox" name="account_edit" id="account_edit" value="2" <?php if ($row->account==2 || $row->account==3 || $row->account==6 || $row->account==7 ){echo "checked"; } ?> disabled="disabled"></a1> </td>
                            <td> <a1>Delete: <input type="checkbox" name="account_delete" id="account_delete" value="1" <?php if ($row->account%2==1){echo "checked"; } ?> disabled="disabled"></a1> </td>
                        </tr>
                        <tr>
                            <td><a1>Sales</a1></td><td>&nbsp</td>
                            <td><a1>View: <input type="checkbox" name="sales_view"  id="sales_view" value="" <?php if ($row->sales>0){echo "checked"; } ?> ></a1></td>
                            <td><a1>Add: <input type="checkbox" name="sales_add" id="sales_add" value="4" <?php if ($row->sales>3 && $row->sales<8){echo "checked"; } ?> disabled="disabled"></a1></td>
                            <td><a1>Edit: <input type="checkbox" name="sales_edit" id="sales_edit" value="2" <?php if ($row->sales==2 || $row->sales==3 || $row->sales==6 || $row->sales==7 ){echo "checked"; } ?> disabled="disabled"></a1></td>
                            <td><a1>Delete: <input type="checkbox" name="sales_delete" id="sales_delete" value="1" <?php if ($row->sales%2==1){echo "checked"; } ?> disabled="disabled"></a1></td>
                        </tr>
                        <tr>
                            <td><a1>Ticket</a1></td><td>&nbsp</td>
                            <td><a1>View: <input type="checkbox" name="ticket_view"  id="ticket_view" value="" <?php if ($row->ticket>0){echo "checked"; } ?> ></a1></td>
                            <td><a1>Add: <input type="checkbox" name="ticket_add" id="ticket_add" value="4" <?php if ($row->ticket>3 && $row->ticket<8){echo "checked"; } ?> disabled="disabled"></a1></td>
                            <td><a1>Edit: <input type="checkbox" name="ticket_edit" id="ticket_edit" value="2" <?php if ($row->ticket==2 || $row->ticket==3 || $row->ticket==6 || $row->ticket==7 ){echo "checked"; } ?> disabled="disabled"></a1></td>
                            <td><a1>Delete: <input type="checkbox" name="ticket_delete" id="ticket_delete" value="1" <?php if ($row->ticket%2==1){echo "checked"; } ?> disabled="disabled"></a1></td>
                        </tr>
                        <!--  <tr>
                  <td> <a1>User</td><td>&nbsp</td>
                  <td> <a1>View: <input type="checkbox" name="user_view" id="user_view" value="" <?php if ($row->user>0){echo "checked"; } ?> ></a1> </td>
                  <td> <a1>Add: <input type="checkbox" name="user_add" id="user_add" value="4" disabled="disabled" <?php if ($row->user>3 && $row->user<8 ){echo "checked"; } ?> disabled="disabled"></a1> </td>
                  <td> <a1>Edit: <input type="checkbox" name="user_edit" id="user_edit" value="2" disabled="disabled" <?php if ($row->user==2 || $row->user==3 || $row->user==6 || $row->user==7 ){echo "checked"; } ?>></a1> </td>
                  <td> <a1>Delete: <input type="checkbox" name="user_delete" id="user_delete" value="1" disabled="disabled" <?php if ($row->user%2==1){echo "checked"; } ?>></a1> </td>
                </tr> -->
                        <!-- <tr>
                  <td>Group</td><td>&nbsp</td>
                  <td>View: <input type="checkbox" name="group_view"  id="group_view" value="" <?php if ($row->group>0){echo "checked"; } ?>></td>
                  <td>Add: <input type="checkbox" name="group_add" id="group_add" value="4" disabled="disabled" <?php if ($row->group>3 && $row->group<8 ){echo "checked"; } ?> disabled="disabled"></td>
                  <td>Edit: <input type="checkbox" name="group_edit" id="group_edit" value="2" disabled="disabled" <?php if ($row->group==2 || $row->group==3 || $row->group==6 || $row->group==7 ){echo "checked"; } ?>></td>
                  <td>Delete: <input type="checkbox" name="group_delete" id="group_delete" value="1" disabled="disabled" <?php if ($row->group%2==1){echo "checked"; } ?>></td>
                </tr> -->
                    </table>

                </fieldset>

                <a1><input type="submit"  name="Submit" > <button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=group&action=view&alert=';">Cancel</button></a1>
            </div>
        </div>
    </div>
    <?php
        }
        ?>
    <br>

    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/group.js") }}"></script>

</form>

@stop