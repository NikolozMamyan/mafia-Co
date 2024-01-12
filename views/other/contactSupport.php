<!-- contactSupport-->
<?php require_once base_path('views/components/headDev.php'); ?>

<body>
    <header class="container">

    <?php require_once base_path('views/components/header.php'); ?>

    </header>
    <main id="main-profil" class="container">
        <h1 class="page-title">Nous contacter</h1>

        <div class="container px-5 my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-3 shadow-lg">
                        <div class="card-body p-4">


                            <form id="contactForm" >
                                <div class="form-floating my-3">
                                    <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                                    <label for="name">Votre nom</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                </div>

                                <div class="form-floating my-3">
                                    <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                    <label for="emailAddress">Votre adresse mail</label>
                                    <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                                </div>

                                <div class="form-floating my-3">
                                    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
                                    <label for="message">Votre message</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                                </div>

                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        <p>To activate this form, sign up at</p>
                                    </div>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <footer>
         <?php require_once base_path('views/components/footer.php'); ?>
    </footer>


    <script src="../public/assets/js/search.js"></script>
</body>

</html>