<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index');
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
