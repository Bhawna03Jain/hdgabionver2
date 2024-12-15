@extends('layouts.app')

@section('content')
<h1>Stock Transactions</h1>
<a href="{{ route('transactions.create') }}">Record New Transaction</a>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->product->name }}</td>
            <td>{{ ucfirst($transaction->type) }}</td>
            <td>{{ $transaction->quantity }}</td>
            <td>{{ $transaction->price }}</td>
            <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
