@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('products.store') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Stress Ball" name="name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" placeholder="5.00" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
