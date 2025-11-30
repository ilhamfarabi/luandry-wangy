@extends('layouts.app')

@section('content')
<div class="edit-wrapper">
    <div class="edit-card">
        <h2 class="edit-title">✏️ Edit Pesanan</h2>
        <form action="{{ route('pesanan.update',$pesanan->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>👤 Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control"
                       value="{{ $pesanan->nama_pelanggan }}">
            </div>

            <div class="mb-3">
                <label>🧺 Layanan</label>
                <select name="layanan_id" class="form-control">
                    @foreach($layanans as $l)
                        <option value="{{ $l->id }}" {{ $pesanan->layanan_id==$l->id ? 'selected':'' }}>
                            {{ $l->nama_layanan }} - Rp{{ number_format($l->harga,0,',','.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>🔢 Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="{{ $pesanan->jumlah }}">
            </div>

            <div class="mb-3">
                <label>📌 Status</label>
                <select name="status" class="form-control">
                    <option value="pending" {{ $pesanan->status=='pending'?'selected':'' }}>⏳ Pending</option>
                    <option value="proses" {{ $pesanan->status=='proses'?'selected':'' }}>⚙️ Proses</option>
                    <option value="selesai" {{ $pesanan->status=='selesai'?'selected':'' }}>✅ Selesai</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">↩️ Kembali</a>
            </div>
        </form>
    </div>
</div>

<style>
/* Background full screen dengan nuansa soft */
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f2f6fc, #eaf4f4, #fdfdfd);
}

/* Bungkus konten biar card tetap di tengah */
.edit-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 70px);
    padding-top: 30px;
}

/* Card */
.edit-card {
    background: #ffffffcc; /* putih transparan lembut */
    border-radius: 15px;
    padding: 30px;
    width: 450px;
    box-shadow: 0px 8px 25px rgba(0,0,0,0.12);
    animation: fadeIn 0.6s ease-in-out;
}

/* Judul cantik */
.edit-title {
    background: linear-gradient(to right, #4a90e2, #50c9c3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
}

/* Animasi */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Button hover */
.btn-primary:hover {
    background-color: #357abd;
    transform: scale(1.05);
    transition: 0.2s;
}
.btn-secondary:hover {
    transform: scale(1.05);
    transition: 0.2s;
}
</style>
@endsection
