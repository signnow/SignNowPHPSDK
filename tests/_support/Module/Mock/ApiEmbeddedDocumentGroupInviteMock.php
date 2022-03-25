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
 * Class ApiEmbeddedDocumentGroupInviteMock
 *
 * @package Module\Mock;
 */
class ApiEmbeddedDocumentGroupInviteMock extends Module implements DependsOnModule
{
    private const INVITE_URL_PATTERN = '/v2/document-groups/{documentGroupUniqueId}/embedded-invites';
    private const SIGNING_LINK_URL_PATTERN = '/v2/document-groups/{documentGroupUniqueId}/embedded-invites/{documentGroupInviteUniqueId}/link';
    
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
     * @param string $documentGroupUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockCreateEmbeddedGroupInviteRequest(string $documentGroupUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->embeddedDocumentGroupInviteUrl($documentGroupUniqueId)))
            )->then(
                Respond::withStatusCode(201)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'data' => [
                                       'id' => Str::generateUniqueId(),
                                   ],
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param string $documentGroupInviteUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockCreateSigningLinkEmbeddedGroupInviteRequest(
        string $documentGroupUniqueId,
        string $documentGroupInviteUniqueId
    ): void {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo(
                     $this->embeddedDocumentGroupInviteSigningLinkUrl(
                         $documentGroupUniqueId,
                         $documentGroupInviteUniqueId
                     )
                 ))
            )->then(
                Respond::withStatusCode(201)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'data' => [
                                       'link' => 'https://signnow-test.com/html/documentgroup/pendinginvites?' . 
                                           'mobileweb=app_or_mobileweb_choice' .
                                           '&access_token=' . Str::generateUniqueId() .
                                           '&document_group_id=' . $documentGroupUniqueId .
                                           '&group_invite_id=' . $documentGroupInviteUniqueId,
                                   ],
                               ]
                           )
                       )
            )
        );
    }
    
    /**
     * @param string $documentGroupUniqueId
     *
     * @throws ClientExceptionInterface
     */
    public function mockDeleteEmbeddedGroupInviteRequest(string $documentGroupUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::deleteRequest()
                 ->andUrl(Is::equalTo($this->embeddedDocumentGroupInviteUrl($documentGroupUniqueId)))
            )->then(
                Respond::withStatusCode(204)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody('')
            )
        );
    }
    
    /**
     * @param string $documentGroupUniqueId
     *
     * @return string
     */
    private function embeddedDocumentGroupInviteUrl(string $documentGroupUniqueId): string
    {
        return strtr(
            self::INVITE_URL_PATTERN,
            [
                '{documentGroupUniqueId}' => $documentGroupUniqueId,
            ]
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param string $documentGroupInviteUniqueId
     *
     * @return string
     */
    private function embeddedDocumentGroupInviteSigningLinkUrl(
        string $documentGroupUniqueId,
        string $documentGroupInviteUniqueId
    ): string {
        return strtr(
            self::SIGNING_LINK_URL_PATTERN,
            [
                '{documentGroupUniqueId}' => $documentGroupUniqueId,
                '{documentGroupInviteUniqueId}' => $documentGroupInviteUniqueId,
            ]
        );
    }
}
