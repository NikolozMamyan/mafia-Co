<?php

require_once(__DIR__ . '/../views/headDev.php');
?>

<body>
    <header class=" header header__onePage">
        <?php
        require_once(__DIR__ . '/../views/header.php');

        ?>
    </header>

    <main class="main__onePage">
        <section class="container-fluid navBar__onePage ">
            <div class="row  ">
                <!-- menu -->
                <div class="col bg__nav mb-2 ">
                    <?php require_once(__DIR__ . '/../views/navBar.php'); ?>
                </div>
            </div>
        </section>
        <div class="col mb-3 text-center ">
            <h2 class=" color__title title__onePage">Services</h2>
        </div>


        <!-- Section Web Design -->
        <section id="web-design-1" class=" section__onePage">
            <div class="container">
                <h2>Web Design</h2>
                <p>Votre contenu pour la section Web Design.</p>
            </div>
        </section>

        <!-- Section Web Design -->
        <section id="web-design-2" class=" section__onePage">
            <div class="container">
                <h2>Web Design</h2>
                <p>Votre contenu pour la section Web Design.</p>
            </div>
        </section>
        <!-- Section Web Design -->
        <section id="web-design-3" class=" section__onePage">
            <div class="container">
                <h2>Web Design</h2>
                <p>Votre contenu pour la section Web Design.</p>
            </div>
        </section>

    </main>
    <footer class="footer__onePage">
        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>
    <script src="./assets/js/onePage.js"></script>
</body>

</html>