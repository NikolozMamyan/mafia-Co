<?php 
require_once(__DIR__.'/../views/headDev.php');
?>

<body class="">
  <header class="header header__login ">
<?php 
require_once(__DIR__.'/../views/header.php');
?>
</header>
  <main class="d-flex justify-content-center ">
    <div class=" container d-flex justify-content-center align-items-start m-0 p-0 desktop-image ">

      <div class="row wrapper__s bg__p--500 w-md-50 mt-md-5 gx-md-3 gx-sm-0 ">

        <section class="col-md-5  align-self-center section__resum ">
          <p class="resum p-lg-5">Rejoignez notre communauté de covoitureurs en vous connectant ou en vous inscrivant.</p>
        </section>

         <section class=" col-md-7 p-lg-3 ">
         <form class="my-5 form__login" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">

            <div class="mb-3 gx-sm-2">
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
  <?php 
require_once(__DIR__.'/../views/footer.php');
?>
</footer>
  <script src="./assets/js/pass-show-hide.js"></script>
  <script src="./assets/js/login.js"></script>
</body>