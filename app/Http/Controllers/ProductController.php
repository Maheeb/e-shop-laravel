<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index')->with(['products' => $products]);
    }

    public function store(ProductRequest $request)
    {

//        $rules=[
//          'title'=>['required','max:255'],
//          'description'=>['required','max:1000'],
//          'price'=>['required','min:1'],
//          'status'=>['required','min:0'],
//
//        ];
//
//        \request()->validate($rules);
//
//
//
//        if (\request()->stock == 0 && \request()->status == "available") {
//
////            \session()->flash("error", "An error occurred");
//
//            return redirect()->back()->
//                withInput(\request()->all())->withErrors('An error has occurred');
//
//        }

        $product = Product::create($request->all());
//        \session()->flash("success","Product id ".$product->id."created successfully");

        return redirect()->route('products.index')->withSuccess("Product {$product->id} created successfully");
    }

    public function create()
    {


        return view('products.create');
    }

    public function show(Product $product)
    {
//        $product = Product::findOrFail($id);

        return view('products.show')->with(["product" => $product]);

    }

    public function update(ProductRequest $request, $product)
    {
        $product = Product::findOrFail($product);

//        $rules = [
//            'title'=>['required','max:255'],
//            'description'=>['required','max:1000'],
//            'price'=>['required','min:1'],
//            'status'=>['required','min:0'],
//
//        ];
//
//
//        \request()->validate($rules);
//
//
//        if (\request()->stock == 0 && \request()->status == "available") {
//
////            \session()->flash("error", "An error occurred");
//
//            return redirect()->back()->
//            withInput(\request()->all())->withErrors('An error has occurred');
//        }

//        $product->update(\request()->all());
        $product->update($request->all());
//        \session()->flash("success","Product id ". $product->id."created successfully");
        return redirect()->route('products.index')->withSuccess("Product {$product->id} updated successfully");
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit')->with(['product' => $product]);

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index');


    }


}
