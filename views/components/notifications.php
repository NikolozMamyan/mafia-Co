    <section class="container-fluid ">
        <div class="row ">

            <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center my-3 px-0">
                <h2 class="page-title py-3">Notifications</h2>
            </div>
        </div>


        <div class="row w-100 my-5 ">
            <?php
            for ($i = 0; $i < 4; $i++) {
                include("../views/notificationCard.php");
            }
            ?>
        </div>
    </section>