<?php

namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;
use function Symfony\Component\Translation\t;

class CartService
{
    protected $cookieName = 'cart';

    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);

        return Cart::find($cartId);

    }

    public function getFromCookieOrCreate()
    {

//        $cartId = Cookie::get('cart');
//        $cartId = Cookie::get($this->cookieName);
//
//        $cart = Cart::find($cartId);
//        $cart = Cart::find($cartId);

        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();

    }

    public function makeCookie(Cart $cart)
    {
//        return  Cookie::make('cart',$cart->id,7*24*60);
        return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);

    }

    public function countProducts()
    {
//        $cart = $this->getFromCookieOrCreate();
        $cart = $this->getFromCookie();

        if ($cart !== null) {

//            return counter;
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }


}
