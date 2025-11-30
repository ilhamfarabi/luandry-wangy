<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2 class="login-title">Selamat Datang 👋</h2>
            <p class="login-subtitle">Silakan login untuk melanjutkan</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="Masukkan email" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" 
                           name="password" 
                           class="form-control" 
                           placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn-login">Login</button>

                <div class="login-footer">
                    <p><a href="{{ route('password.request') }}">Lupa Password?</a></p>
                </div>
            </form>
        </div>
    </div>

    {{-- SWEET ALERT --}}
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("success") }}',
            timer: 2000,
            showConfirmButton: false
        })
    </script>
    @endif

    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Login!',
            html: '{!! implode("<br>", $errors->all()) !!}',
        })
    </script>
    @endif
</body>
</html>
