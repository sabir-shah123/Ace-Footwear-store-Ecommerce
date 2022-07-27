<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id' , 'total' , 'order_date' , 'status' , 'shipping_address' ,
    ];

}
