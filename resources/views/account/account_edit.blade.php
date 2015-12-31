@extends('navbar')
@section('navbar')

    <?php



?>

<html>
<head>
    <title></title>
</head>
<body>

<?php

$row = $account_details;

?>

<form id="form" method="post" action="../{{ $row->id }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Account Edit</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <table>
                        <tr>
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="_method" name="_method" value="PATCH">
                            <td><a>Name:</a></td><td> <a><input type="text" id="account_name" name="account_name" value="<?php echo $row->account_name; ?>" required="required"></a> </td>
                            <td><a>&nbsp Industry:</a></td><td> <a><input type="text" id="account_industry" name="account_industry" value="<?php echo $row->account_industry; ?>" ></a> </td>
                            <td><a>&nbsp Type:</a></td><td> <a><input type="text" id="account_type" name="account_type" value="<?php echo $row->account_type; ?>" ></a> </td>
                            <td><a>&nbsp Revenue:</a></td><td> <a><input type="text" id="account_revenue" name="account_revenue" value="<?php echo $row->account_revenue; ?>"></a> </td>
                            <td><a>&nbsp Group:</a></td><td>

                                <a><select name="group_id" id="group_id"  onchange="load_assignedto()">

                                        <?php

                                        foreach ($edit_group_accounts as $row1) {
                                        ?>

                                        <option value="<?php  echo $row1->group_id; ?>" <?php if($row->group==$row1->group_id){ echo 'selected="selected"';} ?> ><?php echo $row1->group_name;  ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select></a>

                            </td>
                            <td><a>&nbsp Assign To:&nbsp</a></td><td><div id="assignedto"  style="display:inline-block" ></a></div></td>
                        </tr>

                    </table>

                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Contact Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>Adress: No:</a></td><td> <a><input type="text" id="account_address_number" name="account_address_number" value="<?php echo $row->account_address_number; ?>"></a> </td>
                            <td><a>&nbsp Street :</a></td><td> <a><input type="text" id="account_address_street" name="account_address_street" value="<?php echo $row->account_address_street; ?>"></a> </td>
                            <td><a>&nbsp City :</a></td><td> <a><input type="text" id="account_address_city" name="account_address_city" value="<?php echo $row->account_address_city; ?>"></a> </td>
                            <td><a>&nbsp District :</a></td><td> <a><input type="text" id="account_address_district" name="account_address_district" value="<?php echo $row->account_address_district; ?>"></a> </td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Telephone No:</a></td><td> <a><input type="number" id="account_telephone" name="account_telephone"  required="required" value="<?php echo $row->account_telephone; ?>"></a> </td>
                            <td><a>&nbsp Fax:</a></td><td> <a><input type="number" id="account_fax" name="account_fax" value="<?php echo $row->account_fax; ?>"></a> </td>
                            <td><a>&nbsp Email :</a></td><td> <a><input type="email" id="account_email" name="account_email" value="<?php echo $row->account_email; ?>"></a> &nbsp</td>
                            <td>&nbsp <a><button type="submit" name="Submit" id="submit">Save</button>&nbsp <a><button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=account&action=view&alert=';" >Cancel </button></a> </td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td> <a><span id="availability_status"></span></a> </td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                    </table>

                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Contacts in this Account</aa>
                    </legend>

                    <iframe src="<?php echo Request::root(); ?>/account_contacts/{{ $row->id }}" frameborder="0" width="100%" height="600"></iframe>

                </fieldset>

            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript">
        var root_url = "<?php echo Request::root(); ?>/"; // put this in php file
    </script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>

</form>

</body>
</html>

    @stop