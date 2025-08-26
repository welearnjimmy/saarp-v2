<?php

class AuthController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function signup($username, $password, $role) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare SQL statement
        $stmt = $this->db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $role);
        
        // Execute and check for success
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function signin($username, $password) {
        // Prepare SQL statement
        $stmt = $this->db->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();
            
            // Verify password
            if (password_verify($password, $hashedPassword)) {
                // Start session and set user data
                session_start();
                $_SESSION['username'] = $username;
                return true;
            }
        }
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function verifyUser($userId) {
        // Prepare SQL statement
        $stmt = $this->db->prepare("UPDATE users SET verified = 1 WHERE id = ?");
        $stmt->bind_param("i", $userId);
        
        // Execute and check for success
        return $stmt->execute();
    }
}