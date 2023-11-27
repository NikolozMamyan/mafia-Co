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
                <div class="col bg__nav mb-2">
                    <?php require_once(__DIR__ . '/../views/navBar.php'); ?>
                </div>
            </div>
        </section>
        <section class="container-fluid ">
            <div class="row  ">
                <!-- titre -->
                <div class="col mb-3 text-center ">
                    <h2 class=" color__title">Mofifier mon profil</h2>
                </div>
            </div>
        </section>

        <section class="d-flex justify-content-center align-items-center mb-5 ">
            <div class=" container d-flex justify-content-center  m-0 p-auto desktop-image ">
                <section class='body_mentions mt-4'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mentions-info">
                                    <h2>Mentions Légales</h2>
                                    <h4>Informations légales sur notre site</h4>
                                    <p>Texte de vos mentions légales...</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mentions-info">
                                    <h2>Web Design</h2>
                                    <h4>Services de conception web</h4>
                                    <p>Texte sur les services de web design...</p>
                                </div>
                            </div>

                            <!-- Colonne Développeur -->
                            <div class="col-md-12">
                                <div class="mentions-info">
                                    <h2>Développeur</h2>
                                    <h4>Services de développement web</h4>
                                    <p>Texte sur les services de développement...</p>
                                </div>
                            </div>

                            <!-- Colonne Hébergeur -->
                            <div class="col-md-12">
                                <div class="mentions-info">
                                    <h2>Hébergeur</h2>
                                    <h4>Services d'hébergement web</h4>
                                    <p>Texte sur les services d'hébergement...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        <footer>
            <?php
            require_once(__DIR__ . '/../views/footer.php');
            ?>
        </footer>
</body>

</html>