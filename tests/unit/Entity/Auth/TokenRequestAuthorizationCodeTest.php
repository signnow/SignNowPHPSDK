<?php

declare(strict_types=1);

namespace Tests\Unit\Entity\Auth;

use PHPUnit\Framework\TestCase;
use SignNow\Api\Entity\Auth\TokenRequestAuthorizationCode;

/**
 * Class TokenRequestAuthorizationCodeTest
 *
 * @coversDefaultClass \SignNow\Api\Entity\Auth\TokenRequestAuthorizationCode
 * @covers ::__construct
 *
 * @package Tests\Unit\Entity\Auth
 */
class TokenRequestAuthorizationCodeTest extends TestCase
{
    /**
     * @covers ::getScope
     * @covers ::getCode
     * @covers ::getGrantType
     *
     * @return void
     */
    public function testAuthorizationCodeRequest(): void
    {
        $code = 'some authorization code';
        $scope = 'access scope';
        
        $tokenRequest = new TokenRequestAuthorizationCode($code, $scope);
        
        $this->assertEquals($code, $tokenRequest->getCode());
        $this->assertEquals($scope, $tokenRequest->getScope());
        $this->assertEquals('authorization_code', $tokenRequest->getGrantType());
    }
}
