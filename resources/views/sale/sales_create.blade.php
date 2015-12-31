@extends('navbar')
@section('navbar')

    <script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    $(document).ready(function(){
        $("#content").load(root_url+"sales/sale_add_products");
    });

    function pop_up(url,windowName) {
        newwindow=window.open(url,windowName,'height=400,width=400');
        if (window.focus) {newwindow.focus()}

    }
</script>

<?php


if(isset($_POST['sales']))
{

// echo "string";

    $sales -> add_sale();

    echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?loc=sales&action=view&alert=successful";</script> ';


}


if(isset($_SESSION['contact_report_to'])) // this will set if
{

    $row = $contact_detial;

    $id=$row->id;
    $contact_firstname=$row->contact_firstname;
    $contact_lastname=$row->contact_lastname;
    $contact_title=$row->contact_title;
    $contact_gender=$row->contact_gender;
    $contact_email1=$row->contact_email1;
    $contact_no=$row->contact_no;
    $contact_address_number=$row->contact_address_number;
    $contact_address_street=$row->contact_address_street;
    $contact_address_city=$row->contact_address_city;
    $contact_address_district=$row->contact_address_district;
    $contact_shipping_address_number=$row->contact_shipping_address_number;
    $contact_shipping_address_street=$row->contact_shipping_address_street;
    $contact_shipping_address_city=$row->contact_shipping_address_city;
    $contact_shipping_address_district=$row->contact_shipping_address_district;
    $contact_birthday=$row->contact_birthday;
    $flag_2=1;

}else{


    $id=NULL;
    $contact_firstname=NULL;
    $contact_lastname=NULL;
    $contact_title=NULL;
    $contact_gender=NULL;
    $contact_email1=NULL;
    $contact_no=NULL;
    $contact_address_number=NULL;
    $contact_address_street=NULL;
    $contact_address_city=NULL;
    $contact_address_district=NULL;
    $contact_shipping_address_number=NULL;
    $contact_shipping_address_street=NULL;
    $contact_shipping_address_city=NULL;
    $contact_shipping_address_district=NULL;
    $contact_birthday=NULL;
    $flag_2=2;

}
?>

<body>

<form id="form" method="post" action="../sale">


    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Add Sale</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Customer Information</aa>
                    </legend>
                    <table>
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" disabled="true">
                        <tr>

                            <td ><a href="#"  onclick="pop_up('../popup/contactsearch','1');submitform();"  href="#"><span class="glyphicon glyphicon-plus" style="font-size: 15px"></span></a> <a>Title:</a></td>
                            <td><a>
                                    <select name="contact_title" id="contact_title" disabled="true">
                                        <option <?php if($contact_title=="Mr"){ echo 'selected="selected"'; } ?> value="Mr">Mr.</option>
                                        <option <?php if($contact_title=="Mrs"){ echo 'selected="selected"'; } ?> value="Mrs">Mrs.</option>
                                        <option <?php if($contact_title=="Miss"){ echo 'selected="selected"'; } ?> value="Miss">Miss.</option>
                                        <option <?php if($contact_title=="Ms"){ echo 'selected="selected"'; } ?> value="Ms">Ms.</option>
                                    </select></a>

                            </td>

                            <td><a>First Name:</a></td><td>
                                <a><input type="text" id="contact_firstname" name="contact_firstname" value="<?php echo $contact_firstname; ?>"  readOnly="readOnly" required="required"></a>
                            </td>

                            <td><a>&nbsp Last Name:</a></td><td>
                                <a><input type="text" id="contact_lastname" name="contact_lastname" value="<?php echo $contact_lastname; ?>" readOnly="readOnly"><a>
                            </td>

                            <td><a>&nbsp Gender:</a></td><td>
                                <a><select name="contact_gender" id="contact_gender"  disabled="true">
                                        <option <?php if($contact_gender=="male"){ echo 'selected="selected"'; } ?> value="male">Male</option>
                                        <option <?php if($contact_gender=="female"){ echo 'selected="selected"'; } ?> value="female">female</option>
                                    </select></a>

                            </td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>D.O.B:</a></td><td><a><input type="date" id="contact_birthday" name="contact_birthday" value="<?php echo $contact_birthday; ?>" readOnly="readOnly" ></a></td>




                            <td> </td>
                            <?php
                            if(isset($_SESSION['contact_report_to'])) // this will set if
                            {
                                echo "<td><a href='".$_SERVER['PHP_SELF']."?loc=contact&action=edit&cid=".$_SESSION['contact_report_to']."'><button type='button'>Edit</button></a></td>";
                            }else{
                                echo "<td><a href='".$_SERVER['PHP_SELF']."?loc=contact&action=add&alert='><button type='button'>Add</button></a></td>";
                            }
                            ?>
                        </tr>
                    </table>
                </fieldset>


                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Contact Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>Contact Adress: No:</a></td><td><a><input type="text" id="contact_address_number" name="contact_address_number" value="<?php echo $contact_address_number; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Street :</a></td><td><a><input type="text" id="contact_address_street" name="contact_address_street" value="<?php echo $contact_address_street; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp City :</a></td><td><a><input type="text" id="contact_address_city" name="contact_address_city" value="<?php echo $contact_address_city; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp District :</a></td><td><a><input type="text" id="contact_address_district" name="contact_address_district" value="<?php echo $contact_address_district; ?>" readOnly="readOnly"></a></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Delivery Adress: No:</a></td><td><a><input type="text" id="contact_shipping_address_number" name="contact_shipping_address_number" value="<?php echo $contact_shipping_address_number; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Street :</a></td><td><a><input type="text" id="contact_shipping_address_street" name="contact_shipping_address_street" value="<?php echo $contact_shipping_address_street; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp City :</a></td><td><a><input type="text" id="contact_shipping_address_city" name="contact_shipping_address_city" value="<?php echo $contact_shipping_address_city; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp District :</a></td><td><a><input type="text" id="contact_shipping_address_district" name="contact_shipping_address_district" value="<?php echo $contact_shipping_address_district; ?>" readOnly="readOnly"></a></td>
                        </tr>


                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Mobile No:</a></td><td><a><input type="number" id="contact_no" name="contact_no" value="<?php echo $contact_no; ?>" required="required" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Email :</a></td><td><a><input type="email" id="contact_email1" name="contact_email1" value="<?php echo $contact_email1; ?>" readOnly="readOnly"></a></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td><a><span id="availability_status"></span></a></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>


                    </table>

                </fieldset>


                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Sales</aa>
                    </legend>

                    <div id ="content" > </div>

                    <table>
                        <tr>
                            <td><a>&nbsp Group:</a></td>
                            <td>

                                <a><select name="group_id" id="group_id"  onchange="load_assignedto()">

                                        <?php

                                        foreach ($add_group_sales as $row1) {
                                        ?>

                                        <option value="<?php  echo $row1->group_id; ?>"><?php echo $row1->group_name;  ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select></a>

                            </td>
                            <td><a>&nbsp Assign To:&nbsp</a></td><td><div id="assignedto"  style="display:inline-block" ></div></td>

                            <td>&nbsp</td><td><a><input type="submit" name="sales" value="Save" <?php if ($contact_firstname==NULL) {
                                        echo "disabled";
                                    }  ?> ></a> <a href="<?php $_SERVER['PHP_SELF']?>?loc=sales&action=view"><button type="button" >Cancel </button></a></td>
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
    <script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/contact.js") }}"></script>


</form>

</body>

    @stop