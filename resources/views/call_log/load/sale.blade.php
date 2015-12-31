

<title></title>

<link rel="stylesheet" href="{{ asset("assets/js/custom/jquery-ui-custom.css") }}" />
<script type="text/javascript" src="{{ asset("assets/dropdowncheck/doc/jquery-1.6.1.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/dropdowncheck/doc/jquery-ui-1.8.13.custom.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/dropdowncheck/doc/ui.dropdownchecklist.js") }}"></script>

<style type="text/css">

    table tr td a2{
        font-size: 13px;
    }

    /* .ui-widget-content {
   border: 0px solid #4297d7;
   background: #fcfdfd;
   color: #222222;
     }*/

    label {
        /*display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;*/
        /*font-weight: bold;*/
    }

</style>

<?php

//$privilege = new privilege;
//$category = new category;
//$tax = new tax;
//$group1 = new group;

//session_start();

//if ($privilege->add_privilege("sales") == "1"){

?>

<html>
<head>
    <title></title>
</head>
<body>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">
        <aa>Sales</aa>
    </legend>

    <div id ="content"> </div>

    <table >
        <tr>
            <td align="right"><a1>Category: &nbsp</a1></td>
            <td><a1>
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <select name="category" id="category" onchange="load_product()" >
                        <option value=" ">Please select</option>>
                        <?php

                        foreach ($categories as $row2) {
                        ?>
                        <option value="<?php  echo $row2->id; ?>"><?php echo $row2->name;  ?></option>
                        <?php
                        }
                        ?>
                    </select></a1>
            </td>
            <td><a1>&nbsp Product:</a1></td>
            <td> <a1><div id="product_load" style="display:inline-block" ></div></a1></td>
            <td><a1>&nbsp Price:</a1></td>
            <td><a1> <div id="price_load" style="display:inline-block" ></div></a1></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr>
            <td><a1>&nbsp Qty:</a1></td>
            <td> <a1><input type="number" name="qty_" id="qty_" value="1"></a1> </td>
            <td><a1>&nbsp Tax:</a1></td>
            <td> <a1>
                    <select name="tax[]" id="tax" multiple="multiple" >
                        <?php

                        foreach ($taxs as $row2) {
                        ?>
                        <option value="<?php  echo $row2->id; ?>"><?php echo $row2->name;  ?></option>
                        <?php
                        }
                        ?>
                    </select></a1>
            </td>
            <td><a1>&nbsp Discount:</a1></td>
            <td><a1><input type="number" name="discount" id="discount" value="0"> %</a1></td>
            <td>&nbsp &nbsp</td>
            <td><a href="#" onclick ="load_cart()" ><span class="glyphicon glyphicon-plus">ee</span></a></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr><td>&nbsp</td><td></td></tr>
    </table>

    <table><div id="cart"></div></table>

    <table>
        <tr>

            <td><a1>Status:</a1></td>
            <td><a1><select name="status" id="status"  >
                        <option selected="selected" value="pending">Pending</option>
                        <?php if($_SESSION['user_type'] != "0"){ ?>
                        <option value="posted">Posted</option>
                        <option value="authorized">Authorized</option>
                        <option value="ready">Ready</option>
                        <option value="delivered">Delivered</option>
                        <?php  } ?>
                    </select></a1>
            </td>
            <!-- <td>Contact Person:</td>
            <td><input type="text" name="contact" id="contact" ></td> -->
            <td><a1>&nbsp Date:</a1></td>
            <td><a1><input type="date" name="date" id="date" ></a1></td>
            <td></td>
            <td></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
    </table>

    <table>
        <tr>
            <td><a1>Remark:</a1></td>
            <td><a1><textarea type="text" name="remark" id="remark" rows="4" cols="56"></textarea></a1></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr>
            <td><a>&nbsp Group:</a>

                <a><select name="group_id1" id="group_id1"  onchange="load_assignedto1()">

                        <?php
                        foreach ($add_group_sales as $row3) {
                        ?>

                        <option value="<?php  echo $row3->group_id; ?>"><?php echo $row3->group_name;  ?></option>

                        <?php
                        }
                        ?>

                    </select></a>

            </td>
            <td><a>&nbsp Assign To:&nbsp</a><div id="assignedto1"  style="display:inline-block" ></div></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr>
            <td></td>
            <td><a1><input type="submit"  name="sales" value="Save"></a1> <a href="<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&cancel=1"><button type="button">Cancel </button></a></td>
        </tr>
    </table>

</fieldset>
</body>
</html>



<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    $(document).ready(function(){

        $("#tax").dropdownchecklist( { emptyText: "select..", width: 100 } );

        $("#cart").load(root_url+"cart");

        var value = $("#group_id1").val();
        var token =$("#_token").val();


        $.ajax({
            type: 'post',
            url: root_url+ 'other/assignedto1',
            data:{"_token": token,"user_group": value},

            success: function () {
                // alert('form was submitted');
                $("#assignedto1").load( root_url+"other/assignedto1");
                evt.preventDefault();
            },
            error: function(xhr, textStatus, error){
                alert(error);
            }
        });


    });


    function load_product(){

        var value = $("#category").val();
        var token =$("#_token").val();

        $.ajax({
            type: 'post',
            url: root_url+'sales/products_load',
            data:{"_token": token,"cat_id": value},

            success: function () {
                // alert('form was submitted');
                $("#product_load").load(root_url+"sales/products_load");
                evt.preventDefault();
            },
            error: function(xhr, textStatus, error){
                alert(error);
            }
        });
    }

    function load_cart(){

        var category = $("#category").val();
        var product = $("#product").val();
        var qty_ = $("#qty_").val();
        var discount = $("#discount").val();
        var price = $("#price").val();
        var tax = $("#tax").val();
        var token =$("#_token").val();

        if(tax == null){
            var tax = 0;
        }


        $.ajax({
            type: 'post',
            url: root_url+'cart',
            //data: $('form').serialize(),
            data:{"_token": token,"category": category, "product":product, "qty_":qty_, "discount":discount, "price":price, "tax":tax},
            success: function () {
                //alert('form was submitted');
                $("#cart").load(root_url+"cart");
                evt.preventDefault();
            },
            error: function(xhr, textStatus, error){
                alert(error);
            }

        });
    }

    function load_cart1(){

        $("#cart").load(root_url+"cart");

    }


    function remove_cart(id){

        var token =$("#_token").val();

        $.ajax({
            type: 'post',
            url: root_url+'cart/delete',
            data:{"_token": token,"id": id},

            success: function () {
                // alert('form was submitted');
                $("#cart").load(root_url+"cart");
                evt.preventDefault();
            },
            error: function(xhr, textStatus, error){
                alert(error);
            }

        });

    }

    function load_assignedto1(){

        var value = $("#group_id1").val();
        var token =$("#_token").val();

        $.ajax({
            type: 'post',
            url: root_url+ 'other/assignedto1',
            data:{"_token": token,"user_group": value},

            success: function () {
                // alert('form was submitted');
                $("#assignedto1").load(root_url+"other/assignedto1");
                evt.preventDefault();
            },
            error: function(xhr, textStatus, error){
                alert(error);
            }
        });

    }

</script>

