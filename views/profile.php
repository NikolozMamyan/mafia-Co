<!-- profile.php -->
<?php include('./headDev.php');?>
<body class="container-fluid">
<?php include('./header.php');
      include('./navBar.php');?>
    <img class="bgimg" src="../assets/images/Car driving-bro.svg" alt="fond">
    
    <main class="container">
        <div class="bg-P200 p-5">
            <div class="row">
                <div class="col-12 col-sm-6 bg-light p-0">
                    <div class="row bg-P500 p-2 m-0">
                        <img class="col-3 profilePic" src="../assets/images/profilTemp.jpg" alt="photo">
                        <div class="col-9 mt-2">
                            <p>Conducteur/Passager</p>
                            <p>John Doe</p>
                            <p>Strasbourg-67150</p>
                        </div>
                    </div>
                    <p class="text-center text-P500-border bld">Mon Trajet Regulier</p>
                    <p class="container text-P500">Je pars de Colmar du lundi au vendredi pour me rendre au CCI Campus à Strasbourg. Mes cours commencent à 8h00 et se terminent à 17h.</p>
                    <p class="text-center bg-P500 bld">Commentaire</p>
                    <p class="container text-P500">Je suis a l'arret x les matins a 7h00</p>
                </div>
                <div class="col-12 col-sm-6">
                    <div id="map"></div>
                    <div class="text-center">
                        <button onclick="test(1)" class="mapButton active" id="btn1">
                            <img src="../assets/images/Location.png">
                        </button>
                        <button onclick="test(2)" class="mapButton" id="btn2">
                            <img src="../assets/images/MapPinpoint.png">
                        </button>
                        <button onclick="test(3)" class="mapButton" id="btn3">
                            <img src="../assets/images/PlaceMarker.png">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../assets/leaflet_files/leaflet/leaflet.js"></script>
    <script src="../assets/leaflet_files/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="../assets/js/leafletMap.js"></script>
</body>