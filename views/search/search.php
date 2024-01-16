<!-- search -->
<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <header class="container">

        <?php require_once base_path('views/components/header.php'); ?>

    </header>
    <main id="main-profil" class="container">
        <h1 class="page-title">Mes recherches et notifications</h1>
        <section id="recherche" class="col-12 ">

            <?php require_once base_path('views/components/search.php'); ?>

        </section>
    </main>

    <footer>
        
        <?php require_once base_path('views/components/footer.php'); ?>
        
    </footer>


    <script src="../public/assets/js/search.js"></script>
</body>

</html>