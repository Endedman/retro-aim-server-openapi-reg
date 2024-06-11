<?php
class AdminSession {
    private $adminUsername = 'admin';
    private $adminPassword = 'adminpassword';

    public function startSession() {
        session_start();
    }

    public function login($username, $password) {
        if ($username === $this->adminUsername && $password === $this->adminPassword) {
            $_SESSION['admin'] = true;
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function isAuthenticated() {
        return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
    }
}
?>
