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
 * Class ApiInviteMock
 *
 * @package Module\Mock
 */
class ApiInviteMock extends Module implements DependsOnModule
{
    private const INVITE_URL_PATTERN = '/document/{documentUniqueId}/invite';
    private const CANCEL_URL_PATTERN = '/document/{documentUniqueId}/fieldinvitecancel';
    private const LINK_URL = '/link';

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
     * @param string $documentUniqueId
     *
     * @return void
     * @throws ClientExceptionInterface
     */
    public function mockFieldInviteRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->inviteUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'status' => 'success',
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @param string $documentUniqueId
     *
     * @return void
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockFreeFormInviteRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->inviteUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'result' => 'success',
                                   'callback_url' => 'none',
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function mockFieldInviteSigningLinkRequest(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->linkUrl()))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'url' => 'https://signnow-test.com/s/fPItaXdX',
                                   'url_no_signup' => 'https://signnow-test.com/s/zuyHBHoI',
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function mockCancelInviteRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::putRequest()
                 ->andUrl(Is::equalTo($this->cancelUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'status' => 'success',
                               ]
                           )
                       )
            )
        );
    }
    
    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    public function inviteUrl(string $documentUniqueId): string
    {
        return strtr(self::INVITE_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }

    /**
     * @return string
     */
    public function linkUrl(): string
    {
        return self::LINK_URL;
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    public function cancelUrl(string $documentUniqueId): string
    {
        return strtr(self::CANCEL_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }
}
