
        <!DOCTYPE html>
<?php

//$privilege = new privilege;
//$group1 = new group;

//if ($privilege->add_privilege("call_log") == "1"){

?>

<html>
<head>
    <title></title>
</head>
<body>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">
        <aa>Remark</aa>
    </legend>

    <div id ="content"> </div>
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <table >
        <tr>
            <td align="right"><a1>Subject :</a1></td>
            <td><a1> <input type="text" name="subject" id="subject" size="74" required="required" ></a1> </td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr>
            <td align="right"><a1>Body :</a1></td>
            <td><a1> <textarea type="text" name="body" id="body" rows="4" cols="56"></textarea></a1></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr>
            <td align="right"><a1>Status :</a1></td>
            <td><a1><select name="status" id="status"  >
                        <option selected="selected" value="pending">Pending</option>
                        <option value="complete">Complete</option>
                    </select></a1>
            </td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>

        <tr>
            <td align="right"><a1>&nbsp Group:</a1> </td>
            <td  >

                <a><select name="group_id1" id="group_id1"  onchange="load_assignedto1()">

                        <?php

                        foreach ($add_group_contacts as $row3) {
                        ?>
                        <option value="<?php  echo $row3->group_id; ?>"><?php echo $row3->group_name;  ?></option>
                        <?php
                        }
                        ?>

                    </select></a>

                <a>&nbsp Assign To:&nbsp</a><div id="assignedto1"  style="display:inline-block" ></div></td>
        </tr>
        <tr><td>&nbsp</td><td></td></tr>
        <tr>
            <td></td>
            <td><a1><input type="submit"  name="remark" value="Save"></a1> <a href="<?php $_SERVER['PHP_SELF']?>?loc=call_log&action=view&cancel=1"><button type="button">Cancel </button></a></td>
        </tr>
    </table>

</fieldset>
</body>
</html>

<?php

//}else{
//echo '<fieldset class="scheduler-border">';
//echo '<legend class="scheduler-border"> <aa>Ticket</aa> </legend>';
//echo "You don't Have privilege";

?>

<?php

//echo "</fieldset>";
//}

?>



<script type="text/javascript">

    var root_url = "<?php echo Request::root(); ?>/"; // put this in php file

    $(document).ready(function(){

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
