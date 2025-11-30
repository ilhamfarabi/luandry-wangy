@extends('layouts.app')

@section('content')
<div class="container mt-5">

    {{-- Judul dengan animasi --}}
    <h2 class="text-center mb-4 fw-bold animate__animated animate__fadeInDown">
        👥 Data User
    </h2>

    {{-- Tombol tambah & export --}}
    <div class="text-center mb-4 animate__animated animate__zoomIn">
        <a href="{{ route('karyawan.create') }}" 
           class="btn btn-success shadow px-4 py-2" 
           style="border-radius: 10px; font-weight: 600; transition: 0.3s;">
           ➕ Tambah User
        </a>

        @can('admin')
        <a href="{{ route('karyawan.export') }}" 
           class="btn btn-primary shadow px-4 py-2" 
           style="border-radius: 10px; font-weight: 600; transition: 0.3s;">
           📥 Export Excel
        </a>
        @endcan
    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // cegah submit langsung

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data user akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e3342f',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // jalankan penghapusan
                    }
                });
            });
        });
    });
    </script>


    {{-- Card dengan tabel --}}
    <div class="card shadow-lg border-0 animate__animated animate__fadeInUp" style="border-radius: 15px; overflow: hidden;">
        <div class="card-body p-4" style="background: #f9fafb;">
            <table class="table table-hover text-center align-middle">
                <thead style="background: linear-gradient(90deg, #50c9c3, #96deda); color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $k)
                    <tr class="animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                        <td>{{ $k->id }}</td>
                        <td class="fw-semibold">{{ $k->name }}</td>
                        <td>{{ $k->email }}</td>
                        <td>{{ $k->role }}</td>
                        <td>{{ $k->created_at ? $k->created_at->format('d-m-Y H:i') : '-' }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit',$k->id) }}" 
                               class="btn btn-warning btn-sm shadow-sm" 
                               style="border-radius: 8px; transition: 0.3s;">
                               ✏️ Edit
                            </a>
                            <form action="{{ route('karyawan.destroy',$k->id) }}" method="POST" class="delete-form" style="display:inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow-sm" 
                                        style="border-radius: 8px; transition: 0.3s;">
                                    🗑 Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $karyawans->links() }}
            </div>

        </div>
    </div>
</div>

{{-- Tambahan background soft --}}
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
@endsection
