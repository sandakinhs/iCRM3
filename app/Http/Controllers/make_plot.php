<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\graphs;

class make_plot extends Controller
{

    public function new1(){


        $make = new graphs\Pie_plot();
        $make->generateGraphplot('week');


    }

    public function make()
    {

        if (isset($_POST['date'])) {

            $make = new graphs\Pie_plot();
            $make->generateGraphplot($_POST['date']);

        }

        if (isset($_POST['date_rev'])) {

            $make = new graphs\Pie_plot_revenue();
            $make->generateGraphplotrev($_POST['date_rev']);

        }

        if (isset($_POST['date_bar_rev'])) {

            $make = new graphs\Bar_revenue();
            $make->generateGraphbarrev($_POST['date_bar_rev']);

        }

        if (isset($_POST['date_bar_tcall'])) {

            $make = new graphs\Bar_tot_calls();
            $make->generateGraphbartotcalls($_POST['date_bar_tcall']);

        }

        if (isset($_POST['date_line_tcall'])) {

            $make = new graphs\Line_tot_call();
            $make->generateGraphlinetotcalls($_POST['date_line_tcall']);

        }

    }

}
