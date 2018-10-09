<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';
    protected $fillable = ['created_at','comment_status', 'comment_name', 'comment_content'];

    public function product()
    {
    	return $this->belongsTomany('App\Models\Product', 'product_comment','comment_id','prod_id')->withTimestamps();
    }
}
