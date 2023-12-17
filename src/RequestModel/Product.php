<?php

namespace Mkeremcansev\IsyerimPos\RequestModel;

class Product
{
    public array $products = [];

    public function setProduct(string $name, int $count, string $unitPrice): void
    {
        $this->products[] = [
            'Name' => $name,
            'Count' => $count,
            'UnitPrice' => $unitPrice,
        ];
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}
