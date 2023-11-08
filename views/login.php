<!-- login.php -->

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
      <div class="link">Not yet signed up? <a href="signup.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="../assets/js/pass-show-hide.js"></script>
  <script src="../assets/js/login.js"></script>

</body>
