<?php

namespace Mkeremcansev\IsyerimPos\Services;

use Mkeremcansev\IsyerimPos\Services\Response\BaseRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\ComissionsRatesRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\InstallmentsRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\PaymentConfirmationRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\PayRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\TransactionsRequestResponse;

class IsyerimPOS extends BasePOS implements IsyerimPOSInterface
{
    public string $returnUrl = '';

    public string $orderId = '';

    public string $clientIP = '';

    public int $installments = 0;

    public string $amount = '';

    public bool $is3D = false;

    public bool $isAutoCommit = false;

    public function setReturnUrl(string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function setClientIP(?string $clientIP = null): self
    {
        $this->clientIP = $clientIP ?? request()->getClientIp();

        return $this;
    }

    public function setInstallments(int $installments): self
    {
        $this->installments = $installments;

        return $this;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function setIs3D(bool $is3D): self
    {
        $this->is3D = $is3D;

        return $this;
    }

    public function setIsAutoCommit(bool $isAutoCommit): self
    {
        $this->isAutoCommit = $isAutoCommit;

        return $this;
    }

    public function setCardInformation(string $cardOwner, string $cardNo, string $month, string $year, string $cvv): self
    {
        $this->cardInformation->setCardInformation($cardOwner, $cardNo, $month, $year, $cvv);

        return $this;
    }

    public function setCustomerInformation(string $name, $surname, string $phone, string $email, string $address, string $description): self
    {
        $this->customerInformation->setCustomerInformation($name, $surname, $phone, $email, $address, $description);

        return $this;
    }

    public function setProducts(array $products): self
    {
        foreach ($products as $product) {
            $this->product->setProduct($product['Name'], $product['Count'], $product['UnitPrice']);
        }

        return $this;
    }

    public function createPayRequest(): PayRequestResponse
    {
        $url = str($this->apiUrl)->append('payRequest3d');

        $response = $this->http()->post($url, $this->getPayInformations());

        return new PayRequestResponse($response);
    }

    public function paymentConfirmationFor3DRequest(string $uuid, ?string $confirmKey = null): PaymentConfirmationRequestResponse
    {
        $url = str($this->apiUrl)->append("payComplete?uid=$uuid&key=$confirmKey");

        $response = $this->http()->post($url);

        return new PaymentConfirmationRequestResponse($response);
    }

    public function cancelRequest(string $uuid, string $description): BaseRequestResponse
    {
        $url = str($this->apiUrl)->append('cancelRequest');

        $response = $this->http()->post($url, [
            'uid' => $uuid,
            'description' => $description,
        ]);

        return new BaseRequestResponse($response);
    }

    public function refundRequest(string $uuid, string $amount, string $description): BaseRequestResponse
    {
        $url = str($this->apiUrl)->append('refundRequest');

        $response = $this->http()->post($url, [
            'uid' => $uuid,
            'amount' => $amount,
            'description' => $description,
        ]);

        return new BaseRequestResponse($response);
    }

    public function resultCheckRequest(string $uuid): PaymentConfirmationRequestResponse
    {
        $url = str($this->apiUrl)->append("payResultCheck?uid=$uuid");

        $response = $this->http()->post($url);

        return new PaymentConfirmationRequestResponse($response);
    }

    public function getInstallmentsRequest(): InstallmentsRequestResponse
    {
        $url = str($this->apiUrl)->append('getInstallments');

        $response = $this->http()->post($url, [
            'Amount' => $this->amount,
            'CardNumber' => $this->cardInformation->getCardNo(),
        ]);

        return new InstallmentsRequestResponse($response);
    }

    public function getComissionsRatesRequest(): ComissionsRatesRequestResponse
    {
        $url = str($this->apiUrl)->append('commissions');

        $response = $this->http()->post($url);

        return new ComissionsRatesRequestResponse($response);
    }

    public function getTransactionsRequest(string $startDate, string $endDate): TransactionsRequestResponse
    {
        $url = str($this->apiUrl)->append("transactions?startDate=$startDate&endDate=$endDate");

        $response = $this->http()->post($url);

        return new TransactionsRequestResponse($response);
    }

    public function getPayInformations(): array
    {
        return [
            'ReturnUrl' => $this->returnUrl,
            'OrderId' => $this->orderId,
            'ClientIp' => $this->clientIP,
            'Installment' => $this->installments,
            'Amount' => $this->amount,
            'Is3D' => $this->is3D,
            'IsAutoCommit' => $this->isAutoCommit,
            'CardInfo' => $this->cardInformation->getCardInformation(),
            'CustomerInfo' => $this->customerInformation->getCustomerInformation(),
            'Products' => $this->product->getProducts(),
        ];
    }
}
