<?php

namespace App\Controllers;

use DB;
use Auth;
use App\Models\Product;

class ProductsController extends Controller
{
    const URL_INDEX = '/products.php';
    const URL_CREATE = '/product-create.php';
    const URL_EDIT = '/product-edit.php';
    const URL_HANDLER = '/handlers/product-handler.php';

    public function index()
    {
        $userId = Auth::getSessionUserId();

        // Pagination
        $pagination = ($_GET['pagination'] ?? null) ?: $_SESSION['pagination'] ?? 5;
        $_SESSION['pagination'] = $pagination;

        // Search field
        $searchField = $_GET['search'] ?? '';
        $whereSearchSQL = '';
        $searchFields = explode(' ', $searchField);
        foreach ($searchFields as $key => $search) {
            if (empty($search)) {
                unset($searchFields[$key]);
                continue;
            }

            if ($whereSearchSQL) {
                $whereSearchSQL .= ' OR ';
            }

            $k = ':search'.$key;
            $searchFields[$k] = '%'.$search.'%';
            unset($searchFields[$key]);
            $whereSearchSQL .=
               ' label LIKE '.$k
                .' OR description LIKE '.$k
                .' OR brand LIKE '.$k
                .' OR created_at LIKE '.$k;
        }

        // Display filter
        $displayDisable = ($_GET['display_disable'] ?? null) === 'on';

        // Prepare where sql part
        $whereEnableSQL = $displayDisable ? '' : ' enable = 1';
        $whereSQL = $whereEnableSQL
            .(($whereEnableSQL and $whereSearchSQL) ? ' AND ' : '')
            .$whereSearchSQL;

        if ($whereSQL) {
            $whereSQL = ' WHERE '.$whereSQL;
        }

        // Fetch products
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $pagination;
        $products = DB::fetch(
            // SQL
            "SELECT * FROM products"
            .$whereSQL
            ." ORDER BY created_at DESC",
            $searchFields,
            // Limit and Offset (Separate from params for manual bind into PDO)
            $pagination,
            $offset,
        );
        if ($products === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        // Hydrate products
        foreach ($products as $key => $product) {
            $products[$key] = Product::hydrate($product);
        }

        // Count products and max page
        $countProduct = DB::fetch(
            "SELECT COUNT(*) as count FROM products"
            ." WHERE enable = 1"
        )[0]['count'] ?? 0;
        if ($countProduct === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        $maxPage = ceil($countProduct / $pagination);

        $actionUrl = self::URL_HANDLER;
        require_once base_path('views/products/index.php');
    }

    public function create()
    {
        $product = null;
        $title = 'Modifier un produit';
        $actionUrl = self::URL_HANDLER;
        $actionValue = 'store';
        require_once base_path('views/products/create-show-edit.php');
    }

    public function store()
    {
        if (($_POST['price_ttc'] ?? null) < 0 or ($_POST['vat'] ?? null) < 0) {
            errors('Le prix TTC et la TVA doivent être positif');
            redirectAndExit(self::URL_CREATE);
        }

        $product = new Product(
            ($_POST['enable'] ?? null) == 1 ? 1 : 0,
            $_POST['label'] ?? null,
            $_POST['description'] ?? null,
            $_POST['brand'] ?? null,
        );

        $product->setPriceTTC($_POST['price_ttc']);
        $product->setVAT($_POST['vat']);
        $product->calculPriceHT();
        $product->setQuantity(($_POST['quantity'] ?? null) ?: 0);

        // Save the product in DB
        $product->save();

        redirectAndExit(self::URL_INDEX);
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;
        $product = $this->getProductById($id);
        $title = "Affichage d'un produit";
        $actionUrl = '';
        $actionValue = 'show';
        require_once base_path('views/products/create-show-edit.php');
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $product = $this->getProductById($id);
        $title = 'Modifier un produit';
        $actionUrl = self::URL_HANDLER;
        $actionValue = 'update';
        require_once base_path('views/products/create-show-edit.php');
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $product = $this->getProductById($id);

        if (isset($_POST['enable'])) {
            $product->setEnable($_POST['enable'] == 1 ? 1 : 0);
        }
        if (isset($_POST['label'])) {
            $product->setLabel($_POST['label'] ?: '');
        }
        if (isset($_POST['description'])) {
            $product->setDescription($_POST['description'] ?: '');
        }
        if (isset($_POST['brand'])) {
            $product->setBrand($_POST['brand'] ?: '');
        }
        if (isset($_POST['quantity'])) {
            $product->setQuantity($_POST['quantity'] ?: 0);
        }

        $recalculatePrice = false;
        if (isset($_POST['price_ttc'])) {
            $product->setPriceTTC($_POST['price_ttc']);
            $recalculatePrice = true;
        }
        if (isset($_POST['vat'])) {
            $product->setVAT($_POST['vat']);
            $recalculatePrice = true;
        }
        if ($recalculatePrice) {
            $product->calculPriceHT();
        }

        // Update the product in DB
        $result = $product->save();
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
        } else {
            success('Le produit a bien été modifié.');
        }

        redirectAndExit(self::URL_EDIT.'?id='.$product->getId());
    }

    public function delete()
    {
        $id = $_POST['id'] ?? null;
        $product = $this->getProductById($id);

        // Delete a product in DB
        $product->delete();

        redirectAndExit(self::URL_INDEX);
    }

    protected function getProductById(?int $id): Product
    {
        if (!$id) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        $product = DB::fetch(
            "SELECT * FROM products WHERE id = :id",
            ['id' => $id]
        );
        if ($product === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($product)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        return Product::hydrate($product[0]);
    }
}
