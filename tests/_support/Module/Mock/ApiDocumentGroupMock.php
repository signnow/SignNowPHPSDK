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
use Mcustiel\Phiremock\Domain\Http\JsonBody;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ApiDocumentGroupMock
 *
 * @package Module\Mock
 */
class ApiDocumentGroupMock extends Module implements DependsOnModule
{
    private const CREATE_DOCUMENT_GROUP_URL = '/documentgroup';
    private const DOCUMENT_GROUP_URL_PATTERN = '/documentgroup/{documentGroupUniqueId}';
    
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
     * @param string $groupName
     * @param array  $documentIds
     *
     * @throws ClientExceptionInterface
     */
    public function mockCreateDocumentGroupRequest(string $groupName, array $documentIds): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->createDocumentGroupUrl()))
                 ->andBody(
                     Is::sameJsonObjectAs(
                         json_encode(
                             [
                                 'document_ids' => $documentIds,
                                 'group_name'   => $groupName,
                             ]
                         )
                     )
                 )
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
     * @param string $expectedGroupName
     *
     * @throws ClientExceptionInterface
     */
    public function mockGetDocumentGroupRequest(string $documentGroupUniqueId, string $expectedGroupName): void
    {
        $expectedDocumentUniqueId = Str::generateUniqueId();
        
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo($this->documentGroupUrl($documentGroupUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'group_name' => $expectedGroupName,
                                   'documents' => [
                                       [
                                           'id' => $expectedDocumentUniqueId,
                                           'document_name' => Str::generateRandomString(),
                                           'origin_document_id' => Str::generateUniqueId(),
                                           'roles' => ['tester'],
                                           'thumbnail' => [
                                               "small"  => "https://fun.signnow.com/document/$expectedDocumentUniqueId/small",
                                               "medium" => "https://fun.signnow.com/document/$expectedDocumentUniqueId/medium",
                                               "large"  => "https://fun.signnow.com/document/$expectedDocumentUniqueId/large",
                                           ]
                                       ]
                                   ],
                                   'originator_organization_settings' => [],
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
    public function mockDeleteDocumentGroupRequest(string $documentGroupUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::deleteRequest()
                 ->andUrl(Is::equalTo($this->documentGroupUrl($documentGroupUniqueId)))
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
     * @return string
     */
    private function createDocumentGroupUrl(): string
    {
        return self::CREATE_DOCUMENT_GROUP_URL;
    }

    /**
     * @param string $documentGroupUniqueId
     *
     * @return string
     */
    private function documentGroupUrl(string $documentGroupUniqueId): string
    {
        return strtr(self::DOCUMENT_GROUP_URL_PATTERN, ['{documentGroupUniqueId}' => $documentGroupUniqueId]);
    }
}
