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

use Exception;
use SignNow\Api\Auth\Request\TokenPost;
use SignNow\Core\Config\ConfigRepository;
use SignNow\Core\Provider\ApiProvider;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\SignNowApiException;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Sdk
{
    private const API_VERSION = '2024-07-30';

    private ?ApiProvider $provider;

    public function __construct(
        ?string $configPath = null,
    ) {
        $this->provider = new ApiProvider(
            new ContainerBuilder(),
            $configPath ?? dirname(__DIR__, 2) . '/.env'
        );
    }

    public function build(): self
    {
        $this->provider->register();

        return $this;
    }

    /**
     * @throws Exception
     */
    public function getApiClient(): ApiClient
    {
        if ($this->provider === null) {
            $this->build();
        }

        return $this->provider
            ->getContainer()
            ->get('api_client');
    }

    /**
     * @throws SignNowApiException
     * @throws Exception
     */
    public function authenticate(): self
    {
        $client = $this->getApiClient();
        /** @var ConfigRepository $config */
        $config = $this->provider->getContainer()->get('config');

        $request = new TokenPost(
            $config->user(),
            $config->password(),
            'password',
        );
        $bearerToken = $client->send($request);

        $this->getApiClient()->setBearerToken(
            new BearerToken(
                $bearerToken->getAccessToken(),
                $bearerToken->getRefreshToken(),
                $bearerToken->getExpiresIn()
            )
        );

        return $this;
    }

    /**
     * @throws Exception
     */
    public function withBearerToken(BearerToken $token): self
    {
        $this->getApiClient()
             ->setBearerToken($token);

        return $this;
    }

    /**
     * @throws Exception
     */
    public function actualBearerToken(): ?BearerToken
    {
        return $this->getApiClient()
             ->getBearerToken();
    }

    public function version(): string
    {
        return self::API_VERSION;
    }
}
