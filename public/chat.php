<!-- chat.php -->

<?php

require_once(__DIR__ . '/../views/headDev.php');
?>

<body class="body__chat">
    <header class=" container ">
        <?php
        require_once(__DIR__ . '/../views/header.php');

        ?>
    </header>
    <main id="chatBox" class="container">
        <h1 class="page-title">Ma messagerie</h1>
        
        <section class="d-flex justify-content-center align-items-center mb-5">
            <div class="container d-flex justify-content-center g-0 m-0 p-auto desktop-image">

                <div class="container-fluid container__border">
                    <div class="row g-0">
                        <!-- Colonne des contacts à gauche -->
                        <div class="col-md-3 d-none d-md-block contact__colunm ">
                            <div class="card rounded-0 card__border--none ">
                                <div class="card-header bg__offCanvas h__title--card">
                                    <h2 class="colors__offcanvas">Contacts</h2>
                                </div>
                                <div class="card-body container__border">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Contenu resutat recherche contact -->
                                    <span class="card-text p-0 m-0"><small class="text-muted">Resultat</small></span>
                                    <ul class="list-group">
                                        <?php

                                        for ($i = 0; $i < 3; $i++) {
                                            include('../views/cardSearchContact.php');
                                        }
                                        ?>
                                    </ul>
                                    <!-- Contenu liste contact -->
                                    <span class="card-text p-0 m-0"><small class="text-muted">Mes contact</small></span>
                                    <ul class="list-group">
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
                        <div class="col-md-6 chat__colunm ">
                            <div class=" card rounded-0 ">
                                <div class="card-header bg__100 h__title--card">

                                    <!-- Boutons d'icônes pour ouvrir les offcanvas sur mobile -->
                                    <div class=" d-md-none text-end">
                                        <button type="button" class="btn " data-bs-toggle="offcanvas" data-bs-target="#contactsOffcanvas">
                                            <i class="fas fa-address-card"></i>
                                        </button>
                                        <button type="button" class="btn " data-bs-toggle="offcanvas" data-bs-target="#notificationsOffcanvas">
                                            <i class="fas fa-sms"></i>

                                        </button>
                                    </div>
                                </div>

                                <div class="card-body card__body--chat" id="messageList">
                                    <ul class="list-group   " id="messageContainer">
                                        <?php
                                        include('../views/cardChatRight.php');
                                        include('../views/cardChatLeft.php');
                                        include('../views/cardChatRight.php');
                                        include('../views/cardChatLeft.php');
                                        include('../views/cardChatRight.php');
                                        include('../views/cardChatLeft.php');

                                        ?>

                                    </ul>

                                    <!-- Offcanvas pour les contact -->
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="contactsOffcanvas" aria-labelledby="contactsOffcanvasLabel">
                                        <div class="offcanvas-header">
                                            <h2 class="offcanvas-title" id="contactsOffcanvasLabel">Contacts</h2>

                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body ">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Search">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Contenu resutat recherche contact -->
                                            <span class="card-text p-0 m-0"><small class="text-muted">Resultat</small></span>
                                            <ul class="list-group">
                                                <?php

                                                for ($i = 0; $i < 3; $i++) {
                                                    include('../views/cardSearchContact.php');
                                                }
                                                ?>
                                            </ul>
                                            <!-- Contenu liste contact -->
                                            <span class="card-text p-0 m-0"><small class="text-muted">Mes contact</small></span>
                                            <ul class="list-group">
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
                                            <h2 class="offcanvas-title" id="notificationsOffcanvasLabel">Messages</h2>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body ">
                                            <!-- Contenu des notifications ici -->
                                            <ul class="list-group ">
                                                <span class="card-text p-0 m-0"><small class="text-muted">date messages recent</small></span>

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
                                    <form action="#" class="input-group d-flex justify-content-center ">

                                        <input type="text" class="incoming_id" name="incoming_id" value="" hidden>

                                        <input type="text" name="message" class="width__90 radius__left" placeholder="Type a message here..." autocomplete="off">
                                        <span class="input-group-text toggle-password radius__right"><i class="fab fa-telegram-plane"></i></span>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne des notifications à droite -->
                        <div class="col-md-3 d-none d-md-block notify--mesages__colunm ">
                            <div class="card rounded-0 card__border--none">
                                <div class="card-header bg__offCanvas h__title--card">
                                    <h2 class="colors__offcanvas">Messages</h2>
                                </div>
                                <div class="card-body container__border">
                                    <!-- Contenu des notifications ici -->
                                    <span class="card-text p-0 m-0"><small class="text-muted">date messages recent</small></span>
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
    <script src="./assets/js/chat.js"></script>
</body>

</html>