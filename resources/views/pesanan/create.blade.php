@extends('layouts.app')

@section('content')
<div class="create-wrapper">
  <h2 class="create-title">📝 Buat Pesanan</h2>
  <form action="{{ route('pesanan.store') }}" method="POST" class="create-form">
    @csrf
    <div class="mb-3">
      <label><i class="fas fa-user"></i> Nama Pelanggan</label>
      <input type="text" name="nama_pelanggan" class="form-control input-animate" required>
    </div>
    <div class="mb-3">
      <label><i class="fas fa-concierge-bell"></i> Layanan</label>
      <select name="layanan_id" class="form-control input-animate custom-select">
        @foreach($layanans as $l)
          <option value="{{ $l->id }}">{{ $l->nama_layanan }} - Rp{{ $l->harga }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label><i class="fas fa-sort-numeric-up"></i> Jumlah</label>
      <input type="number" name="jumlah" class="form-control input-animate" required>
    </div>
    <button type="submit" class="btn btn-primary btn-animate">
      <i class="fas fa-save"></i> Simpan
    </button>
  </form>
</div>

<style>
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f3e7e9, #e3eeff); /* pastel soft pink ke biru muda */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Wrapper */
.create-wrapper {
    padding: 30px;
    background: #ffffffd9; /* putih transparan biar nyatu sama background */
    max-width: 600px;
    margin: 40px auto;
    border-radius: 14px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    animation: fadeIn 0.7s ease-in-out;
}

/* Title */
.create-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 25px;
    text-align: center;
}

/* Input animasi */
.input-animate {
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
}
.input-animate:focus {
    border-color: #6c5ce7;
    box-shadow: 0px 0px 6px rgba(108, 92, 231, 0.4);
    transform: scale(1.02);
}

/* Dropdown custom */
.custom-select {
    background: #f0f4ff;
    border: 1px solid #b2bec3;
    color: #2d3436;
    font-weight: 500;
    border-radius: 8px;
    transition: 0.3s;
}
.custom-select:hover {
    background: #dfe6fd;
}
.custom-select:focus {
    background: #eaf0ff;
    border-color: #6c5ce7;
    box-shadow: 0 0 6px rgba(108, 92, 231, 0.4);
}

/* Animasi fade */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Button */
.btn-primary {
    background: #6c5ce7;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 600;
    transition: 0.3s ease;
}
.btn-primary:hover {
    background: #5a4bcf;
    transform: scale(1.05);
}
.btn-animate {
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0%   { box-shadow: 0 0 0 0 rgba(108, 92, 231, 0.4); }
    70%  { box-shadow: 0 0 0 10px rgba(108, 92, 231, 0); }
    100% { box-shadow: 0 0 0 0 rgba(108, 92, 231, 0); }
}
</style>
@endsection
