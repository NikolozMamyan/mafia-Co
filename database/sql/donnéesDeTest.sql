SET
    AUTOCOMMIT = 0;

SET
    FOREIGN_KEY_CHECKS = 0;

START TRANSACTION;

USE cciCovoiturage;

-- Insérer des points
INSERT INTO
    `Points` (nomVille, codePostalVille, latitude, longitude)
VALUES
    ('Ville A', '12345', '12.345', '67.890'),
    ('Ville B', '67890', '23.456', '78.901'),
    ('Ville C', '34567', '34.567', '89.012');

-- Insérer des itinéraires
INSERT INTO
    `Itineraire` (
        adresseDepart,
        adresseArrivee,
        debutCours,
        finCours,
        nbrPlaceDispo,
        infoComplementaire,
        idPointDepart,
        idPointArrivee
    )
VALUES
    (
        'Adresse Depart 1',
        'Adresse Arrivee 1',
        '08:00:00',
        '17:00:00',
        3,
        'Info Trajet 1',
        1,
        2
    ),
    (
        'Adresse Depart 2',
        'Adresse Arrivee 2',
        '09:00:00',
        '18:00:00',
        2,
        'Info Trajet 2',
        2,
        3
    );

-- Insérer des utilisateurs
INSERT INTO
    `Utilisateurs` (
        nomUtilisateur,
        prenomUtilisateur,
        adresseUtilisateur,
        telUtilisateur,
        emailUtilisateur,
        motDePasseUtilisateur,
        photoUtilisateur,
        compteActif,
        idItineraire,
        idRole,
        idPoint
    )
VALUES
    (
        'Dupont',
        'Jean',
        'Rue Schott',
        '1234567890',
        'Jean.Dupont@ccicampus.fr',
        '$2y$10$Ml1x9v1uATkJHlI5BgLeW./J/Fc/RbQw1dZ27lEzsCDT4uMdppaDO',
        'admin.jpg',
        true,
        null,
        1,
        1
    ),
    (
        'Mont',
        'Saint-Michel',
        'Rue des fermes',
        '9876543210',
        'Mont.Saint-Michel@ccicampus.fr',
        '$2y$10$QACggixEqEP7NBI39DTe2.BagXIXIAaMQfuGkZgJWtXZkfMSp9xAe',
        'conducteur1.jpg',
        true,
        1,
        2,
        2
    ),
    (
        'Durand',
        'Louis',
        'Avenue du General de Gaulle',
        '6543210987',
        'Durand.Louis@ccicampus.fr',
        '$2y$10$T/HVBFn1d.G.0KoEbIeX0Oc8FmXtxZ1j.QLBrvo9QaRZMlIfe1BCu',
        'passager1.jpg',
        true,
        2,
        3,
        3
    );

-- Associer des itinéraires à des jours de la semaine
INSERT INTO
    `ItineraireJourSemaine` (idItineraire, idJourSemaine)
VALUES
    (1, 1),
    (1, 2),
    (2, 3),
    (2, 4);

-- Insérer des messages
INSERT INTO
    `Messages` (
        contenuMessage,
        idUtilisateur,
        idUtilisateurDestinataire
    )
VALUES
    ('Message de l''utilisateur 1', 1, 2),
    ('Réponse du conducteur 1', 2, 1);

-- Insérer des contacts
INSERT INTO
    `Contactes` (idUtilisateur, idContacte)
VALUES
    (1, 2),
    (2, 3);

-- Insérer des notifications
INSERT INTO
    `Notifications` (
        idUtilisateur,
        idUtilisateurNotif,
        isReadNotification
    )
VALUES
    (1, 2, false),
    (2, 3, true);

COMMIT;

SET
    AUTOCOMMIT = 1;

SET
    FOREIGN_KEY_CHECKS = 1;