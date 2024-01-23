<div class="container">
    <img src="assets/images/covoiturage-cci-campus-alsace-logo_defonce-blanche.svg" alt="logo cci covoiturage défonce blanche" />
    <p>CCI Covoiturage est une plateforme de covoiturage dédiée aux campus CCI en Alsace (Strasbourg, Colmar, Mulhouse).</p>

    <nav id="nav-footer">

        <?php if (!empty($_SESSION)) : ?>
            <ul>
                <li><a href="<?php routeEcho('profil'); ?>"><i class="covoiturage-account"></i>Mon profil</a></li>
                <li><a href="<?php routeEcho('chat'); ?>"><i class="covoiturage-messaging"></i>Ma messagerie</a></li>
                <li><a href="<?php routeEcho('notification'); ?>"><i class="covoiturage-notification"></i>Mes notifications</a></li>
                <li><a href="<?php routeEcho('search'); ?>"><i class="covoiturage-search"></i>Rechercher</a></li>
                <li><a href="<?php routeEcho('supportIndex'); ?>"><i class="covoiturage-support"></i>Support technique</a></li>
                <?php if (Auth::getCurrentUser()['idRole'] === 1) : ?>
                    <li><a href="<?php routeEcho('index'); ?>"><i class=""></i>Tableau de bord administrateur</a></li>
                <?php endif ?>
            </ul>
        <?php endif ?>


    </nav>

    <div id="copyright">
        <a href="<?php routeEcho('conditionIndex'); ?>">Conditions générales d'utilisation</a> • <a href="<?php routeEcho('mentionIndex'); ?>">Mentions légales</a> • © CCI Covoiturage 2023
    </div>
</div>