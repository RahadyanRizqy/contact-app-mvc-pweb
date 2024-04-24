<?php

include_once 'config/conn.php';

class User {
    static function login($data=[]) {
        extract($data);
        global $conn;

        $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
        if ($result = $result->fetch_assoc()) {
            $hashedPassword = $result['password'];
            $verify = password_verify($password, $hashedPassword);
            if ($verify) { return $result; }
            else { return false; }
        }
        else { return false; }
    }

    static function register($data=[]) {
        extract($data);
        global $conn;
        
        $inserted_at = date('Y-m-d H:i:s', strtotime('now'));
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users SET name = ?, email = ?, password = ?, inserted_at = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $name, $email, $hashedPassword, $inserted_at);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function getPassword($email) { 
        global $conn;
        $sql = "SELECT password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->affected_rows > 0 ? true : false;
        return $result;
    }

    static function update($data=[]) {}

    static function delete($id='') {}
}