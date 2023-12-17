<?php

namespace Mkeremcansev\IsyerimPos\Response;

class TransactionsRequestResponse extends BaseRequestResponse
{
    public function getTransactions()
    {
        return $this->response->json('Content');
    }
}
