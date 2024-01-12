<?php

namespace App\Controllers;

use App\Models\Contact;

class ContactController
{
    /**
     * Méthode pour ajouter un contact
     *
     * @param int $userId ID de l'utilisateur
     * @param int $contactId ID du contact à ajouter
     * @return bool Succès de l'ajout du contact
     */
    public function addContact(int $userId, int $contactId): bool
    {
        // Utiliser le modèle Contact pour ajouter le contact
        $contactModel = new Contact($userId, $contactId);
        return $contactModel->save();
    }

    /**
     * Méthode pour supprimer un contact
     *
     * @param int $userId ID de l'utilisateur
     * @param int $contactId ID du contact à supprimer
     * @return bool Succès de la suppression du contact
     */
    public function removeContact(int $userId, int $contactId): bool
    {
        // Utiliser le modèle Contact pour supprimer le contact
        $contactModel = new Contact($userId, $contactId);
        return $contactModel->delete();
    }
}
