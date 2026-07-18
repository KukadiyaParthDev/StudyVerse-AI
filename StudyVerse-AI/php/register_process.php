<?php
// php/register_process.php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 1. Basic validation
    if ($password !== $confirm_password) {
        header("Location: ../register.php?error=password_mismatch");
        exit();
    }

    // 2. Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // 3. Insert user
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $hashed_password]);
        
        // 4. Success - redirect to login
        header("Location: ../login.php?registered=1");
        exit();
    } catch (PDOException $e) {
        // Handle database errors (e.g., email already exists)
        header("Location: ../register.php?error=db_error");
        exit();
    }
}
?>