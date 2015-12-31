<?php

$row = $user_privilege;
        
?>
<table>
    <tr>
        <td><a>Call Log</a></td>
        <td>&nbsp</td>
        <td> <a>View: <input type="checkbox" name="calllog_view" id="calllog_view" value="" <?php if ($row->call_log >0){echo "checked"; } ?> ></a> &nbsp</td>
        <td> <a>Add: <input type="checkbox" name="calllog_add" id="calllog_add" value="4" <?php if ($row->call_log >3 && $row->call_log <8){echo "checked"; } ?>  disabled="disabled"></a> &nbsp</td>
        <td> <a>Edit: <input type="checkbox" name="calllog_edit" id="calllog_edit" value="2" <?php if ($row->call_log ==2 || $row->call_log ==3 || $row->call_log ==6 || $row->call_log ==7 ){echo "checked"; } ?>  disabled="disabled"></a> &nbsp</td>
        <td> <a>Delete: <input type="checkbox" name="calllog_delete" id="calllog_delete" value="1" <?php if ($row->call_log %2==1){echo "checked"; } ?> disabled="disabled"></a> &nbsp</td>
    </tr>
    <tr>
        <td> <a>Contact</a> </td><td>&nbsp</td>
        <td> <a>View: <input type="checkbox" name="contact_view" id="contact_view" value="" <?php if ($row->contact >0){echo "checked"; } ?>></a> </td>
        <td> <a>Add: <input type="checkbox" name="contact_add" id="contact_add" value="4" <?php if ($row->contact >3 && $row->contact <8 ){echo "checked"; } ?> disabled="disabled"></a> </td>
        <td> <a>Edit: <input type="checkbox" name="contact_edit" id="contact_edit" value="2" <?php if ($row->contact ==2 || $row->contact ==3 || $row->contact ==6 || $row->contact ==7 ){echo "checked"; } ?> disabled="disabled"></a> </td>
        <td> <a>Delete: <input type="checkbox" name="contact_delete" id="contact_delete" value="1" <?php if ($row->contact %2==1){echo "checked"; } ?> disabled="disabled"></a> </td>
    </tr>
    <tr>
        <td> <a>Account</a> </td><td>&nbsp</td>
        <td> <a>View: <input type="checkbox" name="account_view" id="account_view" value="" <?php if ($row->account >0){echo "checked"; } ?> ></a> </td>
        <td> <a>Add: <input type="checkbox" name="account_add" id="account_add" value="4" <?php if ($row->account >3 && $row->account <8){echo "checked"; } ?> disabled="disabled"></a> </td>
        <td> <a>Edit: <input type="checkbox" name="account_edit" id="account_edit" value="2" <?php if ($row->account ==2 || $row->account ==3 || $row->account ==6 || $row->account ==7 ){echo "checked"; } ?> disabled="disabled"></a> </td>
        <td> <a>Delete: <input type="checkbox" name="account_delete" id="account_delete" value="1" <?php if ($row->account %2==1){echo "checked"; } ?> disabled="disabled"></a> </td>
    </tr>
    <tr>
        <td><a1>Sales</a1></td><td>&nbsp</td>
        <td><a1>View: <input type="checkbox" name="sales_view"  id="sales_view" value="" <?php if ($row->sales >0){echo "checked"; } ?> ></a1></td>
        <td><a1>Add: <input type="checkbox" name="sales_add" id="sales_add" value="4" <?php if ($row->sales >3 && $row->sales <8){echo "checked"; } ?> disabled="disabled"></a1></td>
        <td><a1>Edit: <input type="checkbox" name="sales_edit" id="sales_edit" value="2" <?php if ($row->sales ==2 || $row->sales ==3 || $row->sales ==6 || $row->sales ==7 ){echo "checked"; } ?> disabled="disabled"></a1></td>
        <td><a1>Delete: <input type="checkbox" name="sales_delete" id="sales_delete" value="1" <?php if ($row->sales %2==1){echo "checked"; } ?> disabled="disabled"></a1></td>
    </tr>
    <tr>
        <td><a1>Ticket</a1></td><td>&nbsp</td>
        <td><a1>View: <input type="checkbox" name="ticket_view"  id="ticket_view" value="" <?php if ($row->ticket >0){echo "checked"; } ?> ></a1></td>
        <td><a1>Add: <input type="checkbox" name="ticket_add" id="ticket_add" value="4" <?php if ($row->ticket >3 && $row->ticket <8){echo "checked"; } ?> disabled="disabled"></a1></td>
        <td><a1>Edit: <input type="checkbox" name="ticket_edit" id="ticket_edit" value="2" <?php if ($row->ticket ==2 || $row->ticket ==3 || $row->ticket ==6 || $row->ticket ==7 ){echo "checked"; } ?> disabled="disabled"></a1></td>
        <td><a1>Delete: <input type="checkbox" name="ticket_delete" id="ticket_delete" value="1" <?php if ($row->ticket %2==1){echo "checked"; } ?> disabled="disabled"></a1></td>
    </tr>
    <!--  <tr>
                  <td> <a>User</a> </td><td>&nbsp</td>
                  <td> <a>View: <input type="checkbox" name="user_view" id="user_view" value="" <?php if ($row->user >0){echo "checked"; } ?> ></a> </td>
                  <td> <a>Add: <input type="checkbox" name="user_add" id="user_add" value="4" disabled="disabled" <?php if ($row->user >3 && $row->user <8 ){echo "checked"; } ?> disabled="disabled"></a> </td>
                  <td> <a>Edit: <input type="checkbox" name="user_edit" id="user_edit" value="2" disabled="disabled" <?php if ($row->user ==2 || $row->user ==3 || $row->user ==6 || $row->user ==7 ){echo "checked"; } ?>></a> </td>
                  <td> <a>Delete: <input type="checkbox" name="user_delete" id="user_delete" value="1" disabled="disabled" <?php if ($row->user %2==1){echo "checked"; } ?>></a> </td>
                </tr> -->
    <!-- <tr>
                  <td>Group</td><td>&nbsp</td>
                  <td>View: <input type="checkbox" name="group_view"  id="group_view" value="" <?php if ($row->group >0){echo "checked"; } ?>></td>
                  <td>Add: <input type="checkbox" name="group_add" id="group_add" value="4" disabled="disabled" <?php if ($row->group >3 && $row->group <8 ){echo "checked"; } ?> disabled="disabled"></td>
                  <td>Edit: <input type="checkbox" name="group_edit" id="group_edit" value="2" disabled="disabled" <?php if ($row->group ==2 || $row->group ==3 || $row->group ==6 || $row->group ==7 ){echo "checked"; } ?>></td>
                  <td>Delete: <input type="checkbox" name="group_delete" id="group_delete" value="1" disabled="disabled" <?php if ($row->group %2==1){echo "checked"; } ?>></td>
                </tr> -->
</table>
<a><button type="button" onclick="submitprivi()">Submit</button></a>

<script type="text/javascript" src="{{ asset("assets/js/custom/group.js") }}"></script>
