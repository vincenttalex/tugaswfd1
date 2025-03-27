<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ResourceController extends Controller
{
    public function index()
    {
        $listProducts = Product::all();

        return view('product', compact('listProducts'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Product not found']);
    }
}
