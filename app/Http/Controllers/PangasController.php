<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Captain;
use App\Panga;
use App\Charter;
use App\Rate;
use App\ImageBoat;
use App\BoatSpecification;

class PangasController extends Controller
{
  
    public function home(){
        $pangas=  Panga::all();
        $charters= DB::table('charters')->get();

        foreach($pangas as $key => $panga){
            
            // when exists pangas without rate or captain
            if(empty($panga->rate) || empty($panga->captain)){
                // dd($panga->captain);
                unset($pangas[$key]);  
            }
        }
        return view('pangas', compact('pangas','charters'));
    }
    public function bookPanga($id){
        $panga= Panga::find($id);
        return view('booking-panga',compact('panga'));
    }
    public function bookPangaWithPrice($id,$price){
        $panga= Panga::find($id);
        $price=$price;
        return view('booking-panga',compact('panga','price'));
    }
    public function bookRandomPanga(){
        $panga= (object) array(
            'rate' => (object) array(
                'half_day' => 179,
                'full_day' => 355,
                'duration_half_day'=>'5',
                'duration_full_day'=>'8'
            )
        );
    
        $panga->name= 'Super Panga';
        $panga->feets= 23;
        $panga->max_anglers=3;
        $panga->id=1;
    
        return view('booking',compact('panga'));
    }

    public function getPrice(Request $request){
        if($request->duration == '5'){
            $price= Rate::where('panga_id', $request->id)->get();
            return response()->json(['price' => $price[0]->half_day]);
        }elseif($request->duration == '8'){
            $price= Rate::where('panga_id', $request->id)->get();
            return response()->json(['price' => $price[0]->full_day]);
        }else{
            return 'Error';
        }
    }

}
