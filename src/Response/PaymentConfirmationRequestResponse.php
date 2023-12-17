<?php

namespace Mkeremcansev\IsyerimPos\Response;

class PaymentConfirmationRequestResponse extends BaseRequestResponse
{
    public function getConfirmKey(): ?string
    {
        return $this->response->json('Content.ConfirmKey');
    }

    public function getOrderId(): ?string
    {
        return $this->response->json('Content.OrderId');
    }

    public function getUuid(): ?string
    {
        return $this->response->json('Content.Uid');
    }

    public function getCardInformation(): ?array
    {
        return $this->response->json('Content.CardInfo');
    }

    public function getCustomerInformation(): ?array
    {
        return $this->response->json('Content.CustomerInfo');
    }

    public function getProducts(): ?array
    {
        return $this->response->json('Content.Products');
    }

    public function getNetAmount(): ?string
    {
        return $this->response->json('Content.NetAmount');
    }

    public function getWithdrawnAmount(): ?string
    {
        return $this->response->json('Content.WithdrawnAmount');
    }

    public function getAmount(): ?string
    {
        return $this->response->json('Content.Amount');
    }
}
