<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;

use DB;
use App\Models\Payment;
use App\Models\Patient;
use Session;
use Notification;

class PaymentController extends Controller
{
    public function index(){

        Return view('makePayment');
    }

    public function store(){    
        $r=request(); 
        $addPayment=Payment::create([   
            'icNo'=>$r->icNo,
            'amount'=>$r->amount, 
            'note'=>$r->note, 
        ]);
        Session::flash('success',"Payment added successful!");
        Return redirect()->route('viewPayment');

        $email='jiachenloo@gmail.com';
        Notification::route('mail',$email)->notify(new \App\Notifications\paymentPaid($email));
       
    }

    public function view(){
        $payment=Payment::all();
        Return view('showPayment')->with('payments',$payment);
    }

    public function pay(){
        $payment=Payment::all();
        Return view('pay')->with('payments',$payment);
    }

    public function delete($id){
        $delete=Payment::find($id);
        $delete->delete(); 
        Session::flash('danger',"Payment deleted successful!");
        Return redirect()->route('viewPayment');
    }

    public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of Southern Hospital",
        ]);
           
        return back();
    }
}
