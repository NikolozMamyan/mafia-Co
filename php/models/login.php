<?php

class LoginModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $password) {
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, $password);
        
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = mysqli_query($this->conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            
            if ($user_pass === $enc_pass) {
                $status = "Active now";
                $sql2 = "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}";
                $result2 = mysqli_query($this->conn, $sql2);
                
                if ($result2) {
                    return $row['unique_id'];
                } else {
                    return "Something went wrong. Please try again!";
                }
            } else {
                return "Email or Password is Incorrect!";
            }
        } else {
            return "$email - This email does not exist!";
        }
    }
}

?>