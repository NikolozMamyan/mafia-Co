<?php

namespace App\Controllers;

$dashboardCtrl = new DashboardController();
var_dump($_GET['id']);

 use DB;

 if(isset($_GET['id'])) {

   $userId = $_GET['id'];
  
    $dashboardCtrl->deleteUser($userId);
  
   header("Location: adminUtilisateurs");
  
  }
?>
