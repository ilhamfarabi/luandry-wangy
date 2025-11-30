<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reset Password</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body{
      background: linear-gradient(135deg,#0d6efd,#20d3c2);
      min-height:100vh; margin:0;
      display:flex; align-items:center; justify-content:center;
      font-family: 'Poppins', system-ui, -apple-system, Segoe UI, Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif;
    }
    .login-wrapper{width:100%; padding:20px;}
    .login-box{
      width:100%; max-width:460px; margin:0 auto; text-align:left;
      background:#fff; border-radius:14px; padding:36px 32px;
      box-shadow:0 16px 40px rgba(0,0,0,.15);
    }
    .login-title{
      font-size:1.9rem; font-weight:800; letter-spacing:.2px; color:#222; margin:0 0 4px;
      text-align:center;
    }
    .login-subtitle{
      text-align:center; color:#6b7280; font-size:.98rem; margin:6px auto 22px; max-width:34ch;
    }
    .key-emoji{ display:block; text-align:center; font-size:1.4rem; margin-bottom:8px;}

    .form-group{ margin-bottom:18px;}
    .form-group label{ display:block; font-weight:600; color:#374151; margin-bottom:6px; }

    .input-wrap{
      position:relative;
    }
    .form-control{
      width:100%; height:46px;
      background:#f8f9ff; border:1px solid #e5e7eb; border-radius:10px;
      padding:10px 44px 10px 14px; font-size:.96rem;
      transition:border-color .15s, box-shadow .15s, background-color .15s;
    }
    .form-control:focus{
      outline:0;
      border-color:#0d6efd;
      box-shadow:0 0 0 3px rgba(13,110,253,.15);
      background:#fff;
    }
    .input-error{ color:#dc2626; font-size:.82rem; margin-top:6px; display:block;}
    .toggle-pass{
      position:absolute; right:10px; top:50%; transform:translateY(-50%);
      border:0; background:transparent; cursor:pointer;
      width:32px; height:32px; border-radius:8px;
      display:flex; align-items:center; justify-content:center;
      font-size:18px;
    }
    .toggle-pass:hover{ background:#f1f5f9; }

    .btn-login{
      width:100%; border:0; border-radius:10px;
      padding:12px 0; font-weight:700; color:#fff; font-size:1rem;
      background-image:linear-gradient(90deg,#2ea1ff,#03d1ff);
      box-shadow:0 8px 16px rgba(3, 209, 255, .25);
      transition: transform .06s ease, filter .2s ease;
    }
    .btn-login:active{ transform:translateY(1px); }
    .btn-login:hover{ filter:brightness(.97); }

    .login-footer{ text-align:center; margin-top:16px; }
    .login-footer a{ color:#0d6efd; font-weight:600; text-decoration:none; }
    .login-footer a:hover{ text-decoration:underline; }
    .alert{ padding:10px 12px; border-radius:10px; font-size:.9rem; }
    .alert-success{ background:#ecfdf5; color:#065f46; border:1px solid #a7f3d0; }
    @media (max-width:480px){
      .login-box{ padding:28px 22px; border-radius:12px; }
      .login-title{ font-size:1.6rem; }
    }
  </style>
</head>
<body>
  <div class="login-wrapper">
    <div class="login-box">
      <h2 class="login-title">Atur Ulang Password</h2>
      <span class="key-emoji">🔑</span>
      <p class="login-subtitle">
        Masukkan email dan password baru kamu untuk menyelesaikan reset password.
      </p>

      @if (session('status'))
        <div class="alert alert-success mb-3 text-center">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-wrap">
            <input id="email" type="email" name="email" class="form-control"
                   value="{{ old('email', $request->email) }}" placeholder="contoh@mail.com"
                   required autofocus autocomplete="username">
          </div>
          @error('email') <span class="input-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label for="password">Password Baru</label>
          <div class="input-wrap">
            <input id="password" type="password" name="password" class="form-control"
                   placeholder="Masukkan password baru" required autocomplete="new-password">
            <button type="button" class="toggle-pass" data-target="password" aria-label="Tampilkan/sembunyikan password">👁️</button>
          </div>
          @error('password') <span class="input-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label for="password_confirmation">Konfirmasi Password</label>
          <div class="input-wrap">
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                   placeholder="Ulangi password baru" required autocomplete="new-password">
            <button type="button" class="toggle-pass" data-target="password_confirmation" aria-label="Tampilkan/sembunyikan konfirmasi">👁️</button>
          </div>
          @error('password_confirmation') <span class="input-error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-login">Reset Password</button>

        <div class="login-footer">
          <p><a href="{{ route('login') }}">← Kembali ke Login</a></p>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.querySelectorAll('.toggle-pass').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-target');
        const input = document.getElementById(id);
        if (!input) return;
        input.type = input.type === 'password' ? 'text' : 'password';
        btn.textContent = input.type === 'password' ? '👁️' : '🙈';
      });
    });
  </script>
</body>
</html>
