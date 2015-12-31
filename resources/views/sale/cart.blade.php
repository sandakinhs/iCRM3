<?php
//session_start();
//include_once "functions/function_sales.php";
//$cart = new cart;
//$currency = new currency;



//$curr=$currency->view_currency();
//if(isset($_POST['category'])){
//    $cart->add_cart();
//}

?>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">
        <aa>Cart</aa>
    </legend>

    <table class="table table-hover table-condensed table-bordered">
        <tr>
            <th><aa>Category</aa></th>
            <th><aa>Product</aa></th>
            <th><aa>QTY</aa></th>
            <th><aa>Tax</aa></th>
            <th><aa>Discount</aa></th>
            <th></th>
        </tr>

        <?php

        $sub_total="0";


        foreach ($cart_product as $row) {
        $total=($row->price*$row->qty);


        $tax = $total*($row->tax/100);   //count tax

        $discount = $total*($row->discount/100);  // count discount

        $total = $total - $discount + $tax;  // count total price

        ?>


        <tr>
            <td>
                <a1><?php echo $row->category_name ; ?></a1>
            </td>
            <td>
                <a1><?php echo $row->product_name ; ?></a1>
            </td>
            <td>
                <a1><?php echo $row->qty ; ?></a1>
            </td>
            <td>
                <a1><?php echo $row->tax ; ?></a1>
            </td>
            <td>
                <a1><?php echo $row->discount ; ?></a1>
            </td>
            <td>
                <a1><?php echo $total ?></a1>
            </td>
            <td>
                <!-- <input type="hidden" name="crt_id" id="crt_id" value="<?php echo $row->discount ; ?>"> -->
                <a onclick="remove_cart(<?php echo $row->id ; ?>)" class="glyphicon glyphicon-minus" style="color:red"></a>
                <a onclick="pop_up('{{ Request::root() }}/sales/{{ $row->id }}/cart_edit','1');" class="glyphicon glyphicon-pencil" ></a>
            </td>
        </tr>


        <?php

        $sub_total=$sub_total+$total;

        }

        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><aa>Sub Total</aa></td>
            <td><aa><?php  ?><input type="hidden" id="sub_total" name="sub_total" value="<?php echo $sub_total; ?>" > <?php echo $sub_total ?> </aa></td>
        </tr>
    </table>
</fieldset>