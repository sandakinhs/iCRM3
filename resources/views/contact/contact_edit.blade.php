@extends('navbar')
@section('navbar')

<?php

if(isset($_POST['submit']))
{

unset($_SESSION['flag1']);  // unset flasg1

$ob1->editcontact($_SESSION['cid'],
$_POST['contact_firstname'],
$_POST['contact_lastname'],
$_POST['contact_title'],
$_POST['contact_gender'],
$_POST['contact_email1'],
$_POST['contact_no'],
$_POST['contact_mobile2'],
$_POST['contact_work_phone'],
$_POST['contact_work_fax'],
$_POST['contact_category'],
$_POST['contact_address_number'],
$_POST['contact_address_street'],
$_POST['contact_address_city'],
$_POST['contact_address_district'],
$_POST['contact_shipping_address_number'],
$_POST['contact_shipping_address_street'],
$_POST['contact_shipping_address_city'],
$_POST['contact_shipping_address_district'],
$_POST['contact_work_address_number'],
$_POST['contact_work_address_street'],
$_POST['contact_work_address_city'],
$_POST['contact_work_address_district'],
$_POST['contact_work_companyname'],
$_POST['contact_work_email'],
$_POST['contact_work_department'],
$_POST['contact_birthday'],
$_POST['group_id'],
$_POST['assigned_to'],
$_POST['contact_report_to'] );

unset($_SESSION['contact_assign']);

if(isset($_SESSION['from'])){
if($_SESSION['from']=="phonikip"){

echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?loc=phonikip";</script> ';

}elseif ($_SESSION['from']=="sales") {
echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?loc=sales&action=add";</script> ';
}


}
else{
// header("Location:".$_SERVER['PHP_SELF']."?loc=contact&action=view&alert=successful");

echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'?loc=contact&action=view&alert=successful";</script> ';


}

}
else
{

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<?php


if(isset($_SESSION['flag1'])) // this will set if 
{

    $contact_firstname=$_SESSION['contact_firstname'];
    $contact_lastname=$_SESSION['contact_lastname'];
    $contact_title=$_SESSION['contact_title'];
    $contact_gender=$_SESSION['contact_gender'];
    $contact_email1=$_SESSION['contact_email1'];
    $contact_no=$_SESSION['contact_no'];
    $contact_mobile2=$_SESSION['contact_mobile2'];
    $contact_work_phone=$_SESSION['contact_work_phone'];
    $contact_work_fax=$_SESSION['contact_work_fax'];
    $contact_category=$_SESSION['contact_category'];
    $contact_address_number=$_SESSION['contact_address_number'];
    $contact_address_street=$_SESSION['contact_address_street'];
    $contact_address_city=$_SESSION['contact_address_city'];
    $contact_address_district=$_SESSION['contact_address_district'];
    $contact_shipping_address_number=$_SESSION['contact_shipping_address_number'];
    $contact_shipping_address_street=$_SESSION['contact_shipping_address_street'];
    $contact_shipping_address_city=$_SESSION['contact_shipping_address_city'];
    $contact_shipping_address_district=$_SESSION['contact_shipping_address_district'];
    $contact_work_address_number=$_SESSION['contact_work_address_number'];
    $contact_work_address_street=$_SESSION['contact_work_address_street'];
    $contact_work_address_city=$_SESSION['contact_work_address_city'];
    $contact_work_address_district=$_SESSION['contact_work_address_district'];
    $contact_work_companyname=$_SESSION['contact_work_companyname'];
    $contact_work_email=$_SESSION['contact_work_email'];
    $contact_work_department=$_SESSION['contact_work_department'];
    $contact_birthday=$_SESSION['contact_birthday'];
    $contact_assign=$_SESSION['contact_assign'];
    $group1=$_SESSION['group1'];
    $contact_report_to=$_SESSION['contact_report_to'];
    $account_id=$_SESSION['account_id'];
    $id=$_SESSION['contact_id'];
    $contact_work_email1=$_SESSION['contact_work_email1'];
    $designation=$_SESSION['designation'];

}else{

    $row=$contact_detial;

    $contact_firstname=$row->contact_firstname;
    $contact_lastname=$row->contact_lastname;
    $contact_title=$row->contact_title;
    $contact_gender=$row->contact_gender;
    $contact_email1=$row->contact_email1;
    $contact_no=$row->contact_no;
    $contact_mobile2=$row->contact_mobile2;
    $contact_work_phone=$row->contact_work_phone;
    $contact_work_fax=$row->contact_work_fax;
    $contact_category=$row->contact_category;
    $contact_address_number=$row->contact_address_number;
    $contact_address_street=$row->contact_address_street;
    $contact_address_city=$row->contact_address_city;
    $contact_address_district=$row->contact_address_district;
    $contact_shipping_address_number=$row->contact_shipping_address_number;
    $contact_shipping_address_street=$row->contact_shipping_address_street;
    $contact_shipping_address_city=$row->contact_shipping_address_city;
    $contact_shipping_address_district=$row->contact_shipping_address_district;
    $contact_work_address_number=$row->contact_work_address_number;
    $contact_work_address_street=$row->contact_work_address_street;
    $contact_work_address_city=$row->contact_work_address_city;
    $contact_work_address_district=$row->contact_work_address_district;
    $contact_work_companyname=$row->contact_work_companyname;
    $contact_work_email=NULL;
    $contact_work_department=$row->contact_work_department;
    $contact_birthday=$row->contact_birthday;
    $contact_assign=$row->assignedto;
    $group1=$row->group_id;
    $contact_report_to=$row->contact_report_to;
    $account_id=$row->account_id;
    $id=$row->id;
    $_SESSION['contact_id'] = $row->id;
    $contact_work_email1=$row->contact_work_email;
    $designation=$row->designation;

    $_SESSION['contact_assign']=$row->assignedto;
    $_SESSION['contact_account']=$row->contact_account;




}


?>

<body>

<form id="form" method="post" action="../{{ $id }}">

    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Contact Edit</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <table>
                        <tr>

                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <td ><a class="text-left">Title:</a></td><td>
                                <a><select name="contact_title" id="contact_title"  >
                                        <option selected="selected" value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Miss">Miss.</option>
                                        <option value="Ms">Ms.</option>
                                    </select></a>
                            </td>



                            <td><a>First Name:</a></td><td> <input type="hidden" id="_method" name="_method" value="PATCH">
                                <a><input type="text" id="contact_firstname" name="contact_firstname" value="<?php echo $contact_firstname; ?>" required="required"></a>
                            </td>



                            <td><a>&nbsp Last Name:</a></td><td>
                                <a><input type="text" id="contact_lastname" name="contact_lastname" value="<?php echo $contact_lastname; ?>"></a>
                            </td>



                            <td><a>&nbsp Gender:</a></td><td>
                                <a><select name="contact_gender" id="contact_gender"  >
                                        <option selected="selected" value="male">Male</option>
                                        <option value="female">female</option>
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
                            <td><a>D.O.B:</a></td><td><a><input type="date" id="contact_birthday" name="contact_birthday" value="<?php echo $contact_birthday; ?>"></a></td>
                            <!--  <td><a>&nbsp Category:</a></td><td><a><input type="text" id="contact_category" name="contact_category" value="<?php echo $contact_category; ?>"></a></td> -->
                            <td><a>&nbsp Category:</a></td><td><a><select name="contact_category" id="contact_category">
                                        <?php

                                        foreach ($contact_category_data as $row5)
                                        {
                                        ?>
                                        <option <?php if($contact_category == $row5->id){ echo 'selected="selected"'; } ?> value="<?php echo $row5->id?>"><?php echo $row5->name ?></option>
                                        <?php   }  ?>
                                    </select></a></td>
                            <td><a>&nbsp Group:</a></td><td>

                                <a><select name="group_id" id="group_id"  onchange="load_assignedto()">

                                        <?php

                                        foreach ($edit_group_contacts as $row1) {
                                        ?>

                                        <option value="<?php  echo $row1->group_id; ?>" <?php if($group1==$row1->group_id){ echo 'selected="selected"';} ?> ><?php echo $row1->group_name;  ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select></a>

                            </td>
                            <td><a>&nbsp Assign To:&nbsp</a></td><td><div id="assignedto"  style="display:inline-block" ></a></div></td>

                        </tr>
                        </tr>
                    </table>


                </fieldset>


                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Contact Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>Contact Adress: No:</a></td><td><a><input type="text" id="contact_address_number" name="contact_address_number" value="<?php echo $contact_address_number; ?>"></a></td>
                            <td><a>&nbsp Street :</a></td><td><a><input type="text" id="contact_address_street" name="contact_address_street" value="<?php echo $contact_address_street; ?>"></a></td>
                            <td><a>&nbsp City :</a></td><td><a><input type="text" id="contact_address_city" name="contact_address_city" value="<?php echo $contact_address_city; ?>"></a></td>
                            <td><a>&nbsp District :</a></td><td><a><input type="text" id="contact_address_district" name="contact_address_district" value="<?php echo $contact_address_district; ?>"></a> <a><button type="button" onclick="copy_address_to_delivery()">Copy To Delivery</button></a> <a><button type="button" onclick="copy_address_to_work()">Copy To Work</button></a></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Delivery Adress: No:</a></td><td><a><input type="text" id="contact_shipping_address_number" name="contact_shipping_address_number" value="<?php echo $contact_shipping_address_number; ?>"></a></td>
                            <td><a>&nbsp Street :</a></td><td><a><input type="text" id="contact_shipping_address_street" name="contact_shipping_address_street" value="<?php echo $contact_shipping_address_street; ?>"></a></td>
                            <td><a>&nbsp City :</a></td><td><a><input type="text" id="contact_shipping_address_city" name="contact_shipping_address_city" value="<?php echo $contact_shipping_address_city; ?>"></a></td>
                            <td><a>&nbsp District :</a></td><td><a><input type="text" id="contact_shipping_address_district" name="contact_shipping_address_district" value="<?php echo $contact_shipping_address_district; ?>"></a></td>
                        </tr>


                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Mobile No:</a></td><td><a><input type="number" id="contact_no" name="contact_no" value="<?php echo $contact_no; ?>" required="required"></a></td>
                            <td><a>&nbsp Mobile No 2:</a></td><td><a><input type="number" id="contact_mobile2" name="contact_mobile2" value="<?php echo $contact_mobile2; ?>"></a></td>
                            <td><a>&nbsp Email :</a></td><td><a><input type="email" id="contact_email1" name="contact_email1" value="<?php echo $contact_email1; ?>"></a></td>
                            <td><a>&nbsp Work Email :</a></td><td><a><input type="email" id="contact_work_email1" name="contact_work_email1" value="<?php echo $contact_work_email1; ?>"></a></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td><a><span id="availability_status"></a></span></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>


                    </table>

                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Work Information</aa>
                    </legend>

                    <?php

                    $row4=$account_detial;
                    ?>

                    <table>

                        <tr>
                            <input type="hidden" id="account_id" name="account_id" value="<?php echo $account_id; ?>">
                            <td><a>Company Name:</a></td><td><a><input type="text" id="contact_work_companyname" name="contact_work_companyname" value="<?php echo $contact_work_companyname; ?>" readOnly="readOnly"></a> &nbsp <a href="#"  onclick="pop_up('../../popup/worksearch','1');submitform();"  href="#"><span class="glyphicon glyphicon-plus" style="font-size: 15px"></span></td>
                            <td><a>&nbsp &nbsp Telephone No :</a></td><td><a><input type="text" id="contact_work_phone" name="contact_work_phone" value="<?php echo $contact_work_phone; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Fax No:</a></td><td><a><input type="text" id="contact_work_fax" name="contact_work_fax" value="<?php echo $row4->account_fax; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Email :</a></td><td><a><input type="text" id="contact_work_email" name="contact_work_email" value="<?php echo $contact_work_email; ?>" readOnly="readOnly"></a></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Work Adress: No:</a></td><td><a><input type="text" id="contact_work_address_number" name="contact_work_address_number" value="<?php echo $contact_work_address_number; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Street :</a></td><td><a><input type="text" id="contact_work_address_street" name="contact_work_address_street" value="<?php echo $contact_work_address_street; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp City :</a></td><td><a><input type="text" id="contact_work_address_city" name="contact_work_address_city" value="<?php echo $contact_work_address_city; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp District :</a></td><td><a><input type="text" id="contact_work_address_district" name="contact_work_address_district" value="<?php echo $contact_work_address_district; ?>" readOnly="readOnly"></a> <a><button type="button" onclick="copy_address_to_contact_fromwork()">Copy To Contact</button></a> <a><button type="button" onclick="copy_address_to_delivery_fromwork()">Copy To Delivery</button></a></td>
                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td><a>Department :</a></td><td><a><input type="text" id="contact_work_department" name="contact_work_department" value="<?php echo $contact_work_department; ?>"></a></td>
                            <td><a>&nbsp Designation :</a></td><td><a><input type="text" id="designation" name="designation" value="<?php echo $designation; ?>"></a> </td>
                            <td><a>&nbsp Reports To:</a></td><td>

                                @if($report_to == NULL)

                                    <a><input type="hidden" id="contact_report_to" name="contact_report_to" value="<?php echo $contact_report_to; ?>"><input type="text" id="contact_report_name" name="contact_report_name"  value=" " readonly="readonly"></a></td>

                                @else

                                @foreach($report_to as $row1)

                                    <a><input type="hidden" id="contact_report_to" name="contact_report_to" value="<?php echo $contact_report_to; ?>"><input type="text" id="contact_report_name" name="contact_report_name"  value="<?php echo $row1->contact_firstname; ?>" readonly="readonly"></a></td>

                                @endforeach

                                @endif


                            <td> &nbsp <a href="#"  onclick="pop_up('../../popup/contactsearch','1');submitform();" ><span class="glyphicon glyphicon-plus" style="font-size: 15px"></span></a></td><td> <a><button type="submit" name="submit" id="submit"  disabled="true">Save</button></a>
                                <!-- <a href="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=view&alert="><button type="button">Cancel </button></a> -->

                                <?php  if(isset($_SESSION['from'])){
                                    if($_SESSION['from']=="phonikip"){

                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?loc=phonikip&action=view&alert="><button type="button">Cancel </button></a> ';

                                    }if ($_SESSION['from']=="sales") {

                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?loc=sales&action=add"><button type="button">Cancel </button></a> ';

                                    }
                                }else{

                                    echo '<a href="'.$_SERVER['PHP_SELF'].'?loc=contact&action=view&alert="><button type="button">Cancel </button></a> ';

                                }


                                ?>



                            </td>
                        </tr>


                    </table>
                </fieldset>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Call Logs</aa>
                    </legend>


                    <iframe src="<?php echo Request::root(); ?>/contact_call_log/{{ $id }}" frameborder="0" width="100%"  width="1200" height="600"></iframe>

                </fieldset>

            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript">
        var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

        function submitform() {

            // e.preventDefault();
            //var serializedReturn = $(this).find('input[_method!=PATCH]').serialize();

            $.ajax({
                type: 'post',
                url:root_url+ 'post/contact_values',
                data: $('form').serialize(),
                success: function () {
                    alert('form was submitted');
                },
                error: function(xhr, textStatus, error){

                    alert(error);

                }
            });


        }
    </script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/js/custom/contact.js") }}"></script>


</form>


</body>
</html>

<?php

}
        ?>

@stop


