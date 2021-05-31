<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = config('paypal.client_id') ?: "AaVcB7xsW4hrraj-moDXCDe5DtYjOpTE_I6QkCvGQ637gIsIXcx8IksICe0lFKKhSHe9xD6n3gVIYAeD";
        $clientSecret = config('paypal.secret') ?: "EFDoANgATqKJxH2E2N7vHNLl15dctVYM-uSS8D5B9TF6DHfakUem3UBbZjdkijGnuf6ZGNiyOcsNZ5hj";

        if(config('paypal.settings.mode') == 'live'){
            return new ProductionEnvironment($clientId, $clientSecret);
        }elseif(config('paypal.settings.mode') == 'sandbox'){
            return new SandboxEnvironment($clientId, $clientSecret);
        }else{
            return new ProductionEnvironment($clientId, $clientSecret);
        }

    }
}
