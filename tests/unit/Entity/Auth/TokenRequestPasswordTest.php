<?php

declare(strict_types=1);

namespace Tests\Unit\Entity\Auth;

use PHPUnit\Framework\TestCase;
use SignNow\Api\Entity\Auth\TokenRequestPassword;

/**
 * Class TokenRequestPasswordTest
 *
 * @coversDefaultClass \SignNow\Api\Entity\Auth\TokenRequestPassword
 * @covers ::__construct
 *
 * @package Tests\Unit\Entity\Auth
 */
class TokenRequestPasswordTest extends TestCase
{
    /**
     * @covers ::getUsername
     * @covers ::getPassword
     * @covers ::getGrantType
     *
     * @return void
     */
    public function testPasswordRequest(): void
    {
        $username = 'user email';
        $password = 'user password';
        
        $tokenRequest = new TokenRequestPassword($username, $password);
        
        $this->assertEquals($username, $tokenRequest->getUsername());
        $this->assertEquals($password, $tokenRequest->getPassword());
        $this->assertEquals('password', $tokenRequest->getGrantType());
    }
}
