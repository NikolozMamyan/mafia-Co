<!-- signup.php -->

<?php

require_once base_path('views/components/headDev.php');
// require_once(__DIR__ . '/../controllers/AuthController.php');

?>

<body id="signupPage">
    <header>

        <?php if ($page === 'register') : ?>
            <h1><img src="assets/images/covoiturage-cci-campus-alsace-logo_defonce-noire.svg" alt="logo cci covoiturage" /></h1>
        <?php else : ?>
            <?php require_once base_path('views/components/header.php'); ?>
        <?php endif ?>
    </header>
    <main>
        <section class="container-fluid ">
            <div class="row ">
                <!-- titre -->
                <div class="col mb-3 text-center ">
                    <h2 class="pb-3 title__signup "><?php echo ($title) ?></h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">

            <form class="form__signup border row m-2 d-flex justify-content-md-around" action="<?php routeEcho($page === 'register' ? 'register.store' : 'modifySignup.update') ?>" method="POST" enctype="multipart/form-data">
                <input type="number" step="any" id="lat" name="latitude" value="<?php ec(isset($point) ? $point->getLatitude() : ''); ?>" hidden>
                <input type="number" step="any" id="lon" name="longitude" value="<?php ec(isset($point) ? $point->getLongitude() : ''); ?>" hidden>
                <!-- btn close -->

                <div class="offset-sm-11 offset-10 col-sm-1 col-2 pt-md-2 mb-3 d-sm-flex justify-content-end">
                    <button type="button" class="btn-close bg__btn--close " aria-label="Close"></button>
                </div>
                <!-- section utilisateur-->
                <section class=" col-md-5 border bg__roundP--100  ">
                    <div class="container-fluid">
                        <div class="row mt-2">
                            <!-- nom -->
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01" class="form-label ps-3">Nom</label>
                                <input type="text" class="form-control " id="validationCustom01" name="firstName" value="<?php ec(isset($user) ? $user->getNomUtilisateur() : ''); ?>" required>
                                <span class="invalid-feedback">
                                    Le nom est obligatoire !
                                </span>
                            </div>
                            <!-- prenom -->
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02" class="form-label ps-3">Prénom</label>
                                <input type="text" class="form-control " id="validationCustom02" name="lastName" value="<?php ec(isset($user) ? $user->getPrenomUtilisateur() : ''); ?>" required>
                                <span class="invalid-feedback">
                                    Le Prénom est obligatoire !
                                </span>
                            </div>
                            <!-- adresse -->
                            <div class="col-md-6 mb-3">
                                <label for="Adresse" class="form-label ps-3">Adresse</label>
                                <input type="text" class="form-control " id="Adresse" name="address" value="<?php ec(isset($user) ? $user->getAdresseUtilisateur() : ''); ?>" required>
                                <span class="invalid-feedback">
                                    L'adresse est obligatoire !
                                </span>
                            </div>
                            <!-- code postal -->
                            <div class="col-md-2  mb-3">
                                <label for="CP" class="form-label ps-3">CP</label>
                                <input type="text" class="form-control " id="CP" name="zip" value="<?php ec(isset($point) ? $point->getCodePostalVille() : ''); ?>" required>
                                <span class="invalid-feedback">
                                    Le code postal est obligatoire !
                                </span>
                            </div>
                            <!-- ville -->
                            <div class="col-md-4  mb-3">
                                <label for="Ville" class="form-label ps-3">Ville</label>
                                <input type="text" class="form-control " id="Ville" name="city" value="<?php ec(isset($point) ? $point->getNomVille() : ''); ?>" required>
                                <span class="invalid-feedback">
                                    La ville est obligatoire !
                                </span>
                            </div>
                            <!-- telephone -->
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label ps-3">Téléphone</label>
                                <input type="text" class="form-control " id="" name="tel" value="<?php ec(isset($user) ? $user->getTelUtilisateur() : ''); ?>">

                            </div>
                            <!-- mail -->
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02" class="form-label ps-3">Mail</label>
                                <input type="text" class="form-control " id="validationCustom02" name="email" value="<?php ec(isset($user) ? $user->getEmailUtilisateur() : ''); ?>" required>
                                <span class="invalid-feedback">
                                    L'adresse email est obligatoire !
                                </span>
                            </div>
                            <!-- mot de passe -->
                            <div class="col-md-6 ">
                                <div class="input-group ">
                                    <label for="your-password">Votre<?php ec($page === 'modify' ? ' nouveau ' : ' ') ?>mot de passe
                                        <input type="password" id="your-password" name="password" placeholder="Entrez ici votre mot de passe" />
                                        <button id="show-hide-password-signup"><i class="covoiturage-eye"></i></button>
                                    </label>
                                </div>
                            </div>
                            <!-- confirm mot de passe -->
                            <div class="col-md-6 ">
                                <div class="input-group ">
                                    <label for="your-confirm">Confirmez votre<?php ec($page === 'modify' ? ' nouveau ' : ' ') ?>mot de passe
                                        <input type="password" id="your-confirm" name="password-confirm" placeholder="Confirmé votre mot de passe" />
                                        <button id="show-hide-password"></button>
                                    </label>

                                </div>
                            </div>
                            <!-- role (radio btn) -->
                            <div class="col-md-12 mb-3">

                                <div class="form-check ">

                                    <input type="radio" class="form-check-input" id="validationFormCheck1" name="radio-stacked" value="Conducteur / Passager" <?php isset($role) ? ec($role === 'Conducteur / Passager' ? 'checked' : '') : '' ?> required>
                                    <label class="form-check-label" for="validationFormCheck1">Conducteur/Passager</label>

                                </div>
                                <div class="form-check ">
                                    <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" value="Conducteur" <?php isset($role) ? ec($role === 'Conducteur' ? 'checked' : '') : '' ?> required>
                                    <label class="form-check-label" for="validationFormCheck2">Conducteur</label>

                                </div>
                                <div class="form-check ">
                                    <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" value="Passager" <?php isset($role) ? ec($role === 'Passager' ? 'checked' : '') : '' ?> required>
                                    <label class="form-check-label" for="validationFormCheck3">Passager</label>
                                    <span class="invalid-feedback">
                                        Le choix du role est obligatoire !
                                    </span>
                                </div>

                            </div>
                            <!-- fichier photo -->
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label ps-3">Choisir une photo</label>
                                <input type="file" class="form-control " name="photo" aria-label="file example" value="<?php ec(isset($user) ? $user->getPhotoUtilisateur() : ''); ?>">
                                <!-- <div class="invalid-feedback">Example invalid form file feedback</div> -->
                            </div>

                            <!-- terme et condition -->
                            <?php if ($page === 'register') : ?>
                                <div class="col-md-12 mb-3 ps-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="CGU" value="yes" id="invalidCheck2" required>
                                        <label class="form-check-label " for="invalidCheck2">
                                            Accepter les termes et <a href="conditionsGeneral.php">conditions générals d'utilisation</a>
                                        </label>
                                        <span class="invalid-feedback">
                                            <span class="invalid-feedback">
                                                Le choix du role est obligatoire !
                                            </span>Vous n'avez pas valider les thermes d'utilisation !
                                        </span>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </section>
                <!-- section itineraire hebdo-->
                <section class="col-md-5 border bg__roundP--100  ">
                    <div class="row mb-3 ">
                        <h3 class="d-flex justify-content-center title__h3 mt-2">Votre point de départ et d'arrivé</h3>
                        <div class="col-md-5 row">
                            <label class="offset-2 col-10 py-2" for="">Départ</label>
                            <span class='col-2 p-1 d-flex justify-content-center'>
                                <img src="assets/images/flagG.svg" class="flag__style" alt="Drapeau Vert">
                            </span>
                            <input class="col-10 pe-2" value="adresse" name="adresseDepart" disabled>
                        </div>
                        <!-- Fleche arrows-left-right-solid pour desktop -->
                        <div class="col-md-2 d-md-flex justify-content-md-center align-items-md-end d-none d-sm-none d-md-block">
                            <img src="assets/images/arrows-left-right-solid.svg" class='flag__style ' alt="Fleche noire">
                        </div>

                        <!-- Fleche arrows-up-down-solid pour tablette et mobile -->
                        <div class=" col-2  d-flex justify-content-start align-items-md-center d-sm-block d-md-none ">
                            <img src="assets/images/arrows-up-down-solid.svg" class='flag__style mt-3 ms-3' alt="Fleche noire">
                        </div>
                        <div class="col-md-5 row">
                            <label class="offset-2 col-10 py-2" for="">Arrivé</label>
                            <span class='col-2 p-1 d-flex justify-content-center'>
                                <img src="assets/images/flagR.svg" class='flag__style ' alt="Drapeau Rogue">
                            </span>
                            <input class="col-10 " value="adresse" class='' name="adresseArrive" disabled>
                        </div>
                    </div>

                    <!-- checkbox semaine -->
                    <div class="form-group row pb-3 mt-3">
                        <h3 class="d-flex justify-content-center title__h3 mt-2">Choisir les jours de la semaine</h3>
                        <div class="btn-group-toggle d-flex flex-colunm flex-lg-row flex-md-column btn__media justify-content-center pt-md-2" data-toggle="buttons">
                            <label class="btn btn__color m-1 <?php isset($joursSemaine) ? ec(in_array('Lun', $joursSemaine) ? 'checked' : '') : '' ?>">
                                <input type="checkbox" name="days[]" value="lundi" onchange="toggleCheckboxStyle(this)" <?php isset($joursSemaine) ? ec(in_array('Lun', $joursSemaine) ? 'checked' : '') : '' ?>> Lundi
                            </label>
                            <label class="btn btn__color m-1 <?php isset($joursSemaine) ? ec(in_array('Mar', $joursSemaine) ? 'checked' : '') : '' ?>">
                                <input type="checkbox" name="days[]" value="mardi" onchange="toggleCheckboxStyle(this)" <?php isset($joursSemaine) ? ec(in_array('Mar', $joursSemaine) ? 'checked' : '') : '' ?>> Mardi
                            </label>
                            <label class="btn btn__color m-1 <?php isset($joursSemaine) ? ec(in_array('Mer', $joursSemaine) ? 'checked' : '') : '' ?>">
                                <input type="checkbox" name="days[]" value="mercredi" onchange="toggleCheckboxStyle(this)" <?php isset($joursSemaine) ? ec(in_array('Mer', $joursSemaine) ? 'checked' : '') : '' ?>> Mercredi
                            </label>
                            <label class="btn btn__color m-1 <?php isset($joursSemaine) ? ec(in_array('Jeu', $joursSemaine) ? 'checked' : '') : '' ?>">
                                <input type="checkbox" name="days[]" value="jeudi" onchange="toggleCheckboxStyle(this)" <?php isset($joursSemaine) ? ec(in_array('Jeu', $joursSemaine) ? 'checked' : '') : '' ?>> Jeudi
                            </label>
                            <label class="btn btn__color m-1 <?php isset($joursSemaine) ? ec(in_array('Ven', $joursSemaine) ? 'checked' : '') : '' ?>">
                                <input type="checkbox" name="days[]" value="vendredi" onchange="toggleCheckboxStyle(this)" <?php isset($joursSemaine) ? ec(in_array('Ven', $joursSemaine) ? 'checked' : '') : '' ?>> Vendredi
                            </label>
                        </div>
                        <!-- time picker -->
                        <div class="row mt-3">
                            <div class="">
                                <h3 class="d-flex justify-content-center title__h3 mt-2">Choisir heure de cours</h3>
                            </div>
                            <div class="form-group row ">
                                <!-- Première colonne -->
                                <div class="col-6 align-self-end ">
                                    <div class="text-center">
                                        <label class="" for="timeStart">Début</label>
                                    </div>
                                    <div class="text-center">
                                        <input class="" type="time" id="timeStart" name="timeStart" value="<?php ec(isset($itineraire) ? $itineraire->getDebutCours() : ''); ?>">
                                    </div>
                                </div>

                                <!-- Deuxième colonne -->
                                <div class="col-6 align-self-start">
                                    <div class="text-center">
                                        <label class="" for="timeEnd">Fin</label>
                                    </div>
                                    <div class="text-center">
                                        <input class="" type="time" id="timeEnd" name="timeEnd" value="<?php ec(isset($itineraire) ? $itineraire->getFinCours() : ''); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="">
                                <h3 class="d-flex justify-content-center title__h3 mt-2">Info complémentaire</h3>
                            </div>
                            <div class="row m-2">
                                <textarea name="comment" id="" cols="30" rows="6"><?php ec(isset($itineraire) ? $itineraire->getInfoComplementaire() : ''); ?></textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- btn annuler -->
                <div class="col-md-5 col-12 d-flex justify-content-md-start mt-3 ">
                    <input class="btn btn-danger btn__btn--submit " type="reset" value="Annuler">
                </div>
                <!-- btn valider -->
                <div class="col-md-5 col-12 d-flex justify-content-md-end my-3">
                    <input class="btn btn__btn--submit bg__btn--submit " type="submit" value="Valider">
                </div>

                <!-- link login -->
                <div class="link offset-md-10 col-md-2 mb-5">Déjà inscrit? <a href="<?php routeEcho('login'); ?>">Connectez-vous </a>
                </div>
            </form>

        </div>

    </main>
    <footer>
    <a href="<?php routeEcho('conditionIndex'); ?>">Conditions générales d'utilisation</a> • <a href="<?php routeEcho('mentionIndex'); ?>">Mentions légales</a> • © CCI Covoiturage 2023
    </footer>
    </footer>


    <script src="assets/js/pass-show-hide.js"></script>
    <script src="assets/js/signup.js"></script>

</body>

</html>