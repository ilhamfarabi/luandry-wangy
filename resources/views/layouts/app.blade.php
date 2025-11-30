<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* NAVBAR CUSTOM */
        .navbar-custom {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .navbar-custom .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-logo-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
        }

        .navbar-custom .nav-link {
            position: relative;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .navbar-custom .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 3px;
            width: 0;
            height: 2px;
            background-color: #ffc107;
            transition: width 0.2s ease;
        }

        .navbar-custom .nav-link:hover::after,
        .navbar-custom .nav-link.active::after {
            width: 100%;
        }

        .navbar-custom .nav-link:hover {
            color: #ffc107 !important;
        }

        .navbar-user-badge {
            background: rgba(255,255,255,0.1);
            border-radius: 999px;
            padding: 4px 12px;
            font-size: 0.85rem;
        }

        body {
            padding-top: 75px; /* karena navbar fixed-top */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
  <div class="container">
    <a class="navbar-brand" 
       href="{{ Auth::check() 
                ? (Auth::user()->role=='admin' ? route('karyawan.index') : route('pesanan.index')) 
                : url('/') }}">
        <span class="navbar-logo-circle">L</span>
        <span>Laundry System</span>
    </a>

    <!-- Toggler untuk mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
          @if(Auth::user()->role=='admin')
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('karyawan.*') ? 'active' : '' }}" href="{{ route('karyawan.index') }}">Karyawan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}" href="{{ route('layanan.index') }}">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}" href="{{ route('pesanan.index') }}">Pesanan</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('pesanan.*') ? 'active' : '' }}" href="{{ route('pesanan.index') }}">Pesanan</a>
            </li>
          @endif
        @endauth
      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item me-2 d-flex align-items-center">
            <span class="nav-link navbar-user-badge">
              {{ Auth::user()->name }} • {{ ucfirst(Auth::user()->role) }}
            </span>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="btn btn-outline-light btn-sm">
                Logout
              </button>
            </form>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif
</script>
</body>
</html>
