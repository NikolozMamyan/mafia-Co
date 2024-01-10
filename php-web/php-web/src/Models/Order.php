<?php

namespace App\Models;

use App\Models\Contracts\OrderProductInterface;

class Order extends Model
{
    protected $ref;
    protected ?int $userId;
    protected ?float $priceTTC;
    protected ?float $priceHT;
    protected ?float $totalVat;

    public function generateRef()
    {
        $this->ref = rand(1000000, 9999999);
    }

    public function addProductPriceToOrder(OrderProductInterface $product, int $quantity)
    {
        $this->priceTTC += $product->totalPriceTTC($quantity);
        $this->priceHT += $product->calculPriceHT() * $quantity;
        $this->totalVat = $this->priceTTC - $this->priceHT;
    }
}
