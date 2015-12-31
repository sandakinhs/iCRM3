
<form id="form" method="post" action="add">
<table>
    <tr>
        <td><a>category :</a></td><td><a><input type="text" id="category" name="category" ></a></td>
        <td><a>&nbsp product :</a></td><td><a><input type="text" id="product" name="product" ></a></td>
        <td><a>&nbsp qty :</a></td><td><a><input type="text" id="qty" name="qty" ></a></td>
        <td><a>&nbsp discount :</a></td><td><a><input type="text" id="discount" name="discount"></a></td>
    </tr>

    <tr>
        <td>&nbsp price: </td><td> <input type="text" id="price" name="price"> <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"> </td>
        <td>&nbsp tax: </td><td> <select name="tax[]" id="tax" multiple="multiple">

                <option value="1">100</option>
                <option value="2">200</option>
                <option value="3">300</option>

            </select></td>
        <td>&nbsp</td><td></td>
        <td>&nbsp</td><td><input type="submit" name="submit"></td>
    </tr>



</table>
</form>
