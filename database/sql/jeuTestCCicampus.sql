-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET NAMES utf8 */
;
/*!50503 SET NAMES utf8mb4 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;

-- Listage des données de la table ccicovoiturage.contactes : ~2 rows (environ)

-- Listage des données de la table ccicovoiturage.itineraire : ~0 rows (environ)
INSERT INTO
    `itineraire` (
        `idItineraire`, `adresseDepart`, `adresseArrivee`, `debutCours`, `finCours`, `nbrPlaceDispo`, `infoComplementaire`, `dateCreation`, `derniereModificationTrajet`, `idPointDepart`, `idPointArrivee`
    )
VALUES (
        2, '87 Rte du Polygone', '', '09:00:00', '17:00:00', NULL, 'DuboisAlexandre01@ccicampus.fr', '2024-01-23 10:55:30', '2024-01-23 10:55:30', 3, 1
    ),
    (
        3, '44 Rte de la Fédération', '', '09:00:00', '16:30:00', NULL, 'LefevreCamille02@ccicampus.fr', '2024-01-23 10:57:04', '2024-01-23 10:57:04', 4, 1
    ),
    (
        4, '57 Rue du Maréchal Foch', '', '08:30:00', '16:30:00', NULL, 'MartinJulien03@ccicampus.fr', '2024-01-23 10:59:14', '2024-01-23 10:59:14', 5, 1
    ),
    (
        5, '1 Rue Pasteur', '', '08:00:00', '17:00:00', NULL, 'DupontClara04@ccicampus.fr', '2024-01-23 11:01:50', '2024-01-23 11:01:50', 6, 1
    ),
    (
        6, '2-6 Rue de la Dîme', '', '08:30:00', '17:30:00', NULL, 'LambertVincent05@ccicampus.fr', '2024-01-23 11:03:13', '2024-01-23 11:03:13', 7, 1
    ),
    (
        7, '30 Rue de la Croix', '', '08:00:00', '17:00:00', NULL, 'RenaultManon06@ccicampus.fr', '2024-01-23 11:04:36', '2024-01-23 11:04:36', 8, 1
    ),
    (
        8, '14 Bd de la Victoire', '', '09:00:00', '17:00:00', NULL, 'MoreauThomas07@ccicampus.fr', '2024-01-23 11:06:15', '2024-01-23 11:06:15', 9, 1
    ),
    (
        9, 'Auenheimer Str. 22', '', '08:00:00', '17:00:00', NULL, 'GauthierElodie08@ccicampus.fr', '2024-01-23 11:25:03', '2024-01-23 11:25:03', 11, 1
    ),
    (
        10, '29 Rue des Chasseurs', '', '08:00:00', '17:00:00', NULL, 'PicardHugo09@ccicampus.fr', '2024-01-23 11:26:56', '2024-01-23 11:26:56', 12, 1
    ),
    (
        11, '1 Rue de Berne', '', '09:00:00', '17:00:00', NULL, 'RousseauEmma10@ccicampus.fr', '2024-01-23 11:28:17', '2024-01-23 11:28:17', 13, 1
    ),
    (
        12, '8 Rue Saint-Hubert', '', '09:00:00', '17:00:00', NULL, 'GirardLucas11@ccicampus.fr', '2024-01-23 11:29:31', '2024-01-23 11:29:31', 14, 1
    ),
    (
        13, '12 Rue du Sundgau', '', '09:00:00', '20:00:00', NULL, 'LaurentLea12@ccicampus.fr', '2024-01-23 11:32:01', '2024-01-23 11:32:01', 15, 1
    ),
    (
        14, 'Rue d\'Istanbul', '', '08:00:00', '17:00:00', NULL, 'LerouxAntoine13@ccicampus.fr', '2024-01-23 11:59:00', '2024-01-23 11:59:00', 16, 1
    ),
    (
        15, '14 b Rue du Maréchal Lefebvre', '', '08:30:00', '17:30:00', NULL, 'BernardChloé14@ccicampus.fr', '2024-01-23 12:00:21', '2024-01-23 12:00:21', 17, 1
    ),
    (
        16, '11 Rue Lothaire', '', '09:00:00', '17:00:00', NULL, 'DeschampsMaxime15@ccicampus.fr', '2024-01-23 12:01:58', '2024-01-23 12:01:58', 18, 1
    );

-- Listage des données de la table ccicovoiturage.itinerairejoursemaine : ~0 rows (environ)
INSERT INTO
    `itinerairejoursemaine` (
        `idItineraire`, `idJourSemaine`
    )
VALUES (2, 1),
    (4, 1),
    (7, 1),
    (8, 1),
    (10, 1),
    (11, 1),
    (13, 1),
    (14, 1),
    (15, 1),
    (16, 1),
    (4, 2),
    (6, 2),
    (8, 2),
    (9, 2),
    (10, 2),
    (11, 2),
    (14, 2),
    (16, 2),
    (2, 3),
    (3, 3),
    (4, 3),
    (5, 3),
    (6, 3),
    (7, 3),
    (8, 3),
    (9, 3),
    (10, 3),
    (11, 3),
    (12, 3),
    (13, 3),
    (15, 3),
    (16, 3),
    (3, 4),
    (5, 4),
    (10, 4),
    (12, 4),
    (15, 4),
    (3, 5),
    (5, 5),
    (7, 5),
    (10, 5),
    (11, 5),
    (13, 5),
    (15, 5);
-- Listage des données de la table ccicovoiturage.notifications : ~0 rows (environ)
-- Listage des données de la table ccicovoiturage.points : ~1 rows (environ)
INSERT INTO
    `points` (
        `idPoint`, `nomVille`, `codePostalVille`, `latitude`, `longitude`
    )
VALUES (
        3, 'Strasbourg', '67100', '48.566579', '7.758738'
    ),
    (
        4, 'Strasbourg', '67000', '48.5652266', '7.7400353'
    ),
    (
        5, 'Blaesheim', '67113', '48.5054169', '7.6077665'
    ),
    (
        6, 'Blaesheim', '67113', '48.5039167', '7.6050432'
    ),
    (
        7, 'Entzheim', '67960', '48.5346177', '7.6358832'
    ),
    (
        8, 'Eckbolsheim', '67201', '48.5783572', '7.694133'
    ),
    (
        9, 'strasbourg', '67000', '48.5833463', '7.7612038'
    ),
    (
        10, 'Kehl Allemagne', '77694', '', '87'
    ),
    (
        11, 'Kehl Allemagne', '77694', '48.5727869', '7.8429403606369'
    ),
    (
        12, 'Schiltigheim', '67300', '48.6001945', '7.7465415'
    ),
    (
        13, 'strasbourg', '67000', '48.5779355', '7.7543137'
    ),
    (
        14, 'strasbourg', '67100', '48.5710478', '7.7601848'
    ),
    (
        15, 'strasbourg', '67100', '48.5664002', '7.7544445'
    ),
    (
        16, 'strasbourg', '67000', '48.575908', '7.7691058'
    ),
    (
        17, 'strasbourg', '67100', '48.5584594', '7.7488471'
    ),
    (
        18, 'strasbourg', '67200', '48.5798276', '7.7123615'
    );

-- Listage des données de la table ccicovoiturage.utilisateurs : ~15 rows (environ)
INSERT INTO
    `utilisateurs` (
        `idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `adresseUtilisateur`, `telUtilisateur`, `emailUtilisateur`, `motDePasseUtilisateur`, `photoUtilisateur`, `compteActif`, `dateInscriptionUtilisateur`, `derniereModificationUtilisateur`, `idItineraire`, `idRole`, `idPoint`
    )
VALUES (
        2, 'Alexandre', 'Dubois', '87 Rte du Polygone', '0632457890', 'DuboisAlexandre01@ccicampus.fr', '$2y$10$ypuXiZ/XEMMJJHwNAIBOOuw5.1yfDz1eueoNDz/JuL/qbBMJUGTKu', '', 1, '2024-01-23 10:55:30', '2024-01-23 10:55:30', 2, 4, 3
    ),
    (
        3, 'Camille', 'Lefevre', '44 Rte de la Fédération', '0731987654', 'LefevreCamille02@ccicampus.fr', '$2y$10$mPMBNXtRt2ql7IWwvWuNe.iCOsw/Xc1gjQIbiluWIqzIbaePboLay', '', 1, '2024-01-23 10:57:04', '2024-01-23 10:57:04', 3, 2, 4
    ),
    (
        4, 'Julien', 'Martin', '57 Rue du Maréchal Foch', '0609348712', 'MartinJulien03@ccicampus.fr', '$2y$10$G/JnAZCB70nFWfXs/LXeIOE4jCeLIjhazj6joFehKviAwygyzarW6', '', 1, '2024-01-23 10:59:14', '2024-01-23 10:59:14', 4, 3, 5
    ),
    (
        5, 'Clara', 'Dupont', '1 Rue Pasteur', '0734567891', 'DupontClara04@ccicampus.fr', '$2y$10$VaRDKMRdnJV1ypPMFCZt3Ocn6mW4oHEx66q40k1YlXANNDBTM4KF.', '', 1, '2024-01-23 11:01:50', '2024-01-23 11:01:50', 5, 4, 6
    ),
    (
        6, 'Vincent', 'Lambert', '2-6 Rue de la Dîme', '0712345678', 'LambertVincent05@ccicampus.fr', '$2y$10$7SjJ0Qsoe.Dz5iPUwufAp.umkHGqNWNlXfvCL0FHroUUEzIDD5GVG', '', 1, '2024-01-23 11:03:13', '2024-01-23 11:03:13', 6, 4, 7
    ),
    (
        7, 'Manon', 'Renault', '30 Rue de la Croix', '0388987456', 'RenaultManon06@ccicampus.fr', '$2y$10$EtYx9YSxGfGEv1UNAWAQ6OUmOQzOiTlXO0mCSTHrZbDSU3NoIK4QC', '', 1, '2024-01-23 11:04:36', '2024-01-23 11:04:36', 7, 2, 8
    ),
    (
        8, 'Thomas', 'Moreau', '14 Bd de la Victoire', '0645678901', 'MoreauThomas07@ccicampus.fr', '$2y$10$OaOxU4BT/h2irbK0JvKy6uGLcTt2jxp.ZLQuZ/URb/zicPIU67IUS', '', 1, '2024-01-23 11:06:15', '2024-01-23 11:06:15', 8, 3, 9
    ),
    (
        9, 'Elodie', 'Gauthier', 'Auenheimer Str. 22', '0789012345', 'GauthierElodie08@ccicampus.fr', '$2y$10$/JpCkOO9fxHmpLGGw7FV7.xjgrVqgfJ4FoGN22liqtiE0R2I15tB.', '', 1, '2024-01-23 11:25:03', '2024-01-23 11:25:03', 9, 3, 11
    ),
    (
        10, 'Hugo', 'Picard', '29 Rue des Chasseurs', '0701234567', 'PicardHugo09@ccicampus.fr', '$2y$10$p0TWfDyd85YnQdVIByX.VeZXr8DX66Y2CDhyExoR1qA9hbwZFbTrW', '', 1, '2024-01-23 11:26:56', '2024-01-23 11:26:56', 10, 3, 12
    ),
    (
        11, 'Emma', 'Rousseau', '1 Rue de Berne', '0388987142', 'RousseauEmma10@ccicampus.fr', '$2y$10$M9vPyQuzDJr7rbwnOetFl.Uz2mFjcvtynUCxoHOUt0FOocZxNT6WW', '', 1, '2024-01-23 11:28:17', '2024-01-23 11:28:17', 11, 4, 13
    ),
    (
        12, 'Lucas', 'Girard', '8 Rue Saint-Hubert', '0765432109', 'GirardLucas11@ccicampus.fr', '$2y$10$Otl6Mp9Ziy4gxP9ERihrWuEve3pb4QPirutT62YUznjTmmtVL3Nby', '', 1, '2024-01-23 11:29:31', '2024-01-23 11:29:31', 12, 4, 14
    ),
    (
        13, 'Léa', 'Laurent', '12 Rue du Sundgau', '0388876541', ' LaurentLéa12@ccicampus.fr', '$2y$10$Yjw9bRUGmVYIBh/.Xzzi2OSAMrkI8KE4sO3.4WoT6lZOgSTmssVSO', '', 1, '2024-01-23 11:32:01', '2024-01-23 11:32:01', 13, 4, 15
    ),
    (
        14, 'Antoine', 'Leroux', 'Rue d\'Istanbul', '0698765432', 'LerouxAntoine13@ccicampus.fr', '$2y$10$au32lxMiqvajQdyzk9A.ReEqIAtz5qtkAtvfjL9afCZvfxllK5f7e', '', 1, '2024-01-23 11:59:00', '2024-01-23 11:59:00', 14, 4, 16
    ),
    (
        15, 'Chloé', 'Bernard', '14 b Rue du Maréchal Lefebvre', '0754321098', 'BernardChloé14@ccicampus.fr', '$2y$10$kszJnsn5UE63m.8d8mhEEOjzqbjxIUEIde.nJVAllFpf5Ivw8P0.C', '', 1, '2024-01-23 12:00:21', '2024-01-23 12:00:21', 15, 2, 17
    ),
    (
        16, 'Maxime', 'Deschamps', '11 Rue Lothaire', '0388456129', 'DeschampsMaxime15@ccicampus.fr', '$2y$10$fX56Azx4vJQNHB8.0si0hOPzxGnwq0V.VZ8Vru2BZYX72AQNG1X0y', '', 1, '2024-01-23 12:01:58', '2024-01-23 12:01:58', 16, 3, 18
    );

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */
;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */
;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */
;