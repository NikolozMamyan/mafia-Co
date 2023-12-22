<!-- signup.php -->

<?php

require_once(__DIR__ . '/../views/headDev.php');
?>

<body>
    <header class=" mb-5 header ">
        <?php
        require_once(__DIR__ . '/../views/header.php');
        ?>
    </header>
    <main>
        <section class="container-fluid ">
            <div class="row ">
                <!-- titre -->
                <div class="col mb-3 text-center ">
                    <h2 class="pb-3 title__signup ">JE M'INSCRIT</h2>
                </div>
            </div>
        </section>
        <div class="container-fluid">

            <form class="border row m-2 d-flex justify-content-md-around">
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
                                <input type="text" class="form-control " id="validationCustom01" value="" required>
                                <span class="invalid-feedback">
                                    Le nom est obligatoire !
                                </span>
                            </div>
                            <!-- prenom -->
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02" class="form-label ps-3">Prénom</label>
                                <input type="text" class="form-control " id="validationCustom02" value="" required>
                                <span class="invalid-feedback">
                                    Le Prénom est obligatoire !
                                </span>
                            </div>
                            <!-- adresse -->
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03" class="form-label ps-3">Adresse</label>
                                <input type="text" class="form-control " id="validationCustom03" required>
                                <span class="invalid-feedback">
                                    L'adresse est obligatoire !
                                </span>
                            </div>
                            <!-- code postal -->
                            <div class="col-md-2  mb-3">
                                <label for="validationCustom02" class="form-label ps-3">CP</label>
                                <input type="text" class="form-control " id="validationCustom02" value="" required>
                                <span class="invalid-feedback">
                                    Le code postal est obligatoire !
                                </span>
                            </div>
                            <!-- ville -->
                            <div class="col-md-4  mb-3">
                                <label for="validationCustom02" class="form-label ps-3">Ville</label>
                                <input type="text" class="form-control " id="validationCustom02" value="" required>
                                <span class="invalid-feedback">
                                    La ville est obligatoire !
                                </span>
                            </div>
                            <!-- telephone -->
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label ps-3">Téléphone</label>
                                <input type="text" class="form-control " id="" value="">

                            </div>
                            <!-- mail -->
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02" class="form-label ps-3">Mail</label>
                                <input type="text" class="form-control " id="validationCustom02" value="" required>
                                <span class="invalid-feedback">
                                    L'adresse email est obligatoire !
                                </span>
                            </div>
                            <!-- mot de passe -->
                            <div class="col-md-6 mb-3">
                                <div class="input-group ">
                                    <label for="password" class="form-label ps-3">Mot de passe</label>
                                    <div class="input-group ">
                                        <input type="password" class="form-control radius__left" id="password" name="password" placeholder="Password" required>
                                        <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span>
                                        <span class="invalid-feedback">
                                            Le mot de passe est invalide !
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <!-- confirm mot de passe -->
                            <div class="col-md-6 mb-3">
                                <div class="input-group ">
                                    <label for="password" class="form-label ps-3">Mot de passe</label>
                                    <div class="input-group ">
                                        <input type="password" class="form-control " id="password" name="password" placeholder="Password" required>
                                        <!-- <span class="input-group-text toggle-password radius__right"><i class="fa fa-eye"></i></span> -->
                                        <span class="invalid-feedback">
                                            Le mot de passe est invalide !
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <!-- role (radio btn) -->
                            <div class="col-md-12 mb-3">

                                <div class="form-check ">

                                    <input type="radio" class="form-check-input" id="validationFormCheck1" name="radio-stacked" required>
                                    <label class="form-check-label" for="validationFormCheck1">Conducteur/Passager</label>

                                </div>
                                <div class="form-check ">
                                    <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                                    <label class="form-check-label" for="validationFormCheck2">Conducteur</label>

                                </div>
                                <div class="form-check ">
                                    <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                                    <label class="form-check-label" for="validationFormCheck3">Passager</label>
                                    <span class="invalid-feedback">
                                        Le choix du role est obligatoire !
                                    </span>
                                </div>

                            </div>
                            <!-- fichier photo -->
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label ps-3">Choisir une photo</label>
                                <input type="file" class="form-control " aria-label="file example" required>
                                <!-- <div class="invalid-feedback">Example invalid form file feedback</div> -->
                            </div>

                            <!-- terme et condition -->
                            <div class="col-md-12 mb-3 ps-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                    <label class="form-check-label " for="invalidCheck2">
                                        Agree to terms and conditions
                                    </label>
                                    <span class="invalid-feedback">
                                        <span class="invalid-feedback">
                                            Le choix du role est obligatoire !
                                        </span>Vous n'avez pas valider les thermes d'utilisation !
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- section itineraire hebdo-->
                <section class="col-md-5 border bg__roundP--100  ">
                    <div class="row mb-3 ">
                        <div class="col-md-5 row">
                            <label class="offset-2 col-10 py-2" for="">Départ</label>
                            <span class='col-2 p-1 d-flex justify-content-center'>
                                <img src="../public/assets/images/flagG.svg" class="flag__style" alt="Drapeau Vert">
                            </span>
                            <input class="col-10 pe-2" value="adresse" name="adresseDepart" disabled>
                        </div>
                        <!-- Fleche arrows-left-right-solid pour desktop -->
                        <div class="col-md-2 d-md-flex justify-content-md-center align-items-md-end d-none d-sm-none d-md-block">
                            <img src="../public/assets/images/arrows-left-right-solid.svg" class='flag__style ' alt="Fleche noire">
                        </div>

                        <!-- Fleche arrows-up-down-solid pour tablette et mobile -->
                        <div class=" col-2  d-flex justify-content-start align-items-md-center d-sm-block d-md-none ">
                            <img src="../public/assets/images/arrows-up-down-solid.svg" class='flag__style mt-3 ms-3' alt="Fleche noire">
                        </div>
                        <div class="col-md-5 row">
                            <label class="offset-2 col-10 py-2" for="">Arrivé</label>
                            <span class='col-2 p-1 d-flex justify-content-center'>
                                <img src="../public/assets/images/flagR.svg" class='flag__style ' alt="Drapeau Rogue">
                            </span>
                            <input class="col-10 " value="adresse" class='' name="adresseArrive" disabled>
                        </div>
                    </div>
                    <!-- checkbox semaine -->
                    <div class="form-group row pb-3 mt-3">
                        <h3 class="d-flex justify-content-center title__h3 mt-2">Choisir les jours de la semaine</h3>
                        <div class="btn-group-toggle d-flex flex-colunm flex-lg-row flex-md-column btn__media justify-content-center pt-md-2" data-toggle="buttons">
                            <label class="btn btn__color m-1">
                                <input type="checkbox" name="days[]" value="lundi" onchange="toggleCheckboxStyle(this)"> Lundi
                            </label>
                            <label class="btn btn__color m-1">
                                <input type="checkbox" name="days[]" value="mardi" onchange="toggleCheckboxStyle(this)"> Mardi
                            </label>
                            <label class="btn btn__color m-1">
                                <input type="checkbox" name="days[]" value="mercredi" onchange="toggleCheckboxStyle(this)"> Mercredi
                            </label>
                            <label class="btn btn__color m-1">
                                <input type="checkbox" name="days[]" value="jeudi" onchange="toggleCheckboxStyle(this)"> Jeudi
                            </label>
                            <label class="btn btn__color m-1">
                                <input type="checkbox" name="days[]" value="vendredi" onchange="toggleCheckboxStyle(this)"> Vendredi
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
                                        <label class="" for="time">Début</label>
                                    </div>
                                    <div class="text-center">
                                        <input class="" type="time" id="time" name="time">
                                    </div>
                                </div>

                                <!-- Deuxième colonne -->
                                <div class="col-6 align-self-start">
                                    <div class="text-center">
                                        <label class="" for="time">Fin</label>
                                    </div>
                                    <div class="text-center">
                                        <input class="" type="time" id="time" name="time">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="">
                                <h3 class="d-flex justify-content-center title__h3 mt-2">Info complémentaire</h3>
                            </div>
                            <div class="row m-2">
                                <textarea name="" id="" cols="30" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- btn annuler -->
                <div class="col-md-4 mb-3 ">
                    <input class="btn w-100 btn-danger rounded-pill label__white" type="reset" value="Annuler">
                </div>
                <!-- btn valider -->
                <div class="offset-md-2 col-md-6 mb-3">
                    <button class="btn w-100 rounded-pill bg__btn--submit label__white" type="submit">Valider</button>
                </div>

                <!-- link login -->
                <div class="link offset-md-6 col-md-6">Déjà inscrit? <a href="login.php">Connectez-vous </a>
                </div>
            </form>


        </div>







    </main>
    <footer>
        <?php
        require_once(__DIR__ . '/../views/footer.php');
        ?>
    </footer>

    <script src="./assets/js/pass-show-hide.js"></script>
    <script src="./assets/js/signup.js"></script>

</body>

</html>