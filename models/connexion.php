<?php

class MaConnexion
{
    private const SERVEUR = "localhost";
    private const UTILISATEUR = "ccicovoiturageuser";
    private const MOT_DE_PASSE = "GT9.9%spZ*656Mb(";
    private const NOM_BASE_DE_DONNEES = "ccicovoiturage";
    private $connexion;

    public function __construct()
    {
        $dsn = "mysql:host=" . self::SERVEUR . ";dbname=" . self::NOM_BASE_DE_DONNEES;

        try {
            $this->connexion = new PDO($dsn, self::UTILISATEUR, self::MOT_DE_PASSE);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion à la base de données réussie.<br>";
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    public function dbConnect() {
        return $this->connexion;
    }

    public function fermerConnexion()
    {
        $this->connexion = null;
        echo "Connexion à la base de données fermée.<br>";
    }
}