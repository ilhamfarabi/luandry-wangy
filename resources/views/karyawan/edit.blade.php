@extends('layouts.app')

@section('content')
<div class="edit-wrapper">
    <div class="edit-card">
        <h2 class="edit-title">✏️ Edit User</h2>
        <form action="{{ route('karyawan.update',$karyawan->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>👤 Nama</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $karyawan->name) }}">
            </div>

            <div class="mb-3">
                <label>📧 Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email', $karyawan->email) }}">
            </div>

            <div class="mb-3">
                <label>👑 Role</label>
                <select name="role" class="form-control">
                    <option value="user" {{ old('role', $karyawan->role) == 'user' ? 'selected' : '' }}>user</option>
                    <option value="admin" {{ old('role', $karyawan->role) == 'admin' ? 'selected' : '' }}>admin</option>
                    {{-- Tambah opsi lain kalau perlu --}}
                </select>
            </div>

            <div class="mb-3">
                <label>🔐 Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">↩️ Kembali</a>
            </div>
        </form>
    </div>
</div>

<style>
/* Background soft */
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f2f6fc, #eaf4f4, #fdfdfd);
}

/* Wrapper biar card di tengah */
.edit-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 70px);
    padding-top: 30px;
}

/* Card form */
.edit-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    width: 450px;
    box-shadow: 0px 8px 25px rgba(0,0,0,0.1);
    animation: fadeIn 0.6s ease-in-out;
}

/* Judul cantik */
.edit-title {
    background: linear-gradient(to right, #50c9c3, #96deda);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
}

/* Animasi muncul */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: 0; opacity: 1; }
}

/* Button hover */
.btn-primary:hover {
    background-color: #2980b9;
    transform: scale(1.05);
    transition: 0.2s;
}
.btn-secondary:hover {
    transform: scale(1.05);
    transition: 0.2s;
}
</style>
@endsection
