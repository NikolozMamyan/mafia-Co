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
            <h2 class=" color__title">Contactez nous</h2>
        </div>

        <section class="d-flex justify-content-center align-items-center mb-5 ">
            <div class=" desktop-image ">
                <section class='wrapper__s bg__section--lavande p-5 contact-info'>
                    <div class="container ">
                        <div class="row">
                            <!-- Formulaire de contact -->
                            <div class="col-md-12 ">
                                <h2>Contactez notre équipe</h2>
                                <form action="" method="post">
                                    <div class="form-group mt-5">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group mt-5">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group mt-5">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn__bg-s600  mt-5">Envoyer</button>
                                </form>
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
