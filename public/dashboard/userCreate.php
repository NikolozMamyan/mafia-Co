<?php

require_once(__DIR__ . '/../../views/headDev.php');
?>
<link rel="stylesheet" type="text/css" href='../assets/css/main.css'>


<body>
<!-- <header class="header">
        <img src="../assets/iconsDashboard/LogoCCI.svg" alt="Logo" class="logoHeader">
            <nav class="nav__bar">
                <form action="" class="search__bar">
                    <button class="btn__search">
                        <img class="" type="submit" src="../assets/iconsDashboard/loupe.svg">
                    </button>
                    <input type="text"  class="inp" placeholder="Rechercher un utilisateur">
                </form>
                <div class="user-card">
                    <div class="user-details">
                        <span class="name">John Doe </span>
                        <br>
                        <span >Amin</span>
                    </div>
                    <div class="avatar">
                        <img src="../assets/iconsDashboard/Profile Icon.png" alt="Avatar">
                    </div>
                    </div>
            </nav>
    </header>
    <main>
    <div class="sidebar">
        <img src="../assets/iconsDashboard/LogoCCI.svg" alt="Logo" class="logo">
        <ul class="menu">
            <li><a href="index.php"> <img src="../assets/iconsDashboard/Dashboard.svg" alt="Home"><span> Dashboard</span></a></li>
            <li><a href="utilisateurs.php"> <img src="../assets/iconsDashboard/people.svg" alt="Utilisateurs"> <span> Utilisateurs</span></a></li>
            <li><a href="#"> <img src="../assets/iconsDashboard/folder-open.svg" alt="Trajets"> <span> Trajets</span></a></li>
            <li><a href="#"> <img src="../assets/iconsDashboard/message.svg" alt="Message"> <span> Messages</span></a></li>
            <li><a href="#"> <img src="../assets/iconsDashboard/setting-2.svg" alt="Parametres"> <span> Parametres</span></a></li>
        </ul>
        <li class="deconnexion" ><a href="#"> <img  src="../assets/iconsDashboard/logout.svg" alt="Deconnexion"> <span> Deconnexion</span></a></li>
    </div>
</main>
<section  class='container mt-5'>
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


</section>
</body>
</html> -->
