<?php

namespace Mkeremcansev\IsyerimPos\Response;

class ComissionsRatesRequestResponse extends BaseRequestResponse
{
    public function getComissionsRates()
    {
        return $this->response->json('Content');
    }
}
