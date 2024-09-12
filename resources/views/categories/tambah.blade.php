@extends('categories.template.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Kategori</h4>
                        <p class="card-description">
                            Masukkan data kategori baru
                        </p>
                        <form action="{{ route('categories.store') }}" method="POST" class="forms-sample">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Nama Kategori</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name" placeholder="Nama Kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Deskripsi kategori"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
