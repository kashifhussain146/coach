<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Subject;
use App\Models\SubjectCategory;
use App\Models\Questions;
use Razorpay\Api\Api;
use App\Models\PaymentDetails;

class PaymentController extends Controller
{
    
    public function createPayment(Request $request){

        $input = $request->all();
    //    dd($input);
        $api = new Api (env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        try{
            // $payment = $api->payment->fetch($input['razorpay_payment_id']);
            
            // echo "<pre>";print_r($payment);
            // exit;
            if(count($input) && !empty($input['razorpay_payment_id'])) {
                try {
                    $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' =>$input['amount'],'currency' => 'USD'));
                    $user = auth()->guard('web')->user();
                    $cart = Cart::where('user_id', $user->id)->first();
                
                    $payment = PaymentDetails::create([
                        'question_id'=>$cart->question_id,
                        'user_id'=>$user->id,
                        'order_id'=>rand(100000,1000000),
                        'amount' => $response['amount']/100,
                        'payment_date'=> date('Y-m-d',strtotime($response['created_at'])),
                        'bank_ref_no' => $response['id'],
                        'order_status'=>'1',
                        'payment_status'=>'1',
                        'network' => $response->card->network,
                        'card_last4' => $response->card->last4,
                        'card_type' => $response->card->type,
                        'email' => $response['email'],
                        'contact' => $response['contact'],
                        'card_id' => $response['card_id'],
                    ]);
                    
                    Cart::where('user_id', $user->id)->delete();
                    
                    \Session::put('success','Order done successfully ! Now you can access this question');
                    return redirect()->route('payment.success',['payment_id'=>$response['id']]);

                } catch(Exceptio $e) {
                    return $e->getMessage();
                    //Session::put('error',$e->getMessage());
                    //return redirect()->back();
                }
            }
        }
        catch(Exceptio $e) {
            return $e->getMessage();
            //Session::put('error',$e->getMessage());
            //return redirect()->back();
        }

    }

    public function success(Request $request,$payment_id){
        $payment = PaymentDetails::where('bank_ref_no',$payment_id)->first();
        if(!$payment){
            abort(403);
        }
        return view('thank-you',compact('payment_id','payment'));
    }


}
