<?php

class DashboardModel {
    private $db;

    public function __construct($dsn, $username, $password) {
        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function getUsers($currentPage, $itemsPerPage) {
        $offset = ($currentPage - 1) * $itemsPerPage;
    
        $sql = "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, idRole, idPoint FROM utilisateurs LIMIT :offset, :itemsPerPage";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getVilleByPointId($idPoint) {
        $sqlVille = "SELECT nomVille FROM Points WHERE idPoint = :idPoint";
        $stmtVille = $this->db->prepare($sqlVille);
        $stmtVille->bindParam(':idPoint', $idPoint);
        $stmtVille->execute();
        $resultVille = $stmtVille->fetch(PDO::FETCH_ASSOC);

        return $resultVille;
    }
    public function getUsersByPage($currentPage, $itemsPerPage) {
        $offset = ($currentPage - 1) * $itemsPerPage;

        $sql = "SELECT idUtilisateur, nomUtilisateur, prenomUtilisateur, idRole, idPoint FROM utilisateurs LIMIT $offset, $itemsPerPage";
        $result = $this->db->query($sql);

        return $result;
    }
    public function getTotalPages($itemsPerPage) {
        $sql = "SELECT COUNT(*) as total FROM utilisateurs";
        $result = $this->db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalPages = ceil($row['total'] / $itemsPerPage);

        return $totalPages;
    }
    public function getRoleById($idRole) {
        $sqlRole = "SELECT labelRole FROM Roles WHERE idRole = :idRole";
        $stmtRole = $this->db->prepare($sqlRole);
        $stmtRole->bindParam(':idRole', $idRole);
        $stmtRole->execute();
        $resultRole = $stmtRole->fetch(PDO::FETCH_ASSOC);

        return $resultRole;
    }
    public function getUserById($idUtilisateur) {
        $sql = "SELECT * FROM utilisateurs WHERE idUtilisateur = :idUtilisateur";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':idUtilisateur', $idUtilisateur);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
    public function getTotalUsers() {
        $query = "SELECT COUNT(*) AS total FROM utilisateurs";
        $result = $this->db->query($query);
        return $result->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getTotalItineraries() {
        $query = "SELECT COUNT(*) AS total FROM Itineraire";
        $result = $this->db->query($query);
        return $result->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getTotalMessages() {
        $query = "SELECT COUNT(*) AS total FROM messages";
        $result = $this->db->query($query);
        return $result->fetch(PDO::FETCH_ASSOC)['total'];
    }

}
