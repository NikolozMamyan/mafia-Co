<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/app.css">
    <title>Register</title>
</head>
<body>
    <?php require_once base_path('views/components/menu.php'); ?>
    <?php displayErrorsAndMessages() ?>

    <form action="<?php ec($actionUrl) ?>" method="POST">
        <input type="text" name="action" value="store" hidden>

        <label for="input-name">Name</label>
        <input type="text" name="name" id="input-name" value="<?php echo old('name') ?>">
        <br>

        <label for="input-login">E-mail</label>
        <input type="text" name="login" id="input-login" value="<?php echo old('login') ?>">
        <br>

        <label for="input-password">Mot de passe</label>
        <input type="password" name="password" id="input-password" value="<?php echo old('password') ?>">
        <br>

        <input type="submit" value="S'inscrire">
    </form>

    <?php require_once base_path('views/components/footer.php'); ?>
</body>

</html>
