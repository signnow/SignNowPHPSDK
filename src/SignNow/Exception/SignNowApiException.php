<?php

declare(strict_types=1);

namespace SignNow\Exception;

use Exception;
use Psr\Http\Message\ResponseInterface;
use SignNow\Core\Request\RequestInterface;
use Throwable;

class SignNowApiException extends Exception
{
    public function __construct(
        string $message,
        private readonly ?ResponseInterface $response = null,
        ?Throwable $previous = null,
        private readonly ?RequestInterface $request = null,
    ) {
        parent::__construct($message, 0, $previous);
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }
}
