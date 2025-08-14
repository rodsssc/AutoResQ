// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    
    // Password toggle function
    window.togglePassword = function() {
        const passwordInput = document.getElementById('password');
        const passwordEye = document.getElementById('password-eye');
        
        if (passwordInput && passwordEye) {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordEye.classList.remove('bi-eye');
                passwordEye.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordEye.classList.remove('bi-eye-slash');
                passwordEye.classList.add('bi-eye');
            }
        }
    };

    // Form submission animation
    const loginForm = document.querySelector('.login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const btn = document.querySelector('.login-btn');
            const btnText = btn?.querySelector('.btn-text');
            const btnLoader = btn?.querySelector('.btn-loader');
            
            if (btn && btnText && btnLoader) {
                btn.disabled = true;
                btnText.style.display = 'none';
                btnLoader.style.display = 'block';
            }
        });
    }

    // Enhanced floating label behavior
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            const wrapper = this.closest('.input-wrapper');
            if (wrapper) {
                wrapper.classList.add('focused');
            }
        });
        
        input.addEventListener('blur', function() {
            const wrapper = this.closest('.input-wrapper');
            if (wrapper) {
                wrapper.classList.remove('focused');
            }
        });
    });

    // Auto-hide session status after 5 seconds
    const sessionStatus = document.querySelector('.session-status');
    if (sessionStatus) {
        setTimeout(() => {
            sessionStatus.style.opacity = '0';
            setTimeout(() => {
                sessionStatus.style.display = 'none';
            }, 300);
        }, 5000);
    }

});