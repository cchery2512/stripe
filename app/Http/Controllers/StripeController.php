<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function charge(){
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_06Qotktj68P7hzjVJn6tDTwt00ifQcpwMq');

        $token = $_POST["stripeToken"];
        $charge = \Stripe\Charge::create([
            'amount' => 1500,
            'currency' => 'usd',
            "description" => "Pago en mi tienda... ",
            'source' => $token,
            'receipt_email' => 'jenny.rosen@example.com',
        ]);
        echo "<pre>", print_r($charge), "</pre>";
    }
}
