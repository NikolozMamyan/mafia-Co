<!-- signup.php -->

<?php include_once ('./head.php'); ?>
<body class="d-flex align-items-center justify-content-center bg-light p-5">
<?php //include(VIEWS.'header.php'); ?>

  <div class="row justify-content-center p-5 wrapper">
    <section class="form signup">
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Nom</label>
            <input type="text" name="fname" placeholder="Nom" required>
          </div>
          <div class="field input">
            <label>Prénom</label>
            <input type="text" name="lname" placeholder="Prénom" required>
          </div>
        </div>
        <div class="field input">
          <label>Adresse </label>
          <input type="text" name="adress" placeholder="Adresse" required>
        </div>
        <div class="name-details">
          <div class="field input">
            <label>Code Postal</label>
            <input type="text" name="fname" placeholder="Code Postal" required>
          </div>
          <div class="field input">
            <label>Ville</label>
            <input type="text" name="lname" placeholder="Ville" required>
          </div>
        </div>

        <div class="field input">
          <label>Adresse mail</label>
          <input type="text" name="email" placeholder="Entrez votre Adresse mail" required>
        </div>
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Entrez votre Mot de passe" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Connexion">
        </div>
      </form>
      <div class="link">Déjà inscrit? <a href="login.php">Connectez-vous </a></div>
    </section>
  </div>
 
  
  <!-- environement js index -->
  <?php //include(VIEWS.'footer.php') ;?>
  <!-- <script src='<?php //echo ASSETS ;?>js/pass-show-hide.js'></script> -->
  <!-- <script src='<?php //echo ASSETS ;?>js/login.js'></script> -->
  <!-- environement js dev -->
  <?php //include('./footer.php') ;?>
  <script src="../assets/js/pass-show-hide.js"></script>
  <script src="../assets/js/signup.js"></script>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>