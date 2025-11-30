@extends('layouts.app')

@section('content')
<div class="edit-wrapper">
    <div class="edit-card">
        <h2 class="edit-title">✏️ Edit Layanan</h2>
        <form action="{{ route('layanan.update',$layanan->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>🧺 Nama Layanan</label>
                <input type="text" name="nama_layanan" class="form-control"
                       value="{{ $layanan->nama_layanan }}">
            </div>

            <div class="mb-3">
                <label>💰 Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control no-arrow"
                       value="{{ $layanan->harga }}">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">💾 Update</button>
                <a href="{{ route('layanan.index') }}" class="btn btn-secondary">↩️ Kembali</a>
            </div>
        </form>
    </div>
</div>

<style>
/* Background soft full */
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f2f6fc, #eaf4f4, #fdfdfd);
}

.edit-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: calc(100vh - 70px);
    padding-top: 30px;
}

.edit-card {
    background: #ffffffcc;
    border-radius: 15px;
    padding: 30px;
    width: 450px;
    box-shadow: 0px 8px 25px rgba(0,0,0,0.12);
    animation: fadeIn 0.6s ease-in-out;
}

.edit-title {
    background: linear-gradient(to right, #4a90e2, #50c9c3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Hilangkan tombol panah di input number */
.no-arrow::-webkit-inner-spin-button, 
.no-arrow::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.no-arrow {
    -moz-appearance: textfield; /* untuk Firefox */
}

/* Hover tombol */
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
