START TRANSACTION;

SET AUTOCOMMIT = 0;

DROP DATABASE IF EXISTS cciCovoiturage;

CREATE DATABASE cciCovoiturage DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE cciCovoiturage;

CREATE TABLE JourSemaine (
    idJourSemaine INT AUTO_INCREMENT,
    labelJourSemaine VARCHAR(8),
    labelJourSemaineCourt VARCHAR(3),
    PRIMARY KEY (idJourSemaine)
);

CREATE TABLE Points (
    idPoint INT AUTO_INCREMENT,
    nomVille VARCHAR(50),
    codePostalVille VARCHAR(5),
    latitude VARCHAR(15),
    longitude VARCHAR(15),
    PRIMARY KEY (idPoint)
);

CREATE TABLE Roles (
    idRole INT AUTO_INCREMENT,
    labelRole VARCHAR(21),
    PRIMARY KEY (idRole)
);

CREATE TABLE Itineraire (
    idItineraire INT AUTO_INCREMENT,
    adresseDepart VARCHAR(50),
    adresseArrivee VARCHAR(50),
    debutCours TIME,
    finCours TIME,
    nbrPlaceDispo INT(8),
    infoComplementaire VARCHAR(400),
    dateCreation DATETIME DEFAULT CURRENT_TIMESTAMP,
    derniereModificationTrajet DATETIME DEFAULT CURRENT_TIMESTAMP,
    idPointDepart INT NOT NULL,
    idPointArrivee INT NOT NULL,
    PRIMARY KEY (idItineraire),
    FOREIGN KEY (idPointDepart) REFERENCES Points(idPoint),
    FOREIGN KEY (idPointArrivee) REFERENCES Points(idPoint)
);

CREATE TABLE Utilisateurs (
    idUtilisateur INT AUTO_INCREMENT,
    nomUtilisateur VARCHAR(20),
    prenomUtilisateur VARCHAR(20),
    adresseUtilisateur VARCHAR(50),
    telUtilisateur VARCHAR(10),
    emailUtilisateur VARCHAR(80),
    motDePasseUtilisateur VARCHAR(80),
    photoUtilisateur VARCHAR(50),
    compteActif BOOLEAN NOT NULL DEFAULT false,
    dateInscriptionUtilisateur DATETIME DEFAULT CURRENT_TIMESTAMP,
    derniereModificationUtilisateur DATETIME DEFAULT CURRENT_TIMESTAMP,
    idItineraire INT DEFAULT NULL,
    idRole INT NOT NULL,
    idPoint INT NOT NULL,
    PRIMARY KEY (idUtilisateur),
    FOREIGN KEY (idRole) REFERENCES Roles(idRole),
    FOREIGN KEY (idPoint) REFERENCES Points(idPoint),
    FOREIGN KEY (idItineraire) REFERENCES Itineraire(idItineraire)
);

CREATE TABLE ItineraireJourSemaine (
    idItineraire INT,
    idJourSemaine INT,
    PRIMARY KEY (idItineraire, idJourSemaine),
    FOREIGN KEY (idItineraire) REFERENCES Itineraire(idItineraire),
    FOREIGN KEY (idJourSemaine) REFERENCES JourSemaine(idJourSemaine)
);

CREATE TABLE Messages (
    idMessage INT AUTO_INCREMENT,
    contenuMessage TEXT NOT NULL,
    dateTimeMessage DATETIME DEFAULT CURRENT_TIMESTAMP,
    isReadMessage BOOLEAN NOT NULL DEFAULT false,
    idUtilisateur INT NOT NULL,
    idUtilisateurDestinataire INT NOT NULL,
    PRIMARY KEY (idMessage),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
    FOREIGN KEY (idUtilisateurDestinataire) REFERENCES Utilisateurs(idUtilisateur)
);

CREATE TABLE Contactes (
    idUtilisateur INT,
    idContacte INT,
    PRIMARY KEY (idUtilisateur, idContacte),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
    FOREIGN KEY (idContacte) REFERENCES Utilisateurs(idUtilisateur)
);

CREATE TABLE Notifications (
    idUtilisateur INT,
    idUtilisateurNotif INT,
    dateNotification DATETIME DEFAULT CURRENT_TIMESTAMP,
    isReadNotification BOOLEAN NOT NULL DEFAULT false,
    PRIMARY KEY (idUtilisateur, idUtilisateurNotif),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
    FOREIGN KEY (idUtilisateurNotif) REFERENCES Utilisateurs(idUtilisateur)
);

INSERT INTO
    `Roles` (idRole, labelRole)
VALUES
    (1, 'Admin'),
    (2, 'Conducteur'),
    (3, 'Passager'),
    (4, 'Conducteur / Passager');

INSERT INTO
    `JourSemaine` (
        idJourSemaine,
        labelJourSemaine,
        labelJourSemaineCourt
    )
VALUES
    (1, 'Lundi', 'Lun'),
    (2, 'Mardi', 'Mar'),
    (3, 'Mercredi', 'Mer'),
    (4, 'Jeudi', 'Jeu'),
    (5, 'Vendredi', 'Ven');

-- Création des Utilisateurs
DROP USER IF EXISTS 'ccicovoiturage_user'@'localhost';

CREATE USER 'ccicovoiturage_user'@'localhost' IDENTIFIED BY 'GT9.9%spZ*656Mb';

GRANT
SELECT,
INSERT,
UPDATE,
DELETE ON cciCovoiturage.* TO 'ccicovoiturage_user'@'localhost';

DROP USER IF EXISTS 'ccicovoiturage_sqlbackup'@'localhost';

CREATE USER 'ccicovoiturage_sqlbackup'@'localhost' IDENTIFIED BY '_-zFnt/L746QZ{Xi}';

GRANT
SELECT,
LOCK TABLES,
SHOW VIEW ON cciCovoiturage.* TO 'ccicovoiturage_sqlbackup'@'localhost';

COMMIT;

SET AUTOCOMMIT = 1;
