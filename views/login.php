<?php //include(VIEWS.'head.php'); 
include('./headDev.php');
?>

<body class="">
  <header class=" ">
<?php //include(VIEWS.'head.php'); 
include('./header.php');
?>
</header>
  <main class="d-flex justify-content-center align-items-center mb-5 desktop-image">
    <div class=" container d-flex justify-content-center align-items-start m-0 p-0  ">

      <div class="row wrapper__s bg__section--login w-md-50 ">

        <section class="col-md-5  align-self-center section__resum ">
          <p class="resum p-lg-5">Rejoignez notre communauté de covoitureurs en vous connectant ou en vous inscrivant.</p>
        </section>

         <section class=" col-md-7 p-lg-3 ">
         <form class="my-5" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">

            <div class="mb-3">
              <label for="" class="form-label ps-3 label__white ">Adresse Mail</label>
              <input type="email" class="form-control rounded-pill" id="" aria-describedby="" placeholder="Entrez votre adresse mail" required>
            </div>

            <div class="input-group mb-3 ">
              <label for="password" class="form-label ps-3 label__white">Mot de passe</label>
              <div class="input-group ">
                <input type="password" class="form-control radius__left" id="password" name="password" placeholder="Password" required>
                <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span>
              </div>
              <div class="ps-3">
                <a href="#">Mot de passe oublié</a>
              </div>
            </div>

            <div class="offset-md-6 col-md-6 mb-2 ">
              <button type="submit" name="submit" class="btn btn-md w-100 rounded-pill bg__btn--submit label__white">Connexion</button>
            </div>

            <div class="offset-md-2 col-md-10">
              <p class="label__white">Pas encore inscrit ? <a href="signup.php">S'inscrire maintenant</a></p>
            </div>

          </form>
        </section> 

      </div>
    </div>

  </main>
  <footer>
  <?php //include(VIEWS.'head.php'); 
include('./footer.php');
?>
</footer>
  <!-- environnement js index -->
  <?php //include(VIEWS.'footer.php') ;
  ?>
  <!-- <script src='<?php //echo ASSETS ;
                    ?>js/pass-show-hide.js'></script> -->
  <!-- <script src='<?php //echo ASSETS ;
                    ?>js/login.js'></script> -->
  <!-- environement js dev -->
  <?php //include('./footer.php') ;
  ?>
  <script src="../assets/js/pass-show-hide.js"></script>
  <script src="../assets/js/signup.js"></script>
  <script src="../assets/js/signup.js"></script>

  <!-- Bootstrap JS (already included in your code) -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
  <!-- Bootstrap JS (already included in your code) -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>