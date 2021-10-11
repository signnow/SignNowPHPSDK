<?php
declare(strict_types=1);

namespace SignNow\Api\Service\OAuth\AuthMethod\Method;

use SignNow\Api\Service\OAuth\AuthMethod\AuthMethod;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;

/**
 * Class Email
 *
 * @package SignNow\Api\Service\OAuth\AuthMethod\Method
 */
class Email implements AuthMethodInterface
{
    public function getMethodName(): string
    {
        return AuthMethod::EMAIL;
    }
}
