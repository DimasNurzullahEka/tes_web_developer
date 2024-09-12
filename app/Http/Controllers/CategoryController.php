<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //
      // Menampilkan semua kategori
      public function index()
      {
          $categories = Category::all();
          return view('categories.index', compact('categories'));
      }

      // Menampilkan form untuk membuat kategori baru
      public function create()
      {
          return view('categories.tambah');
      }

      // Menyimpan kategori baru
      public function store(Request $request)
      {
          $request->validate([
              'category_name' => 'required|string|max:255',
              'description' => 'nullable|string',
          ]);

          Category::create([
              'category_name' => $request->category_name,
              'description' => $request->description,
          ]);

          return redirect()->route('categories.index')->with('success', 'Category created successfully!');
      }

      // Menampilkan form untuk mengedit kategori
      public function edit(Category $category)
      {
          return view('categories.edit', compact('category'));
      }

      // Memperbarui kategori yang ada
      public function update(Request $request, Category $category)
      {
          $request->validate([
              'category_name' => 'required|string|max:255',
              'description' => 'nullable|string',
          ]);

          $category->update([
              'category_name' => $request->category_name,
              'description' => $request->description,
          ]);

          return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
      }

      // Menghapus kategori
      public function destroy(Category $category)
      {
          $category->delete();
          return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
      }
}
