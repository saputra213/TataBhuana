<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Admin - Tata Bhuana</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <meta name="robots" content="noindex,nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @php($siteKey = config('services.recaptcha.site_key'))
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-unlock fa-3x text-primary mb-3"></i>
                            <h4 class="fw-bold">Reset Password</h4>
                            <p class="text-muted">Masukkan email dan password baru</p>
                        </div>
                        
                        <form method="POST" action="{{ route('admin.password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Admin</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $email ?? '') }}" required autofocus maxlength="255">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required maxlength="255">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required maxlength="255">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-check me-2"></i>Reset Password
                            </button>
                            <input type="text" name="hp" class="d-none" autocomplete="off" tabindex="-1">
                            @if(!empty($siteKey))
                                <div class="mt-3">
                                    <div class="g-recaptcha" data-sitekey="{{ $siteKey }}"></div>
                                </div>
                            @endif
                        </form>
                        
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.login') }}" class="text-muted text-decoration-none">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @if(!empty($siteKey))
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
</body>
</html>
