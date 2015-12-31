@extends('navbar')
@section('navbar')

<?php
//if ($privilege->add_privilege("accounts") == "1"){    //check privileges

if(isset($_POST['Submit'])){

}

?>

<html>
<head>
    <title></title>
</head>
<body>
<form id="form" method="post" action="../account">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Account Add</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <table>
                        <tr>
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <td><a>Name:</a></td><td><a><input type="text" id="account_name" name="account_name" required="required"></a> </td>
                            <td><a>&nbsp Industry:</a></td><td><a><input type="text" id="account_industry" name="account_industry" ></a> </td>
                            <td><a>&nbsp Type:</a></td><td><a><input type="text" id="account_type" name="account_type" ></a> </td>
                            <td><a>&nbsp Revenue:</a></td><td><a><input type="text" id="account_revenue" name="account_revenue"></a></td>
                            <td><a>&nbsp Group:</a></td><td><a> <select name="group_id" id="group_id" >

                                        <?php

                                        foreach ($add_group_accounts as $row1) {
                                        ?>

                                        <option value="<?php  echo $row1->group_id; ?>"><?php echo $row1->group_name;  ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select></a></td>
                        </tr>

                    </table>

                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Contact Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>Adress: No:</a></td><td> <a><input type="text" id="account_address_number" name="account_address_number" ></a></td>
                            <td><a>&nbsp Street :</a></td><td> <a><input type="text" id="account_address_street" name="account_address_street" ></a></td>
                            <td><a>&nbsp City :</a></td><td> <a><input type="text" id="account_address_city" name="account_address_city" ></a></td>
                            <td><a>&nbsp District :</a></td><td> <a><input type="text" id="account_address_district" name="account_address_district" ></a></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Telephone No:</a></td><td> <a><input type="number" id="account_telephone" name="account_telephone"  required="required"></a></td>
                            <td><a>&nbsp Fax:</a></td><td> <a><input type="number" id="account_fax" name="account_fax" ></a></td>
                            <td><a>&nbsp Email :</a></td><td> <a><input type="email" id="account_email" name="account_email" ></a> &nbsp</td>
                            <td>&nbsp <a><button type="submit" name="Submit" id="submit">Save</button></a> &nbsp <a><button type="button" onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=account&action=view&alert=';" >Cancel </button></a> </td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td> <a><span id="availability_status"></span></a> </td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>


                    </table>

                </fieldset>

            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript">
        var root_url = "<?php echo Request::root(); ?>/"; // put this in php file
    </script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
</form>

</body>
</html>

@stop

