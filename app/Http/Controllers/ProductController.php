<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index')->with(['products' => $products]);
    }

    public function store()
    {


    }

    public function create()
    {


    }

    public function show($product)
    {

        return view('products.show');

    }


}
