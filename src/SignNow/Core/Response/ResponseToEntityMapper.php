<?php

/*
 * This file is a part of signNow SDK API client.
 *
 * (с) Copyright © 2011-present airSlate Inc. (https://www.signnow.com)
 *
 * For more details on copyright, see LICENSE.md file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace SignNow\Core\Response;

use Psr\Http\Message\ResponseInterface;
use SignNow\Core\Request\Endpoint;
use SignNow\Exception\SignNowApiException;
use Symfony\Component\Serializer\Serializer;

readonly class ResponseToEntityMapper
{
    public function __construct(
        private Serializer $serializer,
    ) {
    }

    /**
     * @throws SignNowApiException
     */
    public function validate(ResponseInterface $response): ResponseToEntityMapper
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 300 && $statusCode < 400) {
            throw new SignNowApiException('SignNow API call was redirected.', $response);
        }

        if ($statusCode >= 400 && $statusCode < 500) {
            throw new SignNowApiException('SignNow API call was invalid.', $response);
        }

        if ($statusCode >= 500) {
            throw new SignNowApiException('SignNow API call has failed due to server error.', $response);
        }

        return $this;
    }

    public function map(ResponseInterface $response, Endpoint $endpoint): mixed
    {
        $targetClass = $this->toClassName($endpoint->getNamespace(), $endpoint->getEntity(), $endpoint->getMethod());

        return $this->deserialize($response, $targetClass);
    }

    private function toClassName(string $namespace, string $entity, string $method): string
    {
        return '\SignNow\Api\\'
            . ucfirst($namespace)
            . '\Response\\'
            . $this->toCamelCase($entity)
            . $this->withPrefix($method);
    }

    private function toCamelCase(string $key): string
    {
        return preg_replace_callback('/(?:^|_)([a-z])/', static fn($matches) => strtoupper($matches[1]), $key);
    }

    private function withPrefix(string $method): string
    {
        return ucfirst($method);
    }

    private function deserialize(ResponseInterface $response, string $targetClass): mixed
    {
        return $this->serializer->deserialize(
            $response->getBody()->getContents() ?: '[]',
            $targetClass,
            'json'
        );
    }
}
