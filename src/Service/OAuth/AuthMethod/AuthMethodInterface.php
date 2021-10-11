<?php
declare(strict_types=1);

namespace SignNow\Api\Service\OAuth\AuthMethod;

/**
 * Interface AuthMethodInterface
 * 
 * @package SignNow\Api\Service\OAuth\AuthMethod
 */
interface AuthMethodInterface
{
    /**
     * @return string
     */
    public function getMethodName(): string;
}
