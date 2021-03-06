<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title','content','featured_image','category_id'
    ];

    public function category(){

        Return $this->belongsTo('App\Category');
    }
}
