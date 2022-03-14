<?php

declare(strict_types=1);

namespace Tests\Unit\Entity\Auth;

use PHPUnit\Framework\TestCase;
use SignNow\Api\Entity\Auth\TokenRequestRefresh;

/**
 * Class TokenRequestRefreshTokenTest
 *
 * @coversDefaultClass \SignNow\Api\Entity\Auth\TokenRequestRefresh
 * @covers ::__construct
 *
 * @package Tests\Unit\Entity\Auth
 */
class TokenRequestRefreshTokenTest extends TestCase
{
    /**
     * @covers ::getRefreshToken
     * @covers ::getGrantType
     *
     * @return void
     */
    public function testPasswordRequest(): void
    {
        $refreshToken = 'some refresh token';
        
        $tokenRequest = new TokenRequestRefresh($refreshToken);
        
        $this->assertEquals($refreshToken, $tokenRequest->getRefreshToken());
        $this->assertEquals('refresh_token', $tokenRequest->getGrantType());
    }
}
