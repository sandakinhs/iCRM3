@extends('navbar')
@section('navbar')



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
    $contact_assign=NULL;
    $contact_report_to=$_SESSION['contact_report_to'];
    $contact_report_name=$_SESSION['contact_report_name'];
    $account_id=$_SESSION['account_id'];
    $contact_work_email1=$_SESSION['contact_work_email1'];
    $designation=$_SESSION['designation'];

}else{


    unset($_SESSION['contact_work_companyname']);
    unset($_SESSION['contact_account']);
    unset($_SESSION['contact_report_name']);

    $contact_firstname=NULL;
    $contact_lastname=NULL;
    $contact_title=NULL;
    $contact_gender=NULL;
    $contact_email1=NULL;
    $contact_no=NULL;
    $contact_mobile2=NULL;
    $contact_work_phone=NULL;
    $contact_work_fax=NULL;
    $contact_category=NULL;
    $contact_address_number=NULL;
    $contact_address_street=NULL;
    $contact_address_city=NULL;
    $contact_address_district=NULL;
    $contact_shipping_address_number=NULL;
    $contact_shipping_address_street=NULL;
    $contact_shipping_address_city=NULL;
    $contact_shipping_address_district=NULL;
    $contact_work_address_number=NULL;
    $contact_work_address_street=NULL;
    $contact_work_address_city=NULL;
    $contact_work_address_district=NULL;
    $contact_work_companyname=NULL;
    $contact_work_email=NULL;
    $contact_work_department=NULL;
    $contact_birthday=NULL;
    $contact_assign=NULL;
    $contact_report_to=NULL;
    $contact_report_name=NULL;
    $account_id=NULL;
    $contact_work_email1=NULL;
    $designation=NULL;

}

$flag_2="0";

?>

<body>

<form id="form" method="post" action="../contact">


    <div id='main-wrapper-contact'>
        <div id="tabs">
            <ul>
                <li><a href="#Contact-Edit">Add Contact</a></li>
            </ul>
            <div id="Contact-Edit">

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Basic Information</aa>
                    </legend>
                    <table>
                        <tr>

                            <td ><a>Title:</a></td>
                            <td><a>
                                    <select name="contact_title" id="contact_title"  >
                                        <option selected="selected" value="Mr">Mr.</option>
                                        <option value="Mrs">Mrs.</option>
                                        <option value="Miss">Miss.</option>
                                        <option value="Ms">Ms.</option>
                                    </select></a>
                            </td>

                            <td><a>First Name:</a></td><td>
                                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                <a><input type="text" id="contact_firstname" name="contact_firstname" value="<?php echo $contact_firstname; ?>" required="required" ></a>
                            </td>

                            <td><a>&nbsp Last Name:</a></td><td>
                                <a><input type="text" id="contact_lastname" name="contact_lastname" value="<?php echo $contact_lastname; ?>"><a>
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
                            <!-- <td><a>&nbsp Category:</a></td><td><a><input type="text" id="contact_category" name="contact_category" value="<?php echo $contact_category; ?>"></a></td> -->
                            <td><a>&nbsp Category:</a></td><td><a>

                                    <select name="contact_category" id="contact_category">

                                        @foreach ($contact_category_data as $row5)

                                        <option  @if($contact_category == $row5->id) {{ 'selected="selected"' }} @endif value="{{ $row5->name }}"> {{ $row5->name }} </option>

                                        @endforeach

                                    </select></a></td>

                            <td><a>&nbsp Group:</a></td>
                            <td>

                                <a><select name="group_id" id="group_id"  onchange="load_assignedto()">

                                        @foreach($add_group_contacts as $row1)

                                        <option value="{{ $row1->group_id }}">{{ $row1->group_name }}</option>

                                        @endforeach

                                    </select></a>


                            </td>
                            <td><a>&nbsp Assign To:&nbsp</a></td><td><div id="assignedto"  style="display:inline-block" ></div></td>
                        </tr>
                    </table>
                </fieldset>


                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">
                        <aa>Contact Information</aa>
                    </legend>

                    <table>
                        <tr>
                            <td><a>Contact Adress: No:</a></td><td><a><input type="text" id="contact_address_number" name="contact_address_number" value="<?php echo $contact_address_number; ?>"></a> </td>
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
                            <td><a>&nbsp Work Email :</a></td><td><a><input type="email" id="contact_work_email" name="contact_work_email" value="<?php echo $contact_work_email; ?>"></a></td>
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
                        <aa>Work Information</aa>
                    </legend>

                    <table>

                        <tr>
                            <input type="hidden" id="account_id" name="account_id" value="<?php echo $account_id; ?>">
                            <td><a>Company Name:</a></td><td><a><input type="text" id="contact_work_companyname" name="contact_work_companyname" value="<?php echo $contact_work_companyname; ?>" readOnly="readOnly"></a><a href="#"  onclick="pop_up('../popup/worksearch','1');submitform();"  href="#"> &nbsp <span class="glyphicon glyphicon-plus" style="font-size: 15px"></span></a></td>
                            <td><a> &nbsp Telephone No :</a></td><td><a><input type="text" id="contact_work_phone" name="contact_work_phone" value="<?php echo $contact_work_phone; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Fax No :</a></td><td><a><input type="text" id="contact_work_fax" name="contact_work_fax" value="<?php echo $contact_work_fax; ?>" readOnly="readOnly"></a></td>
                            <td><a>&nbsp Email :</a></td><td><a><input type="text" id="contact_work_email1" name="contact_work_email1" value="<?php echo $contact_work_email1; ?>" readOnly="readOnly"></a></td>
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

                            <?php
                            if( (!isset($_SESSION['contact_work_companyname'])) || ($_SESSION['contact_work_companyname'] =='') ){
                            $flag_2="1";  // this flag use to check and set readonly ture using java script
                            ?>
                            <td><a1>&nbsp Group :</a1></td><td> <a1>

                                    <select name="group_id_2" id="group_id_2" >

                                        @foreach($add_group_accounts as $row1)

                                        <option value="{{ $row1->group_id }}">{{ $row1->group_name }}</option>

                                        @endforeach

                                    </select></a1>



                            </td>
                            <?php
                            }else{
                                echo " <td></td><td></td>";
                            }
                            ?>
                            <td><a>&nbsp Reports To:</a></td><td>

                                <a><input type="hidden" id="contact_report_to" name="contact_report_to" value="<?php echo $contact_report_to; ?>"><input type="text" id="contact_report_name" name="contact_report_name"  value="<?php if(isset($_SESSION['contact_report_name'])){ echo $_SESSION['contact_report_name']; } ?>" readonly="readonly"></a>  &nbsp <a href="#"  onclick="pop_up('../popup/contactsearch','1');submitform();"  href="#"><span class="glyphicon glyphicon-plus" style="font-size: 15px"></span></a> </td>



                        </tr>

                        <tr>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                            <td>&nbsp</td><td></td>
                        </tr>

                        <tr>
                            <td></td><td>   <a><button type="submit" name="Submit" id="submit"  disabled="true">Save</button></a>&nbsp
                                <!--   <a href="<?php $_SERVER['PHP_SELF']?>?loc=contact&action=view&alert="><button type="button">Cancel </button></a>  -->

                                <?php  if(isset($_SESSION['from'])){
                                    if($_SESSION['from']=="phonikip"){

                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?loc=phonikip&action=view&alert="><button type="button">Cancel </button></a> ';

                                    }if ($_SESSION['from']=="sales") {

                                        echo '<a href="'.$_SERVER['PHP_SELF'].'?loc=sales&action=add"><button type="button">Cancel </button></a> ';

                                    }
                                }else{

                                    echo '<a href="'.$_SERVER['PHP_SELF'].'?loc=contact&action=view&alert="><button type="button">Cancel </button></a> ';

                                }  ?>

                            </td>
                        </tr>


                    </table>

                </fieldset>

            </div>
        </div>
    </div>

    <br>

    <script type="text/javascript">
        var flag_2 = "<?php echo $flag_2; ?>";   // set php value
        if (flag_2==1) {
            document.getElementById("contact_work_companyname").readOnly = false;
            document.getElementById("contact_work_phone").readOnly = false;
            document.getElementById("contact_work_fax").readOnly = false;
            document.getElementById("contact_work_email1").readOnly = false;
            document.getElementById("contact_work_address_number").readOnly = false;
            document.getElementById("contact_work_address_street").readOnly = false;
            document.getElementById("contact_work_address_city").readOnly = false;
            document.getElementById("contact_work_address_district").readOnly = false;
            document.getElementById("contact_work_department").readOnly = false;
        };

        function submitform() {

            // e.preventDefault();

            $.ajax({
                type: 'post',
                url: '../post/contact_values',
                data: $('form').serialize(),
                success: function () {
                    //alert('form was submitted');
                },
                error: function(xhr, textStatus, error){

                    alert(error);
                }
            });


        }
    </script>

</form>

<script type="text/javascript">
    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file
</script>
<script type="text/javascript" src="{{ asset("assets/js/custom/jquery-1-custom.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/custom/assigned-to.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/custom/contact.js") }}"></script>


    @stop

