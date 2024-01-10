<?php

namespace App\Models\Contracts;

interface OrderProductInterface
{
    public function calculPriceHT() : ?float;
    public function totalPriceTTC(int $quantity) : float;
}