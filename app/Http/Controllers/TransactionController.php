<?php

namespace App\Http\Controllers;

use App\Http\RequestHandlers\CheckoutRequestHandler;
use App\Transaction;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transactions.index', ['transactions' => Transaction::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            CheckoutRequestHandler::store($request);
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

        return response()->json('checkout successful');
    }
}
