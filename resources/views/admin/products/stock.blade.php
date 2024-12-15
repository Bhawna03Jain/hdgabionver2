@extends('layouts.app')

@section('content')
<h1>Stock Levels</h1>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Current Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
