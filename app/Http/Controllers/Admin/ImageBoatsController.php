<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\ImageBoat;



class ImageBoatsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isFisherman');
    }



    public function store(Request $request){

            $images= Collection::wrap($request->file('file'));

            $panga_id= $request->panga_id;
            $charter_id= $request->charter_id;


            $images->each(function($image)use ($panga_id,$charter_id){
                
                $basename= Str::random();
    
                $original= $basename . '.' . $image->getClientOriginalExtension();
    
                $image->move(public_path('/img/pangas/gallery/'),$original);
                $imageBoat= ImageBoat::create([
                    'name'=> $original,
                    'panga_id'=> $panga_id,
                    'charter_id'=>$charter_id
                ]);
            });


    }
    public function destroy($id){
        $image=ImageBoat::findOrFail($id);
        dd(public_path('/img/pangas/gallery/'.$image->name));
        File::delete([public_path('/img/pangas/gallery/'.$image->name)]);
        $image->delete();

        return response()->json(['action'=>'success']);
    }
}
