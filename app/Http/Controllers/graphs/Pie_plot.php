<?php

namespace App\Http\Controllers\graphs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

include('library\jpgraph\src\jpgraph.php' );
include('library\jpgraph\src\jpgraph_pie.php');
include('library\jpgraph\src\jpgraph_pie3d.php');

class Pie_plot extends Controller
{
    function generateGraphplot($type)
    {


        if ($type == "year") {

            $start = date("Y-");
            $start .= "01-01 00-00-00";

            $end = date("Y-");
            $end .= "12-31 23-59-59";

        } elseif ($type == "month") {

            $start = date("Y-m-");
            $start .= "01 00-00-00";

            $end = date("Y-m-");
            $end .= "31 23-59-59";

        } elseif ($type == "day") {

            $start = date("Y-m-d");
            $start .= " 00-00-00";

            $end = date("Y-m-d");
            $end .= " 23-59-59";

        } elseif ($type == "week") {

            $date = date("Y-m-d");
        }



// echo $sql;

        if ($type == "week") {

            $sql = "SELECT  count(*) AS counts FROM `call_log` WHERE YEARWEEK(`created_at`) = YEARWEEK('$date') AND `deleted` = '0' AND `call_type` = 'Inquiry' ";
            $sql2 = "SELECT count(*) AS counts FROM `sales` WHERE YEARWEEK(`created_at`) = YEARWEEK('$date') AND `deleted` = '0' ";
            $sql3 = "SELECT count(*) AS counts FROM `ticket` WHERE YEARWEEK(`created_at`) = YEARWEEK('$date') AND `deleted` = '0' ";

        }else{

            $sql = "SELECT  count(*) AS counts FROM `call_log` WHERE (`created_at` BETWEEN '$start' AND '$end') AND `deleted` = '0' AND `call_type` = 'Inquiry' ";
            $sql2 = "SELECT count(*) AS counts FROM `sales` WHERE (`created_at` BETWEEN '$start' AND '$end' ) AND `deleted` = '0' ";
            $sql3 = "SELECT count(*) AS counts FROM `ticket` WHERE (`created_at` BETWEEN '$start' AND '$end' ) AND `deleted` = '0' ";

        }

        $sql=DB::select( DB::raw($sql));

        $sql2=DB::select( DB::raw($sql2));

        $sql3=DB::select( DB::raw($sql3));


        foreach($sql as $rowr){
            $inq[] = $rowr->counts;
            $leg[] = "Inquiry";
        }

        foreach($sql2 as $rowp){
            $inq[] = $rowp->counts;
            $leg[] = "Sales";
        }

        foreach($sql3 as $rowt){
            $inq[] = $rowt->counts;
            $leg[] = "Tickets";
        }

        if ($inq['0'] == '0' && $inq['1'] == '0' && $inq['2'] == '0') {
            $inq['0'] = "1";

            unset($leg);   // unset legends
            $leg[] = "null"; // set legend null
        }



        if (!isset($inq)) {
            $inq[] = 1;
            $leg[] = "null";
        }


// Some data
        $data = $inq;

// Create the Pie Graph.
        $graph = new \PieGraph(350, 250);
        $graph->SetShadow();
// $legends = array(
//   'Sales',
//   'Inquiry',
// );
        $legends = $leg;

        $graph->legend->Pos(0.3, 0.9);

        $theme_class = "DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
//$graph->title->Set("Call Types");
        $graph->title->SetFont(FF_ARIAL, FS_BOLD, 12);
        $graph->SetBox(true);

// Create
        $p1 = new \PiePlot3d($data);
        $graph->Add($p1);

        $p1->ShowBorder();
        $p1->SetColor('black');
        $p1->SetSliceColors(array('#ADFF2F', '#DC143C', '#9966FF'));
        $p1->SetLegends($legends);
        $p1->ExplodeSlice(2);
        $p1->SetAngle(30);

        $graph->legend->SetColumns(3);
        $graph->legend->SetFrameWeight(1);
// $graph->Stroke();
        $gdImgHandler = $graph->Stroke(_IMG_HANDLER);

//$fileName = $type.".png";
        $fileName = "assets/tmp/" . $type . ".png";
        $graph->img->Stream($fileName);

    }
}
