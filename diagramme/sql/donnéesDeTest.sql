SET AUTOCOMMIT = 0;

SET FOREIGN_KEY_CHECKS = 0;

START TRANSACTION;

USE cciCovoiturage;

INSERT INTO
    Points (
        idPoint,
        nomVille,
        codePostalVille,
        latitude,
        longitude
    )
VALUES (1, "Eckbolsheim", "67201", "", ""), (2, "Lingolsheim", "67380", "", "");

INSERT INTO
    Utilisateurs (
        idUtilisateur,
        nomUtilisateur,
        prenomUtilisateur,
        adresseUtilisateur,
        telUtilisateur,
        emailUtilisateur,
        motDePasseUtilisateur,
        photoUtilisateur,
        compteActif,
        dateInscriptionUtilisateur,
        idRole,
        idPoint
    )
VALUES (
        1,
        "Dupont",
        "Jean",
        "Rue Schott",
        "0011223344",
        "Jean.Dupont@ccicampus.fr",
        "$2y$10$Ml1x9v1uATkJHlI5BgLeW./J/Fc/RbQw1dZ27lEzsCDT4uMdppaDO",
        "",
        true,
        "2023-12-07 09:31:51",
        3,
        1
    ), (
        2,
        "Mont",
        "Saint-Michel",
        "Rue des fermes",
        "",
        "Mont.Saint-Michel@ccicampus.fr",
        "$2y$10$QACggixEqEP7NBI39DTe2.BagXIXIAaMQfuGkZgJWtXZkfMSp9xAe",
        "",
        true,
        "2023-12-07 09:32:08",
        4,
        1
    ), (
        3,
        "Durand",
        "Louis",
        "Avenue du General de Gaulle",
        "0123456789",
        "Durand.Louis@ccicampus.fr",
        "$2y$10$T/HVBFn1d.G.0KoEbIeX0Oc8FmXtxZ1j.QLBrvo9QaRZMlIfe1BCu",
        "",
        true,
        "2023-12-07 09:31:51",
        4,
        1
    ), (
        4,
        "Lucky",
        "Luke",
        "Rue des Pommes",
        "",
        "L.L@ccicampus.fr",
        "$2y$10$9ANdcat55QynxMxG2.OTX.KS.9TAl7T3vGJZnHiWkPvop0swCR8SS",
        "",
        true,
        "2023-12-07 09:32:08",
        1,
        1
    ), (
        5,
        "Deveux",
        "Anne",
        "Rue de la Liberté",
        "1234567890",
        "Danne@ccicampus.fr",
        "$2y$10$i4sMXVtSBKhdLYqDiggXD.KLNdT9vrwO5PzdVunM/msTGN3SBga8e",
        "",
        true,
        "2023-12-07 09:32:08",
        2,
        2
    ), (
        6,
        "Antoinette",
        "Marie",
        "Rue du souvenir",
        "",
        "Marie-Antoinette-dAutriche@ccicampus.fr",
        "$2y$10$4SUzEux.J4xlh8vPPls9Detvfns1NmHykvYCofCNRwA52Q1VmO.Ju",
        "",
        false,
        "2023-12-07 09:32:08",
        3,
        2
    ), (
        7,
        "Ivlivs Caesar",
        "Caivs",
        "Rue des Dammes",
        "",
        "rome@ccicampus.fr",
        "$2y$10$Eb5.zxVWPy5ZYau5XTYv2.D1LtKM7fH.KOtdlL1i573LSavgRNY0.",
        "",
        true,
        "2023-12-07 09:32:08",
        1,
        2
    ), (
        8,
        "Duhamel",
        "Emma",
        "Rue du chateau",
        "",
        "siu@ccicampus.fr",
        "$2y$10$AIh0KudXnxJ/NX7FnWisZetGhBQua9hlcA26Nhgb0AuOvRq1zuDcW",
        "",
        true,
        null,
        2,
        2
    );

INSERT INTO
    Contactes (idUtilisateur, idContacte)
VALUES (1, 2), (2, 1), (1, 3), (1, 4), (1, 5), (1, 6), (3, 1), (2, 3), (7, 6);

INSERT INTO
    Itineraire (
        idItineraire,
        jourSemaine,
        debutCours,
        finCours,
        nbrPlaceDispo,
        infoComplementaire,
        idPointDepart,
        idPointArrivee
    )
VALUES (
        1,
        1,
        "09:00",
        "17:00",
        3,
        "",
        1,
        1
    ), (
        2,
        1,
        "09:00",
        "17:00",
        3,
        "",
        2,
        2
    );

INSERT INTO
    CreationItineraire (idUtilisateur, idItineraire)
VALUES (1, 1), (5, 2), (8, 2), (2, 1);

INSERT INTO
    Messages (
        idMessage,
        contenuMessage,
        idUtilisateur,
        idUtilisateurDestinataire
    )
VALUES (1, "bonjour", 1, 2), (2, "test", 2, 1), (3, "Lorem", 2, 1), (4, "Ipsum", 2, 1), (5, "John", 1, 3), (6, "DOE", 3, 1);

COMMIT;

SET AUTOCOMMIT = 1;

SET FOREIGN_KEY_CHECKS = 1;