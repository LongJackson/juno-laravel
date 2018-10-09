<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     protected $table = 'orders';
     protected $primaryKey = 'order_id';

     protected $fillable = ['order_note','order_name','order_phone','order_email','order_address','order_status','create_at'];
     public function products()
     {
     	return $this->belongsToMany('App\Models\Product', 'product_order','order_id','prod_id')->withPivot('qty','price', 'options')->withTimestamps();
     }
}
