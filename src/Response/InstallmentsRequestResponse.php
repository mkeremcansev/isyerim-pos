<?php

namespace Mkeremcansev\IsyerimPos\Response;

class InstallmentsRequestResponse extends BaseRequestResponse
{
    public function getInstallments()
    {
        return $this->response->json('Content.Installments');
    }

    public function getCardInformation()
    {
        return $this->response->json('Content.CardInfo');
    }
}
