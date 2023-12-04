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
                                    <h2>Nos condition général</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dicta, mollitia quod animi necessitatibus quas pariatur aliquam vitae minima voluptas, magnam inventore nostrum reprehenderit rerum eius facilis enim porro? Ex.</p>
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