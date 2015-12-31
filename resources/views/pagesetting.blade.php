@extends('navbar')
@section('navbar')

<?php


if(isset($_POST['Submit']))
{

$ob2->delete($_SESSION['tablename']);

$count = $_POST['checkbox'];

$N = count($count);

for($i=0; $i < $N; $i++)
{
    $ob2->addnew($count[$i],$_SESSION['tablename'],'1');
}

$ob2->addnew($_POST['rows'],$_SESSION['tablename'],'0');


// header("Location:".$_SERVER['PHP_SELF']."?loc=".$locc."&action=view&alert=");

?>
<script type="text/javascript">
    window.location="<?php $_SERVER['PHP_SELF']?>?loc=<?php echo $locc ?>&action=view&alert=";
</script>

<?php

}else {



?>

<html>
<body>

<div class="col-sm-3"></div>
<div class="col-sm-6" >
    <form  method="post" action="pagesetting">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

        <div class="panel panel-primary">
            <div class="panel-heading"><?php

                echo $name."&nbsp Settings";

                ?></div>
            <table class="table table-hover table-bordered">
                <!-- <tr>

                    <th></th>
                    <th></th>
                </tr> -->

                <?php


                foreach ($columns_details as $row )
                {
                if($row->column_comment !=''){
                ?>

                @inject('pagesetting', 'App\Http\Controllers\functions\pagesettings')

                <tr>
                    <td><?php echo $row->column_comment; ?></td>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $row->column_name; ?>"{{ $checked = $pagesetting->check($row->column_name,$_SESSION['tablename']) }} <?php  if($checked == 1){ echo "checked";  }  ?>   ></td>
                </tr>

                <?php
                }
                }

                ?>

                @foreach($page_details as $row)
                <tr>
                    <td>Rows Per page</td>
                    <td><input type="number" name="rows" id="rows" value="{{ $row->column_name }}"></td>
                </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" > <a1><button type="button"  onclick="window.location='<?php $_SERVER['PHP_SELF']?>?loc=<?php echo $locc; ?>&action=view&alert=';">Cancel</button></a1> </td>
                </tr>
            </table>
        </div>

    </form>
</div>
<div class="col-sm-3"></div>

</body>
</html>

<?php

}

?>

    @stop
