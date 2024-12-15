<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'type' => 'required|in:purchase,sale,adjustment',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction recorded successfully!');
    }
    public function createAdjustment(Request $request)
{
    $request->validate([
        'product_id' => 'required',
        'quantity' => 'required|integer',
        'reason' => 'required|string|max:255', // Optional: reason for adjustment
    ]);

    Transaction::create([
        'product_id' => $request->product_id,
        'type' => 'adjustment',
        'quantity' => $request->quantity,
        'price' => 0, // Price is optional for adjustments
    ]);

    return redirect()->route('transactions.index')->with('success', 'Stock adjustment recorded successfully!');
}


}
