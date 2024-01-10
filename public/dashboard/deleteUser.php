<?php
require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    // Utilisez PDO pour supprimer l'utilisateur en fonction de l'ID
    $sqlDeleteUser = "DELETE FROM Utilisateurs WHERE idUtilisateur = :idUtilisateur";
    $stmtDeleteUser = $db->prepare($sqlDeleteUser);
    $stmtDeleteUser->bindParam(':idUtilisateur', $userId, PDO::PARAM_INT);
    
    try {
        $stmtDeleteUser->execute();
        header("Location: utilisateurs.php");
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
    }
}
?>
