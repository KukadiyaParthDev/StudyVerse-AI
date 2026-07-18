<?php
// 1. Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Load dependencies
require_once 'php/auth.php'; 
require_once 'php/config.php'; 

// 3. Redirect if logged in
if (isLoggedIn()) {
    header("Location: dashboard.php");
    exit;
}

// 4. Handle Login
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Use your DB structure
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StudyVerse AI</title>
    <!-- Use relative paths -->
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
            </div>

            <div class="auth-form-wrapper">
                <h1>Welcome back</h1>
                
                <?php if ($error): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
                <?php endif; ?>

                <form method="POST" action="login.php" class="auth-form">
                    <div class="input-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="alex@example.com" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary submit-btn">Sign in to Workspace <i class="ph ph-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>