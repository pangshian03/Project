<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;

use DB;
use App\Models\Payment;
use App\Models\Patient;
use Session;
use Notification;
use Auth;
use PDF;

class PaymentController extends Controller
{   
    public function paymentPost(Request $request)
    {
 
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of Southern Hospital",
        ]);
        $delete=DB::table('payments')
        ->where('payments.id','=', $request->cid)
        ->delete();
      
        $email='jiachenloo@gmail.com';
        Notification::route('mail',$email)->notify(new \App\Notifications\paymentPaid($email));
        Session::flash('success','Order Payment successfully!');
        return back();
    }
        
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
    }

    public function view(){
        $payment=Payment::all();
        Return view('showPayment')->with('payments',$payment);
    }

    public function delete($id){
        $r=request();
        $payments=DB::table('payments')
        ->where('payments.id', '=', $id)
        ->delete();
      
        Session::flash('danger',"Payment deleted successful!");
        Return redirect()->route('viewPayment');
    }

    public function showAllPayment(){
        $payments=DB::table('payments')
        ->select('payments.id','payments.icNo','payments.amount','payments.note','payments.created_at')
        ->paginate(5);
        Return view('myPayment')->with('payments',$payments);
    }    

    public function pdfReport(){
            
        $payments=DB::table('payments')

        ->select('payments.id','payments.icNo','payments.amount','payments.created_at')
        ->get();
        $pdf= PDF::loadView('paymentReport', compact('payments'));

        return $pdf->download('report.pdf');
    }   
    
    public function __construct(){
        $this->middleware('auth'); 
    }
 
}