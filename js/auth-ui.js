function createFloatingElements() {
    const container = document.getElementById('floatingElements');
    for (let i = 0; i < 20; i++) {
        const element = document.createElement('div');
        element.classList.add('floating-element');
        element.style.left = Math.random() * 100 + '%';
        element.style.animationDelay = Math.random() * 15 + 's';
        element.style.animationDuration = (Math.random() * 10 + 10) + 's';
        container.appendChild(element);
    }
}

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('.password-toggle');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Handle form submission with loading state
document.getElementById('loginForm').addEventListener('submit', function (e) {
    const loginBtn = document.getElementById('loginBtn');
    const originalText = loginBtn.innerHTML;

    // Add loading state
    loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing In...';
    loginBtn.disabled = true;

    // Let the form submit naturally to PHP
});

// Add input focus effects
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', function () {
        this.parentElement.classList.add('focused');
    });

    input.addEventListener('blur', function () {
        if (!this.value) {
            this.parentElement.classList.remove('focused');
        }
    });
});

// Initialize floating elements
createFloatingElements();

// Add smooth transitions on page load
window.addEventListener('load', function () {
    document.body.classList.add('loaded');
});

// Auto-hide alerts after 5 seconds
setTimeout(() => {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        alert.style.opacity = '0';
        setTimeout(() => {
            alert.remove();
        }, 300);
    });
}, 5000);
