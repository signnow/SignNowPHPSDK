<?php

declare(strict_types=1);

namespace Module\Mock;

use Codeception\Lib\Interfaces\DependsOnModule;
use Codeception\Module;
use Codeception\Module\Phiremock as PhiremockModule;
use Mcustiel\Phiremock\Client\Utils\A;
use Mcustiel\Phiremock\Client\Utils\Is;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class Debug
 *
 * @package Module\Mock
 */
class Debug extends Module implements DependsOnModule
{
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
     * @param string $url
     *
     * @return array
     * @throws ClientExceptionInterface
     */
    public function grabHttpGetRequests(string $url): array
    {
        return $this->phiremock->grabRequestsMadeToRemoteService(
            A::getRequest()
             ->andUrl(Is::equalTo($url))
        );
    }
    
    /**
     * @param string $url
     *
     * @return array
     * @throws ClientExceptionInterface
     */
    public function grabHttpPostRequests(string $url): array
    {
        return $this->phiremock->grabRequestsMadeToRemoteService(
            A::postRequest()
             ->andUrl(Is::equalTo($url))
        );
    }
}
