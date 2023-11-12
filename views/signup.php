<!-- signup.php -->

<?php include_once('./head.php'); ?>

<body>
  <?php //include(VIEWS.'header.php'); 
  ?>
  <main>
    <div class="container position-relative align-items-center justify-content-center">
      
        <img src="../assets/images/Car driving-bro.svg" alt="" class="img-fluid w-100 desktop-image opacity__50">
        <img src="../assets/images/Background car SVG.svg" alt="" class="img-fluid w-100 mobile-image opacity__50">
        <div class=" position-absolute top-50 start-50 translate-middle d-flex flex-column align-items-center justify-content-center">
          <div class="row justify-content-center p-5 bg__section--signup wrapper__s  ">
            <section>
              <form class="row needs-validation" action="#" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate>
                <!-- nom -->
                <div class="col-lg-6">
                  <label for="validationCustom01" class="form-label">Nom</label>
                  <input type="text" class="form-control rounded-pill" id="validationCustom01" value="" required>
                  <span class="invalid-feedback">
                    Le nom est obligatoire !
                  </span>
                </div>
                <!-- prenom -->
                <div class="col-lg-6">
                  <label for="validationCustom02" class="form-label">Prénom</label>
                  <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
                  <span class="invalid-feedback">
                    Le Prénom est obligatoire !
                  </span>
                </div>
                <!-- adresse -->
                <div class="col-lg-6">
                  <label for="validationCustom03" class="form-label">Adresse</label>
                  <input type="text" class="form-control rounded-pill" id="validationCustom03" required>
                  <span class="invalid-feedback">
                    L'adresse est obligatoire !
                  </span>
                </div>
                <!-- code postal -->
                <div class="col-lg-2">
                  <label for="validationCustom02" class="form-label">CP</label>
                  <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
                  <span class="invalid-feedback">
                    Le code postal est obligatoire !
                  </span>
                </div>
                <!-- ville -->
                <div class="col-lg-4">
                  <label for="validationCustom02" class="form-label">Ville</label>
                  <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
                  <span class="invalid-feedback">
                    La ville est obligatoire !
                  </span>
                </div>
                <!-- telephone -->
                <div class="col-lg-6">
                  <label for="" class="form-label">Téléphone</label>
                  <input type="text" class="form-control rounded-pill" id="" value="" >
                  
                </div>
                <!-- mail -->
                <div class="col-lg-6">
                  <label for="validationCustom02" class="form-label">Mail</label>
                  <input type="text" class="form-control rounded-pill" id="validationCustom02" value="" required>
                  <span class="invalid-feedback">
                    L'adresse email est obligatoire !
                  </span>
                </div>
                <!-- mot de passe -->
                <div class="col-lg-6">
                  <div class="input-group ">
                    <label for="password" class="form-label ">Mot de passe</label>
                    <div class="input-group ">
                      <input type="password" class="form-control radius__left" id="password" name="password" placeholder="Password" required>
                      <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span>
                      <span class="invalid-feedback">
                    Le mot de passe est invalide !
                  </span>
                    </div>

                  </div>
                </div>
                <!-- role (radio btn) -->
                <div class="col-lg-6">
                
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
                <div class="col-lg-12">
                  <label for="" class="form-label">Choisir une photo</label>
                  <input type="file" class="form-control rounded-pill" aria-label="file example" required>
                  <!-- <div class="invalid-feedback">Example invalid form file feedback</div> -->
                </div>

                <!-- terme et condition -->
                <div class="col-lg-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
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
                <div class="col-lg-4">
                  <input class="btn w-100 btn-danger rounded-pill label__white" type="reset" value="Annuler">
                </div>
                <!-- btn valider -->
                <div class="offset-lg-2 col-lg-6">
                  <button class="btn w-100 rounded-pill bg__btn--submit label__white" type="submit">Connexion</button>
                </div>

                <!-- link login -->
                <div class="link offset-lg-7 col-lg-5">Déjà inscrit? <a href="login.php">Connectez-vous </a>
              </div>
              </form>

            </section>
          </div>
        </div>
      
    </div>
  </main>



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