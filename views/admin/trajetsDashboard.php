<?php
namespace App\Controllers;

?>

<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <?php require_once base_path('views/components/header__dashboard.php'); ?>
    <section class='container-fluid row'>
        
        <div class='d-flex justify-content-end mt-5 col-sm-9 order-2 order-sm-1 gap-5'>
        <h2 class='mt-5'>Modifier un trajet</h2>
        </div>
        
        <?php include_once base_path('views/components/menu__dashboard.php'); ?>
        <div class='col-sm-6 ms-3 order-3'>
<form action="CreationTrajetsDashboard.php" class="registration-form " method="post">
    <!-- Champs pour le formulaire -->
    <label for="depart">Adresse de départ :</label>
    <input type="text" id="depart" name="depart" required>

    <label for="destination">Adresse d'arrivée :</label>
    <input type="text" id="destination" name="destination" required>

    <label for="debut_cours">Début du cours :</label>
    <input type="time" id="debut_cours" name="debut_cours" required>

    <label for="fin_cours">Fin du cours :</label>
    <input type="time" id="fin_cours" name="fin_cours" required>

    <label for="nbr_places_dispo">Nombre de places disponibles :</label>
    <input type="number" id="nbr_places_dispo" name="nbr_places_dispo" required>

    <label for="info_complementaire">Informations complémentaires :</label>
    <textarea id="info_complementaire" name="info_complementaire"></textarea>

    <!-- Champ caché pour identifier si c'est une création ou une modification -->
    <input type="hidden" name="action" value="creer_modifier">


    <input type="submit" value="Enregistrer">
</form>
</div>
</section>
</body>
</html>
