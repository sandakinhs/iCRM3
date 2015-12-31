<?php




// echo $_SESSION['cat_id'];
?>

<select name="product" id="product" onchange="load_price()">
    <option value="0">Please select</option>
    <?php

    foreach ($items_in_cart as $row) {
    ?>
    <option value="<?php  echo $row->id; ?>"><?php echo $row->name; ?></option>
    <?php
    }
    ?>
</select>


<?php
?>

<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    function load_price(){

        var p_id = $("#product").val();
        var token =$("#_token").val();




        $.ajax({
            type: 'post',
            url: root_url+'sales/price_load',
            data:{"_token": token,"p_id": p_id},

            success: function () {
                // alert('form was submitted');
                $("#price_load").load(root_url+"sales/price_load");
                evt.preventDefault();
            },
            error: function(xhr, textStatus, error){
                alert(error);
            }

        });
    }
</script>