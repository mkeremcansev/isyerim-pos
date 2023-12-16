<?php

namespace Mkeremcansev\IsyerimPos\Services\Response;


class ComissionsRatesRequestResponse extends BaseRequestResponse
{
    public function getComissionsRates()
    {
        return $this->response->json('Content');
    }
}
