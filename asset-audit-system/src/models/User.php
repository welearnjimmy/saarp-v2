<?php

class User {
    private $id;
    private $username;
    private $password;
    private $email;
    private $role;
    private $created_at;
    private $updated_at;

    public function __construct($username, $password, $email, $role = 'Field Agent') {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->role = $role;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUsername($username) {
        $this->username = $username;
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function setEmail($email) {
        $this->email = $email;
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function setRole($role) {
        $this->role = $role;
        $this->updated_at = date('Y-m-d H:i:s');
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    public function updatePassword($newPassword) {
        $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->updated_at = date('Y-m-d H:i:s');
    }
}