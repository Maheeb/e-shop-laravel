@extends('layouts.app')

@section('content')
    @empty($products)
        <div class="alert alert-warning">

            <h1>The list of product is empty</h1>

        </div>

    @else
        <div class="row">

            @foreach($products as $product)
                <div class="col-3">

                    @include('components.product-card')

                </div>
            @endforeach
        </div>



    @endif



@endsection
