            <div class="container-fluid">
                <div class="row mt-5">
                    <div>
                        <?php
                        require_once("../views/searchBar.php");
                        ?>
                    </div>

                    <div class="col-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4 text-center my-3 px-0">
                        <h2 class="page-title py-3">Résultats</h2>
                    </div>
                    <div class="row w-100 my-5">
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                            include("../views/searchResultCard.php");
                        }
                        ?>
                    </div>
                </div>
            </div>