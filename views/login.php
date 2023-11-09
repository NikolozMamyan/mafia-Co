<?php 
include('./headDev.php');
?>

<body class="d-flex align-items-center justify-content-center bg-light p-5">
  <div class="row justify-content-center p-5 wrapper bg__section--co">
    <section class="col-md-5 d-flex align-items-center">
      <p class="resum">Rejoignez notre communauté de covoitureurs en vous connectant ou en vous inscrivant.</p>
    </section>
    <section class="col-md-7 form login">
      <form class="" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="">
          <a href="#">Mot de passe oublié</a>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Connexion" class=" ">
        </div>
      </form>
      <div class="">
        <p>Pas encore inscrit ? <a href="signup.php">S'inscrire maintenant</a></p>
      </div>
    </section>
  </div>
  <?php 
include('./footer.php');
?>

  <!-- environnement js index -->
  <?php //include(VIEWS.'footer.php') ;?>
  <!-- <script src='<?php //echo ASSETS ;?>js/pass-show-hide.js'></script> -->
  <!-- <script src='<?php //echo ASSETS ;?>js/login.js'></script> -->
  <!-- environement js dev -->
  <?php //include('./footer.php') ;?>
  <script src="../assets/js/pass-show-hide.js"></script>
  <script src="../assets/js/signup.js"></script>

  <!-- Bootstrap JS (already included in your code) -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>