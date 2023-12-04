<?php
require_once(__DIR__ . '/../views/headDev.php');

?>
</head>

<body>
    <header class="header">
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
        <div class="col mb-3 text-center ">
          <h2 class=" color__title">A propos de nous </h2>
        </div>
        <section class="d-flex justify-content-center align-items-center mb-5 ">
            <div class=" desktop-image ">
                <section class='wrapper__s bg__section--lavande p-3'>
                    <div class="container ">
                        <div class="row">
                            <!-- Colonne Email -->
                            <div class="col-md-12">
                                <div class="contact-info">
                                <h2>CCI campus Alsace</h2>
                                    <p>Bienvenue sur notre applications web! 
                                        Nous sommes une équipe d'étudiants du CCI Campus Strasbourg,
                                         engagés dans une formation avancée en développement web, 
                                         spécialisée en PHP Symfony,à un niveau Bac+3/4.</p>
                                </div>
                            </div>

                            <!-- Colonne Téléphone -->
                            <div class="col-md-12">
        <div class="contact-info">
            <h2>Notre Équipe</h2>

            <div class="team-member">
                <p><strong>Thomas Weber:</strong> Leader visionnaire, Thomas apporte son expertise technique et son enthousiasme à notre équipe. Passionné par les dernières technologies, il excelle dans la création de solutions web innovantes.</p>
            </div>

            <div class="team-member">
                <p><strong>Pascal Petrovic:</strong> Le cerveau analytique de l'équipe, Pascal excelle dans la résolution de problèmes complexes. Sa capacité à aborder les défis avec créativité et rigueur fait de lui un atout précieux pour notre équipe.</p>
            </div>

            <div class="team-member">
                <p><strong>Nikoloz Mamyan:</strong> Spécialiste du design et de l'expérience utilisateur, Nikoloz apporte une touche artistique à nos projets. Sa sensibilité esthétique et son engagement envers une interface utilisateur intuitive sont essentiels pour créer des applications web exceptionnelles.</p>
            </div>
        </div>
    </div>


                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
    <footer>

        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>
</body>