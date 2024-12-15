@extends('layouts.app')

@section('content')
<h1>Stock Adjustment</h1>
<form action="{{ route('transactions.adjustment') }}" method="POST">
    @csrf
    <label for="product_id">Product:</label>
    <select name="product_id" required>
        @foreach($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    <label for="quantity">Adjustment Quantity:</label>
    <input type="number" name="quantity" required>
    <label for="reason">Reason for Adjustment:</label>
    <textarea name="reason" required></textarea>
    <button type="submit">Submit Adjustment</button>
</form>
@endsection
