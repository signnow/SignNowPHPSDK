<?php

declare(strict_types=1);

namespace SignNow\Api\Service\OAuth\AuthMethod\Method;

use SignNow\Api\Service\OAuth\AuthMethod\AuthMethod;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;

/**
 * Class None
 *
 * @package SignNow\Api\Service\OAuth\AuthMethod\Method
 */
class None implements AuthMethodInterface
{
    public function getMethodName(): string
    {
        return AuthMethod::NONE;
    }
}
