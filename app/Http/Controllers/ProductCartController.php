<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class ProductCartController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
//        $cart = Cart::create();
        $cart = $this->cartService->getFromCookieOrCreate();

        $quantity = $cart->products()->find($product->id)->pivot->quantity ?? 0;



        // if ($product->stock < $quantity+1) {
        //     throw ValidationException::withMessages([

        //             'cart' => "There is not enough quantity for the product {$product->title} you ordered"
        //     ]);
        // }


        $cart->products()->syncWithoutDetaching([$product->id => ['quantity'=>$quantity+1]]);

//        $cookie = Cookie::make('cart',$cart->id,7*24*60);
        $cookie = $this->cartService->makeCookie($cart);

        return  redirect()->back()->cookie($cookie);
    }



    public function destroy(Product $product, Cart $cart)
    {
        $cart->products()->detach($product->id);

//        $cookie = Cookie::make('cart', $cart->id, 7*24*60);
        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
    }

//    public function getFromCookieOrCreate(){
//
//        $cartId = Cookie::get('cart');
//
//        $cart = Cart::find($cartId);
//
//
//        return $cart ?? Cart::create();
//
//    }

}
