<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>

    {{-- Import CSS & JS dari Laravel Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2 class="login-title">Lupa Password 🔐</h2>
            <p class="login-subtitle">
                Tidak masalah. Masukkan email kamu, dan kami akan kirimkan link untuk mengatur ulang password.
            </p>

            <!-- Status Notifikasi -->
            @if (session('status'))
                <div class="alert alert-success mb-3 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="Masukkan email yang terdaftar"
                           value="{{ old('email') }}" 
                           required 
                           autofocus>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn-login">Kirim Link Reset Password</button>

                <div class="login-footer">
                    <p><a href="{{ route('login') }}">← Kembali ke Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
