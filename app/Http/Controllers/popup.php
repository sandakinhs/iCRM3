<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;

class popup extends Controller
{

    /**
     * @return string
     */
    public function worksearch()
    {
        session_start();
        $account = new accounts();


        if(isset($_POST['submit']))
        {
            $company = $account->searchaccount($_POST['account_name']);

            return View::make('pop_ups.worksearch', compact('company'));
        }

        if(isset($_GET['id']))
        {
            $one_company=$account->viewoneaccount($_GET['id']);

            return View::make('pop_ups.worksearch', compact('one_company'));
        }

        return View::make('pop_ups.worksearch');
    }

    public  function contactsearch()
    {
        session_start();
        $contact = new contacts();

        if(isset($_POST['submit']))
        {
            $contacts = $contact->searchcontact($_POST['contact_name']);

            return View::make('pop_ups.contactsearch', compact('contacts'));
        }

        if(isset($_GET['id']))
        {
            $contact_report_name = $contact->viewonecontact($_GET['id']);

            $_SESSION['contact_report_to']=$_GET['id'];

           foreach($contact_report_name as $row)
           {
               $_SESSION['contact_report_name'] = $row->contact_firstname;
           }

            return View::make('pop_ups.contactsearch');

        }

        return View::make('pop_ups.contactsearch');
    }
}
