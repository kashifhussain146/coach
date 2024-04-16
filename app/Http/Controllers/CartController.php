<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Subject;
use App\Models\SubjectCategory;
use App\Models\Questions;

class CartController extends Controller
{
    
    public function index(Request $request){
        try{
            $user = auth()->guard('web')->user();
            $cart = Cart::with(['question','category','subjects'])->where('user_id', $user->id);
            if(\Route::is('checkout.index')){
                $cart = $cart->first();
                if(!$cart){
                    return redirect()->route('home');
                }
                $subjects = Subject::Activated()->orderBy('subject_name','ASC')->get();
                return view('cart.index',compact('cart','user','subjects'));            
            }else{
                $cart = $cart->where('is_checkout',0)->get();
                if(count($cart)==0){
                    return redirect()->route('home');
                }
                return view('cart.index',compact('cart','user'));
            }
        }catch(\Exception $e){
            return redirect()->route('home');
        }

    }

    public function addToCart(Request $request){

        // Get the currently authenticated user
        $user = auth()->guard('web')->user();

        // Check if the product is already in the user's cart
        $cartItem = Cart::where('user_id', $user->id)->delete();

        $cartItem = new Cart([
            'user_id' => $user->id,
            'question_id' => $request->question_id,
            'subject_category_id' =>$request->subject_category_id, // You can adjust the quantity as needed
            'subject_id' => $request->subject_id,
            'price'=>$request->price,
            'questions'=>$request->question
        ]);
        
        $cartItem->save();

        // Redirect to the cart page or product page
        if(isset($request->is_cart)){
            return redirect()->route('checkout.index');
        }else{
            return redirect()->route('cart.index')->with('success', 'Question added to cart successfully');
        }

    }

    public function checkoutPost(Request $request){

        // Get the currently authenticated user
        $user = auth()->guard('web')->user();

        // Check if the product is already in the user's cart
        $cartItem = Cart::where('user_id', $user->id)->delete();

        $cartItem = new Cart([
            'user_id' => $user->id,
            'question_id' => $request->question_id,
            'subject_category_id' =>$request->subject_category_id, // You can adjust the quantity as needed
            'subject_id' => $request->subject_id,
            'price'=>$request->price,
            'is_checkout'=>1,
            'questions'=>$request->question
        ]);
        
        $cartItem->save();

        // Redirect to the cart page or product page
        return redirect()->route('checkout.index')->with('success', 'Question added to cart successfully');

    }

}
