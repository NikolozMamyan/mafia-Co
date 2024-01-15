<!-- search -->
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
        <h1 class="page-title">Recherche</h1>
        <section id="recherche" class="col-12 ">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div>
                        <div class="container">
                            <div class="search-container">
                                <input type="text" id="search-bar" placeholder="Recherche un covoitureur">
                                <button class="search-btn btn_search" id="search-bar-submit" onclick=""><i class="fa-solid fa-magnifying-glass search-icon"></i></button>
                                <button class="search-btn btn_more wrapper" type="button" onclick="searchFilters()"><i class="fa-solid fa-sliders">&nbsp;</i><span class="d-none d-md-inline">Plus de Critères</span></button>
                            </div>

                            <div class="d-none p-2" id="filtersList">
                                <ul class="list-unstyled d-flex flex-wrap flex-md-nowrap">
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input type="checkbox" class="checkbox-Primary mt-1" checked>
                                            &nbsp;Nom - Prénom
                                        </label>
                                    </li>
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input type="checkbox" class="checkbox-Primary mt-1">
                                            &nbsp;Ville / Code postal
                                        </label>
                                    </li>
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input type="checkbox" class="checkbox-Primary mt-1">
                                            &nbsp;Autour de moi
                                        </label>
                                    </li>
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input type="checkbox" class="checkbox-Primary mt-1">
                                            &nbsp;Sur mon trajet
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center my-3 px-0">
                        <h2 class="page-title py-3">Résultats</h2>
                    </div>
                    <div class="row w-100 my-5">
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                            include("../views/searchResultCard.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>



    </main>

    <footer>
        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>


    <script src="assets/js/search.js"></script>
</body>

</html>