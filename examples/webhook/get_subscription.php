<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Webhook\Request\SubscriptionGet;
use SignNow\Api\Webhook\Response\SubscriptionGet as SubscriptionGetResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to get a list of existing webhook subscriptions
 */
try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
        ->getApiClient();

    $request = new SubscriptionGet();

    /** @var SubscriptionGetResponse $response */
    $response = $apiClient->send($request);
    $subscriptions = $response->getData();

    foreach ($subscriptions as $subscription) {
        echo "ID: {$subscription->getId()}\n";
        echo "Event: {$subscription->getEvent()}\n";
        echo "Entity ID: {$subscription->getEntityId()}\n";
        echo "Action: {$subscription->getAction()}\n";
        echo "Callback URL: {$subscription->getJsonAttributes()->getCallbackUrl()}\n";
        echo "Created: {$subscription->getCreated()}\n";
        echo "---------------------------------\n";
    }
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
