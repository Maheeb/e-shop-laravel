<?php

namespace App\Services;

use App\Cart;
use Illuminate\Support\Facades\Cookie;
use function Symfony\Component\Translation\t;

class CartService
{
    // protected $cookieName = 'cart';
    protected $cookieName;
    protected $cookieExpiration;


    public function __construct()
    {

        $this->cookieName = config('cart.cookie.name');
        $this->cookieExpiration = config('cart.cookie.expiration');
    }


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
        // return Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60);
        return Cookie::make($this->cookieName, $cart->id, $this->cookieExpiration);

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
