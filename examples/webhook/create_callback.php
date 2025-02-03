<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Webhook\Request\Data\Attribute;
use SignNow\Api\Webhook\Request\SubscriptionPost;
use SignNow\Api\Webhook\Response\SubscriptionPost as SubscriptionPostResponse;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

/**
 * This example describes how to create a webhook subscription with a callback URL.
 *
 * After this you can receive notifications to your callback URL about the user opening a document.
 */
try {
    $sdk = new Sdk();
    $apiClient = $sdk->build()
        ->authenticate()
        ->getApiClient();

    $userId = 'YOUR_USER_ID';
    $request = new SubscriptionPost(
        event: 'user.document.open',
        entityId: $userId,
        action: 'callback',
        attributes: new Attribute(
            callback: 'https://demo.requestcatcher.com/',
        )
    );
    /** @var SubscriptionPostResponse $response */
    $response = $apiClient->send($request);
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
