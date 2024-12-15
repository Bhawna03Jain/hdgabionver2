@extends('layouts.app')

@section('content')
<h1>Record Transaction</h1>
<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
    <label for="product_id">Product:</label>
    <select name="product_id" required>
        @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    <label for="type">Transaction Type:</label>
    <select name="type" required>
        <option value="purchase">Purchase</option>
        <option value="sale">Sale</option>
        <option value="adjustment">Adjustment</option>
    </select>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required min="1">
    <label for="price">Price per Unit:</label>
    <input type="number" step="0.01" name="price" required min="0">
    <button type="submit">Submit</button>
</form>
@endsection
