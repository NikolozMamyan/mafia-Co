<?php
class Connexion {
    private $serveur = "localhost"; // Adresse du serveur MySQL
    private $utilisateur = "ccicovoiturage"; // Nom d'utilisateur MySQL
    private $motDePasse = "GT9.9%spZ*656Mb("; // Mot de passe MySQL
    private $baseDeDonnees = "ccicovoiturage"; // Nom de la base de données

    private $connexion;

    // Constructeur de la classe
    public function __construct() {
        try {
            $dsn = "mysql:host={$this->serveur};dbname={$this->baseDeDonnees}";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Utiliser l'encodage UTF-8
            );

            // Créer une instance de la classe PDO
            $this->connexion = new PDO($dsn, $this->utilisateur, $this->motDePasse, $options);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Méthode pour obtenir l'instance de la connexion
    public function getConnexion() {
        return $this->connexion;
    }

    // Méthode pour fermer la connexion
    public function closeConnexion() {
        $this->connexion = null;
    }
}