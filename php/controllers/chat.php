<?php 
// ChatController.php
class ChatController {
    public function chat() {
        session_start();
        include_once "config.php"; // Inclure la configuration de la base de données

        if (!isset($_SESSION['unique_id'])) {
            header("location: login.php");
        }

        $user_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $chatModel = new ChatModel($conn);

        $userDetails = $chatModel->getUserDetails($incoming_id);
        $chatMessages = $chatModel->getChatMessages($user_id, $incoming_id);

        include "views/chat.php"; // Afficher la vue de chat
    }
}
?>