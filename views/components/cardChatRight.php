
    <?php //foreach ($latestMessages as $message) : ?>
        <li class="d-flex flex-row justify-content-end mb-4">
            <div class="flex-shrink-1 bg__400 colors__offcanvas rounded py-2 px-3 mr-3">
                <div class="font-weight-bold mb-1">You</div>
                <?// $message['content']; ?>
            </div>
            <div>
                <img src="../public/assets/images/portrait.png" class="rounded-circle mr-1" alt="User" width="40" height="40">
                <div class="text-muted small text-nowrap mt-2"><?// $message['dateTimeMessage']->format('h:i a'); ?></div>
            </div>
        </li>
    <?php //endforeach; ?>
