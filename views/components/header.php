<nav>

    <a id="logo-header" href="<?php

                                use App\Models\User;

                                routeEcho('profil') ?>"><img src="assets/images/covoiturage-cci-campus-alsace-logo_defonce-noire.svg" alt="logo cci covoiturage" /></a>
    <ul>
        <li><a href="<?php routeEcho('search') ?>"><i class="covoiturage-search"></i>Rechercher</a></li>
        <li id="menu-item-messagerie"><a href="<?php routeEcho('chat') ?>"><i class="covoiturage-messaging"><span class="number-bubble"><?php ec(User::getMessageCount()) ?></span></i>Messagerie</a></li>
        <li id="menu-item-notifications"><a href="<?php routeEcho('notification') ?>"><i class="covoiturage-notification"><span class="number-bubble"><?php ec(User::getNotificationCount()) ?></span></i>Notifications</a></li>
        <li id="compte-header">
            <a href="<?php routeEcho('profil') ?>">
                <img src="assets/images/covoiturage-cci-photo-profil-default-100x100.webp" alt="photo de profil de <?php $currentUser['nomUtilisateur'] ?>">
                <span class="desktop-only">Bienvenue <?php //$user->getNomUtilisateur() . ' ' . $user->getPrenomUtilisateur() 
                                                        ?></span>
                <span class="mobile-only"><a href="<?php routeEcho('profil') ?>">Mon compte</a></span>
            </a>
        </li>
    </ul>

</nav>