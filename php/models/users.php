<?php
// Users.php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserDetails($unique_id) {
        $unique_id = mysqli_real_escape_string($this->conn, $unique_id);
        $sql = "SELECT * FROM users WHERE unique_id = $unique_id";
        $result = mysqli_query($this->conn, $sql);
        return ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : null;
    }

    public function getOtherUsers($outgoing_id) {
        $outgoing_id = mysqli_real_escape_string($this->conn, $outgoing_id);
        $sql = "SELECT * FROM users WHERE NOT unique_id = $outgoing_id ORDER BY user_id DESC";
        $query = mysqli_query($this->conn, $sql);
        $users = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $users[] = $row;
        }

        return $users;
    }
}
?>