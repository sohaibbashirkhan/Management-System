<?php
class SessionManager {
    public function __construct() {
        session_start();
    }

    public function destroySession() {
        session_unset();
        session_destroy();
    }

    public function redirectToLoginPage() {
        header("Location: adminlogin.php");
        exit();
    }
}

// Create an instance of SessionManager
$sessionManager = new SessionManager();

// Destroy session
$sessionManager->destroySession();

// Redirect to login page
$sessionManager->redirectToLoginPage();
?>
