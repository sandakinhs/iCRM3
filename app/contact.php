<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = array('contact_firstname',
        'contact_lastname',
        'contact_title',
        'contact_gender',
        'contact_email1',
        'contact_no',
        'contact_mobile2',
        'contact_work_phone',
        'contact_work_fax',
        'contact_address_number',
        'contact_address_street',
        'contact_address_city',
        'contact_address_district',
        'contact_shipping_address_number',
        'contact_shipping_address_street',
        'contact_shipping_address_city',
        'contact_shipping_address_district',
        'contact_category',
        'assignedto',
        'contact_work_companyname',
        'contact_work_address_number',
        'contact_work_address_street',
        'contact_work_address_city',
        'contact_work_address_district',
        'contact_work_email',
        'contact_work_department',
        'designation',
        'contact_owner',
        'contact_created_time',
        'contact_modified_by',
        'contact_modified_time',
        'contact_birthday',
        'deleted',
        'contact_report_to',
        'group_id',
        'account_id');

}
