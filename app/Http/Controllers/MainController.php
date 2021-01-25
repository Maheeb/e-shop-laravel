<?php

namespace App\Http\Controllers;

use App\Product;
use App\Scopes\AvailableScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function index()
    {

        // DB::connection()->enableQueryLog();

        // $products = Product::available()->get();
        $products = Product::all();
        // $products = Product::withOutGlobalScope(AvailableScope::class)->get();
        return view('welcome')->with([
           'products' => $products,
        ]);

    }

}
