<?php

namespace App\Http\Controllers\payment;

use Stripe;
use Session;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StripePaymentController extends Controller
{
   
    public function stripe($id)
    {
        $data = Invoice::findOrFail($id);
        return view('stripe',compact('data'));
    }
    
   
    public function stripePost(Request $request,$id)
    {
       $invoice = Invoice::findOrFail($id);
       $invoice->name = 'تم الدفع الكترونيا';
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $invoice->price *100,
                "currency" => "aed",
                "source" => $request->stripeToken,
                "description" => "Test payment from LaravelTus.com." 
        ]);
      
        Session::flash('success', 'تم الدفع بنجاح');
              
        return back();
        
    }

   
}
