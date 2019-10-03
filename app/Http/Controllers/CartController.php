<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display user's cart items.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cart = Cart::with('products')
                    ->where('user_id', $request->user()->id)
                    ->first();

        if (!$cart || $cart->products->count() < 1) return redirect('/');

        return view('cart.show')->with(compact('cart'));
    }
}
