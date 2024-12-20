<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulaController extends Controller
{
    public function getProductAttributes($productId)
    {
        // $attributes = RawMaterial::where('product_id', $productId)
        //     ->pluck('attributes'); // Assuming 'attributes' is stored as JSON
        // return response()->json($attributes);

    }
    public function saveFormula(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'formula' => 'required|string',
        ]);

        $product = Product::find($request->product_id);
        $product->price_formula = $request->formula;
        $product->save();

        return response()->json(['message' => 'Formula saved successfully!']);
    }
}
