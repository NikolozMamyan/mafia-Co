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
        <section class="d-flex justify-content-center align-items-center mb-5 ">
            <div class="  desktop-image ">
                <section class='body_contact mt-4'>
                    <div class="container ">
                        <div class="row">
                            <!-- Colonne Email -->
                            <div class="col-md-4">
                                <div class="contact-info">
                                    <h2>Email</h2>
                                    <h4>Contactez-nous</h4>
                                    <p>Email : contact@exemple.com</p>
                                </div>
                            </div>

                            <!-- Colonne Téléphone -->
                            <div class="col-md-4">
                                <div class="contact-info">
                                    <h2>Téléphone</h2>
                                    <h4>Contactez-nous</h4>
                                    <p>Téléphone : +33 1 23 45 67 89</p>
                                </div>
                            </div>

                            <!-- Colonne Adresse  -->
                            <div class="col-md-4">
                                <div class="contact-info">
                                    <h2>Adresse</h2>
                                    <h4>Contactez-nous</h4>
                                    <p>Adresse : 123 Rue de l'Exemple, Ville, Pays</p>
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