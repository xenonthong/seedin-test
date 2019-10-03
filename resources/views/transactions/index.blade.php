@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="col-sm-12">
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->total }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
