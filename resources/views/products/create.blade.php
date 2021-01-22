@extends('layouts.app')
@section('content')
    <h1>Create a product</h1>

    <form method="post" action="{{route('products.store')}}">
        @csrf
        <div class="form-row">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title"  value="{{old('title')}}" required>
        </div>
        <div class="form-row">
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value="{{old('description')}}" required>
        </div>

        <div class="form-row">
            <label for="">Price</label>
            <input type="number" class="form-control" name="price"  value="{{old('price')}}" required>
        </div>

        <div class="form-row">
            <label for="">Stock</label>
            <input type="number" class="form-control" name="stock" value="{{old('stock')}}" required>
        </div>

        <div class="form-row">
            <label for="">Status</label>
            <select class="custom-select" name="status" id=""  required>
                <option value="" selected>Select here..</option>
                <option value="available" {{old('status')=='available' ? 'selected':''}}>Available</option>

                <option value="unavailable" {{old('status')=='unavailable' ? 'selected':''}}>Unavailable</option>
            </select>

            <div class="form-row">
                <button class="btn btn-primary btn-lg mt-3" type="submit">Create Product</button>

            </div>

        </div>

    </form>


@endsection
