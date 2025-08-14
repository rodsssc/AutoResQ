<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AutoResQ</title>
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

                <!-- Registration Card -->
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-sm-5">
                        <div class="text-center mb-4">
                            <h2 class="h4">Create Account</h2>
                            <p class="text-muted">Get started with your free account</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Enter your full name" required autofocus>
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="Enter your email" required>
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
                                           placeholder="Create a password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Confirm your password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                Create Account
                            </button>

                            <!-- Login Link -->
                            <div class="text-center small mt-3">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-decoration-none">Sign in</a>
                            </div>
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
    
    <!-- Password Toggle Script -->
    <script>
        // Toggle main password field
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            togglePasswordVisibility(password, icon);
        });

        // Toggle confirm password field
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const password = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            togglePasswordVisibility(password, icon);
        });

        function togglePasswordVisibility(passwordField, iconElement) {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                iconElement.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordField.type = 'password';
                iconElement.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>