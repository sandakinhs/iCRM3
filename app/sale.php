<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $fillable = array('id','call_log_id', 'customer_id', 'category_id','product_id', 'qty', 'owner_id', 'modified_by', 'assignedto', 'tax', 'discount', 'total', 'status',  'account_id', 'date', 'remark','group_id','deleted');
}
