<!-- login.php -->
<?php  //include(VIEWS.'head.php'); 
        include('./headDev.php');?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>CCI Covoiturage</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"><?php echo isset($errorText) ? $errorText : ''; ?></div>
        <div class="field input">
          <label>Adresse Email</label>
          <input type="text" name="email" placeholder="Entrer votre Email" required>
        </div>
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Tapez votre mot de passe" required>
          <i class="fas fa-eye"></i>
          
        </div>
        <div class="link">
          <a href="">Mot de passe oublié</a>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Connexion">
        </div>
      </form>
      <div class="link">Pas encore inscrit ?<a href="signup.php">S'inscrire maintenant</a></div>
    </section>
  </div>
  
  <script src='<?php echo ASSETS ;?>js/pass-show-hide.js'></script>
  <script src='<?php echo ASSETS ;?>js/login.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>