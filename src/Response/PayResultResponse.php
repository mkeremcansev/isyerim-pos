<?php

namespace Mkeremcansev\IsyerimPos\Response;

class PayResultResponse extends BaseRequestResponse
{
    public function getPaymentLink(): ?string
    {
        return $this->response->json('Content.PaymentLink');
    }

    public function getPaymentHtml(): ?string
    {
        return $this->response->json('Content.ResponseAsHtml');
    }

    public function getUuid(): ?string
    {
        return $this->response->json('Content.Uid');
    }

    public function getOrderId(): ?string
    {
        return $this->response->json('Content.OrderId');
    }

    public function getConfirmKey(): ?string
    {
        return $this->response->json('Content.ConfirmKey');
    }
}
