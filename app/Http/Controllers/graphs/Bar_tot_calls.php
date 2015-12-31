<?php

namespace App\Http\Controllers\graphs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

include('library\jpgraph\src\jpgraph.php' );
include('library\jpgraph\src\jpgraph_bar.php');
include('library\jpgraph\src\jpgraph_line.php');

class Bar_tot_calls extends Controller
{
    function generateGraphbartotcalls($type)
    {


        for ($i = 0; $i < 4; $i++) {

            $time = DATE('Y-m-d');
            $date = strtotime($time . ' -' . $i . $type);

            if ($type == "year") {

                $labels[] = date('Y', $date);
                $date = date('Y', $date);

            } elseif ($type == "month") {

                $labels[] = date('M', $date);
                $date = date('Y-m', $date);

            } elseif ($type == "week") {


                $labels = array(4, 3, 2, 1);
                $date = date('oW', $date);

            } else {

                $labels[] = date('d', $date);
                $date = date('Y-m-d', $date);

            }


            if ($type == "week") {
                //$sql = "SELECT COUNT(*) AS 'count', `call_type` FROM `call_log` WHERE YEARWEEK(call_created_time,1) LIKE '$date' AND `deleted` = '0' GROUP BY `call_type` ORDER BY `call_type`";
                $sql=DB::select( DB::raw("SELECT COUNT(*) AS 'count', `call_type` FROM `call_log` WHERE YEARWEEK(created_at,1) LIKE '$date' AND `deleted` = '0' GROUP BY `call_type` ORDER BY `call_type`"));

            } else {
                //$sql = "SELECT COUNT(*) AS 'count', `call_type` FROM `call_log` WHERE `call_created_time` LIKE '$date%' AND `deleted` = '0' GROUP BY `call_type` ORDER BY `call_type`";
                $sql=DB::select(DB::raw("SELECT COUNT(*) AS 'count', `call_type` FROM `call_log` WHERE `created_at` LIKE '$date%' AND `deleted` = '0' GROUP BY `call_type` ORDER BY `call_type`"));
            }

//            $this->load->database();

//            $query=$this->db->query($sql);

            foreach($sql as $row){

                $call[$row->call_type][$i] = $row->count;

            }


            if (!isset($call['Inquiry'][$i])) {
                $call['Inquiry'][$i] = "0";
            }

            if (!isset($call['Sales'][$i])) {
                $call['Sales'][$i] = "0";
            }

            if (!isset($call['Tickets'][$i])) {
                $call['Tickets'][$i] = "0";
            }

        }


//bar3
// $data3y=array(220,230,210,175,185);
// $data4y=array(40,45,70,80,50);
// $data5y=array(20,20,25,22,30);

        $data3y = $call['Inquiry'];
        $data4y = $call['Sales'];
        $data5y = $call['Tickets'];

// Create the graph. These two calls are always required
        $graph = new \Graph(350, 250, 'auto');
        $graph->SetScale("textlin");
        $graph->SetY2Scale("lin", 0, 90);
        $graph->SetY2OrderBack(false);

        $graph->SetMargin(35, 50, 20, 5);

        $theme_class = new \UniversalTheme;
        $graph->SetTheme($theme_class);

// $graph->yaxis->SetTickPositions(array(0,50,100,150,200,250,300,350), array(25,75,125,175,275,325));
        $graph->y2axis->SetTickPositions(array(30, 40, 50, 60, 70, 80, 90));

// $months = $gDateLocale->GetShortMonth();
// $months = array_merge(array_slice($months,3,9), array_slice($months,0,3));
// $graph->SetBox(false);

        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels($labels);
        $graph->xaxis->title->Set($type);
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false, false);
        $graph->yaxis->title->Set('Calls');
// Setup month as labels on the X-axis
// $graph->xaxis->SetTickLabels($months);

// Create the bar plots
        $b3plot = new \BarPlot($data3y);
        $b4plot = new \BarPlot($data4y);
        $b5plot = new \BarPlot($data5y);


// Create the grouped bar plot
        $gbbplot = new \AccBarPlot(array($b3plot, $b4plot, $b5plot));
        $gbplot = new \GroupBarPlot(array($gbbplot));


// ...and add it to the graPH
        $graph->Add($gbplot);
        $gbplot->SetWidth(45);

        $b3plot->SetColor("#3333CC");
        $b3plot->SetFillColor("#3333CC");
        $b3plot->SetLegend("Inquiry");

        $b4plot->SetColor("#7474FF");
        $b4plot->SetFillColor("#7474FF");
        $b4plot->SetLegend("Sales");

        $b5plot->SetColor("#6EB7FF");
        $b5plot->SetFillColor("#6EB7FF");
        $b5plot->SetLegend("Tickets");

        $graph->legend->SetFrameWeight(1);
        $graph->legend->SetColumns(5);
// $graph->legend->SetColor('#4E4E4E','#00A78A');
        $graph->legend->Pos(0.2, 0.9);


        $band = new \PlotBand(VERTICAL, BAND_RDIAG, 11, "max", 'khaki4');
        $band->ShowFrame(true);
        $band->SetOrder(DEPTH_BACK);
        $graph->Add($band);

// $graph->title->Set("Combineed Line and Bar plots");

// Display the graph
// $graph->Stroke();

        $gdImgHandler = $graph->Stroke(_IMG_HANDLER);

        $fileName = "assets/tmp/" . $type . "_bar_tcall.png";
        $graph->img->Stream($fileName);


    }
}
