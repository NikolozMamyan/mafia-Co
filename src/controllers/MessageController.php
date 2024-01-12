<?php

namespace App\controllers;

use Auth; // Assurez-vous d'avoir inclus ou utilisé correctement la classe Auth dans votre projet
use models\Message;
use models\User;
use models\Contact;

class MessageController
{

    
    public function chatBox(): void
    {
        require_once base_path('views/chatBox/chat.php');
    }
    /**
     * Méthode pour récupérer les derniers messages entre un utilisateur et ses contacts
     *
     * @param int $userId ID de l'utilisateur
     * @return array Liste des derniers messages
     */
    public function getLatestMessages(int $userId): array
    {
        // Utiliser le modèle Message pour récupérer les derniers messages
        $messageModel = new Message();
        return $messageModel->getLatestMessagesForUser($userId);
    }

    /**
     * Méthode pour envoyer un message à un contact
     *
     * @param int $senderId ID de l'expéditeur
     * @param int $recipientId ID du destinataire
     * @param string $content Contenu du message
     * @return bool Succès de l'envoi du message
     */
    public function sendMessage(int $senderId, int $recipientId, string $content): bool
    {
        // Utiliser le modèle Message pour envoyer le message
        $messageModel = new Message($senderId, $recipientId, $content);
        return $messageModel->save();
    }
}
