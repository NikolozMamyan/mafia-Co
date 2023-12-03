    <section class="container-fluid ">
        <div class="row ">
            <!-- titre -->
            <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center my-3 px-0">
                <h2 class="bg-P500 pb-1">Notifications</h2>
            </div>
        </div>
    </section>

            <div class="row w-100 ms-1 ">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    include("../views/notificationCard.php");
                }
                ?>
            </div>
