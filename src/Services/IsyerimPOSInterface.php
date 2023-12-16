<?php

namespace Mkeremcansev\IsyerimPos\Services;

use Mkeremcansev\IsyerimPos\Services\Response\ComissionsRatesRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\InstallmentsRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\PayRequestResponse;
use Mkeremcansev\IsyerimPos\Services\Response\PayResultResponse;
use Mkeremcansev\IsyerimPos\Services\Response\TransactionsRequestResponse;

interface IsyerimPOSInterface
{
    public function setReturnUrl(string $returnUrl): self;
    public function setOrderId(string $orderId): self;
    public function setClientIP(?string $clientIP = null): self;
    public function setInstallments(int $installments): self;
    public function setAmount(string $amount): self;
    public function setIs3D(bool $is3D): self;
    public function setIsAutoCommit(bool $isAutoCommit): self;
    public function setCardInformation(string $cardOwner, string $cardNo, string $month, string $year, string $cvv): self;
    public function setCustomerInformation(string $name, $surname, string $phone, string $email, string $address, string $description): self;
    public function setProducts(array $products): self;
    public function createPayRequest(): PayRequestResponse;
    public function paymentConfirmationFor3DRequest(string $uuid, ?string $confirmKey = null): PayRequestResponse;
    public function cancelRequest(string $uuid, string $description): PayRequestResponse;
    public function refundRequest(string $uuid, string $amount, string $description): PayRequestResponse;
    public function resultCheckRequest(string $uuid): PayResultResponse;
    public function getInstallmentsRequest(): InstallmentsRequestResponse;
    public function getComissionsRatesRequest(): ComissionsRatesRequestResponse;
    public function getTransactionsRequest(string $startDate, string $endDate): TransactionsRequestResponse;
    public function getPayInformations(): array;
}
