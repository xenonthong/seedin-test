<?php

namespace App\Http\RequestHandlers;

use App\Cart;
use App\Transaction;
use Illuminate\Http\Request;

class CheckoutRequestHandler
{
    /**
     * Store transaction request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Transaction
     */
    public static function store(Request $request)
    {
        $user_id     = $request->user()->id;
        $cart        = Cart::with('products')
                           ->where('id', $user_id)
                           ->first();
        $transaction = Transaction::create([
            'user_id' => $user_id,
            'total'   => $cart->products->sum('price'),
        ]);
        $attachables = [];

        foreach ($cart->products as $product) {
            $attachables[$product->id] = ['original_price' => $product->price * 100];
        };

        $transaction->products()->attach($attachables);

        return $transaction;
    }
}