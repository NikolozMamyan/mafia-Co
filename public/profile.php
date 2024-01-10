<!-- profile.php -->
<?php

require_once(__DIR__ . '/../views/headDev.php');
?>

<body>
    <header class="container">
        <?php
        require_once(__DIR__ . '/../views/header.php');
        ?>
    </header>
    <main id="main-profil" class="container">
        <h1 class="page-title">Mon profil</h1>

        <!----------- Partie Bonjour ------------>

        <section id="hello-user">
            <img src="assets/images/covoiturage-cci-photo-profil-default-100x100.webp" alt="photo de profil de [user_name]">

            <div>
                <p>Bonjour [user_name]</p>
                <p>Vous avez <a href=""><i class="covoiturage-messaging"></i>[nbr_message] messages</a> et <a href=""><i class="covoiturage-notification"></i>[nbr_notifications] notifications</a> non lus.</p>
            </div>

            <!-- Prévoyez une condition s'il y a 0 messages et 0 notifications avec une autre phrase du coup ! -->
        </section>
        <button id="deconnexion" class="mb-5 btn-danger"><a href="index.php">Déconnexion</a></button>
        <section id="user-details">
            <!----------- Vos informations personnelles ------------>
            <div id="user-infos">
                <a class="edit-icon" href="modifySignup.php"><i class="covoiturage-pencil"></i></a>
                <h2>Vos informations personnelles</h2>

                <h3>Votre nom et prénom</h3>
                <p>[user_name_surname]</p>

                <h3>Votre adresse email</h3>
                <p>[user_email]</p>

                <!-- <h3>Votre mot de passe</h3>
                <p>************</p> -->

                <h3>Votre domicile</h3>
                <p>[user_address]</p>

                <h3>Votre statut de covoitureur</h3>
                <p>[user_statut]</p>
            </div>

            <!----------- Votre trajet quotidien ------------>

            <div id="user-itinerary">
                <a class="edit-icon" href="modifySignup.php"><i class="covoiturage-pencil"></i></a>
                <h2>Votre trajet quotidien</h2>
                <p>Je pars de [user_city] [user_week_days] pour me rendre au CCI Campus de [cci_city]. Mes cours commencent à [start_class_hour] et se terminent à [end_class_hour].</p>

                <h3>Votre périmètre</h3>
                <p>Vous êtes prêt à chercher des covoitureurs dans un périmètre de [user_perimeter] autour de votre domicile.</p>

                <h3>Vos commentaires</h3>
                <p>[user_comments]</p>
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
        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>


    <script src="./assets/leaflet_files/leaflet/leaflet.js"></script>
    <script src="./assets/leaflet_files/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="./assets/js/leafletMap.js"></script>
    <script src="./assets/js/profile.js"></script>
</body>

</html>