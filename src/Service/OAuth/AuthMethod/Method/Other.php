<?php
declare(strict_types=1);

namespace SignNow\Api\Service\OAuth\AuthMethod\Method;

use SignNow\Api\Service\OAuth\AuthMethod\AuthMethod;
use SignNow\Api\Service\OAuth\AuthMethod\AuthMethodInterface;

/**
 * Class Other
 *
 * @package SignNow\Api\Service\OAuth\AuthMethod\Method
 */
class Other implements AuthMethodInterface
{
    public function getMethodName(): string
    {
        return AuthMethod::OTHER;
    }
}
