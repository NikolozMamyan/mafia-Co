<!DOCTYPE html>
<html lang="en">
<head>
    <title>Les produits</title>
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>
<?php require_once base_path('views/components/menu.php'); ?>
<?php displayErrorsAndMessages() ?>

<h2>Produits !</h2>


<a href="/product-create.php">Créer un produit</a>
<br>
<br>

<form action="" method="GET">
    <label for="pagination">Produit par page: </label>
    <select name="pagination" id="pagination">
        <option value="5" <?php ec($pagination == 5 ? 'selected' : '') ?>>5</option>
        <option value="10" <?php ec($pagination == 10 ? 'selected' : '') ?>>10</option>
        <option value="15" <?php ec($pagination == 15 ? 'selected' : '') ?>>15</option>
    </select>

    <br>
    <label for="search">Rechercher: </label>
    <input id="search" type="text" name="search" value="<?php ec($searchField) ?>">

    <br>
    <label for="display_disable">Afficher les produits désactivés ?</label>
    <input type="checkbox"
           name="display_disable"
           id="display_disable"
           <?php ec($displayDisable ? 'checked' : '') ?>
    >

    <br>
    <input type="submit" value="Rafraichir">
</form>
<br>
<br>

<?php

// Table
echo '<table class="table">';
echo '<tr>';
echo '<th>Id</th>';
echo '<th>Label</th>';
echo '<th>Description</th>';
echo '<th>Marque</th>';
echo '<th>Prix TTC</th>';
echo '<th>Prix HT</th>';
echo '<th>TVA</th>';
echo '<th>Quantité</th>';
echo '<th>Créé le</th>';
echo '<th>Actions</th>';
echo '</tr>';
foreach ($products as $product) {
    echo '<tr>';
    echo '<td>'.$product->getId().'</td>';
    echo '<td>'.$product->getLabel().'</td>';
    echo '<td>'.$product->getDescription().'</td>';
    echo '<td>'.$product->getBrand().'</td>';
    echo '<td>'.$product->getPriceTTC().'</td>';
    echo '<td>'.$product->getPriceHT().'</td>';
    echo '<td>'.$product->getVat().'</td>';
    echo '<td>'.$product->getQuantity().'</td>';
    echo '<td>'.$product->getCreatedAt().'</td>';
    echo '<td>';
    echo '<div><a href="/product-show.php?id='.$product->getId().'">Voir</a></div>';
    echo '<div><a href="/product-edit.php?id='.$product->getId().'">Modifier</a></div>';
    ?>
    <form action="<?php ec($actionUrl) ?>" method="POST">
        <input type="text" name="action" value="delete" hidden>
        <input type="text" name="id" value="<?php ec($product->getId()) ?>" hidden>
        <input type="submit" value="Supprimer">
    </form>
    <?php
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

if ($page > 1) {
    echo '<a class="m-2" href="/products.php?page='.($page - 1).'">Précédent</a>';
}

for ($i = 1; $i <= $maxPage; $i++) {
    echo '<a class="m-2"  href="/products.php?page='.$i.'">'
        .($i == $page ? '<span class="bold f-2">'.$i.'</span>' : $i)
        .'</a>';
}

if ($page < $maxPage) {
    echo '<a class="m-2"  href="/products.php?page='.($page + 1).'">Suivant</a>';
}
?>

<?php require_once base_path('views/components/footer.php'); ?>
</body>
</html>