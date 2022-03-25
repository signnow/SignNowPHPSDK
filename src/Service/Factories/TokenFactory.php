<?php

declare(strict_types=1);

namespace SignNow\Api\Service\Factories;

use InvalidArgumentException;
use SignNow\Api\Service\OAuth\BasicToken;
use SignNow\Api\Service\OAuth\BearerToken;
use SignNow\Api\Service\OAuth\TokenInterface;

/**
 * Class TokenFactory
 *
 * @package SignNow\Api\Service\Factories
 */
class TokenFactory
{
    /**
     * @param string $token
     *
     * @return TokenInterface
     */
    public function basicToken(string $token): TokenInterface
    {
        return $this->createToken(BasicToken::TYPE, $token);
    }

    /**
     * @param string $token
     *
     * @return TokenInterface
     */
    public function bearerToken(string $token): TokenInterface
    {
        return $this->createToken(BearerToken::TYPE, $token);
    }

    /**
     * @param string $type
     * @param string $token
     *
     * @return TokenInterface
     * @throws InvalidArgumentException
     */
    public function createToken(string $type, string $token): TokenInterface
    {
        switch ($type) {
            case BasicToken::TYPE:
                return new BasicToken($token);
            case BearerToken::TYPE:
                return new BearerToken($token);
            default:
                throw new InvalidArgumentException('Undefined token type given.');
        }
    }
}
