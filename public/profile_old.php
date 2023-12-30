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
        <section class="container-fluid ">
            <div class="row  ">
                <!-- titre -->
                <div class="col text-center my-3 px-0">
                    <h2 class="bg-P500 pb-1">Mon profile</h2>
                </div>
            </div>
        </section>
        <section class="d-flex justify-content-center align-items-center mb-5">
            <div class="container d-flex justify-content-center m-0 p-auto desktop-image-profile">

                <div class="container">
                    <div class="bg-P200 p-3 p-md-5 my-5">
                        <div class="row">
                            <section class="col-12 col-md-6 p-0">
                                <div class="row bg-P500 p-2 m-0">
                                    <div class="card  bg-P500 ">
                                        <div class="row ">
                                            <div class="col-3 d-flex align-items-center px-2">
                                                <img class="col-auto profilePic  " src="./assets/images/portrait.png" alt="photo">
                                            </div>
                                            <div class="col-9  ">
                                                <div class="card-body ">
                                                    <h2 class="card-title m-0 title__card--h2">
                                                        <p>Conducteur/Passager</p>
                                                        <p>John Doe</p>
                                                    </h2>
                                                    <p class="card-text">
                                                        <small class="text text-truncate reduced-text-size">
                                                            Strasbourg-67150
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none bg-light d-sm-block p-4">
                                    <p class="text-center text-P500-border bld">Mon Trajet Regulier</p>
                                    <p class="container text-P500">Je pars de Colmar du lundi au vendredi pour me rendre au CCI Campus à Strasbourg. Mes cours commencent à 8h00 et se terminent à 17h.</p>
                                    <p class="text-center bg-P500 bld">Commentaire</p>
                                    <p class="container text-P500">Je suis a l'arret x les matins a 7h00</p>
                                </div>
                                <div class=" btn__text">
                                    <div class="row pt-2 ">
                                        <button class="btn btn-danger ms-2 col-5">Suppréssion de compte</button>
                                        <button class="btn btn-info ms-2 col-5">Modifier profil</button>
                                    </div>
                                    <div class="  pt-2 d-flex justify-content-end">
                                        <button class="btn btn-danger">Déconnexion</button>
                                    </div>
                                </div>
                                <div class=" btn__icon">
                                    <div class="row pt-2 ">
                                        <button class="btn btn-danger col-2 ms-2"><i class="fa-solid fa-trash-can"></i></button>
                                        <button class="btn btn-info col-2 ms-2"><i class="fas fa-edit"></i></button>
                                    </div>
                                    <div class="  pt-2 d-flex justify-content-end">
                                        <button class="btn btn-danger pt-2 mb-2"><i class="fa fa-sign-out"></i></button>
                                    </div>
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
                </div>



            </div>
        </section>


        <!--  -->
    </main>

    <footer>
        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>


    <script src="./assets/leaflet_files/leaflet/leaflet.js"></script>
    <script src="./assets/leaflet_files/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="./assets/js/leafletMap.js"></script>
</body>

</html>