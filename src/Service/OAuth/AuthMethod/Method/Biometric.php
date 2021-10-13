<?php
declare(strict_types=1);

namespace SignNow\Api\Service\OAuth\AuthMethod\Method;

use SignNow\Api\Service\OAuth\AuthMethod\AuthMethod;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;

/**
 * Class Biometric
 *
 * @package SignNow\Api\Service\OAuth\AuthMethod\Method
 */
class Biometric implements AuthMethodInterface
{
    public function getMethodName(): string
    {
        return AuthMethod::BIOMETRIC;
    }
}
