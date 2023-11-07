<?php
  class SignupModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($fname, $lname, $email, $password, $image) {
        $fname = mysqli_real_escape_string($this->conn, $fname);
        $lname = mysqli_real_escape_string($this->conn, $lname);
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, $password);

        if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
            return "All input fields are required!";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "$email is not a valid email!";
        }

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return "$email - This email already exists!";
        } else {
            $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if (!in_array($img_ext, $extensions)) {
                return "Please upload an image file - jpeg, png, jpg";
            }

            $types = ["image/jpeg", "image/jpg", "image/png"];
            if (!in_array($img_type, $types)) {
                return "Please upload an image file - jpeg, png, jpg";
            }

            $time = time();
            $new_img_name = $time . $img_name;

            if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                $ran_id = rand(time(), 100000000);
                $status = "Active now";
                $encrypt_pass = md5($password);

                $insert_query = "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                VALUES ($ran_id, '$fname', '$lname', '$email', '$encrypt_pass', '$new_img_name', '$status')";

                $result2 = mysqli_query($this->conn, $insert_query);

                if ($result2) {
                    $select_sql2 = "SELECT * FROM users WHERE email = '$email'";
                    $result3 = mysqli_query($this->conn, $select_sql2);

                    if ($result3 && mysqli_num_rows($result3) > 0) {
                        $row = mysqli_fetch_assoc($result3);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        return "success";
                    } else {
                        return "This email address does not exist!";
                    }
                } else {
                    return "Something went wrong. Please try again!";
                }
            } else {
                return "Image upload failed. Please try again!";
            }
        }
    }
}
?>