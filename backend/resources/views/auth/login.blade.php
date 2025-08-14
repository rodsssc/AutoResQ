<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AutoResQ</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8 col-lg-6">
                <!-- Brand Header -->
                <div class="text-center mb-5">
                    <div class="mb-3">
                        <i class="bi bi-tools" style="font-size: 3rem; color: #0d6efd;"></i>
                    </div>
                    <h1 class="h3 mb-1 fw-normal">AutoResQ</h1>
                    <p class="text-muted">Emergency Response System</p>
                </div>

                <!-- Login Card -->
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-sm-5">
                        <div class="text-center mb-4">
                            <h2 class="h4">Welcome Back</h2>
                            <p class="text-muted">Sign in to your account to continue</p>
                        </div>

                        @if(session('status'))
                            <div class="alert alert-info mb-4">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="Enter your email" required autofocus>
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Enter your password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="small text-decoration-none">Forgot password?</a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                Sign In
                            </button>

                            <!-- Register Link -->
                            @if (Route::has('register'))
                                <div class="text-center small mt-3">
                                    Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>

                <!-- Security Notice -->
                <div class="text-center mt-4 small text-muted">
                    <i class="bi bi-shield-check"></i> Your connection is secured with 256-bit SSL encryption
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Simple Password Toggle -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });
    </script>
</body>
</html>