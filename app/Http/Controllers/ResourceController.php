<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string', 
            'price' => 'required|numeric',
            'description' => 'required|string', 
            'photo_link' => 'required|image|mimes:jpeg,jpg,png,gif'
        ]);
    
        if ($request->hasFile('photo_link')) {
            $file = $request->file('photo_link');
            $fileName = $file->getClientOriginalName(); // Prevent duplicate names
            // Try storing the file
            $storeResult = $file->move('storage/fotoProduk', $fileName);
            $filePath = 'storage/fotoProduk/' . $fileName; // Format to match public access
        } else {
            $filePath = null;
        }
    
        $product = Product::create([
            'name' => $request->name, 
            'price' => $request->price,
            'description' => $request->description, 
            'photo_link' => $filePath // Save correct path
        ]);

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }
}
