<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\UpdateCartItemsRequest;
use Carbon\Carbon;

class CartItemController extends Controller
{
    /**
     * Delete product from user's cart.
     *
     * @param \App\Http\Requests\UpdateCartItemsRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(UpdateCartItemsRequest $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)
                    ->first();

        $cart->products()->detach($request->product_id);

        return response()->json('Product removed from cart');
    }

    /**
     * Add item to user's cart.
     *
     * @param \App\Http\Requests\UpdateCartItemsRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UpdateCartItemsRequest $request)
    {
        $cart = Cart::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['user_id'    => $request->user()->id]
        );

        $cart->products()->attach($request->product_id);

        return response()->json('Product added to cart.');
    }
}
