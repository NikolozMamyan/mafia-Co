<!DOCTYPE html>
<html lang="en">
<head>
    <title>My notes</title>
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>
    <?php require_once base_path('views/components/menu.php'); ?>
    <?php displayErrorsAndMessages() ?>

    <h2>Nota !</h2>

    <form action="" method="GET">
        <label for="pagination">Note par page: </label>
        <select name="pagination" id="pagination">
            <option value="5" <?php ec($pagination == 5 ? 'selected' : '') ?>>5</option>
            <option value="10" <?php ec($pagination == 10 ? 'selected' : '') ?>>10</option>
            <option value="15" <?php ec($pagination == 15 ? 'selected' : '') ?>>15</option>
        </select>
        <br>
        <input type="submit" value="Rafraichir">
    </form>
    <br>
    <br>

    <?php
    foreach ($notes as $note) {
        echo 'Titre : '.e($note['title']).'<br>';
        echo 'Texte :<br>'.e($note['text']).'<br><br>';
    }

    if ($page > 1) {
        echo '<a class="m-2" href="/notes.php?page='.($page - 1).'">Précédent</a>';
    }

    for ($i = 1; $i <= $maxPage; $i++) {
        echo '<a class="m-2"  href="/notes.php?page='.$i.'">'
        .($i == $page ? '<span class="bold f-2">'.$i.'</span>' : $i)
        .'</a>';
    }

    if ($page < $maxPage) {
        echo '<a class="m-2"  href="/notes.php?page='.($page + 1).'">Suivant</a>';
    }
    ?>

    <br>

    <h2>Ajouter une note:</h2>
    <form action="<?php ec($actionUrl) ?>" method="POST">
        <input type="text" name="action" value="store" hidden>

        <label for="title">Titre</label>
        <input id="title" type="text" name="title">

        <br>
        <label for="text">Contenu</label>
        <textarea id="text" name="text" id="" cols="30" rows="10"></textarea>

        <br>
        <input type="submit" value="Envoyer">
    </form>

    <?php require_once base_path('views/components/footer.php'); ?>
</body>
</html>