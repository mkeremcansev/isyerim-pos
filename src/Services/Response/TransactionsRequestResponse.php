<?php

namespace Mkeremcansev\IsyerimPos\Services\Response;

class TransactionsRequestResponse extends BaseRequestResponse
{
    public function getTransactions()
    {
        return $this->response->json('Content');
    }
}
