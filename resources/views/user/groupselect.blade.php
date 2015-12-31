
<html>
<head>
    <title></title>
</head>

<body>

<form id="form" method="post" action="<?php $_SERVER['PHP_SELF']?>">
    <table>
        <tr>

            <td><select id="" name="group1[]" size="8" multiple="multiple">
                    <?php
                    foreach ($_SESSION['group_names'] as $key => $value) {
                     ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                    <?php }
                    ?>
                </select>
            </td>
            <td> &nbsp </td>
            <td>
                <a><button type="button" name="submit1" id="submit1" onclick="submitform();"> >> </button><a> <br> <br>
                        <a><button type="button" name="unset" id="unset" onclick="submitform();"> << </button><a>
            </td>

            <td>
                <select id="" name="group2[]" size="8" multiple="multiple">
                    <?php foreach ($_SESSION['groups'] as $value) {

                    if( in_array( $value ,$_SESSION['group_name_can_edit']) )
                    {
                        echo '<option value='.$value.' style="color:green" >'.$value.'</option>';
                    }else{

                    ?>

                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                    <?php } }

                    ?>
                </select>
            </td>

        </tr>
    </table>
</form>


</body>
</html>


