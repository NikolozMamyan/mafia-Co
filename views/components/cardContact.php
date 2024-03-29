
    <?php //foreach ($userContacts as $contact) : ?>
        <li class="list-group-item p-0">
            <div class="card bg__card--passager">
                <div class="row g-0">
                    <div class="col-3 d-flex align-items-center px-2">
                        <img src="../public/assets/images/portrait.png" class="img-fluid rounded-start reduced-image-size" alt="...">
                    </div>
                    <div class="col-9  p-0">
                        <div class="card-body row p-0 g-0">
                            <h2 class="card-title m-0 col-12 title__card--h2">
                                <span class="text-truncate reduced-text-size"><? //$contact['contactName']; ?></span>
                            </h2>
                            <p class="card-text col-10">
                                <small class="text text-truncate reduced-text-size">
                                    <?//$contact['contactCity']; ?>
                                </small>
                            </p>
                            <button type="button" class="btn btn-danger col-2 p-0 ">
                                <i class="fa fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <?php //endforeach; ?>
