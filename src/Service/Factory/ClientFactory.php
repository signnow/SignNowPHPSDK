<?php

declare(strict_types=1);

namespace SignNow\Api\Service\Factory;

use SignNow\Api\Service\Guzzle\AuthorizationMiddleware;
use SignNow\Api\Service\Guzzle\ResponseCheckerMiddleware;
use SignNow\Api\Service\OAuth\TokenInterface;
use SignNow\Rest\Factories\ClientFactory as RestClientFactory;

/**
 * Class ClientFactory
 *
 * @package SignNow\Api\Service\Factory
 */
class ClientFactory
{
    private const TIMEOUT = 30;

    /**
     * @param string $host
     * @param TokenInterface $token
     *
     * @return RestClientFactory
     */
    public function create(string $host, TokenInterface $token): RestClientFactory
    {
        return new RestClientFactory(
            [
                'base_uri'        => $host,
                'connect_timeout' => self::TIMEOUT,
                'request_timeout' => self::TIMEOUT,
                'headers'         => [
                    'Content-Type' => 'application/json',
                ],
            ],
            [
                new AuthorizationMiddleware($token),
                new ResponseCheckerMiddleware(),
            ]
        );
    }
}
