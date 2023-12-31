<!-- chat.php -->

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
        <section class="d-flex justify-content-center align-items-center mb-5">
            <div class="container d-flex justify-content-center m-0 p-auto desktop-image">

                <div class="container-fluid custom-height ">
                    <div class="row g-0">
                        <!-- Colonne des contacts à gauche -->
                        <div class="col-md-3 d-none d-md-block contact__colunm">
                            <div class="card rounded-0 custom-heigth ">
                                <div class="card-header bg__offCanvas">
                                    <h6 class="colors__offcanvas">Contacts</h6>
                                </div>
                                <div class="card-body bg__100 p-0">
                                    <!-- Contenu des contacts ici -->
                                    <ul class="list-group bg__100">

                                        <?php

                                        for ($i = 0; $i < 3; $i++) {
                                            include('../views/cardContact.php');
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne du chat au milieu -->
                        <div class="col-md-6 chat__colunm">
                            <div class=" card rounded-0 custom-heigth">
                                <div class="card-header bg__100 h__title--card">

                                    <!-- Boutons d'icônes pour ouvrir les offcanvas sur mobile -->
                                    <div class=" d-md-none text-end">
                                        <button type="button" class="btn " data-bs-toggle="offcanvas" data-bs-target="#contactsOffcanvas">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button type="button" class="btn " data-bs-toggle="offcanvas" data-bs-target="#notificationsOffcanvas">
                                            <i class="fas fa-bell"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item ">Message 1</li>
                                        <li class="list-group-item">Message 2</li>
                                        <!-- Ajoutez d'autres messages selon vos besoins -->
                                    </ul>

                                    <!-- Offcanvas pour les contact -->
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="contactsOffcanvas" aria-labelledby="contactsOffcanvasLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="contactsOffcanvasLabel">Contacts</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <!-- Contenu des contact ici -->
                                            <ul class="list-group bg__100">
                                                <?php

                                                for ($i = 0; $i < 3; $i++) {
                                                    include('../views/cardContact.php');
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Offcanvas pour les notifications -->
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="notificationsOffcanvas" aria-labelledby="notificationsOffcanvasLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="notificationsOffcanvasLabel">Notifications</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body ">
                                            <!-- Contenu des notifications ici -->
                                            <ul class="list-group ">
                                                <p class="card-text p-0 m-0"><small class="text-muted">date complete</small></p>

                                                <?php

                                                for ($i = 0; $i < 3; $i++) {
                                                    include('../views/cardNotifyContact.php');
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg__input--chat">
                                    <form action="#" class="input-group  ">
                                        <input type="text" class="incoming_id" name="incoming_id" value="" hidden>

                                        <input type="text" name="message" class="width__90 radius__left" placeholder="Type a message here..." autocomplete="off">
                                        <span class="input-group-text toggle-password radius__right"><i class="fab fa-telegram-plane"></i></span>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne des notifications à droite -->
                        <div class="col-md-3 d-none d-md-block notify--mesages__colunm">
                            <div class="card rounded-0 custom-heigth">
                                <div class="card-header bg__offCanvas">
                                    <h6 class="colors__offcanvas">Notifications</h6>
                                </div>
                                <div class="card-body bg__100">
                                    <!-- Contenu des notifications ici -->
                                    <p class="card-text p-0 m-0"><small class="text-muted">date complete</small></p>
                                    <ul class="list-group">
                                        <?php

                                        for ($i = 0; $i < 3; $i++) {
                                            include('../views/cardNotifyContact.php');
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

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