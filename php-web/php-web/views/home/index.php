<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/app.css">
    <title>Home</title>
</head>
<body>
    <?php require_once base_path('views/components/menu.php'); ?>
    <?php displayErrorsAndMessages() ?>

    <h4>Home !</h4>
    <p>Bonjour, <?php echo Auth::getCurrentUser()['name']; ?></p>

    <?php require_once base_path('views/components/footer.php'); ?>
</body>
</html>
