<!-- this php use to load price value in phonikip.php -->

<?php

foreach($result as $row){

echo '<input type="text" name="price" id="price" value='.$row->unit_price.' >';
// echo '<input type="text" name="price1" id="price1" value='.$currency->toMoney($row['unit_price']).' readonly="readonly">';
}
?>

