@extends('Products.template.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form untuk mengupdate produk -->
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Harga Produk -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Kategori Produk -->
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Deskripsi Produk -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Menampilkan Created By (Pengguna yang login) -->
        {{-- <div class="form-group">
            <label for="user">Created By</label>
            <input type="text" class="form-control" id="user" value="{{ $product->user->username }}" disabled>
        </div> --}}

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
