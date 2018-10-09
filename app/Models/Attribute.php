<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = "attribute";
    protected $primaryKey = "att_id";

    protected $fillable = ['att_name','att_slug'];

    public function value()
    {
    	return $this->hasMany('App\Models\AttributeValue','att_id','att_id');
    }

}
