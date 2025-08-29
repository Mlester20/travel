<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Signup <?php include 'includes/title.php'; ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="main-container">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="floating-elements" id="floatingElements"></div>
            
            <div class="hero-content">
                <h1 class="hero-title">Find your next<br>adventure.</h1>
                <p class="hero-subtitle">Discover breathtaking destinations and create unforgettable memories.</p>
                <a href="signup.php" class="cta-button">
                    <i class="fas fa-user-plus me-2"></i>
                    Create Account
                </a>
            </div>
        </div>

        <!-- Login Section -->
        <div class="login-section">
            <div class="login-container">
                <div class="welcome-text">
                    <h3>Hi, good to have<br>you back.</h3>
                    <p>Welcome back! Please sign in to your account</p>
                </div>

                <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
                <?php endif; ?>

                <form id="loginForm" action="controllers/auth.php" method="POST">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Email address</label>
                    </div>
                    
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <i class="fas fa-eye password-toggle" onclick="togglePassword()"></i>
                    </div>

                    <div class="forgot-password">
                        <a href="forgot-password.php">Forgot your password?</a>
                    </div>

                    <button type="submit" class="login-btn" id="loginBtn">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Sign In
                    </button>
                </form>

                <div class="divider">
                    <span>Or</span>
                </div>

                <div class="social-login">
                    <a href="auth/google_login.php" class="social-btn">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="auth/facebook_login.php" class="social-btn">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>

                <div class="signup-link">
                    Don't have an account? <a href="register.php">Sign up here</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>