@extends('Profile.template.app')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password (Optional) -->
        <div class="form-group">
            <label for="password">Password (Biarkan kosong jika tidak ingin mengubah)</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <!-- Foto Profil (Optional) -->
        <div class="form-group">
            <label for="profile_photo">Foto Profil</label>
            @if ($user->profile_photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="img-thumbnail" style="width: 150px;">
                </div>
            @endif
            <input type="file" name="profile_photo" id="profile_photo" class="form-control">
            @error('profile_photo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>
</div>
@endsection
