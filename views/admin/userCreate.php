<?php

require_once(__DIR__ . '/../../views/headDev.php');
?>
<link rel="stylesheet" type="text/css" href='../assets/css/main.css'>


<body>
<?php

include_once "../../views/header__dashboard.php";
?>
<section class='container-fluid row'>


<?php
include_once "../../views/menu__dashboard.php";
?>
<div class='col-sm-6 ms-3 order-3'>
<form action="traitement.php" method="post" enctype="multipart/form-data" class="registration-form">
    <div class="user__create ">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required class="form-input">
  
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required class="form-input">



        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required class="form-input">



        <label for="codePostal">Code Postal :</label>
        <input type="text" id="codePostal" name="codePostal" required class="small-input">



        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required class="small-input">



        <label for="telephone">Téléphone :</label>
        <input type="tel" id="telephone" name="telephone" required class="form-input">



        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required class="form-input">



    
        <label for="role">Rôle :</label>
<select id="role" name="role" class="form-input">
    <option value="1">Admin</option>
    <option value="2">Conducteur</option>
    <option value="3">Passager</option>
    <option value="4">Conducteur / Passager</option>
</select>





   <label for="photo">Choisir un fichier :</label>
        <input type="file" id="photo" name="photo" accept="image/*" class="form-file-input">
        <button type="submit" class="form-submit-button">Soumettre</button>
    
    </div>

   
</form>
</div>

</section>
</body>
</html>
