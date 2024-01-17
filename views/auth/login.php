<!-- login.php -->
<?php require_once base_path('views/components/headDev.php'); ?>

<body id="landing-page">

  <!-- Partie écran de gauche -->
  <section id="col-gauche">
    <header>
      <img src="assets/images/covoiturage-cci-campus-alsace-logo_defonce-noire.svg" alt="logo cci covoiturage" />
    </header>

    <main>
      <h1>Besoin d'un covoiturage pour aller sur le CCI Campus ?</h1>
      <p>Rejoignez notre communauté de covoitureurs en vous connectant ou en vous inscrivant !</p>
      <p id="message-inscription">Pas encore inscrit ? <a href="<?php routeEcho('register'); ?>">Créez votre compte en quelques minutes !</a></p>

      <form class="form__login" action="<?php routeEcho('login.check'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="action" value="check" hidden>
        <div class="form-group">
        <label for="login">Votre adresse email
          <input type="email" name="login" placeholder="Entrez ici votre adresse email" />
          <span class="emailError"></span>
        </label>
        </div>
        <div class="form-group">
        <label for="password">Votre mot de passe
          <a href="#" class="pwdForgotten">Mot de passe oublié ?</a>
          <input type="password" name="password" placeholder="Entrez ici votre mot de passe" />
          <span id="show-hide-password"><i class="covoiturage-eye"></i></span>
          <span class="passwordError"></span>
        </label>
        </div>
        
        <input type="submit" name="submit" value="Connexion" />
      </form>
    </main>

    <footer>
      <a href="<?php routeEcho('conditionIndex'); ?>">Conditions générales d'utilisation</a> • <a href="<?php routeEcho('mentionIndex'); ?>">Mentions légales</a> • © CCI Covoiturage 2023
    </footer>

  </section>

  <!-- Partie écran de droite -->
  <section id="col-droite" class="desktop-only">
    <img src="assets/images/covoiturage-cci-campus-alsace-illustration-covoiturage-people.svg" alt="illustration personnages en covoiturage" />
  </section>

  <!-- js -->
  <script src="./assets/js/pass-show-hide.js"></script>
  <script src="./assets/js/login.js"></script>


</body>