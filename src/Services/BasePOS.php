<?php

namespace Mkeremcansev\IsyerimPos\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Mkeremcansev\IsyerimPos\Services\RequestModel\CardInformation;
use Mkeremcansev\IsyerimPos\Services\RequestModel\CustomerInformation;
use Mkeremcansev\IsyerimPos\Services\RequestModel\Product;

class BasePOS
{
    public string $apiUrl = '';

    public CardInformation $cardInformation;

    public CustomerInformation $customerInformation;

    public Product $product;

    public function __construct()
    {
        $this->cardInformation = new CardInformation();
        $this->customerInformation = new CustomerInformation();
        $this->product = new Product();
        $this->apiUrl = str(config('isyerim-pos.api_url'))->finish('/');
    }

    public function http(): PendingRequest
    {
        return Http::withHeaders($this->getCompanySecretCredentials());
    }

    public function getCompanySecretCredentials(): array
    {
        return [
            'MerchantId' => config('isyerim-pos.merchant_id'),
            'UserId' => config('isyerim-pos.user_id'),
            'ApiKey' => config('isyerim-pos.api_key'),
        ];
    }
}
