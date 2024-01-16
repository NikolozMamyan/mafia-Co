
<nav>
    
        <a id="logo-header" href="<?php routeEcho('profil') ?>"><img src="assets/images/covoiturage-cci-campus-alsace-logo_defonce-noire.svg" alt="logo cci covoiturage" /></a>
        <ul>
            <li><a href="<?php //routeEcho('search') ?>"><i class="covoiturage-search"></i>Rechercher</a></li>
            <li id="menu-item-messagerie"><a href="<?php //routeEcho('chat') ?>"><i class="covoiturage-messaging"><span class="number-bubble">x</span></i>Messagerie</a></li>
            <li id="menu-item-notifications"><a href="<?php //routeEcho('notify') ?>"><i class="covoiturage-notification"><span class="number-bubble">x</span></i>Notifications</a></li>
            <li id="compte-header">
                <a href="<?php routeEcho('profil') ?>">
                    <img src="assets/images/covoiturage-cci-photo-profil-default-100x100.webp" alt="photo de profil de <?= $currentUser['nomUtilisateur'] ?>">
                    <span class="desktop-only">Bienvenue <?= $currentUser['nomUtilisateur'] ?></span>
                    <span class="mobile-only">Mon compte</span>
                </a>
            </li>
        </ul>
   
</nav>
