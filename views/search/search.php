<!-- search -->
<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <header class="container">

        <?php require_once base_path('views/components/header.php'); ?>

    </header>
    <main id="main-profil" class="container">
        <h1 class="page-title">Mes recherches et notifications</h1>
        <section id="recherche" class="col-12 ">

            <div class="container-fluid">
                <div class="row mt-5">
                    <form name="search" action="<?php routeEcho('search.result') ?>" method="POST" enctype="multipart/form-data">
                        <div class="container">
                            <div class="search-container">
                                <input name="searchBar" type="text" id="search-bar" placeholder="Recherche un covoitureur">
                                <button type="submit" class="search-btn btn_search" id="search-bar-submit" onclick=""><i class="fa-solid fa-magnifying-glass search-icon"></i></button>
                                <button class="search-btn btn_more wrapper" type="button" onclick="searchFilters()"><i class="fa-solid fa-sliders">&nbsp;</i><span class="d-none d-md-inline">Plus de Critères</span></button>
                            </div>

                            <div class="d-none p-2" id="filtersList">
                                <ul class="list-unstyled d-flex flex-wrap flex-md-nowrap">
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input name="filter[]" type="checkbox" value="nom/prenom" class="checkbox-Primary mt-1" checked>
                                            &nbsp;Nom - Prénom
                                        </label>
                                    </li>
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input name="filter[]" type="checkbox" value="ville/Cp" class="checkbox-Primary mt-1">
                                            &nbsp;Ville / Code postal
                                        </label>
                                    </li>
                                    <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input name="filter[]" type="checkbox" value="Autour" class="checkbox-Primary mt-1">
                                            &nbsp;Autour de moi
                                        </label>
                                    </li>
                                    <!-- <li class="mx-2">
                                        <label class="d-flex flex-nowrap">
                                            <input name="filter[]" type="checkbox" value="SurTrajet" class="checkbox-Primary mt-1">
                                            &nbsp;Sur mon trajet
                                        </label>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </form>

                    <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center my-3 px-0">
                        <h2 class="page-title py-3">Résultats</h2>
                    </div>
                    <div class="row w-100 my-5">
                        <?php if (isset($_SESSION['users'])) : ?>
                            <?php foreach ($_SESSION['users'] as $index => $user) : ?>
                                <div class="col-12 col-md-6 col-lg-4 col-xxl-3 my-2">
                                    <div class="bg-P500 rounded"><!-- a changer -->
                                        <a href="#" class="container-fluid px-3 d-inline-flex a__unstyled text-white text-nodec">
                                            <img src="<?php ec(!empty($notification['photoUtilisateur']) ?: "assets/images/covoiturage-cci-photo-profil-default-100x100.webp"); ?>" alt="Image de profile" class="profilePic-sm m-2">
                                            <ul class="text-center pt-4">
                                                <li>
                                                    <h3><?php ec($user['nomUtilisateur'] . ' ' . $user['prenomUtilisateur']) ?></h3>
                                                </li>
                                                <li><?php ec($user['distance']) ?>km de chez vous</li>
                                                <li><?php ec($user['nomVille'] . '-' . $user['codePostalVille']) ?></li>
                                            </ul>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <footer>

        <?php require_once base_path('views/components/footer.php'); ?>

    </footer>


    <script src="assets/js/search.js"></script>
</body>
<?php
unset($_SESSION['pagination']);
unset($_SESSION['users']);
?>

</html>