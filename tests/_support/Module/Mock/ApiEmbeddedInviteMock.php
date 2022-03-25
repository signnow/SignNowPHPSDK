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
 * Class ApiEmbeddedInviteMock
 *
 * @package Module\Mock
 */
class ApiEmbeddedInviteMock extends Module implements DependsOnModule
{
    private const INVITE_URL_PATTERN = '/v2/documents/{documentUniqueId}/embedded-invites';
    private const DELETE_URL_PATTERN = '/v2/documents/{documentUniqueId}/embedded-invites';
    private const LINK_URL_PATTERN = '/v2/documents/{documentUniqueId}/embedded-invites/{fieldInviteUniqueId}/link';

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
     * @throws Exception
     */
    public function mockEmbeddedInviteRequest(string $documentUniqueId): void
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
                                   'data' => [
                                       [
                                           'id' => Str::generateUniqueId(),
                                           'email' => Str::generateEmail(),
                                           'role_id' => Str::generateUniqueId(),
                                           'order' => 1,
                                           'status' => 'pending',
                                       ],
                                       [
                                           'id' => Str::generateUniqueId(),
                                           'email' => Str::generateEmail(),
                                           'role_id' => Str::generateUniqueId(),
                                           'order' => 1,
                                           'status' => 'pending',
                                       ],
                                   ],
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @param string $documentUniqueId
     * @param string $fieldInviteUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockEmbeddedInviteSigningLinkRequest(string $documentUniqueId, string $fieldInviteUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->linkUrl($documentUniqueId, $fieldInviteUniqueId)))
            )->then(
                Respond::withStatusCode(201)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'data' => [
                                       'link' => 'https://signnow-test.com/webapp/document/' . Str::generateUniqueId(),
                                   ],
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function mockDeleteEmbeddedInviteRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::deleteRequest()
                 ->andUrl(Is::equalTo($this->deleteUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(204)
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
    public function linkUrl(string $documentUniqueId, string $fieldInviteUniqueId): string
    {
        return strtr(
            self::LINK_URL_PATTERN,
            [
                '{documentUniqueId}'    => $documentUniqueId,
                '{fieldInviteUniqueId}' => $fieldInviteUniqueId,
            ]
        );
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    public function deleteUrl(string $documentUniqueId): string
    {
        return strtr(self::DELETE_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }
}
