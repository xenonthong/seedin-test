@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <cart :cart='{!! $cart !!}'></cart>
        </div>
    </div>
@endsection
