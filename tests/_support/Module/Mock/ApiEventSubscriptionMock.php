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
 * Class ApiEventSubscription
 *
 * @package Module\Mock
 */
class ApiEventSubscriptionMock extends Module implements DependsOnModule
{
    private const EVENTS_URL = '/api/v2/events';
    private const EVENT_URL_PATTERN = '/api/v2/events/{eventSubscriptionUniqueId}';
    
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
    public function mockGetEventSubscriptionsRequestWithBasicToken(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::getRequest()
                 ->andHeader('Authorization', Is::containing('Basic'))
                 ->andUrl(Is::equalTo($this->eventsUrl()))
            )->then(
                Respond::withStatusCode(200)
                    ->andHeader('Content-Type', 'application/json')
                    ->andBody(
                        json_encode(
                            [
                                'data' => [
                                    [
                                        'id' => Str::generateUniqueId(),
                                        'event' => 'document.update',
                                        'entity_id' => 482771,
                                        'entity_unique_id' => Str::generateUniqueId(),
                                        'action' => 'callback',
                                        'json_attributes' =>
                                            array (
                                                'use_tls_12' => true,
                                                'docid_queryparam' => false,
                                                'integration_id' => Str::generateUniqueId(),
                                                'callback_url' => 'https://callback.your-domain.com/sing-now-events',
                                            ),
                                        'application_name' => 'Your Application Name',
                                        'created' => 1602582956,
                                    ]
                                ],
                                'meta' => [
                                    'pagination' => [
                                        'total' => 1,
                                        'count' => 1,
                                        'per_page' => 15,
                                        'current_page' => 1,
                                        'total_pages' => 1,
                                    ],
                                ],
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
    public function mockCreateEventSubscriptionRequestWithBasicToken(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andHeader('Authorization', Is::containing('Basic'))
                 ->andUrl(Is::equalTo($this->eventsUrl()))
            )->then(
                Respond::withStatusCode(201)
            )
        );
    }
    
    /**
     * @return void
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function mockCreateEventSubscriptionRequestWithBearerToken(): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::postRequest()
                 ->andHeader('Authorization', Is::containing('Bearer'))
                 ->andUrl(Is::equalTo($this->eventsUrl()))
            )->then(
                Respond::withStatusCode(201)
            )
        );
    }

    /**
     * @param string $eventSubscriptionUniqueId
     *
     * @return void
     * @throws ClientExceptionInterface
     */
    public function mockDeleteEventSubscriptionsRequestWithBasicToken(string $eventSubscriptionUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::deleteRequest()
                 ->andHeader('Authorization', Is::containing('Basic'))
                 ->andUrl(Is::equalTo($this->eventUrl($eventSubscriptionUniqueId)))
            )->then(
                Respond::withStatusCode(204)
            )
        );
    }

    /**
     * @param string $eventSubscriptionUniqueId
     *
     * @return void
     * @throws ClientExceptionInterface
     */
    public function mockDeleteEventSubscriptionsRequestWithBearerToken(string $eventSubscriptionUniqueId): void
    {
        $this->phiremock->expectARequestToRemoteServiceWithAResponse(
            Phiremock::on(
                A::deleteRequest()
                 ->andHeader('Authorization', Is::containing('Bearer'))
                 ->andUrl(Is::equalTo($this->eventUrl($eventSubscriptionUniqueId)))
            )->then(
                Respond::withStatusCode(204)
            )
        );
    }

    /**
     * @return string
     */
    private function eventsUrl(): string
    {
        return self::EVENTS_URL;
    }

    /**
     * @param string $eventSubscriptionUniqueId
     *
     * @return string
     */
    private function eventUrl(string $eventSubscriptionUniqueId): string
    {
        return strtr(self::EVENT_URL_PATTERN, ['{eventSubscriptionUniqueId}' => $eventSubscriptionUniqueId]);
    }
}
