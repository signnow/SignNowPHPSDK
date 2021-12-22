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
use Mcustiel\Phiremock\Domain\Http\JsonBody;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ApiDocumentGroupInviteMock
 *
 * @package Module\Mock
 */
class ApiDocumentGroupInviteMock extends Module implements DependsOnModule
{
    private const CREATE_DOCUMENT_GROUP_INVITE_URL_PATTERN = '/documentgroup/{documentGroupUniqueId}/groupinvite';
    private const DOCUMENT_GROUP_INVITE_URL_PATTERN = '/documentgroup/{documentGroupUniqueId}/groupinvite/{groupInviteUniqueId}';
    private const CANCEL_DOCUMENT_GROUP_INVITE_URL_PATTERN = '/documentgroup/{documentGroupUniqueId}/groupinvite/{groupInviteUniqueId}/cancelinvite';

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
    public function mockCreateDocumentGroupInviteRequest(string $documentGroupUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->createDocumentGroupInviteUrl($documentGroupUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param string $groupInviteUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockGetDocumentGroupInviteRequest(string $documentGroupUniqueId, string $groupInviteUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo($this->documentGroupInviteUrl($documentGroupUniqueId, $groupInviteUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'invite' => [
                                       'id'     => Str::generateUniqueId(),
                                       'status' => 'pending',
                                       'steps'  => [
                                           [
                                               'id'      => Str::generateUniqueId(),
                                               'status'  => 'pending',
                                               'order'   => 1,
                                               'actions' => [
                                                   [
                                                       'action'        => 'sign',
                                                       'email'         => Str::generateEmail(),
                                                       'document_id'   => Str::generateUniqueId(),
                                                       'document_name' => Str::generateRandomString(),
                                                       'role_name'     => 'Signer 1',
                                                   ],
                                               ],
                                           ],
                                       ],
                                   ],
                               ]
                           )
                       )
            )
        );
    }
    
    /**
     * @param string $documentGroupUniqueId
     * @param string $groupInviteUniqueId
     *
     * @throws ClientExceptionInterface
     */
    public function mockCancelDocumentGroupInviteRequest(
        string $documentGroupUniqueId,
        string $groupInviteUniqueId
    ): void {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(
                     Is::equalTo($this->cancelDocumentGroupInviteUrl($documentGroupUniqueId, $groupInviteUniqueId))
                 )
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
     * @param string $documentGroupUniqueId
     *
     * @return string
     */
    private function createDocumentGroupInviteUrl(string $documentGroupUniqueId): string
    {
        return strtr(
            self::CREATE_DOCUMENT_GROUP_INVITE_URL_PATTERN,
            [
                '{documentGroupUniqueId}' => $documentGroupUniqueId,
            ]
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param string $groupInviteUniqueId
     *
     * @return string
     */
    private function documentGroupInviteUrl(string $documentGroupUniqueId, string $groupInviteUniqueId): string
    {
        return strtr(
            self::DOCUMENT_GROUP_INVITE_URL_PATTERN,
            [
                   '{documentGroupUniqueId}' => $documentGroupUniqueId,
                   '{groupInviteUniqueId}'   => $groupInviteUniqueId,
            ]
        );
    }

    /**
     * @param string $documentGroupUniqueId
     * @param string $groupInviteUniqueId
     *
     * @return string
     */
    private function cancelDocumentGroupInviteUrl(string $documentGroupUniqueId, string $groupInviteUniqueId): string
    {
        return strtr(
            self::CANCEL_DOCUMENT_GROUP_INVITE_URL_PATTERN,
            [
                '{documentGroupUniqueId}' => $documentGroupUniqueId,
                '{groupInviteUniqueId}'   => $groupInviteUniqueId,
            ]
        );
    }
}
