<?php
namespace App\Controllers;
use DB;
$userEdit = new DashboardController;

$user = $userEdit->editUserDashboard();


?>

<?php require_once base_path('views/components/headDev.php'); ?>
<body>
    <?php require_once base_path('views/components/header__dashboard.php'); ?>
    <section class='container-fluid row'>
        
        <div class='d-flex justify-content-center mt-5 col-sm-9 order-2 order-sm-1 gap-5'>
            <h2 class='mt-5'>Modifier un utilisateur</h2>
        </div>
        
        <?php include_once base_path('views/components/menu__dashboard.php'); ?>
        

 <form method="post" action="" enctype="multipart/form-data" class="registration-form users__table col-sm-6 ms-3 order-3 mt-5">
    <div class="userCreateAdmoin">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="newNom" value="<?php echo $user['nomUtilisateur']; ?>" required class="form-input">

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="newPrenom" value="<?php echo htmlspecialchars($user['prenomUtilisateur']); ?>" required class="form-input">

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="newAdresse" value="<?php echo htmlspecialchars($user['adresseUtilisateur']); ?>" required class="form-input">

        <label for="codePostal">Code Postal :</label>
        <input type="text" id="codePostal" name="newCodePostal" value="<?php echo htmlspecialchars($user['codePostalVille']); ?>" required class="small-input">

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="newVille" value="<?php echo htmlspecialchars($user['nomVille']); ?>" required class="small-input">

        <label for="telephone">Téléphone :</label>
        <input type="tel" id="telephone" name="newTelephone" value="<?php echo htmlspecialchars($user['telUtilisateur']); ?>" required class="form-input">

        <label for="email">Email :</label>
        <input type="email" id="email" name="newEmail" value="<?php echo htmlspecialchars($user['emailUtilisateur']); ?>" required class="form-input">

        <label for="role">Rôle :</label>
        <select id="role" name="newRole" class="form-input">
            <option value="1" <?php echo ($user['idRole'] == 1) ? 'selected' : ''; ?>>Admin</option>
            <option value="2" <?php echo ($user['idRole'] == 2) ? 'selected' : ''; ?>>Conducteur</option>
            <option value="3" <?php echo ($user['idRole'] == 3) ? 'selected' : ''; ?>>Passager</option>
            <option value="4" <?php echo ($user['idRole'] == 4) ? 'selected' : ''; ?>>Conducteur / Passager</option>
        </select>

        <label for="motDePasseUtilisateur">Mot de passe :</label>
        <input type="password" id="motDePasseUtilisateur" name="motDePasseUtilisateur">

        <button type="submit" class="form-submit-button">Enregistrer les modifications</button>
    </div>
</form> 
</section>
</body>
</html>
