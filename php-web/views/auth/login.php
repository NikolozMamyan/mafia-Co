<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/app.css">
    <title>Login</title>
</head>
<body>
    <?php require_once base_path('views/components/menu.php'); ?>
    <?php displayErrorsAndMessages() ?>

    <form action="<?php ec($actionUrl); ?>" method="POST">
        <input type="text" name="action" value="check" hidden>

        <label for="input-login">E-mail</label>
        <input type="text" name="login" id="input-login">
        <br>

        <label for="input-password">Mot de passe</label>
        <input type="password" name="password" id="input-password">
        <br>

        <input type="submit" value="Se connecter">
    </form>

    <?php require_once base_path('views/components/footer.php'); ?>
</body>

</html>
