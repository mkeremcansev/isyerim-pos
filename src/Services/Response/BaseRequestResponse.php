<?php

namespace Mkeremcansev\IsyerimPos\Services\Response;

use Illuminate\Http\Client\Response;

class BaseRequestResponse
{
    public function __construct(public Response $response)
    {
    }

    public function isSuccess(): bool
    {
        return $this->response->json('ErrorCode') === 0;
    }

    public function getErrorCode(): int
    {
        return $this->response->json('ErrorCode');
    }

    public function isDone(): bool
    {
        return $this->response->json('IsDone');
    }

    public function getMessage()
    {
        return $this->response->json('Message');
    }


    public function getResponse()
    {
        return $this->response->json();
    }
}
