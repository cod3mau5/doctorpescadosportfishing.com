<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\ImageBoat;

class ChartersImageBoatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images= Collection::wrap($request->file('file'));

        $panga_id= $request->panga_id;
        $charter_id= $request->charter_id;


        $images->each(function($image)use ($panga_id,$charter_id){
            
            $basename= Str::random();

            $original= $basename . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('/img/charters/gallery/'),$original);
            $imageBoat= ImageBoat::create([
                'name'=> $original,
                'panga_id'=> $panga_id,
                'charter_id'=>$charter_id
            ]);
        });

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=ImageBoat::findOrFail($id);
        File::delete([public_path('/img/charters/gallery/'.$image->name)]);
        $image->delete();

        return response()->json(['action'=>'success']);
    }
}
