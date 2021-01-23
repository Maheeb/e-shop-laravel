@extends('layouts.app')
@section('content')
    <h3>Order details</h3>

    <h4 class="text-center"><strong>Grand Total: </strong>$ {{$cart->total}}</h4>

    <div class="text-center mb-3">

        <form class="d-inline" action="{{route('orders.store')}}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Confirm order</button>

        </form>
    </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                </thead>
                <tbody>


                @foreach($cart->products as $product)


                    <tr>
                        <td>
                            <img src="{{asset($product->images->first()->path)}}" width="100" alt="">
                            {{$product->title}}
                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->pivot->quantity}}</td>
{{--                        <td>{{$product->pivot->quantity * $product->price}}</td>--}}
                        <td>${{$product->total}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

@endsection
