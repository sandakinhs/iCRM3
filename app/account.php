<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{

    protected $fillable = array('id', 'account_name', 'account_telephone', 'account_fax', 'account_email', 'account_type', 'account_industry', 'account_revenue', 'account_address_number', 'account_address_street', 'account_address_city', 'account_address_district','owner','deleted','group_id','modified_by');

    public function contacts()
    {
        return $this->hasMany('App\contact');
    }
}
