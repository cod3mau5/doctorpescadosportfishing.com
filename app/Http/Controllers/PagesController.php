<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charter;
use App\Panga;
use App\Rate;
use App\Article;
// import email Facade & mailable OrderReservation
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class PagesController extends Controller
{

    public function index(){

        $fishing_report_cabos= Article::orderBy('id','desc')->paginate(6);

        return view('fishing-report.index',compact('fishing_report_cabos'));
    }
    public function home(){
        $charters= Charter::get()->sortBy('feets');
        $pangas=  Panga::paginate(3);
        foreach($charters as $key => $charter){
            if(empty($charter->feature) || empty($charter->rate)){
                unset($charters[$key]);
            }
        }
        foreach($pangas as $key => $panga){
            if(empty($panga->feature) || empty($panga->rate)){
                unset($pangas[$key]);
            }
        }
        return view('home',compact('charters','pangas'));
    }


    public function sendMail(Request $request){

        $data = $request->except('_token');
        if(config('paypal.settings.mode') == 'live'){
            Mail::to([
                'info@doctorpescadosportfishing.com',
                'doctorpescado1@yahoo.com.mx',
                'code.bit.mau@gmail.com',
                'maubkpro@hotmail.com',
                'julietaleyva2808@gmail.com'
                ])->send(new ContactMail($request));

            die(json_encode(['response'=>'success']));
        }else{

        }
        Mail::to([
            'code.bit.mau@gmail.com'
            ])->send(new ContactMail($request));

        die(json_encode(['response'=>'success']));
    }

    //GALLERY
    public function gallery(){
        return view('gallery');
    }
    public function roosterfish(){
        return view('gallery.roosterfish');
    }
    public function wahoo(){
        return view('gallery.wahoo');
    }
    public function tuna(){
        return view('gallery.tuna');
    }
    public function marlin(){
        return view('gallery.marlin');
    }
    public function mahi_mahi(){
        return view('gallery.mahi-mahi');
    }
    public function red_snapper(){
        return view('gallery.red-snapper');
    }
    public function amberjack(){
        return view('gallery.amberjack');
    }
    public function jack_trevally(){
        return view('gallery.jack-trevally');
    }


      //TOURS
    public function sunset(){
          $cost=80;
        return view('tours.sunset',compact('cost'));
    }
    public function snorkel(){
        $cost=60;
        return view('tours.snorkel',compact('cost'));
    }
    public function whale_watching(){
        $cost=80;
        return view('tours.whale-watching',compact('cost'));
    }

    //CONTACT
    public function contact(){
        return view('contact');
    }

    public function debug(){
        dd(config('paypal.settings.mode'));
    }
}
