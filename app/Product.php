<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title' , 'catalog' , 'category' , 'brand' , 'price',
    ];
    public function color(){
      return $this->hasMany('App\ProductColor');
    }
    public function image(){
        return $this->hasMany('App\ProductImage');
    }
    public function size(){
        return $this->hasMany('App\ProductSize');
    }
}
