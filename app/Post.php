<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = [
        // 'id',
        // 'user_id',
    	'category_id',
    	'photo_id',
    	'title',
    	'body'

    ];



    public function user(){

    	return $this->belongsTo('App\User'); //Post be longs to user || Get the User that owns the Post

    }

    public function photo(){

    	return $this->belongsTo('App\Photo');

    }


    public function category(){

    	return $this->belongsTo('App\Category');

    }

    public function comments(){


        return $this->hasMany('App\Comment');

    }


}
