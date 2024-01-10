<?php

namespace App\Models;

use App\Models\Contracts\OrderProductInterface;
use DateTime;
use DB;

class Product extends Model implements OrderProductInterface
{
    const TABLE_NAME = 'products';

    const DEFAULT_VAT = 20;
    const VATS = [5.5, 10, self::DEFAULT_VAT];
    const CREATED_AT_FORMAT = 'Y-m-d H:i:s';

    protected ?int $id;
    protected ?string $label;
    protected ?string $description;
    protected ?string $brand;
    protected ?int $enable;
    protected ?float $priceTTC;
    protected ?float $priceHT;
    protected ?float $vat;
    protected ?int $quantity;
    protected ?string $created_at;

    protected array $changedFields = [];

    public function __construct(
        ?int $enable,
        ?string $label,
        ?string $description,
        ?string $brand,
        string|DateTime|null $created_at = null, //
    ) {
        $this->enable = $enable;
        $this->label = $label;
        $this->description = $description;
        $this->brand = $brand;
        $this->created_at = $this->prepareCreatedAt($created_at);
    }

    public static function hydrate(array $data): Product
    {
        $product = new Product(
            $data['enable'] ?? null,
            $data['label'] ?? null,
            $data['description'] ?? null,
            $data['brand'] ?? null,
            $data['created_at'] ?? null,
        );

        $product->id = $data['id'] ?? null;
        $product->priceTTC = $data['price_ttc'] ?? null;
        $product->priceHT = $data['price_ht'] ?? null;
        $product->vat = $data['vat'] ?? null;
        $product->quantity = $data['quantity'] ?? null;

        return $product;
    }

    public function calculPriceHT() : ?float
    {
        if ($this->priceTTC && $this->vat) {
            $this->priceHT = $this->priceTTC / (1 + $this->vat / 100);
            return $this->priceHT;
        }

        return null;
    }

    public function calculPriceTTC() : ?float
    {
        if ($this->priceHT && $this->vat) {
            $this->priceTTC = $this->priceHT * (1 + $this->vat / 100);
            return $this->priceTTC;
        }

        return null;
    }

    public function totalPriceTTC(int $quantity) : float
    {
        return $this->priceTTC * $quantity;
    }

    public function toArray()
    {
        return [
            'enable' => $this->enable,
            'label' => $this->label,
            'description' => $this->description,
            'brand' => $this->brand,
            'price_ttc' => $this->priceTTC,
            'price_ht' => $this->priceHT,
            'vat' => $this->vat,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
        ];
    }

    public function save($forced = false) : int|false
    {
        if ($this->id ?? null) {
            // Update
            if ($forced) {
                return DB::update(self::TABLE_NAME, $this->toArray(), $this->id);
            } elseif ($this->changedFields) {
                $toArray = $this->toArray();
                $updates = [];
                foreach ($this->changedFields as $key) {
                    if (array_key_exists($key, $toArray)) {
                        $updates[$key] = $toArray[$key];
                    }
                }

                return DB::update(self::TABLE_NAME, $updates, $this->id);
            }
        } else {
            // Insert
            return DB::insert(self::TABLE_NAME, $this->toArray());
        }

        return 0;
    }

    public function delete() : int|false
    {
        return self::staticDelete($this->id);
    }

    public static function staticDelete(int $id) : int|false
    {
        return DB::statement(
            "DELETE FROM products WHERE id = :id",
            ['id' => $id],
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): void
    {
        $this->setFields('label', $label);
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): void
    {
        $this->setFields('brand', $brand);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->setFields('description', $description);
    }

    public function getPriceTTC() : float
    {
        return $this->priceTTC;
    }

    public function setPriceTTC(float $priceTTC)
    {
        $this->setFields('priceTTC', $priceTTC);
    }

    public function getPriceHT() : float
    {
        return $this->priceHT;
    }

    public function setPriceHT(float $priceHT)
    {
        $this->setFields('priceHT', $priceHT);
    }

    public function getVat() : float
    {
        return $this->vat ?? self::DEFAULT_VAT;
    }

    public function setVat(float $vat)
    {
        $value = in_array($vat, self::VATS)
            ? $vat
            : self::DEFAULT_VAT;

        $this->setFields('vat', $value);
    }

    public function getQuantity() : int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity)
    {
        $this->setFields('quantity', $quantity);
    }

    public function getEnable(): ?int
    {
        return $this->enable;
    }

    public function isEnable(): bool
    {
        return $this->getEnable() == 1;
    }

    public function setEnable(?int $enable): void
    {
        $this->setFields('enable', $enable);
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function getCreatedAtFormated(): ?string
    {
        return $this->created_at
            ? (new DateTime($this->created_at))->format('d/m/Y H:i')
            : null;
    }

    public function setCreatedAt(string|DateTime|null $created_at): void
    {
        $created_at = $this->defineCreatedAt($created_at);
        $this->setFields('created_at', $created_at);
    }

    protected function setFields($name ,$value)
    {
        if (property_exists($this, $name) and isset($this->$name) and $this->$name != $value) {
            $this->changedFields[] = $name;
        }

        $this->$name = $value;
    }

    protected function prepareCreatedAt(string|DateTime|null $created_at): string
    {
        if (!$created_at) {
            $created_at = date(self::CREATED_AT_FORMAT);
        } elseif ($created_at instanceof DateTime) {
            $created_at = $created_at->format(self::CREATED_AT_FORMAT);
        }

        return $created_at;
    }
}