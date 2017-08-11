<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use Sluggable;
    //use SluggableScopeHelpers;

    protected $fillable = [
    
    	'category_id',
    	'photo_id',
    	'title',
    	'body'

    ];


    public function sluggable() {
        return [
            'slug' => [
                'source'         => 'title',
                'separator'      => '-',
                'includeTrashed' => true,
            ]
        ];
    }


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


    public function photoPlaceholder(){

        return 'http://placehold.it/700x200';

    }
}
