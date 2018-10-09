<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'images';
    protected $primaryKey = 'img_id';

    protected $fillable = ['img_name', 'img_type'];
}
