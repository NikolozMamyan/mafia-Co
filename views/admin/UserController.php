<?php

require_once 'DashboardModel.php';

class UserController {
    private $dbModel;

    public function __construct() {
        $this->dbModel = new DashboardModel('mysql:host=localhost;port=3306;dbname=cciCovoiturage', 'root', '');
    }

    public function getUsers($currentPage, $itemsPerPage) {
        return $this->dbModel->getUsers($currentPage, $itemsPerPage);
    }
    public function getDataForDashboard() {
        $totalUsers = $this->dbModel->getTotalUsers();
        $totalItineraries = $this->dbModel->getTotalItineraries();
        $totalMessages = $this->dbModel->getTotalMessages();

        return [
            'totalUsers' => $totalUsers,
            'totalItineraries' => $totalItineraries,
            'totalMessages' => $totalMessages,
        ];
    }

}
