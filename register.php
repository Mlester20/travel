<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register or Signup <?php include 'includes/title.php'; ?></title>    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .main-container {
            height: 100vh;
            display: flex;
            position: relative;
        }

        .hero-section {
            flex: 1;
            background: linear-gradient(135deg, rgba(0,0,0,0.6), rgba(0,0,0,0.3)),
                        url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2340&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: 60px;
            color: white;
            position: relative;
        }

        .hero-content {
            max-width: 400px;
            z-index: 2;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1.2s ease forwards 0.5s;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.1;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            font-weight: 300;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .cta-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .register-section {
            flex: 0 0 450px;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            box-shadow: -10px 0 30px rgba(0,0,0,0.1);
            position: relative;
        }

        .register-container {
            width: 100%;
            max-width: 350px;
            opacity: 0;
            transform: translateX(50px);
            animation: slideInRight 1s ease forwards 0.8s;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 40px;
        }

        .welcome-text h3 {
            color: #333;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-floating {
            margin-bottom: 20px;
            position: relative;
        }

        .form-floating .form-control {
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            padding: 20px 16px 8px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-floating .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.1);
            background: white;
        }

        .form-floating label {
            color: #999;
            font-size: 0.9rem;
            padding: 16px;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            z-index: 10;
        }

        .register-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 16px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 30px;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }

        .register-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .login-link {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        .form-floating .form-control.is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Join Our Travel Community</h1>
                <p class="hero-subtitle">Share your adventures, discover new destinations, and connect with fellow travelers around the world.</p>
                <a href="#" class="cta-button">Explore Stories</a>
            </div>
        </section>

        <!-- Register Section -->
        <section class="register-section">
            <div class="register-container">
                <div class="welcome-text">
                    <h3>Create Account</h3>
                    <p>Start your journey with us today</p>
                </div>

                <form action="controllers/register.php" method="POST" id="registerForm">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" required>
                        <label for="fullname">Full Name</label>
                        <div class="error-message" id="fullname-error"></div>
                    </div>

                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
                        <label for="email">Email address</label>
                        <div class="error-message" id="email-error"></div>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <i class="password-toggle fas fa-eye"></i>
                        <div class="error-message" id="password-error"></div>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                        <label for="confirm_password">Confirm Password</label>
                        <i class="password-toggle fas fa-eye"></i>
                        <div class="error-message" id="confirm-password-error"></div>
                    </div>

                    <button type="submit" class="register-btn">Create Account</button>

                    <div class="login-link">
                        Already have an account? <a href="index.php">Login here</a>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Toggle password visibility
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const input = this.previousElementSibling;
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });

        // Form validation
        const registerForm = document.getElementById('registerForm');
        registerForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Reset all error messages
            document.querySelectorAll('.error-message').forEach(error => {
                error.style.display = 'none';
            });
            document.querySelectorAll('.form-control').forEach(input => {
                input.classList.remove('is-invalid');
            });

            // Validate full name
            const fullname = document.getElementById('fullname');
            if (fullname.value.trim().length < 3) {
                showError(fullname, 'Full name must be at least 3 characters long');
                isValid = false;
            }

            // Validate email
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                showError(email, 'Please enter a valid email address');
                isValid = false;
            }

            // Validate username
            const username = document.getElementById('username');
            if (username.value.trim().length < 3) {
                showError(username, 'Username must be at least 3 characters long');
                isValid = false;
            }

            // Validate password
            const password = document.getElementById('password');
            if (password.value.length < 6) {
                showError(password, 'Password must be at least 6 characters long');
                isValid = false;
            }

            // Validate confirm password
            const confirmPassword = document.getElementById('confirm_password');
            if (confirmPassword.value !== password.value) {
                showError(confirmPassword, 'Passwords do not match');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        function showError(input, message) {
            input.classList.add('is-invalid');
            const errorDiv = document.getElementById(input.id + '-error');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }
    </script>
</body>
</html>
