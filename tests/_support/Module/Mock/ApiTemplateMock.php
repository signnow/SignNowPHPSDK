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
 * Class ApiTemplateMock
 *
 * @package Module\Mock
 */
class ApiTemplateMock extends Module implements DependsOnModule
{
    private const TEMPLATE_CREATE_URL = '/template';
    private const TEMPLATE_COPY_URL_PATTERN = '/template/{templateUniqueId}/copy';

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
    public function mockCreateTemplateRequest(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->createTemplateUrl()))
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
    public function mockTemplateCopyRequest(string $documentUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andUrl(Is::equalTo($this->templateCopyUrl($documentUniqueId)))
            )->then(
                Respond::withStatusCode(200)
                       ->andHeader('Content-Type', 'application/json')
                       ->andBody(
                           json_encode(
                               [
                                   'id' => Str::generateUniqueId(),
                                   'document_name' => 'important document', 
                               ]
                           )
                       )
            )
        );
    }
    
    /**
     * @return string
     */
    private function createTemplateUrl(): string
    {
        return self::TEMPLATE_CREATE_URL;
    }

    /**
     * @param string $documentUniqueId
     *
     * @return string
     */
    private function templateCopyUrl(string $documentUniqueId): string
    {
        return strtr(self::TEMPLATE_COPY_URL_PATTERN, ['{templateUniqueId}' => $documentUniqueId]);
    }
}
