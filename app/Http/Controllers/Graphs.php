<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App;

class Graphs extends Controller
{

    function last_activities()
    {



        $sql = "SELECT contact_no, customer, status, type, time FROM (
	    			 SELECT contacts.contact_no , contacts.contact_firstname AS customer, sales.status AS status , IF(sales.total != '','Sales',1) AS type, sales.created_time AS time FROM sales
							  INNER JOIN contacts ON
							  				sales.customer_id = contacts.id WHERE sales.call_log_id = '0' AND sales.deleted = '0'
	                 UNION ALL
	                 SELECT contacts.contact_no, contacts.contact_firstname AS customer, ticket.status AS status,IF(ticket.id != '','Ticket',1) AS type, ticket.created_time AS time FROM ticket
	    					INNER JOIN contacts ON
	    									ticket.contact_id = contacts.id WHERE ticket.call_log_id = '0' AND ticket.deleted = '0'

				     UNION ALL
			         SELECT call_log.cli, contacts.contact_firstname , CONCAT ( COALESCE(stat.status,'') , COALESCE(stat1.status,''), COALESCE(stat2.status,'')) , call_type, call_log.call_created_time FROM call_log
	                 		INNER JOIN contacts ON
			                                call_log.contact_id=contacts.id
	    					LEFT OUTER JOIN inquiry AS stat ON
											call_log.id = stat.call_log_id
	    					LEFT OUTER JOIN ticket AS stat2 ON
	    									call_log.id = stat2.call_log_id
							LEFT OUTER JOIN sales AS stat1 ON
											call_log.id = stat1.call_log_id WHERE call_log.deleted = '0'  ) AS T ORDER BY time DESC LIMIT 10";

        $sql=DB::select( DB::raw($sql));
        return( $sql );
    }

    function last_pendingactivities()
    {


        $sql = "SELECT contact_no, customer, status, type, time FROM (
	    			 SELECT contacts.contact_no , contacts.contact_firstname AS customer, sales.status AS status , IF(sales.total != '','Sales',1) AS type, sales.created_time AS time FROM sales
							  INNER JOIN contacts ON
							  				sales.customer_id = contacts.id WHERE sales.call_log_id = '0' AND sales.deleted = '0'
	                 UNION ALL
	                 SELECT contacts.contact_no, contacts.contact_firstname AS customer, ticket.status AS status,IF(ticket.id != '','Ticket',1) AS type, ticket.created_time AS time FROM ticket
	    					INNER JOIN contacts ON
	    									ticket.contact_id = contacts.id WHERE ticket.call_log_id = '0' AND ticket.deleted = '0'

				     UNION ALL
			         SELECT call_log.cli, contacts.contact_firstname , CONCAT ( COALESCE(stat.status,'') , COALESCE(stat1.status,''), COALESCE(stat2.status,'')) , call_type, call_log.call_created_time FROM call_log
	                 		INNER JOIN contacts ON
			                                call_log.contact_id=contacts.id
	    					LEFT OUTER JOIN inquiry AS stat ON
											call_log.id = stat.call_log_id
	    					LEFT OUTER JOIN ticket AS stat2 ON
	    									call_log.id = stat2.call_log_id
							LEFT OUTER JOIN sales AS stat1 ON
											call_log.id = stat1.call_log_id WHERE call_log.deleted = '0'    ) AS T WHERE status = 'pending' ORDER BY time DESC LIMIT 10";

        $sql=DB::select( DB::raw($sql));
        return( $sql );
    }

    function save_settings()
    {

       // $sql ="UPDATE `home_page` SET `graph_1`='$value1',`graph_2`='$value2',`graph_3`='$value3',`graph_4`='$value4',`graph_5`='$value5',`graph_6`='$value6' WHERE `id` = '1' ";
		$input=Request::all();
		App\home_page::find(1)->update($input);

    }

    function view_settings()
    {
		$home_page = App\home_page::all('*');

        return($home_page);
    }
}
