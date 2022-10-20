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
 * Class ApiDocumentMock
 *
 * @package Module\Mock
 */
class ApiDocumentMock extends Module implements DependsOnModule
{
    private const UPLOAD_DOCUMENT_URL = '/document';
    private const FIELD_EXTRACT_UPLOAD_DOCUMENT_URL_PATTERN = '/document/fieldextract';
    private const DOCUMENT_URL_PATTERN = '/document/{documentUniqueId}';
    private const DOWNLOAD_DOCUMENT_URL_PATTERN = '/document/{documentUniqueId}/download';
    private const DOWNLOAD_DOCUMENT_LINK_URL_PATTERN = '/document/{documentUniqueId}/download/link';
    private const PREFILL_TEXT_FIELDS_URL_PATTERN = '/v2/documents/{documentUniqueId}/prefill-texts';
    private const FILL_SMART_FIELDS_URL_PATTERN = '/document/{documentUniqueId}/integration/object/smartfields';

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
    public function mockDefaultGetDocumentRequest(string $documentUniqueId): void
    {
        $this->mockGetDocumentWithResponse(
            $documentUniqueId,
            [
                'id' => $documentUniqueId,
                'document_name' => 'test_doc',
                'original_filename' => 'test_doc.pdf',
                'parent_id' => '',
                'user_id' => '',
                'origin_document_id' => null,
                'page_count' => 1,
                'pages' => [
                    [
                        'src' => "https://api.signnow.com/document/$documentUniqueId/thumbnail?size=large&page=0",
                        'size' => [
                            'width' => 650,
                            'height' => 950,
                        ],
                    ]
                ],
                'created' => '1633089164',
                'updated' => '1633089210',
                'version_time' => '1633089210',
                'owner' => 'owner@example.com',
                'template' => false,
                'thumbnail' => [
                    'small' => "https://api.signnow.com/document/$documentUniqueId/thumbnail?size=small",
                    'medium' => "https://api.signnow.com/document/$documentUniqueId/thumbnail?size=medium",
                    'large' => "https://api.signnow.com/document/$documentUniqueId/thumbnail?size=large",
                ],
                'roles' => [
                    [
                        'unique_id' => 'e325a3a511a3414ea0717f3716f60fadbf045eb4',
                        'signing_order' => '1',
                        'name' => 'Signer 1',
                    ]
                ],
                'viewer_roles' => [],
                'attachments' => [],
                'checks' => [],
                'texts' => [],
                'radiobuttons' => [],
                'signatures' => [],
                'hyperlinks' => [],
                'integrations' => [],
                'enumeration_options' => [],
                'exported_to' => [],
                'lines' => [],
                'requests' => [],
            ]
        );
    }

    /**
     * @param string $documentUniqueId
     * @param array $params
     *
     * @throws ClientExceptionInterface
     */
    public function mockGetDocumentRequestWithParams(
        string $documentUniqueId,
        array $params,
        array $response = []
    ): void {
        $url = $this->documentUrl($documentUniqueId) . '?' . http_build_query($params);
        $response = empty($response) ? ['id' => $documentUniqueId] : $response;
        
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo($url))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode($response)
                       )
            )
        );
    }

    /**
     * @param string $documentUniqueId
     * @param array  $expectedResponse
     *
     * @return void
     * @throws ClientExceptionInterface
     */
    public function mockGetDocumentWithResponse(string $documentUniqueId, array $expectedResponse): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo($this->documentUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode($expectedResponse)
                       )
            )
        );
    }

    /**
     * @param string $documentUniqueId
     * @param array  $params
     * @param string $expectedContent
     *
     * @throws ClientExceptionInterface
     */
    public function mockDownloadDocumentRequest(
        string $documentUniqueId,
        array $params = [],
        string $expectedContent = '_^_^_'
    ): void {
        $url = empty($params)
            ? $this->documentDownloadUrl($documentUniqueId)
            : $this->documentDownloadUrl($documentUniqueId) . '?' . http_build_query($params);
        
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andUrl(Is::equalTo($url))
            )->then(
                Respond::withStatusCode(200)
                    ->andBinaryBody($expectedContent)
                    ->andHeader('Content-Type', 'application/pdf')
                    ->andHeader('Content-disposition', 'attachment;filename="Demo.pdf"')
            )
        );
    }

    /**
     * @param string $documentUniqueId
     * @param string $expectedLink
     *
     * @throws ClientExceptionInterface
     */
    public function mockDocumentDownloadLinkRequest(string $documentUniqueId, string $expectedLink): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->documentDownloadLinkUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                    ->andHeader('Content-Type', 'application/json')
                    ->andBody(
                        json_encode(
                            [
                                'link' => $expectedLink,
                            ]
                        )
                    )
            )
        );
    }

    /**
     * @param string $documentUniqueId
     *
     * @throws ClientExceptionInterface
     */
    public function mockDeleteDocumentRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::deleteRequest()
                 ->andUrl(Is::equalTo($this->documentUrl($documentUniqueId)))
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
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockUploadDocumentRequest(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andHeader('Content-Type', Is::containing('multipart/form-data'))
                 ->andUrl(Is::equalTo($this->uploadDocumentUrl()))
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
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockFieldExtractUploadDocumentRequest(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andHeader('Content-Type', Is::containing('multipart/form-data'))
                 ->andUrl(Is::equalTo($this->fieldExtractUploadDocumentUrl()))
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
     * @param string $documentUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockUpdateDocumentRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::putRequest()
                 ->andHeader('Content-Type', Is::equalTo('application/json'))
                 ->andUrl(Is::equalTo($this->documentUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => $documentUniqueId,
                               ]
                           )
                       )
            )
        );
    }

    /**
     * @param string $documentUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockPrefillDocumentTextFieldsRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::putRequest()
                 ->andHeader('Content-Type', Is::equalTo('application/json'))
                 ->andUrl(Is::equalTo($this->prefillTextFieldsUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(204)
            )
        );
    }

    /**
     * @param string $documentUniqueId
     *
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockFillDocumentSmartFieldsRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andHeader('Content-Type', Is::equalTo('application/json'))
                 ->andUrl(Is::equalTo($this->fillDocumentSmartFieldsUrl($documentUniqueId)))
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
    private function fieldExtractUploadDocumentUrl(): string
    {
        return self::FIELD_EXTRACT_UPLOAD_DOCUMENT_URL_PATTERN;
    }

    /**
     * @return string
     */
    private function uploadDocumentUrl(): string
    {
        return self::UPLOAD_DOCUMENT_URL;
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    private function documentUrl(string $documentUniqueId): string
    {
        return strtr(self::DOCUMENT_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    private function documentDownloadUrl(string $documentUniqueId): string
    {
        return strtr(self::DOWNLOAD_DOCUMENT_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    private function documentDownloadLinkUrl(string $documentUniqueId): string
    {
        return strtr(self::DOWNLOAD_DOCUMENT_LINK_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    private function prefillTextFieldsUrl(string $documentUniqueId): string
    {
        return strtr(self::PREFILL_TEXT_FIELDS_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    private function fillDocumentSmartFieldsUrl(string $documentUniqueId): string
    {
        return strtr(self::FILL_SMART_FIELDS_URL_PATTERN, ['{documentUniqueId}' => $documentUniqueId]);
    }
}
