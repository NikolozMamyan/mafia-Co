<!-- signup.php -->


<?php
// $url = $_SERVER['url'];
// $routes = [
//   '/product/create'=>[
//     'class' => \App\controllers\productController::class,
//     'method'=>'index'
//   ],
//   ];

// $route = $routes[url ]?? null;
// if ($route){
//   $controller = new $route['class'];
//   $controller -> $route['method']();
// }

















require_once(__DIR__ . '/../views/headDev.php');
?>

<body>
  <header class=" mb-5 header ">
    <?php
    require_once(__DIR__ . '/../views/header.php');
    ?>
  </header>
  <main>
    <section class="container-fluid ">
      <div class="row  ">
        <!-- titre -->
        <div class="col mb-3 text-center ">
          <h2 class=" color__title">Je m'inscris</h2>
        </div>
      </div>
    </section>

    <section class="d-flex justify-content-center align-items-center mb-5 ">
      <div class=" container d-flex justify-content-center  m-0 p-auto desktop-image ">


        <form class="row needs-validation form__signup w__signup wrapper__s bg__section--signup p-3" action="#" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate>
          <!-- btn close -->

          <div class="offset-11 col-1  mb-3 ">
            <button type="button" class="btn-close  bg__btn--close " aria-label="Close"></button>
          </div>

          <!-- nom -->
          <div class="col-md-6 mb-3">
            <label for="validationCustom01" class="form-label ps-3">Nom</label>
            <input type="text" class="form-control rounded-pill" id="validationCustom01" value="" required>
            <span class="invalid-feedback">
              Le nom est obligatoire !
            </span>
          </div>
          <!-- prenom -->
          <div class="col-md-6 mb-3">
            <label for="validationCustom02" class="form-label ps-3">Prénom</label>
            <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
            <span class="invalid-feedback">
              Le Prénom est obligatoire !
            </span>
          </div>
          <!-- adresse -->
          <div class="col-md-6 mb-3">
            <label for="validationCustom03" class="form-label ps-3">Adresse</label>
            <input type="text" class="form-control rounded-pill" id="validationCustom03" required>
            <span class="invalid-feedback">
              L'adresse est obligatoire !
            </span>
          </div>
          <!-- code postal -->
          <div class="col-md-2  mb-3">
            <label for="validationCustom02" class="form-label ps-3">CP</label>
            <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
            <span class="invalid-feedback">
              Le code postal est obligatoire !
            </span>
          </div>
          <!-- ville -->
          <div class="col-md-4  mb-3">
            <label for="validationCustom02" class="form-label ps-3">Ville</label>
            <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
            <span class="invalid-feedback">
              La ville est obligatoire !
            </span>
          </div>
          <!-- telephone -->
          <div class="col-md-6 mb-3">
            <label for="" class="form-label ps-3">Téléphone</label>
            <input type="text" class="form-control rounded-pill" id="" value="">

          </div>
          <!-- mail -->
          <div class="col-md-6 mb-3">
            <label for="validationCustom02" class="form-label ps-3">Mail</label>
            <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
            <span class="invalid-feedback">
              L'adresse email est obligatoire !
            </span>
          </div>
          <!-- mot de passe -->
          <div class="col-md-6 mb-3">
            <div class="input-group ">
              <label for="password" class="form-label ps-3">Mot de passe</label>
              <div class="input-group ">
                <input type="password" class="form-control radius__left" id="password" name="password" placeholder="Password" required>
                <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span>
                <span class="invalid-feedback">
                  Le mot de passe est invalide !
                </span>
              </div>

            </div>
          </div>
          <!-- confirm mot de passe -->
          <div class="col-md-6 mb-3">
            <div class="input-group ">
              <label for="password" class="form-label ps-3">Mot de passe</label>
              <div class="input-group ">
                <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="Password" required>
                <!-- <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span> -->
                <span class="invalid-feedback">
                  Le mot de passe est invalide !
                </span>
              </div>

            </div>
          </div>
          <!-- role (radio btn) -->
          <div class="col-md-12 mb-3">

            <div class="form-check ">

              <input type="radio" class="form-check-input" id="validationFormCheck1" name="radio-stacked" required>
              <label class="form-check-label" for="validationFormCheck1">Conducteur/Passager</label>

            </div>
            <div class="form-check ">
              <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
              <label class="form-check-label" for="validationFormCheck2">Conducteur</label>

            </div>
            <div class="form-check ">
              <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
              <label class="form-check-label" for="validationFormCheck3">Passager</label>
              <span class="invalid-feedback">
                Le choix du role est obligatoire !
              </span>
            </div>

          </div>
          <!-- fichier photo -->
          <div class="col-md-12 mb-3">
            <label for="" class="form-label ps-3">Choisir une photo</label>
            <input type="file" class="form-control rounded-pill" aria-label="file example" required>
            <!-- <div class="invalid-feedback">Example invalid form file feedback</div> -->
          </div>

          <!-- terme et condition -->
          <div class="col-md-12 mb-3 ps-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
              <label class="form-check-label " for="invalidCheck2">
                Agree to terms and conditions
              </label>
              <span class="invalid-feedback">
                <span class="invalid-feedback">
                  Le choix du role est obligatoire !
                </span>Vous n'avez pas valider les thermes d'utilisation !
              </span>
            </div>
          </div>
          <!-- btn annuler -->
          <div class="col-md-4 mb-3">
            <input class="btn w-100 btn-danger rounded-pill label__white" type="reset" value="Annuler">
          </div>
          <!-- btn valider -->
          <div class="offset-md-2 col-md-6 mb-3">
            <button class="btn w-100 rounded-pill bg__btn--submit label__white" type="submit">Valider</button>
          </div>

          <!-- link login -->
          <div class="link offset-md-6 col-md-6">Déjà inscrit? <a href="login.php">Connectez-vous </a>
          </div>

        </form>

      </div>
    </section>


  </main>
  <footer>
    <?php
    require_once(__DIR__ . '/../views/footer.php');
    ?>
  </footer>

  <script src="./assets/js/pass-show-hide.js"></script>
  <script src="./assets/js/signup.js"></script>

</body>

</html>