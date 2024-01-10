SET AUTOCOMMIT = 0;

START TRANSACTION;

DROP DATABASE IF EXISTS cciCovoiturage;

CREATE DATABASE cciCovoiturage DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE cciCovoiturage;

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
    jourSemaine INT(8),
    debutCours TIME,
    finCours TIME,
    nbrPlaceDispo INT(8),
    infoComplementaire VARCHAR(400),
    dateCreation DATETIME DEFAULT NOW(),
    derniereModificationTrajet DATETIME DEFAULT NOW(),
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
    dateInscriptionUtilisateur DATE DEFAULT NOW(),
    derniereModificationUtilisateur DATETIME DEFAULT NOW(),
    idRole INT NOT NULL,
    idPoint INT NOT NULL,
    PRIMARY KEY (idUtilisateur),
    FOREIGN KEY (idRole) REFERENCES Roles(idRole),
    FOREIGN KEY (idPoint) REFERENCES Points(idPoint)
);

CREATE TABLE Messages (
    idMessage INT AUTO_INCREMENT,
    contenuMessage TEXT NOT NULL,
    dateTimeMessage DATETIME DEFAULT NOW(),
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

CREATE TABLE CreationItineraire (
    idUtilisateur INT,
    idItineraire INT,
    PRIMARY KEY (idUtilisateur, idItineraire),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
    FOREIGN KEY (idItineraire) REFERENCES Itineraire(idItineraire)
);

CREATE TABLE Notifications (
    idUtilisateur INT,
    idUtilisateurNotif INT,
    dateNotification DATETIME DEFAULT NOW(),
    isReadNotification BOOLEAN NOT NULL DEFAULT false,
    dateReadNotification DATETIME,
    PRIMARY KEY (idUtilisateur, idUtilisateurNotif),
    FOREIGN KEY (idUtilisateur) REFERENCES Utilisateurs(idUtilisateur),
    FOREIGN KEY (idUtilisateurNotif) REFERENCES Utilisateurs(idUtilisateur)
);

CREATE TABLE JourSemaine (
    idJourSemaine INT AUTO_INCREMENT,
    labelJourSemaine VARCHAR(8),
    labelJourSemaineCourt VARCHAR(3),
    PRIMARY KEY (idJourSemaine)
);

INSERT INTO `Roles` (idRole, labelRole)
VALUES
    (1, 'Admin'),
    (2, 'Conducteur'),
    (3, 'Passager'),
    (4, 'Conducteur / Passager');

INSERT INTO `JourSemaine` (idJourSemaine, labelJourSemaine, labelJourSemaineCourt)
VALUES
    (1, 'Lundi', 'Lun'),
    (2, 'Mardi', 'Mar'),
    (3, 'Mercredi', 'Mer'),
    (4, 'Jeudi', 'Jeu'),
    (5, 'Vendredi', 'Ven');

-- Création des Utilisateurs
DROP USER IF EXISTS 'ccicovoiturage_user'@'localhost';

CREATE USER 'ccicovoiturage_user'@'localhost' IDENTIFIED BY 'GT9.9%spZ*656Mb';

GRANT SELECT, INSERT, UPDATE, DELETE ON cciCovoiturage.* TO 'ccicovoiturage_user'@'localhost';

DROP USER IF EXISTS 'ccicovoiturage_sqlbackup'@'localhost';

CREATE USER 'ccicovoiturage_sqlbackup'@'localhost' IDENTIFIED BY '_-zFnt/L746QZ{Xi}';

GRANT SELECT, LOCK TABLES, SHOW VIEW ON cciCovoiturage.* TO 'ccicovoiturage_sqlbackup'@'localhost';

DELIMITER |
CREATE OR REPLACE TRIGGER USERMODIFDATEBEFOREUPDATE BEFORE UPDATE ON Utilisateurs
FOR EACH ROW BEGIN
    SET NEW.derniereModificationUtilisateur = NOW();
END |
CREATE OR REPLACE TRIGGER TRAJETMODIFDATEBEFOREUPDATE BEFORE UPDATE ON Itineraire
FOR EACH ROW BEGIN
    SET NEW.derniereModificationTrajet = NOW();
END |
CREATE OR REPLACE TRIGGER NOTIFICATIONREADDATEBEFOREUPDATE BEFORE UPDATE ON Notifications
FOR EACH ROW BEGIN
    IF NEW.isReadNotification <> OLD.isReadNotification THEN
        SET NEW.dateReadNotification = NOW();
    END IF;
END |
DELIMITER ;

COMMIT;

SET AUTOCOMMIT = 1;
