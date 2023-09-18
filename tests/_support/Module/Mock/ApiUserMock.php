<?php

declare(strict_types=1);

namespace Module\Mock;

use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module;
use Codeception\Module\Phiremock as PhiremockModule;
use Exception;
use Helper\Str;
use Mcustiel\Phiremock\Client\Phiremock;
use Mcustiel\Phiremock\Client\Utils\A;
use Mcustiel\Phiremock\Client\Utils\Is;
use Mcustiel\Phiremock\Client\Utils\Respond;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ApiUserMock
 *
 * @package Module\Mock
 */
class ApiUserMock extends Module implements DependsOnModule
{
    private const USER_INITIAL_URL = '/user/initial';
    private const USER_SIGNATURE_URL = '/user/signature';

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
     * @return void
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockGetUserInitial(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo(self::USER_INITIAL_URL))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'width' => 100,
                                   'height' => 100,
                                   'created' => time(),
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @return void
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockUpdateUserInitial(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::putRequest()
                 ->andUrl(Is::equalTo(self::USER_INITIAL_URL))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'width' => 100,
                                   'height' => 100,
                                   'created' => time(),
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @return void
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockGetUserSignature(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo(self::USER_SIGNATURE_URL))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'width' => 100,
                                   'height' => 100,
                                   'created' => time(),
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @return void
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockUpdateUserSignature(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::putRequest()
                 ->andUrl(Is::equalTo(self::USER_SIGNATURE_URL))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'width' => 100,
                                   'height' => 100,
                                   'created' => time(),
                               ]
                           )
                       )
            )
        );
    }
}
