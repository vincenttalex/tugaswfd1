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

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        return response()->json(['success' => true, 'product' => $product]);
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

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photo_link' => 'image|mimes:jpeg,jpg,png,gif'
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('photo_link')) {
            $file = $request->file('photo_link');
            $fileName = $file->getClientOriginalName();

            // Remove old image if exists
            if ($product->photo_link && file_exists(public_path($product->photo_link))) {
                unlink(public_path($product->photo_link));
            }

            // Store new image
            $file->move('storage/fotoProduk', $fileName);
            $product->photo_link = 'storage/fotoProduk/' . $fileName;
        } else {
            // Keep existing image
            $product->photo_link = $request->existing_photo;
        }

        $product->save();

        return response()->json([
            'success' => true,
            'product' => $product
        ]);

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }
}
