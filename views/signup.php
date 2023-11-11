<!-- signup.php -->

<?php include_once('./head.php'); ?>

<body>
  <?php //include(VIEWS.'header.php'); 
  ?>
  <main>
    <div class="container align-items-center justify-content-center">
      <div class="position-relative">
        <img src="../assets/images/Car driving-bro.svg" alt="" class="img-fluid w-100">
        <div class="position-absolute top-50 start-50 translate-middle ">
          <div class="row justify-content-center p-5 bg-light wrapper__s  ">
            <section>
              <form class="row g-3 needs-validation" action="#" method="POST" enctype="multipart/form-data" autocomplete="off" novalidate>
                <!-- nom -->
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="validationCustom01" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <!-- prenom -->
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Prénom</label>
                  <input type="text" class="form-control" id="validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <!-- adresse -->
                <div class="col-md-6">
                  <label for="validationCustom03" class="form-label">Adresse</label>
                  <input type="text" class="form-control" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid city.
                  </div>
                </div>
                <!-- code postal -->
                <div class="col-md-2">
                  <label for="validationCustom02" class="form-label">CP</label>
                  <input type="text" class="form-control" id="validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <!-- ville -->
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Ville</label>
                  <input type="text" class="form-control" id="validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <!-- telephone -->
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Téléphone</label>
                  <input type="text" class="form-control" id="validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <!-- mail -->
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Mail</label>
                  <input type="text" class="form-control" id="validationCustom02" value="" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <!-- mot de passe -->
                <div class="col-md-6">
                  <div class="input-group ">
                    <label for="password" class="form-label ">Mot de passe</label>
                    <div class="input-group ">
                      <input type="password" class="form-control radius__left" id="password" name="password" placeholder="Password" required>
                      <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>

                  </div>
                </div>
                <!-- role (radio btn) -->
                <div class="col-md-6">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                    <label class="form-check-label" for="validationFormCheck2">Conducteur/Passager</label>
                  </div>
                  <div class="form-check ">
                    <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                    <label class="form-check-label" for="validationFormCheck3">Conducteur</label>
                    <div class="invalid-feedback">More example invalid feedback text</div>
                  </div>
                  <div class="form-check ">
                    <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                    <label class="form-check-label" for="validationFormCheck3">Passager</label>
                    <div class="invalid-feedback">More example invalid feedback text</div>
                  </div>
                </div>
                <!-- fichier photo -->
                <div class="col-12">
                  <label for="" class="form-label">Choisir une photo</label>
                  <input type="file" class="form-control" aria-label="file example" required>
                  <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>

                <!-- terme et condition -->
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                    <label class="form-check-label" for="invalidCheck2">
                      Agree to terms and conditions
                    </label>
                  </div>
                </div>
                <!-- btn annuler -->
                  <div class="col-4">
                    <input class="btn btn-primary" type="reset" value="Reset">
                  </div>
                  <!-- btn valider -->
                  <div class="col-8">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
                
                <!-- link login -->
                <div class="link">Déjà inscrit? <a href="login.php">Connectez-vous </a></div>
              </form>

            </section>
          </div>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>