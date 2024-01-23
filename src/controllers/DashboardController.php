<?php

namespace App\Controllers;

use DB;



class DashboardController extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new DB(); // Créez une instance de la classe DB
    }


    public function index(): void
    {
        $this->render('admin/index');
    }
    public function utilisateurs(): void
    {
        $this->render('admin/utilisateurs');
    }

    public function deleteUserR(): void
    {
        $this->render('admin/fromTraitement/deleteUserAdmin');
    }
    public function createUserAdmin(): void
    {
        $this->render('admin/createUserAdmin');
    }

    public function editUserAdmin(): void
    {
        $this->render('admin/editUserAdmin');
    }
    public function   userCreateTraitment(): void
    {
        $this->render('admin/fromTraitement/userCreateTraitment');
    }
  

    public function getTotalUsers() {
        $query = "SELECT COUNT(*) AS total FROM utilisateurs";
        $result = $this->db->fetchAll($query);
        
        // Vérifiez si la requête a réussi et si le résultat est non vide
        if ($result !== false && !empty($result)) {
            return $result[0]['total'];
        } else {
            return 0; // Ou une autre valeur par défaut en cas d'erreur
        }
    }

   public function getUsers($tableName = 'utilisateurs')
    {
    
    
      $sql = "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, idRole, idPoint FROM $tableName ";
    
        return $this->db->fetchAll($sql);
    }
    
    public function editUserDashboard() 
    {
        // Récupération des données de l'utilisateur si un ID est fourni
        $user = null; // Déclaration de $user en dehors de la condition
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $userId = $_GET['id'];
    
            // Requête pour récupérer les données de l'utilisateur
            $sql = "SELECT U.*, P.nomVille, P.codePostalVille 
                    FROM utilisateurs U
                    JOIN Points P ON U.idPoint = P.idPoint
                    WHERE U.idUtilisateur = :id";
    
            $stmt = DB::getDB()->prepare($sql);
            $stmt->bindParam(':id', $userId);
    
            try {
                $stmt->execute();
                $user = $stmt->fetch();
                
                
            } catch (Exception $e) {
                echo "Erreur de récupération des données : " . $e->getMessage();
            }
        }
    
        // Traitement du formulaire de modification
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // les nouvelles informations de l'utilisateur depuis le formulaire
            $newNom = $_POST['newNom'];
            $newPrenom = $_POST['newPrenom'];
            $newAdresse = $_POST['newAdresse'];
            $newCodePostal = $_POST['newCodePostal'];
            $newVille = $_POST['newVille'];
            $newTelephone = $_POST['newTelephone'];
            $newEmail = $_POST['newEmail'];
            $newRole = $_POST['newRole'];
    
            // Mettre à jour la table Points pour refléter les modifications de code postal et de ville
            $sqlUpdatePoints = "UPDATE Points SET nomVille = :ville, codePostalVille = :codePostal WHERE idPoint = :idPoint";
            $stmtUpdatePoints = DB::getDB()->prepare($sqlUpdatePoints);
            $stmtUpdatePoints->bindParam(':idPoint', $user['idPoint']);
            $stmtUpdatePoints->bindParam(':ville', $newVille);
            $stmtUpdatePoints->bindParam(':codePostal', $newCodePostal);
    
            // Mettre à jour les informations de l'utilisateur dans la table Utilisateurs
            $sqlUpdateUtilisateur = "UPDATE utilisateurs SET 
                nomUtilisateur = :nom, 
                prenomUtilisateur = :prenom, 
                adresseUtilisateur = :adresse, 
                telUtilisateur = :telephone, 
                emailUtilisateur = :email, 
                idRole = :role
                WHERE idUtilisateur = :id";
    
            $stmtUpdateUtilisateur = DB::getDB()->prepare($sqlUpdateUtilisateur);
            $stmtUpdateUtilisateur->bindParam(':id', $userId);
            $stmtUpdateUtilisateur->bindParam(':nom', $newNom);
            $stmtUpdateUtilisateur->bindParam(':prenom', $newPrenom);
            $stmtUpdateUtilisateur->bindParam(':adresse', $newAdresse);
            $stmtUpdateUtilisateur->bindParam(':telephone', $newTelephone);
            $stmtUpdateUtilisateur->bindParam(':email', $newEmail);
            $stmtUpdateUtilisateur->bindParam(':role', $newRole);
    
            try {
                // la mise à jour de la table Points
                $stmtUpdatePoints->execute();
    
                // la mise à jour de la table Utilisateurs
                $stmtUpdateUtilisateur->execute();
    
                // Redirection vers utilisateurs.php après la mise à jour
                header("Location: adminUtilisateurs");
                exit();
            } catch (Exception $e) {
                echo "Erreur de mise à jour : " . $e->getMessage();
            }
        }
    
        // Retourne les données de l'utilisateur pour les afficher dans le formulaire
        return $user;
    }
    

    

    public function getVilleByPointId($idPoint) {
   
        $sql = "SELECT nomVille FROM Points WHERE idPoint = :idPoint";
        $params = [':idPoint' => $idPoint];  
        $result = $this->db->fetchAll($sql, $params);

        if($result === false) {
          throw new Exception('Requête echouée');
        }
      
        // Renvoyer première ligne  
        return $result[0];
      
      }
    
    
   public function getUsersByPage($currentPage, $itemsPerPage) {
       $offset = ($currentPage - 1) * $itemsPerPage;

       $sql = "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, idRole, idPoint FROM utilisateurs LIMIT $offset, $itemsPerPage";
       $result = $this->db->query($sql);

       return $result;
   }

   public function getRoleById($idRole) {
    $sql = "SELECT labelRole FROM Roles WHERE idRole = :idRole"; 
    $params = [':idRole' => $idRole];
    $result = $this->db->fetchAll($sql, $params);
    if($result === false) {
      throw new Exception('Requête echouée');
    }
  
    // Renvoyer première ligne résultat
    return $result[0]; 
  }
 public function getComments($userId) {
    // 1. Récupérer l'idItinéraire de l'utilisateur
    $sqlUserId = "SELECT idItineraire  
                  FROM Utilisateurs
                  WHERE idUtilisateur = :userId";

    $resultUserId = $this->db->fetchAll($sqlUserId, [':userId' => $userId]);

    // Vérifier si des résultats ont été trouvés
    if (empty($resultUserId)) {
        return []; // Ou une autre valeur par défaut selon le contexte
    }

    $itineraryId = $resultUserId[0]['idItineraire'];

    // 2. Récupérer le commentaire avec cet idItinéraire
    $sqlItinerary = "SELECT infoComplementaire AS comment
                     FROM Itineraire
                     WHERE idItineraire = :itineraryId";

    $resultItinerary = $this->db->fetchAll($sqlItinerary, [':itineraryId' => $itineraryId]);

    return $resultItinerary;
}

   public function getUserById($idUtilisateur) {
       $sql = "SELECT * FROM utilisateurs WHERE idUtilisateur = :idUtilisateur";
       $stmt = $this->db->prepare($sql);
       $stmt->bindParam(':idUtilisateur', $idUtilisateur);
       $stmt->execute();
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       return $user;
   }
   public function createUser($nom, $prenom, $adresse, $codePostal, $ville, $telephone, $email, $motDePasseUtilisateur, $role) {
    

    // Insertion dans la table Points pour obtenir l'ID du point d'abord
$result = DB::insert('points', [
    'nomVille' => $ville,
    'codePostalVille' => $codePostal
]);

if(!$result) {
    throw new Exception('Erreur insertion points');
}

// Récupération de l'ID du point inséré
$pointId = DB::getDB()->lastInsertId();

// Insertion dans la table Utilisateurs avec l'ID du point
$result = DB::insert('Utilisateurs', [
    'nomUtilisateur' => $nom,
    'prenomUtilisateur' => $prenom, 
    'adresseUtilisateur' => $adresse,
    'telUtilisateur' => $telephone,
    'emailUtilisateur' => $email,
    'idRole' => $role,
    'idPoint' => $pointId,
    'motDePasseUtilisateur' => $motDePasseUtilisateur
]);

if(!$result) {
    throw new Exception('Erreur insertion utilisateurs'); 
}

  }

   public function deleteUser($userId) {
    
    // Requête SQL
    $sql = "DELETE FROM Utilisateurs 
            WHERE idUtilisateur = :userId";

    $params = [
        ':userId' => $userId
    ];

    // Exécution
    $result = $this->db->fetchAll($sql, $params);

    // Vérification
    if($result === false) {
        throw new Exception("Erreur lors de la suppression de l'utilisateur"); 
    }

}

}
