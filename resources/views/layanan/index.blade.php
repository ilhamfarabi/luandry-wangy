@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4 fw-bold">🧺 Data Layanan Laundry</h2>

    {{-- Tombol Create & Export --}}
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('layanan.create') }}" class="btn btn-success">
            ➕ Tambah Layanan
        </a>

        <a href="{{ route('layanan.export') }}" class="btn btn-primary">
            📤 Export Excel
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('layanan.index') }}" class="mb-4 d-flex">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Cari layanan..."
               class="form-control w-25 me-2">
        <button class="btn btn-info text-white">Cari</button>
    </form>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        {{-- SORT BY ID --}}
                        <th>
                            <a href="{{ route('layanan.index', array_merge(request()->except('page'), [
                                'sort_by' => 'id',
                                'sort_dir' => request('sort_by') == 'id' && request('sort_dir') == 'asc'
                                    ? 'desc' : 'asc'
                            ])) }}" class="text-white text-decoration-none">
                                ID
                                {!! request('sort_by') == 'id' 
                                    ? '<span style="color:red;">' . (request('sort_dir') == 'asc' ? '▲' : '▼') . '</span>' 
                                    : '' !!}
                            </a>
                        </th>

                        {{-- SORT BY NAMA --}}
                        <th>
                            <a href="{{ route('layanan.index', array_merge(request()->except('page'), [
                                'sort_by' => 'nama_layanan',
                                'sort_dir' => request('sort_by') == 'nama_layanan' && request('sort_dir') == 'asc'
                                    ? 'desc' : 'asc'
                            ])) }}" class="text-white text-decoration-none">
                                Nama Layanan
                                {!! request('sort_by') == 'nama_layanan'
                                    ? '<span style="color:red;">' . (request('sort_dir') == 'asc' ? '▲' : '▼') . '</span>'
                                    : '' !!}
                            </a>
                        </th>

                        {{-- SORT BY HARGA --}}
                        <th>
                            <a href="{{ route('layanan.index', array_merge(request()->except('page'), [
                                'sort_by' => 'harga',
                                'sort_dir' => request('sort_by') == 'harga' && request('sort_dir') == 'asc'
                                    ? 'desc' : 'asc'
                            ])) }}" class="text-white text-decoration-none">
                                Harga
                                {!! request('sort_by') == 'harga'
                                    ? '<span style="color:red;">' . (request('sort_dir') == 'asc' ? '▲' : '▼') . '</span>'
                                    : '' !!}
                            </a>
                        </th>

                        <th>Aksi</th>

                    </tr>
                </thead>

                <tbody>
                    @forelse($layanans as $l)
                    <tr>
                        <td>{{ $l->id }}</td>
                        <td>{{ $l->nama_layanan }}</td>
                        <td>Rp {{ number_format($l->harga, 0, ',', '.') }}</td>

                        <td>
                            <a href="{{ route('layanan.edit', $l->id) }}" 
                               class="btn btn-warning btn-sm">✏️ Edit</a>

                            {{-- FORM HAPUS + CLASS UNTUK SWEETALERT --}}
                            <form action="{{ route('layanan.destroy', $l->id) }}" 
                                  method="POST" class="delete-layanan-form" style="display:inline;">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="4" class="text-danger fw-bold">
                            Tidak ada layanan ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $layanans->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

{{-- Tambahan background soft biar full --}}
<style>
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f2f6fc, #eaf4f4, #fdfdfd);
}

/* Hover efek pada tombol */
.btn:hover {
    transform: scale(1.05);
    transition: 0.2s;
}
</style>

{{-- Animate.css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

{{-- SweetAlert2 CDN --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        timer: 1800,
        showConfirmButton: false
    });
@endif

@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session("error") }}',
        timer: 2000,
        showConfirmButton: false
    });
@endif
</script>


{{-- Konfirmasi Hapus Layanan --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-layanan-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // stop submit langsung

            Swal.fire({
                title: 'Yakin ingin menghapus layanan ini?',
                text: "Data layanan akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // lanjut hapus
                }
            });
        });
    });
});
</script>
@endsection
