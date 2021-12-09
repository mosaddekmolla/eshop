<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class CartController extends Controller
{

    public function addProductToCart(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');


        if(Auth::check())
        {
           $product_check = Product::where('id', $product_id)->first();
           if($product_check)
           {
                if(Cart::where('prod_id', $product_id)-> where('user_id', Auth::id())->exists())
                    {
                        return response()->json(['status' => "Product Already Added"]);
                    }
                else{
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $product_check->name . " added to Cart"]);
                }
            }

        }
        else{
            return response()->json(['status'=> "Login to Continue"]);
        }

    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('Frontend.cartView', compact('cartItems'));
    }

    public function removeFromCart(Request $request)

    {
        // $data =$request->product_id;
        // echo 'test';
        // exit;
        // echo $request->product_id;
        // exit;
        // $prod_id = $request->input('product_id');

        // dd($request->all());



        // echo Auth::id();
        // exit;
        if(Auth::check())
        {
            // echo Auth::id();
            // exit;
            if(Cart::where('id',$request->cart_id)-> where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('id', $request->cart_id)-> where('user_id', Auth::id())->first();

                $cartItem->delete();
                return response()->json(['status' => 'Product Remove Successfully']);

            }
        }
    }



        // $data =$request->product_id;
        // $prod_id = $request->input('product_id');
        // dd(json_encode($request->product_id));
        // dd($request->all());

        // return $request['product_id'];
        // // die(var_dump($data));
        // Log::info(json_encode($request));
        // dd($request->input('product_id'));
        // // dd($prod_id);

    public function update(Request $request)

    {
        $prod_id = $request->input('id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check())
        {
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartCheck = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartCheck->prod_qty = $product_qty;
                $cartCheck->update();
                return response()->json(['status' => 'Cart Updated Successfully']);

            }
        }
        else{
            return response()->json(['status' => 'Login to Continue']);
        }
    }


    }

