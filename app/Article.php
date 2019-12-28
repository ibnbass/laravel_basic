<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = "Articles";
    protected $fillable = ['title','content'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
