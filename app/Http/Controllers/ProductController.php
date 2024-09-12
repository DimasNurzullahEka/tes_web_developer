<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan model Product diimport
use App\Models\Category; // Pastikan model Category diimport

class ProductController extends Controller
{
    //
   // Menampilkan semua produk
   public function index()
   {
       $products = Product::with('Category', 'user')->get();
       return view('products.index', compact('products'));
   }

   // Menampilkan form untuk membuat produk baru
   public function create()
   {
       $categories = Category::all();
       return view('Products.tambah', compact('categories'));
   }

   // Menyimpan produk baru
   public function store(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'price' => 'required|numeric',
           'category_id' => 'required|exists:categories,id',
       ]);

       Product::create([
           'name' => $request->name,
           'price' => $request->price,
           'category_id' => $request->category_id,
           'user_id' => auth()->id(), // Menghubungkan produk dengan user yang sedang login
           'description' => $request->description,
       ]);

       return redirect()->route('products.index');
   }
    // Menampilkan form edit untuk produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Mengupdate produk yang sudah ada
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        // Update data produk
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        // Update the user_id to the current logged-in user
        $product->user_id = auth()->user()->id;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
