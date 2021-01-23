@extends('layouts.app')
@section('content')
    <h3>Payment details</h3>

    <h4 class="text-center"><strong>Grand Total: </strong>$ {{$order->total}}</h4>

    <div class="text-center mb-3">

        <form class="d-inline" action="{{route('orders.payments.store',['order'=>$order->id])}}" method="post">
            @csrf
            <button class="btn btn-success" type="submit">Pay</button>

        </form>
    </div>

@endsection
