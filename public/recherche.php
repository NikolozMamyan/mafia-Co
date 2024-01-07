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
        <h1 class="page-title">Mes recherches et notifications</h1>
        <section id="recherche" class="col-12 ">
            <?php
            require_once('../views/search.php');
            ?>
        </section>



    </main>

    <footer>
        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>


    <script src="../public/assets/js/search.js"></script>
</body>

</html>