<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php ec($title) ?></title>
    <link rel="stylesheet" href="assets/app.css">
</head>
<body>
<?php require_once base_path('views/components/menu.php'); ?>
<?php displayErrorsAndMessages() ?>

<h2><?php ec($title) ?></h2>
<form action="<?php ec($actionUrl) ?>" method="POST">
    <input type="text" name="action" value="<?php ec($actionValue) ?>" hidden <?php ec($actionValue === 'show' ? 'disabled' : '') ?>>

    <?php if ($product): ?>
        <input type="text" name="id" value="<?php ec($product->getId()) ?>" hidden <?php ec($actionValue === 'show' ? 'disabled' : '') ?>>
    <?php endif; ?>

    <br>
    <label for="enable">Activé ?</label>
    <input id="enable-true" type="radio" name="enable" value="1"
        <?php ec(($product and !$product->isEnable()) ? '' : 'checked') ?>
        <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    >
    <label for="enable-true">Oui</label>
    <input id="enable-false" type="radio" name="enable" value="0"
        <?php ec((!$product or $product->isEnable()) ? '' : 'checked') ?>
        <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    >
    <label for="enable-false">Non</label>

    <br>
    <label for="label">Label</label>
    <input id="label" type="text" name="label"
           value="<?php ec($product ? $product->getLabel() : '') ?>"
        <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    >

    <br>
    <label for="brand">Brand</label>
    <input id="brand" type="text" name="brand"
           value="<?php ec($product ? $product->getBrand() : '') ?>"
        <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    >

    <br>
    <label for="price_ttc">Prix TTC</label>
    <input id="price_ttc" type="number" name="price_ttc"
           value="<?php ec($product ? $product->getPriceTTC() : '') ?>"
        <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    >

    <select name="vat" id="vat" <?php ec($actionValue === 'show' ? 'disabled' : '') ?>>
        <?php foreach (\App\Models\Product::VATS as $vat): ?>
            <option
                value="<?php ec($vat) ?>"
                <?php echo $vat == ($product ? $product->getVat() : \App\Models\Product::DEFAULT_VAT) ? 'selected' : '' ?>
            >
                <?php ec($vat) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br>
    <label for="quantity">Quantité</label>
    <input id="quantity" type="number" name="quantity" placeholder="0"
           value="<?php ec($product ? $product->getQuantity() : '') ?>"
        <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    >

    <br>
    <label for="description">Description</label>
    <textarea id="description"
              name="description"
              cols="30"
              rows="10"
              <?php ec($actionValue === 'show' ? 'disabled' : '') ?>
    ><?php ec($product ? $product->getDescription() : '') ?></textarea>

    <?php if ($actionValue !== 'show'): ?>
        <br>
        <input type="submit" value="Envoyer">
    <?php endif; ?>
</form>

<?php require_once base_path('views/components/footer.php'); ?>
</body>
</html>