<?php

declare(strict_types=1);

namespace Module\Mock;

use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module;
use Codeception\Module\Phiremock as PhiremockModule;
use Helper\Str;
use Mcustiel\Phiremock\Client\Phiremock;
use Mcustiel\Phiremock\Client\Utils\A;
use Mcustiel\Phiremock\Client\Utils\Is;
use Mcustiel\Phiremock\Client\Utils\Respond;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ApiOAuthMock
 *
 * @package Module\Mock
 */
class ApiOAuthMock extends Module implements DependsOnModule
{
    private const AUTH_URL = '/oauth2/token';
    
    /**
     * @var PhiremockModule
     */
    private $phiremock;

    /**
     * @param PhiremockModule $phiremock
     */
    public function _inject(PhiremockModule $phiremock): void
    {
        $this->phiremock = $phiremock;
    }

    /**
     * {@inheritdoc}
     */
    public function _depends()
    {
        return [
            'Phiremock' => sprintf('"%s" depends on module "Phiremock"', __CLASS__),
        ];
    }
    
    /**
     * @param string $username
     * @param string $password
     * @param string $basicToken
     *
     * @throws ClientExceptionInterface
     */
    public function mockOAuthRequest(string $username, string $password, string $basicToken): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->authUrl()))
                 ->andHeader('Authorization', Is::equalTo(sprintf('Basic %s', $basicToken)))
                 ->andFormField('grant_type', Is::equalTo('password'))
                 ->andFormField('username', Is::equalTo($username))
                 ->andFormField('password', Is::equalTo($password))
            )->then(
                Respond::withStatusCode(200)
                   ->andHeader('Content-Type', 'application/json')
                   ->andBody(
                       json_encode(
                           [
                               'expires_in' => 2592000,
                               'token_type' => 'bearer',
                               'access_token' => Str::generateHash64(),
                               'refresh_token' => Str::generateHash64(),
                               'scope' => '*',
                               'last_login' => 1,
                           ]
                       )
                   )
            )
        );
    }

    /**
     * @return string
     */
    private function authUrl(): string
    {
        return self::AUTH_URL;
    }
}
