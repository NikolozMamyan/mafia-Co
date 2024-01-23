<!-- profilUser.php -->
<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <header class="container">
        <?php require_once base_path('views/components/header.php'); ?>
    </header>

    <main id="main-profil" class="container">
        <h1 class="page-title"><?php echo ($title) ?></h1>

        <!-- Partie Bonjour -->
        <section id="hello-user">
            <img src="<?php ec(!empty($notification['photoUtilisateur']) ?: "assets/images/covoiturage-cci-photo-profil-default-100x100.webp"); ?>" alt="photo de profil de <?php ec($user->getNomUtilisateur()) ?> ">
            <div>
                <p>Bonjour <?php echo $user->getNomUtilisateur() . ' ' . $user->getPrenomUtilisateur() ?></p>
                <p>Vous avez <a href="<?php routeEcho('chat'); ?>"><i class="covoiturage-messaging"></i><?php ec($messageCount) ?> messages</a> et <a href="<?php routeEcho('notification'); ?>"><i class="covoiturage-notification"></i><?php ec($notificationCount) ?> notifications</a> non lus.</p>
            </div>
        </section>

        <button id="deconnexion" class="mb-5 btn-danger"><a href="<?php routeEcho('logout'); ?>">Déconnexion</a></button>

        <section id="user-details">
            <!-- Vos informations personnelles -->
            <div id="user-infos">
                <input type="text" value="<?php echo ($point->getLatitude()) ?>" id="latitude" hidden>
                <input type="text" value="<?php echo ($point->getLongitude()) ?>" id="longitude" hidden>


                <a class="edit-icon" href="<?php routeEcho('modify'); ?>"><i class="covoiturage-pencil"></i></a>
                <h2>Vos informations personnelles</h2>

                <h3>Votre nom et prénom</h3>
                <p><?php echo $user->getNomUtilisateur() . ' ' . $user->getPrenomUtilisateur() ?></p>

                <h3>Votre adresse email</h3>
                <p><?php echo $user->getEmailUtilisateur() ?></p>

                <h3>Votre domicile</h3>
                <p><?php echo $user->getAdresseUtilisateur() . ' ' . $point->getCodePostalVille() . ' ' . $point->getNomVille()  ?></p>

                <h3>Votre statut de covoitureur</h3>
                <p><?php echo $role ?></p>
            </div>

            <!----------- Votre trajet quotidien ------------>

            <div id="user-itinerary">
                <a class="edit-icon" href="<?php routeEcho('modify'); ?>"><i class="covoiturage-pencil"></i></a>
                <h2>Votre trajet quotidien</h2>
                <p>Je pars de <?php echo $point->getNomVille() ?> pour me rendre au CCI Campus de <?php echo $arrivee->getNomVille() ?>. Mes cours commencent à <?php echo $itineraire->getDebutCours() ?> et se terminent à <?php echo $itineraire->getFinCours() ?> le <?php echo implode(', ', $joursSemaine) ?>.</p>

                <!-- <h3>Votre périmètre</h3>
                <p>Vous êtes prêt à chercher des covoitureurs dans un périmètre de [user_perimeter] autour de votre domicile.</p> -->

                <h3>Vos commentaires</h3>
                <p><?php echo $itineraire->getInfoComplementaire() ?></p>
            </div>

        </section>

        <!----------- Carte ------------>

        <section id="user-map">
            <ul>
                <li><button id="view-home" class="active" onclick="setMapView('Location')"><i class="covoiturage-home"></i>Visualiser mon domicile</button></li>
                <li><button id="view-itinerary" onclick="setMapView('Pinpoint')"><i class="covoiturage-itinerary"></i>Visualiser mon itinéraire</button></li>
                <li><button id="view-perimeter" onclick="setMapView('Place')"><i class="covoiturage-address"></i>Visualiser mon périmètre</button></li>
            </ul>
            <div class="map-container">
                <div id="map"></div>
            </div>
        </section>
    </main>

    <footer>
        <?php require_once base_path('views/components/footer.php'); ?>
    </footer>

    <script src="./assets/leaflet_files/leaflet/leaflet.js"></script>
    <script src="./assets/leaflet_files/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="./assets/js/leafletMap.js"></script>
    <script src="./assets/js/profile.js"></script>
</body>

</html>