@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-4 mt-3">
                    <product-card :product='{{ $product->toJson() }}' />
                </div>
            @endforeach
        </div>
    </div>
@endsection
