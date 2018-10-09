<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "product";
    protected $primaryKey = "prod_id";

    protected $fillable = ['prod_code','prod_name','prod_des','prod_cate','prod_price','prod_regular_price','prod_sale_price','prod_thumbnail','prod_type','prod_status','prod_parent','prod_value_id'];

    protected $hidden = ['prod_thumbnail'];

    public function value()
    {
    	return $this->belongsToMany('App\Models\AttributeValue', 'product_attribute','prod_id','att_value_id')->withTimestamps();
    }

    public function single_value()
    {
        return $this->belongsTo('App\Models\AttributeValue','prod_value_id', 'att_value_id');
    }

    public function thumbnail()
    {
        return $this->belongsTo('App\Models\Image','prod_thumbnail','img_id');
    }

    public function gallery()
    {
        return $this->belongsToMany('App\Models\Image', 'product_images','prod_id','img_id')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','prod_cate','cate_id');
    }

    public function attr()
    {
        return $this->value()->with('attribute');
    }

    public function item()
    {
        return $this->hasMany($this, 'prod_parent','prod_id');
    }

    public function comment()
    {
        return $this->belongsTomany('App\Models\Comment', 'product_comment','comment_id','prod_id')->withTimestamps();
    }

}
