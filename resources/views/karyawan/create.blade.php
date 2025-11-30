@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <h2 class="animated-title">Tambah User</h2>
  <form action="{{ route('karyawan.store') }}" method="POST" class="animated-form">
    @csrf
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control" required>
        <option value="user">user</option>
        <option value="admin">admin</option>
        {{-- tambah role lain kalau perlu --}}
      </select>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

<style>
  body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f3e7e9, #e3eeff);
    font-family: 'Segoe UI', sans-serif;
  }

  .content-wrapper {
    background: #ffffffcc;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    max-width: 600px;
    margin: 40px auto;
    animation: fadeInUp 0.8s ease;
  }

  .animated-title {
    text-align: center;
    color: #3f72af;
    font-weight: bold;
    margin-bottom: 20px;
    animation: fadeInDown 0.9s ease;
  }

  .animated-form input,
  .animated-form select {
    transition: all 0.3s ease;
  }

  .animated-form input:focus,
  .animated-form select:focus {
    border-color: #3f72af;
    box-shadow: 0 0 8px rgba(63,114,175,0.4);
  }

  button {
    transition: transform 0.2s ease, background 0.3s ease;
  }

  button:hover {
    transform: scale(1.05);
    background: #345b9e !important;
  }

  @keyframes fadeInUp {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
  }

  @keyframes fadeInDown {
    from {opacity: 0; transform: translateY(-20px);}
    to {opacity: 1; transform: translateY(0);}
  }
</style>
@endsection
