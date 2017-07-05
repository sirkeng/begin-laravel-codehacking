<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //


	protected $upload = '/images/';




    protected $fillable = ['file']; //name of field in database





    public function getFileAttribute($photo){


    	return $this->upload.$photo;

    }
}