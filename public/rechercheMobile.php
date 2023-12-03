<!-- search -->
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
            <div class="col mb-3 bg__nav ">
                <?php require_once(__DIR__ . '/../views/navBar.php'); ?>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center align-items-center mb-5">
        <div class="d-flex row justify-content-center m-0 p-auto desktop-image-profile w-100">
            <section id="recherche" class="col-12">
                <?php
                require_once ('../views/search.php');
                ?>
            </section>
            
            

        </div>
    </div>
</main>
<footer>
    <?php
    require_once(__DIR__ . '/../views/footer.php');
    ?>
</footer>
<br>
<script src="../public/assets/js/search.js"></script>
</body>

</html>