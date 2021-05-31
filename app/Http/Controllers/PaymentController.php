<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct(){
        $payPalConfig= Config::get('paypal');

        $this->apiContext= new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'], //clientID
                $payPalConfig['secret'] // clientSecret
            )
        );
    }

    public function payWithPayPal(){
        // After Step 2
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal('3.99');
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('full day fiching panga');


        $callbackUrl= url('/paypal/status');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$callbackUrl")
            ->setCancelUrl("$callbackUrl");

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

            // After Step 3
        try {
            $payment->create($this->apiContext);
            // echo $payment;

            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request){
        $paymentId= $request->paymentId;
        $payerId= $request->PayerID;
        $token= $request->token;

        if(!$paymentId || !$payerId || !$token){
            return 'No se pudo proceder con el pago a través de PayPal';
        }
        
        $payment= Payment::get($paymentId, $this->apiContext);
        $execution= new PaymentExecution();

        $execution->setPayerId($payerId);
        
        # Execute the payment
        $result= $payment->execute($execution,$this->apiContext);
        dd($result);

    }

}
