<?php
// ChatModel.php
class ChatModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserDetails($user_id) {
        $user_id = mysqli_real_escape_string($this->conn, $user_id);
        $sql = "SELECT * FROM users WHERE unique_id = $user_id";
        $result = mysqli_query($this->conn, $sql);
        return ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : null;
    }

    public function getChatMessages($user_id, $incoming_id) {
        // Logique pour récupérer les messages de chat entre l'utilisateur et l'utilisateur entrant
        // Renvoie les messages sous forme de tableau
    }

    public function insertChatMessage($outgoing_id, $incoming_id, $message) {
        // Logique pour insérer un message de chat dans la base de données
        // Renvoie "success" en cas de réussite, sinon renvoie un message d'erreur
    }
}
?>