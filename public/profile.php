<!-- profile.php -->
<?php

require_once(__DIR__ . '/../views/headDev.php');
?>

<body>
    <header class=" header ">
        <?php
        require_once(__DIR__ . '/../views/header.php');

        ?>
    </header>
    <main>
        <section class="container-fluid ">
            <div class="row  ">
                <!-- menu -->
                <div class="col mb-3 bg__nav ">
                    <?php require_once(__DIR__ . '/../views/navBar.php'); ?>
                </div>
            </div>
        </section>

    <main class="container">
        <div class="bg-P200 p-3 p-md-5 my-5">
            <div class="row">
                <section class="col-12 col-md-6 bg-light p-0">
                    <div class="row bg-P500 p-2 m-0">
                        <img class="col-auto profilePic" src="./assets/images/profilTemp.jpg" alt="photo">
                        <div class="col-auto mt-2">
                            <p>Conducteur/Passager</p>
                            <p>John Doe</p>
                            <p>Strasbourg-67150</p>
                        </div>
                    </div>
                    <div class="d-none d-sm-block">
                        <p class="text-center text-P500-border bld">Mon Trajet Regulier</p>
                        <p class="container text-P500">Je pars de Colmar du lundi au vendredi pour me rendre au CCI Campus à Strasbourg. Mes cours commencent à 8h00 et se terminent à 17h.</p>
                        <p class="text-center bg-P500 bld">Commentaire</p>
                        <p class="container text-P500">Je suis a l'arret x les matins a 7h00</p>
                    </div>
                </section>
                <section class="col-12 col-md-6 p-0 px-md-4">
                    <div class="map-container">
                        <div id="map"></div>
                    </div>
                    <div class="text-center">
                        <button onclick="setMapView('Location')" class="mapButton active" id="btnLocation">
                            <img src="./assets/images/Location.png">
                        </button>
                        <button onclick="setMapView('Pinpoint')" class="mapButton" id="btnMapPinpoint">
                            <img src="./assets/images/MapPinpoint.png">
                        </button>
                        <button onclick="setMapView('Place')" class="mapButton" id="btnPlaceMarker">
                            <img src="./assets/images/PlaceMarker.png">
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </main>


    <script src="./assets/leaflet_files/leaflet/leaflet.js"></script>
    <script src="./assets/leaflet_files/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="./assets/js/leafletMap.js"></script>
</body>
