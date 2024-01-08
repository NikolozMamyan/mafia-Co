<?php
require_once(__DIR__ . '/../views/headDev.php');
?>
</head>

<body>
  <header class="header">
    <?php
    require_once(__DIR__ . '/../views/header.php');
    ?>
  </header>

  <main>
    <section class="container-fluid ">
      <div class="row  ">
        <!-- menu -->
        <div class="col bg__nav mb-2">
          <?php require_once(__DIR__ . '/../views/navBar.php'); ?>
        </div>
      </div>
    </section>
    <section class="container-fluid ">
      <div class="row  ">
        <!-- titre -->
        <div class="col mb-3 text-center ">
          <h2 class=" color__title">Mon trajet Regulier</h2>
        </div>
      </div>
    </section>
    <section class="d-flex justify-content-center align-items-center mb-5 ">
      <div class=" container d-flex justify-content-center  m-0 p-auto desktop-image ">
        <section class='trajet my-5'>
          <div class="container container__menu ">
            <div class="row">
              <div class="col ms-2 col__t">
                <form action="" method="POST" class="swap-container">
                 
                <div class="form__group">
    <img src="../public/assets/images/flagG.svg" class='flag' alt="Drapeau Vert">
    <label for="depart" class="label_desc">Départ</label>
    <input value="ss" class="form-control rounded-pill mb-5 inpLg" type="text" id="depart" name="depart">
     <!-- Utilisez un bouton au lieu de l'image -->
      <img src="../public/assets/images/fleche.png" class="fleche" alt="Fleche noire">
   
  </div>
  <div class="form__group">
    <img src="../public/assets/images/flagR.svg" class='flag' alt="Drapeau Rogue">
    <label for="arrive" class="label_desc">Arrivé</label>
    <input class="form-control rounded-pill mb-5 inpLg" type="text" id="arrive" name="arrive">
  </div>
              </div>

              <div class="col ">
                <div class="container mb-5 p-0 selectH">
                  <div class="container horaires">
                    Mes horaires
                  </div>
                  <div class="row semaine">
                    <div class="col-2 col-md-2">
                      <input type="button" value="Lun." class="jour-button">
                    </div>
                    <div class="col-2 col-md-2">
                      <input type="button" value="Mar." class="jour-button">
                    </div>
                    <div class="col-2 col-md-2">
                      <input type="button" value="Mer." class="jour-button">
                    </div>
                    <div class="col-2 col-md-2">
                      <input type="button" value="Jeu." class="jour-button">
                    </div>
                    <div class="col-2 col-md-2">
                      <input type="button" value="Ven." class="jour-button">
                    </div>
                  </div>
                </div>
                <div class="row row__small d-flex justify-content-center align-items-center">
                  <div class="col-6">
                    <span for="finCours" class="cour_start">Début de cours</span>
                    <br>
                    <div class="cs-form">
                      <input type="time" class="form-control rounded-pill" value="10:05 AM" />
                    </div>
                  </div>
                  <div class="col-6">
                    <span for="finCours2" class="cour_end">Fin de cours</span>
                    <br>
                    <div class="cs-form">
                      <input type="time" class="form-control rounded-pill" value="10:05 AM" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <section class="commentaire mt-3">
            <div class="container">
              <div class="row ">
                <div class="col-lg-12 text-center row__commentaire">
                  <p>Commentaire</p>
                </div>
              </div>
              <div class="row row__back">
                <div class="col-lg-12 mb-2">
                  <textarea class="form__h form-control mt-1" placeholder="Entrez votre texte ici"></textarea>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-12 d-flex justify-content-end">
                  <button type="submit" class="btn__trajet">Crée mon trajet</button>
                </div>
              </div>
              </form>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</main>
<footer>
  <?php
  require_once(__DIR__ . '/../views/footer.php');
  ?>
</footer>
<script src="./assets/js/trajet.js"></script>
</body>
