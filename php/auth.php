<?php
// php/auth.php

// Start the session if it hasn't been started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define the missing function
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
?>