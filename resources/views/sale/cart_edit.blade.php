@extends('app')
@section('content')
<!-- <link href="jquery/jquery-ui.css" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset("assets/js/custom/jquery-ui-custom.css") }}" />

<script type="text/javascript" src="{{ asset("assets/dropdowncheck/doc/jquery-1.6.1.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/dropdowncheck/doc/jquery-ui-1.8.13.custom.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/dropdowncheck/doc/ui.dropdownchecklist.js") }}"></script>

<?php
//session_start();

//include_once "functions/function_sales.php";

//$cart = new cart;
//$tax = new tax;




if(isset($_POST['submit'])){ ?>

   <script type="text/javascript">
        window.opener.load_cart1();
        window.close();
   </script>

<?php
die();
}



foreach($cart_item as $row)
    {



?>

<form id="form" method="post" action="../../sales/{{ $row->id }}/cart_edit">

    <table class="table table-hover table-condensed table-bordered">
        <tr>
            <th><aa>Category</aa></th>
            <th><aa>Product</aa></th>
            <th><aa>QTY</aa></th>
            <th><aa>Tax</aa></th>
            <th><aa>Discount</aa></th>
            <th><input type="hidden" name="_token" value="{{ csrf_token() }}"></th>
        </tr>

        <tr>

            <?php
            echo "<td><a1>".$row->category_name."</a1></td><td><a1>".$row->product_name."</a1></td>";
            echo '<td><a1><input type="text" name="qty" id="qty" value="'.$row->qty.'"></a1></td>';

            ?>
            <td><a1><select name="tax[]" id="tax" multiple="multiple">
                        <?php

                        foreach ($tax_details as $row2) {
                        ?>
                        <option value="<?php  echo $row2->id; ?>"><?php echo $row2->name;  ?></option>
                        <?php
                        }
                        ?>
                    </select></a1></td>

            <?php

            echo '<td><a1><input type="text" name="discount" id="discount" value="'.$row->discount.'"></a1></td>';
            echo '<td><a1><input type="text" name="price" id="price" value="'.$row->price.'"></a1></td>';
            echo '<td><a1><input type="submit" name="submit" id="submit" value="submit" ></a1></td>';

            ?>
        </tr>
    </table>
<?php
        }
        ?>


    <script type="text/javascript">

        $(document).ready(function(){

            $("#tax").dropdownchecklist( { emptyText: "select..", width: 100 } );

        });
    </script>
    @stop