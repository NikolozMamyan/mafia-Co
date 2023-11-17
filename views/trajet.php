<?php 
include('./headDev.php');
?>

<body>
  <main class="container mt-5 container__menu">
    <div class="row">
    <div class="col ms-2">
    <div class="form-group">
        <label for="depart">Départ</label>
        <input class="form-control rounded-pill mb-5 inpLg" type="text" id="depart" name="depart">
    </div>
    <div class="form-group">
        <label for="arrive">Arrivé</label>
        <input class="form-control rounded-pill mb-5 inpLg" type="text" id="arrive" name="arrive">
    </div>
</div>
      <div class="col ">
        <div class="container mb-5 p-0 selectH">
          <div class="container horaires">
            Mes horaires
          </div>
          <div class="row semaine ">
            <div class="col jour ">
              Lun.
            </div>
            <div class="col jour">
              Mar.
            </div>
            <div class="col jour">
              Mer.
            </div>
            <div class="col jour">
              Jeu.
            </div>
            <div class="col jour">
              Ven.
            </div>
          </div>
        </div>
        <div class="row row__small d-flex justify-content-center align-items-center ms-3">
    <div class="col-6">
        <span for="finCours">Fin de cours</span>
        <br>
        <input class="rounded-pill inpSm" type="text" id="finCours" name="finCours">
    </div>
    <div class="col-6">
        <span for="finCours2">Fin de cours</span>
        <br>
        <input class="rounded-pill inpSm" type="text" id="finCours2" name="finCours2">
    </div>
</div>

      </div>
    </div>
  </main>
  <section class="commentaire mt-3"> 
  <div class="container">
  <div class="row ">
    <div class="col-lg-12 text-center row__commentaire">
      <p>Commentaire</p>
    </div>
  </div>
  <div class="row row__back ">
    <div class="col-lg-12 mb-2">
      <input type="text" class="form__h form-control  mt-1" placeholder="Entrez votre texte ici">
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-lg-12 d-flex justify-content-end">
      <button type="button" class="btn__trajet">Crée mon trajet</button>
    </div>
  </div>
</div>
  </section>
</div>
</body>
