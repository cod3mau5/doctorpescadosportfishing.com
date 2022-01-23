<?php

namespace Sample;
namespace App\Http\Controllers;

//1. Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPal\Api\Payment;
use Illuminate\Support\Facades\DB;
use App\Reservation;
use Sample\CaptureIntentExamples\CreateOrder;

// import email Facade & mailable OrderReservation
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReservation;
use App\Mail\tourReservation;
use Illuminate\Http\Request;
use PayPalHttp\HttpResponse;


require_once(app_path().'/Helpers/paypal_client.php');


class GetOrder extends Controller
{
 public function cashOnArrival(Request $request){
     dd($request->all());
        #TRANSACTION DETAILS:
        $description=$request->result->purchase_units[0]->description;

        $reservationData= explode(',', $description);
        $data['name']= $request->result->payer->name->given_name .' '. $request->result->payer->name->surname;
        $data['email']= $request->result->payer->email_address;
        $data['orderID']= $request->result->id;
        $data['charter']= $reservationData[0];
        $data['duration']= $reservationData[1];
        $data['anglers']= $reservationData[2];
        $data['fishingDate']= $reservationData[3];
        $data['fishingTime']= $reservationData[4];
        $data['cost']=$request->result->purchase_units[0]->payments->captures[0]->amount->value;
        $data['subtotal']= $reservationData[5];
        $data['client_origin']= $reservationData[6];
        $data['request']= $reservationData[7];

        if($request->result->status === "COMPLETED"){
            #INSERT DETAILS:
            $reservation = Reservation::create($data);

            // dd($reservation->email);

            if(config('paypal.settings.mode') == 'live'){

                Mail::to(
                    [$reservation->email,
                    'info@doctorpescadosportfishing.com',
                    'doctorpescado1@yahoo.com.mx',
                    'julietaleyva2808@gmail.com',
                    'code.bit.mau@gmail.com']
                )->queue(new OrderReservation($reservation));
                return view('summary',compact('reservation'));

            }elseif(config('paypal.settings.mode') == 'sandbox'){
                // return new OrderReservation($reservation);
                Mail::to(
                    [$reservation->email,
                    'mauri.bmxxx@gmail.com',
                    'code.bit.mau@gmail.com']
                )->queue(new OrderReservation($reservation));
                return view('summary',compact('reservation'));

            }else{
                Mail::to(
                    [$reservation->email,
                    'code.bit.mau@gmail.com']
                )->queue(new OrderReservation($reservation));
                return view('summary',compact('reservation'));
            }

        }else{
          return back()->with('status', 'there is a problem with the payment click here to contact us.');
        }
    }
 
  // 2. Set up your server to receive a call from the client
  /**
   *You can use this function to retrieve an order by passing order ID as an argument.
   */
  public static function getOrder($orderId)
  {

    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));


    if(!$client){
        return back()->with('status', 'there is a problem with the payment click here to contact us.');
    }else{

        #TRANSACTION DETAILS:
        $description=$response->result->purchase_units[0]->description;

        $reservationData= explode(',', $description);
        $data['name']= $response->result->payer->name->given_name .' '. $response->result->payer->name->surname;
        $data['email']= $response->result->payer->email_address;
        $data['orderID']= $response->result->id;
        $data['charter']= $reservationData[0];
        $data['duration']= $reservationData[1];
        $data['anglers']= $reservationData[2];
        $data['fishingDate']= $reservationData[3];
        $data['fishingTime']= $reservationData[4];
        $data['cost']=$response->result->purchase_units[0]->payments->captures[0]->amount->value;
        $data['subtotal']= $reservationData[5];
        $data['client_origin']= $reservationData[6];
        $data['request']= $reservationData[7];

        if($response->result->status === "COMPLETED"){
            #INSERT DETAILS:
            $reservation = Reservation::create($data);

            // dd($reservation->email);

            if(config('paypal.settings.mode') == 'live'){

                Mail::to(
                    [$reservation->email,
                    'info@doctorpescadosportfishing.com',
                    'doctorpescado1@yahoo.com.mx',
                    'julietaleyva2808@gmail.com',
                    'code.bit.mau@gmail.com']
                )->queue(new OrderReservation($reservation));
                return view('summary',compact('reservation'));

            }elseif(config('paypal.settings.mode') == 'sandbox'){
                // return new OrderReservation($reservation);
                Mail::to(
                    [$reservation->email,
                    'mauri.bmxxx@gmail.com',
                    'code.bit.mau@gmail.com']
                )->queue(new OrderReservation($reservation));
                return view('summary',compact('reservation'));

            }else{
                Mail::to(
                    [$reservation->email,
                    'code.bit.mau@gmail.com']
                )->queue(new OrderReservation($reservation));
                return view('summary',compact('reservation'));
            }

        }else{
          return back()->with('status', 'there is a problem with the payment click here to contact us.');
        }
    }



  }
  public static function getOrderTour($orderId)
  {

    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));


    if(!$client){
        return back()->with('status', 'there is a problem with the payment click here to contact us.');
    }else{

        #TRANSACTION DETAILS:
        $description=$response->result->purchase_units[0]->description;

        $reservationData= explode(',', $description);
        $data['name']= $response->result->payer->name->given_name .' '. $response->result->payer->name->surname;
        $data['email']= $response->result->payer->email_address;
        $data['orderID']= $response->result->id;
        $data['charter']= $reservationData[0];
        $data['duration']= $reservationData[1];
        $data['anglers']= $reservationData[2];
        $data['fishingDate']= $reservationData[3];
        $data['fishingTime']= $reservationData[4];
        $data['cost']=$response->result->purchase_units[0]->payments->captures[0]->amount->value;
        $data['subtotal']= $reservationData[5];
        $data['client_origin']= $reservationData[6];
        $data['request']= $reservationData[7];

        if($response->result->status === "COMPLETED"){
            #INSERT DETAILS:
            $reservation = Reservation::create($data);

            // dd($reservation->email);

            if(config('paypal.settings.mode') == 'live'){

                Mail::to(
                    [$reservation->email,
                    'info@doctorpescadosportfishing.com',
                    'doctorpescado1@yahoo.com.mx',
                    'code.bit.mau@gmail.com']
                )->queue(new tourReservation($reservation));
                return view('summary',compact('reservation'));

            }elseif(config('paypal.settings.mode') == 'sandbox'){
                // return new tourReservation($reservation);
                Mail::to(
                    [$reservation->email,
                    'mauri.bmxxx@gmail.com',
                    'code.bit.mau@gmail.com']
                )->queue(new tourReservation($reservation));
                return view('summary',compact('reservation'));

            }else{
                Mail::to(
                    [$reservation->email,
                    'code.bit.mau@gmail.com']
                )->queue(new tourReservation($reservation));
                return view('summary',compact('reservation'));
            }

        }else{
          return back()->with('status', 'there is a problem with the payment click here to contact us.');
        }
    }



  }
}

/**
 *This driver function invokes the getOrder function to retrieve
 *sample order details.
 *
 *To get the correct order ID, this sample uses createOrder to create an order
 *and then uses the newly-created order ID with GetOrder.
 */
if (!count(debug_backtrace()))
{
  GetOrder::getOrder($orderID, true);
  return '';
}

?>
