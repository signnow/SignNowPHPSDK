<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use SignNow\Api\Auth\Request\RefreshTokenPost;
use SignNow\Api\Auth\Response\RefreshTokenPost as RefreshTokenPostResponse;
use SignNow\ApiClient;
use SignNow\Exception\Output\ErrorOutput;
use SignNow\Sdk;

try {
    $sdk = new Sdk();
    /** @var ApiClient $apiClient */
    $apiClient = $sdk->build()
         ->authenticate()
         ->getApiClient();

    $token = $apiClient->getBearerToken();

    $request = new RefreshTokenPost(
        refreshToken: $token->refreshToken(),
    );

    /** @var RefreshTokenPostResponse $response */
    $response = $apiClient->send($request);
    echo "Bearer token: {$response->getAccessToken()}\n";
} catch (Throwable $e) {
    (new ErrorOutput())->displayException($e);
}
