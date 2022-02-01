<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Panga;
use App\Rate;
use App\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReservation;
// use App\Captain;
// use App\Charter;
// use App\ImageBoat;
// use App\BoatSpecification;

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
        if($request->duration == '5' || $request->duration == '6'){
            $price= Rate::where('panga_id', $request->id)->get();
            return response()->json(['price' => $price[0]->half_day]);
        }elseif($request->duration == '8'){
            $price= Rate::where('panga_id', $request->id)->get();
            return response()->json(['price' => $price[0]->full_day]);
        }else{
            return 'Error';
        }
    }

    public function reservePanga(Request $response){
        // dd($response);
                #TRANSACTION DETAILS:
                // $description=$response->result->purchase_units[0]->description;
                $data['name']= $response->name;
                $data['email']= $response->email;
                $data['orderID']= $response->orderID;
                $data['charter']= $response->charter;
                $data['duration']= $response->duration;
                $data['anglers']= $response->anglers;
                $data['fishingDate']= $response->fishingDate;
                $data['fishingTime']= $response->fishingTime;
                $data['cost']=$response->cost;
                $data['subtotal']= $response->subtotal;
                $data['client_origin']= $response->client_origin;
                $data['request']=$response->specialRequest ? $response->specialRequest : 'no request';
                $data['orderID']='DR-'.mt_rand();
                if($reservation = Reservation::create($data)){

                    // dd($reservation->email);

                    if(config('paypal.settings.mode') == 'live'){

                        Mail::to(
                            [$reservation->email,
                            'info@doctorpescadosportfishing.com',
                            'doctorpescado1@yahoo.com.mx',
                            'julietaleyva2808@gmail.com',
                            'code.bit.mau@gmail.com']
                        )->queue(new OrderReservation($reservation));
                        return $reservation;

                    }elseif(config('paypal.settings.mode') == 'sandbox'){
                        // return new OrderReservation($reservation);
                        Mail::to(
                            [$reservation->email,
                            'mauri.bmxxx@gmail.com',
                            'code.bit.mau@gmail.com']
                        )->queue(new OrderReservation($reservation));
                        return $reservation;

                    }else{
                        Mail::to(
                            [$reservation->email,
                            'code.bit.mau@gmail.com']
                        )->queue(new OrderReservation($reservation));
                        return $reservation;
                    }

                }else{
                  return back()->with('status', 'there is a problem with the payment click here to contact us.');
                }
    }
    public function getOrder($orderID){

        $reservation=Reservation::where('orderID',$orderID)->first();
        return view('summary',compact('reservation'));
    }

}
