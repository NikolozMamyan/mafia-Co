<?php
// Connexion à la base de données (à adapter avec tes paramètres)
$dsn = 'mysql:host=localhost;port=3306;dbname=cciCovoiturage';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les données du formulaire
        $adresseDepart = $_POST["depart"];
        $adresseArrivee = $_POST["destination"];
        $debutCours = $_POST["debut_cours"];
        $finCours = $_POST["fin_cours"];
        $nbrPlaceDispo = $_POST["nbr_places_dispo"];
        $infoComplementaire = $_POST["info_complementaire"];

        // Vérifie si c'est une création ou une modification
        $action = $_POST["action"];

        if ($action == "creer_modifier") {
            // Insère ou met à jour les données dans la base de données
            $requete = $db->prepare("INSERT INTO Itineraire (adresseDepart, adresseArrivee, debutCours, finCours, nbrPlaceDispo, infoComplementaire) VALUES (:adresseDepart, :adresseArrivee, :debutCours, :finCours, :nbrPlaceDispo, :infoComplementaire)");
            
            // Exécute la requête
            $requete->execute(array(
                ':adresseDepart' => $adresseDepart,
                ':adresseArrivee' => $adresseArrivee,
                ':debutCours' => $debutCours,
                ':finCours' => $finCours,
                ':nbrPlaceDispo' => $nbrPlaceDispo,
                ':infoComplementaire' => $infoComplementaire
            ));

            // Redirige vers la page d'accueil ou une autre page après le traitement
            header("Location: index.php");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>