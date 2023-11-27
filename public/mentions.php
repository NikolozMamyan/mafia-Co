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
        <div class="col mb-3 text-center ">
          <h2 class=" color__title">Informations légales sur notre site</h2>
        </div>
        <section class="d-flex justify-content-center align-items-center mb-5 ">
            <div class=" desktop-image ">
                
                <section class='wrapper__s bg__section--lavande p-3'>
                    <div class="container ">
                        <div class="row">       
                            <div class="col-md-12">
                                <div class="contact-info">
                                    <h2>Services de conception web</h2>
                                    <p>Texte sur les services de web design...</p>
                                </div>
                            </div>

                            <!-- Colonne Adresse  -->
                            <div class="col-md-12">
                                <div class="contact-info">
                                    <h2>Services de développement web</h2>
                                    <p>Texte sur les services de développement..</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-info">
                                    <h2>Services d'hébergement web</h2>
                                    <p>exte sur les services d'hébergement...</p>
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

</html>