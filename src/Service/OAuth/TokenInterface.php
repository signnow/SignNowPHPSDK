<?php
declare(strict_types = 1);

namespace SignNow\Api\Service\OAuth;

/**
 * Interface TokenInterface
 *
 * @package SignNow\Api\Service\OAuth
 */
interface TokenInterface
{
    /**
     * @return string
     */
    public function getAccessToken(): string;
    
    /**
     * @return string
     */
    public function getTokenType(): string;
}
