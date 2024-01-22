

    <?php //foreach ($latestMessages as $message) : ?>
        <li class="d-flex flex-row justify-content-start mb-4">
            <div>
                <img src="../public/assets/images/portrait.png" class="rounded-circle mr-1" alt="User" width="40" height="40">
                <div class="text-muted small text-nowrap mt-2"><?// $message['dateTimeMessage']->format('h:i a'); ?></div>
            </div>
            <div class="flex-shrink-1 bg__secondary--500 rounded py-2 px-3 ml-3">
                <div class="mb-1"><?// $message['senderName']; ?></div>
                <?// $message['content']; ?>
            </div>
        </li>
    <?php //endforeach; ?>
