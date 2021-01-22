@extends('layouts.app')
@section('content')
    <h3>List of Products</h3>

    <a class="btn btn-success mb-3" href="{{route('products.create')}}">Create</a>
    @empty($products)
        <div class="alert alert-warning">
            <h1>Product list is empty</h1>
        </div>

    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                <th>Id</th>
                <th>Title</th>
                <th width="70%">Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th width="100%">Actions</th>
                </thead>
                <tbody>


                @foreach($products as $product)


                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->status}}</td>
                        <td >
                            <a class="btn btn-link" href="{{route('products.show',['product'=>$product->id])}}">Show</a>
                            <a class="btn btn-link" href="{{route('products.edit',['product'=>$product->id])}}">Edit</a>

                            <form class="d-inline" action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
                                @csrf
                                @method('Delete')
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    @endif
@endsection
