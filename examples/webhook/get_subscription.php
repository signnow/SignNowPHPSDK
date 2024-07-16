<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Webhook\Request\SubscriptionGet;
use SignNow\Api\Webhook\Response\SubscriptionGet as SubscriptionGetResponse;
use SignNow\ApiClient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to get a list of existing webhook subscriptions
 */
try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    $request = new SubscriptionGet();

    /** @var SubscriptionGetResponse $response */
    $response = $apiClient->send($request);
    $subscriptions = $response->getData();

    foreach ($subscriptions as $subscription) {
        echo "Event: {$subscription->getEvent()}\n";
        echo "Entity ID: {$subscription->getEntityId()}\n";
        echo "Action: {$subscription->getAction()}\n";
        echo "Attributes: {$subscription->getAttributes()}\n";
        echo "Created at: {$subscription->getCreatedAt()}\n";
        echo "Updated at: {$subscription->getUpdatedAt()}\n";
        echo "ID: {$subscription->getId()}\n";
        echo "URL: {$subscription->getUrl()}\n";
        echo "---------------------------------\n";
    }
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
