<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <div class="auth-container">
        <div class="auth-form-section">
            <div class="auth-header">
                <a href="index.html" class="logo">
                    <div class="logo-icon"><i class="ph-fill ph-brain"></i></div>
                    <span>StudyVerse AI</span>
                </a>
                <a href="index.html" class="back-link"><i class="ph ph-arrow-left"></i> Back to home</a>
            </div>

            <div class="auth-form-wrapper">
                <h1>Create an account</h1>
                <!-- Error Message Display -->
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: red;">Registration failed. Please check your details.</p>
                <?php endif; ?>

                <!-- UPDATED ACTION HERE -->
                <form method="POST" action="php/register_process.php" class="auth-form">
                    <div class="form-row">
                        <div class="input-group">
                            <label for="first_name">First name</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Alex" required>
                        </div>
                        <div class="input-group">
                            <label for="last_name">Last name</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Rivera" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="name@university.edu" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>

                    <div class="input-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary submit-btn">Continue <i class="ph ph-arrow-right"></i></button>
                </form>
                <!-- ... rest of your existing HTML remains the same ... -->
            </div>
        </div>
    </div>
</body>
</html>