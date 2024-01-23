<!-- notify -->
<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <header class="container">
        <?php require_once base_path('views/components/header.php'); ?>
    </header>
    <main id="main-profil" class="container">
        <h1 class="page-title">Mes notifications</h1>

        <section id="notification" class="col-12">

            <div class="container-fluid ">
                <div class="row ">
                    <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center my-3 px-0">
                        <h2 class="page-title py-3">Notifications</h2>
                    </div>
                </div>


                <div class="row w-100 my-5 ">
                    <?php foreach ($notifications as $key => $notification) : ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 my-2">
                            <div class="bg-P500 rounded">
                                <a href="#" class="container-fluid px-3 d-inline-flex a__unstyled text-white text-nodec">
                                    <img src="../public/assets/images/<?php ec($notification['photoUtilisateur']); ?>" alt="Image de profile" class="profilePic-sm m-2">
                                    <ul class="text-center pt-3">
                                        <li>
                                            <h3><?php ec($notification['nomUtilisateur'] . ' ' . $notification['prenomUtilisateur']); ?></h3>
                                        </li>
                                        <li>est <?php ec($notification['labelRole']); ?></li>
                                        <li>Il est de <?php ec($notification['nomVille'] . '-' . $notification['codePostalVille']); ?></li>
                                        <li>sa résidence est proche de votre domicile</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        </section>

    </main>

    <footer>
        <?php require_once base_path('views/components/footer.php'); ?>
    </footer>


    <script src="../public/assets/js/search.js"></script>
</body>

</html>