<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    //
    protected $table = "attribute_value";
    protected $primaryKey = "att_value_id";

    protected $fillable = ['att_value'];
    public function product()
    {
    	return $this->belongsToMany('App\Models\Product')->withTimestamps();
    }

    public function attribute()
    {
    	return $this->belongsTo('App\Models\Attribute','att_id');
    }

    

}
