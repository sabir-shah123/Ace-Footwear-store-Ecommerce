<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_colors';
    protected $fillable = [
        'product_id' , 'pcolor'  , 'psize'  , 'pquantity' ,
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
