<div class="nav-bar-container ">
  <nav class="navbar float-end p-0">
    <div class="container-fluid p-0">
      <div class="navbar-nav container-fluid p-0">
        <div class="nav-item row m-0 text-center">
          <a href="../public/profile.php" class="col col-sm-auto py-2"><i class="fa-solid fa-user d-sm-none d-block"></i>
            <p>Mon profil</p>
          </a>
          <!-- <a href="#" class="col col-sm-auto py-2 d-sm-none d-block"
                ><i class="fa-solid fa-bell d-sm-none d-block"></i>
                <p>Notifications</p></a
              >
              <a href="#"  class="col col-sm-auto py-2 d-sm-none d-block"
                ><i class="fa-solid fa-magnifying-glass d-sm-none d-block"></i>
                <p>Recherche</p></a
              > -->
          <a href="../public/rechercheMobile.php"  class="col col-sm-auto py-2 d-sm-none d-block">
            <i class="fa-solid fa-magnifying-glass d-sm-none d-block"></i>
            <p>Recherche</p>
          </a>

          <a href="../public/notifyMobile.php"  class="col col-sm-auto py-2 d-sm-none d-block">
            <i class="fa-solid fa-bell d-sm-none d-block"></i>
            <p>Notifications</p>
          </a>
          <a href="../public/recherche_et_notifications.php" class="col col-sm-auto py-2 d-sm-block d-none">
            <p>Recherche et notifications</p>
          </a>
          <a href="../public/chat.php" class="col col-sm-auto py-2"><i class="fa-solid fa-comment d-sm-none d-block"></i>
            <p>Chat</p>
          </a>

          <a href="../public/trajet.php" class="col-auto py-2 d-none d-sm-block"><i class="fa-solid fa-comment d-sm-none d-block"></i>
            <p>Mon trajet</p>
          </a>
          <a href="../public/modifySignup.php" class="col-auto py-2 d-none d-sm-block"><i class="fa-solid fa-comment d-sm-none d-block"></i>
            <p>Modifier le profil</p>
          </a>
          <a href="../public/conditionsGeneral.php" class="col-auto py-2 d-none d-sm-block"><i class="fa-solid fa-comment d-sm-none d-block"></i>
            <p>Conditions générales</p>
          </a>
          <a href="../public/index.php" class="col-auto py-2 d-none d-sm-block"><i class="fa-solid fa-comment d-sm-none d-block"></i>
            <p>Déconnexion</p>
          </a>
          <a class="col col-sm-auto px-0 py-2 d-sm-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
          </a>
        </div>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <ul class="nav__ul">
              <li class="nav-item onCanvas">
                <a href="../public/trajet.php">Mon Trajet</a>
              </li>
              <li class="nav-item onCanvas">
                <a href="../public/modifySignup.php">Modifier le profil</a>
              </li>
              <li class="nav-item onCanvas">
                <a href="../public/conditionsGeneral.php">Conditions générales</a>
              </li>
              </li>
              <li class="nav-item onCanvas">
                <a href="../public/index.php">Déconnexion</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>