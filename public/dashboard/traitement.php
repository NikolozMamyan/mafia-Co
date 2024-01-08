<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $codePostal = $_POST["codePostal"];
    $ville = $_POST["ville"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    $dsn = 'mysql:host=localhost;port=3306;dbname=cciCovoiturage';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertion dans la table Points pour obtenir l'ID du point d'abord
        $sqlPoints = "INSERT INTO points (nomVille, codePostalVille) VALUES (:ville, :codePostal)";
        $stmtPoints = $db->prepare($sqlPoints);
        $stmtPoints->bindParam(':ville', $ville);
        $stmtPoints->bindParam(':codePostal', $codePostal);
        $stmtPoints->execute();

        // Récupération de l'ID du point inséré
        $pointId = $db->lastInsertId();

        // Insertion dans la table Utilisateurs avec l'ID du point
        $sql = "INSERT INTO Utilisateurs (nomUtilisateur, prenomUtilisateur, adresseUtilisateur, telUtilisateur, emailUtilisateur, idRole, idPoint)
        VALUES (:nom, :prenom, :adresse, :telephone, :email, :role, :pointId)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':telephone', $telephone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':pointId', $pointId);

        $stmt->execute();

        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $conn = null;
}
?>
