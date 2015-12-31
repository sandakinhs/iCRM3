<?php

namespace App\Http\Controllers\graphs;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

include('library\jpgraph\src\jpgraph.php' );
include('library\jpgraph\src\jpgraph_bar.php');


class Bar_revenue extends Controller
{
    public function generateGraphbarrev($type)
    {

       // $type= "year";

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


        //$this->load->database();

        if ($type == "week") {

             $sql=DB::select( DB::raw("SELECT `id` FROM `sales` WHERE YEARWEEK(`created_at`) = YEARWEEK('$date') AND `deleted` = '0' "));

        } else {

            $sql=DB::select( DB::raw("SELECT `id` FROM `sales` WHERE (`created_at` BETWEEN '$start' AND '$end') AND `deleted` = '0' "));
        }


        foreach($sql as $row){
            $sales_id[] = $row->id;
        }


        if (!isset($sales_id)) {

            $sales_id[] = 0;
            $sales_id[] = 0;
        }


        $ids = join(',', $sales_id);

        //$sql = "SELECT COUNT(sales_product.id) AS 'Count', item.name AS 'Name' FROM sales_product INNER JOIN item ON item.id = sales_product.product WHERE sales_product.sale_id IN ($ids) GROUP BY sales_product.product ORDER BY `Count` DESC";
        $sql=DB::select( DB::raw("SELECT COUNT(sales_product.id) AS 'Count', item.name AS 'Name' FROM sales_product INNER JOIN item ON item.id = sales_product.product WHERE sales_product.sale_id IN ($ids) GROUP BY sales_product.product ORDER BY `Count` DESC"));


        foreach ($sql as $row) {

            $inq[] = $row->Count;
            $leg[] = $row->Name;

        }

        if (!isset($inq)) {
            $inq[] = 0;
            $leg[] = "null";
        }


        if (sizeof($inq) > 5) {

            $c = sizeof($inq) - 1;
            $other = 0;

            for ($x = 4; $x <= $c; $x++) {

                $other = $other + $inq[$x];
                unset($inq[$x]);
                unset($leg[$x]);
            }

            $inq[4] = $other;
            $leg[4] = "other";
        }


        $data1y = $inq;

        echo public_path('plugins\streaming\protected\start.php');
        echo asset('asxcasx\dsddsd');

//        die();

// Create the graph. These two calls are always required
        $graph = new \Graph(350, 250, 'auto');
        $graph->SetScale("textlin");

        $theme_class = new \UniversalTheme;
        $graph->SetTheme($theme_class);

// $graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
        $graph->SetBox(false);

        $graph->ygrid->SetFill(false);
        $graph->xaxis->SetTickLabels($leg);
        $graph->xaxis->title->Set('Products');
        $graph->yaxis->HideLine(false);
        $graph->yaxis->HideTicks(false, false);
        $graph->yaxis->title->Set('Sales');

// Create the bar plots
        $b1plot = new \BarPlot($data1y);
// $b2plot = new BarPlot($data2y);
// $b3plot = new BarPlot($data3y);

// Create the grouped bar plot
// $gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot));
        $gbplot = new \GroupBarPlot(array($b1plot));

// ...and add it to the graPH
        $graph->Add($gbplot);


        $b1plot->SetColor("white");
        $b1plot->SetFillColor("#6EDBFF");
        $b1plot->SetWidth(45);



        $gdImgHandler = $graph->Stroke(_IMG_HANDLER);

        $fileName = "assets/tmp/" . $type . "_bar_rev.png";
        $graph->img->Stream($fileName);

    }
}
