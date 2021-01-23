@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>
    @if(!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">

            <h1>The list of product is empty</h1>

        </div>

    @else
        <h4 class="text-center"><strong>Grand Total: </strong>$ {{$cart->total}}</h4>
        <a href="{{route('orders.create')}}" class="btn btn-success mb-3">Start Order</a>
        <div class="row">
            @foreach($cart->products as $product)
                <div class="col-3">

                    @include('components.product-card')

                </div>
            @endforeach
        </div>



    @endif



@endsection
