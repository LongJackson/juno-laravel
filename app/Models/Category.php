<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categorys";
    protected $primaryKey = "cate_id";

    protected $fillable = ['cate_name', 'cate_slug', 'cate_parent','cate_thumbnail'];

    public function image()
    {
    	return $this->hasOne('App\Models\Image', 'img_id', 'cate_thumbnail');
    }
}
