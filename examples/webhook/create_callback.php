<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../SignNowExampleData.php';

use SignNow\Api\Webhook\Request\Data\Attribute;
use SignNow\Api\Webhook\Request\SubscriptionPost;
use SignNow\Api\Webhook\Response\SubscriptionPost as SubscriptionPostResponse;
use SignNow\Core\Token\BearerToken;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to create a webhook subscription with a callback URL.
 *
 * After this you can receive notifications to your callback URL about the user opening a document.
 */
try {
    // Fill in your actual data in examples/signnow-example-config.php before running
    $data = new SignNowExampleData();
    $bearerToken = $data->getBearerToken();

    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->withBearerToken(new BearerToken($bearerToken))
        ->getApiClient();

    $userId = $data->getUserId();
    $request = new SubscriptionPost(
        event: 'user.document.open',
        entityId: $userId,
        action: 'callback',
        attributes: new Attribute(
            callback: $data->getWebhookCallbackUrl(),
        )
    );
    /** @var SubscriptionPostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
