<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Panga;
use App\Charter;
use App\Captain;
use App\Rate;
use App\ImageBoat;
use App\BoatSpecification;


class ChartersController extends Controller
{
    public function home(){
        $charters= Charter::get()->sortBy('feets');

        foreach($charters as $key => $charter){
            if(empty($charter->feature) || empty($charter->rate)){
                unset($charters[$key]);
            }
        }
        return view('charters')->with('charters',$charters);

    }
    public function showCharter($id){
        $charter= Charter::find($id);
        $charters= Charter::get();

        if(empty($charter->feature) || empty($charter->rate)){
            return 'Lancha no disponible';
        }else{
            return view('charter',compact('charter','charters'));
        }
    }
    public function bookCharter($id){
        $charter= Charter::find($id);
        return view('booking-charter',compact('charter'));
    }
    public function bookCharterWithPrice($id,$price){
        $charter= Charter::find($id);
        $price=$price;
        // dd($price);
        return view('booking-charter',compact('charter','price'));
    }
    public function getPrice(Request $request){
        if($request->duration == '5'){
            $price= Rate::where('charter_id', $request->id)->get();
            return response()->json(['price' => $price[0]->half_day]);
        }elseif($request->duration == '8'){
            $price= Rate::where('charter_id', $request->id)->get();
            return response()->json(['price' => $price[0]->full_day]);
        }else{
            return 'Error';
        }
    }
}
