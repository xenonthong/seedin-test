@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Product {{ $product->name }} - #{{ $product->id }}</h1>
        <p>Name: {{ $product->name }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
    </div>
@endsection
