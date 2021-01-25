<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdePaymentController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        //
        return view('payments.create')->with(['order'=>$order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        return DB::transaction(function () use ($order){
            $this->cartService->getFromCookie()->products()->detach();
            $order->payment()->create(['amount'=>$order->total,'payed_at'=>now()]);

            $order->status = "payed";
            $order->save();

            return redirect()->route('main.index')->withSuccess("Thanks we have receive your \${$order->total} payment") ;
        });



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Payment $payment)
    {
        //
    }
}
