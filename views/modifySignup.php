<!-- signup.php -->

<?php include_once('./headDev.php'); ?>

<body>
<header class="mb-5">
<?php //include(VIEWS.'head.php'); 
include('./header.php');
include('./navBar.php');
?>
</header>
  <main class="d-flex justify-content-center align-items-center  ">
    <div class=" container d-flex justify-content-center align-items-start m-0 p-0 desktop-image ">

      <div class="row w-50 wrapper__s bg__section--lavande">

        <section>
          <form class="row needs-validation m-4" action="#" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate>
            <!-- nom -->
            <div class="col-lg-6 mb-3">
              <label for="validationCustom01" class="form-label ps-3">Nom</label>
              <input type="text" class="form-control rounded-pill" id="validationCustom01" value="" required>
              <span class="invalid-feedback">
                Le nom est obligatoire !
              </span>
            </div>
            <!-- prenom -->
            <div class="col-lg-6 mb-3">
              <label for="validationCustom02" class="form-label ps-3">Prénom</label>
              <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
              <span class="invalid-feedback">
                Le Prénom est obligatoire !
              </span>
            </div>
            <!-- adresse -->
            <div class="col-lg-6 mb-3">
              <label for="validationCustom03" class="form-label ps-3">Adresse</label>
              <input type="text" class="form-control rounded-pill" id="validationCustom03" required>
              <span class="invalid-feedback">
                L'adresse est obligatoire !
              </span>
            </div>
            <!-- code postal -->
            <div class="col-lg-2 mb-3">
              <label for="validationCustom02" class="form-label ps-3">CP</label>
              <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
              <span class="invalid-feedback">
                Le code postal est obligatoire !
              </span>
            </div>
            <!-- ville -->
            <div class="col-lg-4 mb-3">
              <label for="validationCustom02" class="form-label ps-3">Ville</label>
              <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
              <span class="invalid-feedback">
                La ville est obligatoire !
              </span>
            </div>
            <!-- telephone -->
            <div class="col-lg-6 mb-3">
              <label for="" class="form-label ps-3">Téléphone</label>
              <input type="text" class="form-control rounded-pill" id="" value="">

            </div>
            <!-- mail -->
            <div class="col-lg-6 mb-3">
              <label for="validationCustom02" class="form-label ps-3">Mail</label>
              <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
              <span class="invalid-feedback">
                L'adresse email est obligatoire !
              </span>
            </div>
            <!-- mot de passe -->
            <div class="col-lg-6 mb-3">
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
            <div class="col-lg-6 mb-3">
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
            <div class="col-lg-12 mb-3">

              <div class="form-check">

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
            <div class="col-lg-12 mb-3">
              <label for="" class="form-label ps-3">Choisir une photo</label>
              <input type="file" class="form-control rounded-pill" aria-label="file example" required>
              <!-- <div class="invalid-feedback">Example invalid form file feedback</div> -->
            </div>

            <!-- btn annuler -->
            <div class="col-lg-4 mb-3">
              <input class="btn w-100 btn-danger rounded-pill label__white" type="reset" value="Annuler">
            </div>
            <!-- btn valider -->
            <div class="offset-lg-2 col-lg-6 mb-3">
              <button class="btn w-100 rounded-pill bg__btn--submit label__white" type="submit">Modifier</button>
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


  <!-- environement js index -->
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
  <!-- bootstrap -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

</body>

</html>