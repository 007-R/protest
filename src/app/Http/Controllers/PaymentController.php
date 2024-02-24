<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {

        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(
                array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                )
            );

            $charge = Charge::create(
                array(
                    'customer' => $customer->id,
                    'amount' => $request->amount,
                    'currency' => 'jpy'
                )
            );

            return view('done')->with('message', 'お支払い');

        } catch (Exception $e) {

            return $e->getMessage();

        }

    }
}