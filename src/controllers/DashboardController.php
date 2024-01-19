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
        $this->render('admin/deleteUserAdmin');
    }
    public function createUserAdmin(): void
    {
        $this->render('admin/createUserAdmin');
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
   public function getTotalPages($itemsPerPage)
   {
       $totalUsers = $this->getTotalUsers(); // Utilisez votre fonction pour obtenir le total des utilisateurs

       return ceil($totalUsers / $itemsPerPage);
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
   public function createUser($nom, $prenom, $adresse, $codePostal, $ville, $telephone, $email, $role) {

    // Insérer le point
    $sqlPoints = "INSERT INTO Points 
                  (nomVille, codePostalVille) 
                  VALUES (:ville, :codePostal)";
                  
    $paramsPoints = [
      ':ville' => $ville,
      ':codePostal' => $codePostal
    ];
    
    $this->db->insert($sqlPoints, $paramsPoints);
  
    // Récupérer l'ID auto-généré
    $pointId = $this->db->lastInsertId();
  
    // Insérer l'utilisateur
    $sqlUser = "INSERT INTO Utilisateurs 
                (nomUtilisateur, prenomUtilisateur, adresseUtilisateur, telUtilisateur, 
                emailUtilisateur, idRole, idPoint)
                VALUES 
                (:nom, :prenom, :adresse, :tel, :email, :role, :point)";
    
    $paramsUser = [
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':adresse' => $adresse,
      ':tel' => $telephone,
      ':email' => $email,
      ':role' => $role,
      ':point' => $pointId
    ];
    
    $this->db->insert($sqlUser, $paramsUser);
    
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
//    public function getTotalUsers() {
//        $query = "SELECT COUNT(*) AS total FROM utilisateurs";
//        $result = $this->db->query($query);
//        return $result->fetch(PDO::FETCH_ASSOC)['total'];
//    }

//    public function getTotalItineraries() {
//        $query = "SELECT COUNT(*) AS total FROM Itineraire";
//        $result = $this->db->query($query);
//        return $result->fetch(PDO::FETCH_ASSOC)['total'];
//     }

    // public function getTotalMessages() {
    //     $query = "SELECT COUNT(*) AS total FROM messages";
    //     $result = $this->db->query($query);
    //     return $result->fetch(PDO::FETCH_ASSOC)['total'];
    // }

}
