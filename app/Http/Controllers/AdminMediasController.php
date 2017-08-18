<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediasController extends Controller
{
    //



    public function index(){


    	$photos = Photo::all();

    	return view('admin.media.index', compact('photos'));

    }

    public function create(){

    	return view('admin.media.create');

    }


    public function store(Request $request){

    	$file = $request->file('file');

    	$name = time() . $file->getClientOriginalName();

    	$file->move('images', $name);



    	Photo::create(['file'=>$name]);

    }

    public function destroy($id){
        //return $id.'sss555';
    	$photo = Photo::findOrFail($id);

    	if(isset($photo->file)){
    		//@ incase if have $photo->file in database but not have in images folder
    		@unlink(public_path() . $photo->file);
    	}

    	$photo->delete();

        return redirect()->back();
    }


    public function deleteMedia(Request $request){
       // return dd($request);
        if(isset($request->delete_single)){
           //return 'Delete sigle'.$request->delete_single;
            //return $this->destroy($request->photo);
            return $this->destroy($request->delete_single);
            //return 'sss';
             //return redirect()->back();

        }



        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            //return $request->checkBoxArray;
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {
                $photo->delete();
            }

            return redirect()->back();           
        }else{
            return redirect()->back();  
        }




    }



}
