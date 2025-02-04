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

namespace SignNow;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\RequestOptions;
use SignNow\Core\Config\ConfigRepository;
use SignNow\Core\Request\Endpoint;
use SignNow\Core\Request\EndpointResolver;
use SignNow\Core\Request\RequestInterface;
use SignNow\Core\Response\ResponseToEntityMapper as ResponseMapper;
use SignNow\Core\Token\BasicToken;
use SignNow\Core\Token\BearerToken;
use SignNow\Core\Token\TokenInterface;
use SignNow\Exception\SignNowApiException;
use SplFileInfo;
use Throwable;

class ApiClient
{
    public function __construct(
        private readonly HttpClient $client,
        private readonly EndpointResolver $endpointResolver,
        private readonly ConfigRepository $configRepository,
        private readonly ResponseMapper $responseMapper,
        private readonly BasicToken $basicToken,
        private ?BearerToken $bearerToken = null,
    ) {
    }

    /**
     * @throws SignNowApiException
     */
    public function send(RequestInterface $request): object
    {
        $endpoint = $this->endpointResolver->resolve($request);

        $method = $endpoint->getMethod();

        try {
            $response = $this->client->{$method}(
                $this->buildUri($endpoint, $request->uriParams()),
                $this->configureOptions($request, $endpoint),
            );

            return $this->responseMapper
                ->validate($response)
                ->map($response, $endpoint);
        } catch (Throwable $exception) {
            throw new SignNowApiException(
                sprintf(
                    'Failed processing signNow %s %s request.',
                    strtoupper($endpoint->getMethod()),
                    $endpoint->getUrl()
                ),
                null,
                $exception,
                $request
            );
        }
    }

    public function setBearerToken(BearerToken $bearerToken): self
    {
        $this->bearerToken = $bearerToken;

        return $this;
    }

    public function getBearerToken(): ?BearerToken
    {
        return $this->bearerToken;
    }

    private function buildUri(Endpoint $endpoint, array $uriParams): string
    {
        $host = $this->configRepository->host();
        $uri = $endpoint->getUrl();

        if (empty($uriParams)) {
            return $host . $uri;
        }

        foreach ($uriParams as $param => $value) {
            $uri = strtr(
                $uri,
                [
                    '{' . $param . '}' => $value,
                ]
            );
        }

        return $host . $uri;
    }

    /**
     * @throws SignNowApiException
     */
    private function configureOptions(RequestInterface $request, Endpoint $endpoint): array
    {
        $body = $this->prepareBody($request);
        $contentType = $endpoint->getContentType();

        $token = match ($endpoint->getAuthType()) {
            'Basic' => $this->basicToken,
            'Bearer' => $this->bearerToken,

            default => throw new SignNowApiException(
                sprintf(
                    'Unknown request authentication type: %s',
                    $endpoint->getAuthType(),
                )
            )
        };

        $options = [
            RequestOptions::HEADERS => $this->buildHeaders($token, $contentType),
            RequestOptions::TIMEOUT => $this->configRepository->timeout(),
        ];

        if (in_array($endpoint->getMethod(), ['get', 'delete'])) {
            return $options;
        }

        match ($contentType) {
            'application/json' => $options[RequestOptions::JSON] = $body,
            'application/x-www-form-urlencoded' => $options[RequestOptions::FORM_PARAMS] = $body,
            'multipart/form-data' => $options[RequestOptions::MULTIPART] = $this->buildMultiPart($body),
        };

        return $options;
    }

    private function buildMultiPart(array $body): array
    {
        $multipart = [];

        foreach ($body as $name => $value) {
            if (empty($value)) {
                continue;
            }

            $row = [
                'name' => $name,
                'contents' => $value,
            ];

            if ($value instanceof SplFileInfo) {
                $row['contents'] = Utils::tryFopen($value->getRealPath(), 'r');
                $row['filename'] = $value->getFilename();
            }

            $multipart[] = $row;
        }

        return $multipart;
    }

    private function buildHeaders(TokenInterface $token, string $contentType): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => $contentType,
            'Authorization' => $token->type() . ' ' . $token->token(),
            'User-Agent' => $this->configRepository->clientName(),
        ];

        if ($contentType === 'multipart/form-data') {
            unset($headers['Content-Type']);
        }

        return $headers;
    }

    private function prepareBody(RequestInterface $request): array
    {
        return $this->clearArray($request->toArray());
    }

    private function clearArray(array $payload): array
    {
        $result = [];

        foreach ($payload as $key => $value) {
            if ($value === null || $value === '') {
                continue;
            }

            if (is_array($value) && count($value) === 0) {
                continue;
            }

            if (is_object($value) && method_exists($value, 'toArray')) {
                $result[$key] = $this->clearArray($value->toArray());
                continue;
            }

            if (is_array($value)) {
                $result[$key] = $this->clearArray($value);
                continue;
            }

            $result[$key] = $value;
        }

        return $result;
    }
}
